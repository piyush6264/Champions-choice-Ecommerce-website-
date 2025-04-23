<?php
    session_start();

    // Database connection
    $servername = "localhost";
    $username = "root"; // Change as needed
    $password = ""; // Change as needed
    $dbname = "champions_choice";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create users table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL
    )";

    $conn->query($sql);

    // Handle login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Check user credentials
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $name, $hashed_password);
            $stmt->fetch();
            
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $name;
                $_SESSION['email'] = $email;
                header("Location: index.php"); // Redirect after login
                exit();
            } else {
                echo "<script>alert('Invalid password');</script>";
            }
        } else {
            echo "<script>alert('No user found with this email');</script>";
        }
        $stmt->close();
    }
    $conn->close();
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom CSS -->
    <style>
        body {
            background: url('https://img.freepik.com/premium-photo/toy-shopping-cart-with-boxes-credit-card-with-copy-space_339191-197.jpg') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background: rgba(185, 215, 232, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container h2 {
            font-size: 26px;
            margin-bottom: 20px;
            color: #333;
        }
        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 10px;
            transition: 0.3s;
        }
        .form-control:focus {
            border-color:rgb(57, 59, 60);
            box-shadow: 0px 0px 5px rgba(0, 123, 255, 0.5);
        }
        .btn-login {
            background:rgb(67, 68, 68);
            color: white;
            font-size: 18px;
            border-radius: 8px;
            padding: 10px;
            transition: 0.3s ease-in-out;
        }
        .btn-login:hover {
            background:rgb(160, 163, 167);
        }
        .login-container a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }
        .login-container a:hover {
            text-decoration: underline;
        }
        @media (max-width: 480px) {
            .login-container {
                padding: 30px;
            }
        }
        .navbar-nav {
            font-size: 18px;
        }
        .nav-hover {
            position: relative;
            text-decoration: none;
            padding-bottom: 5px;
        }
        .nav-hover::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 0;
            width: 0;
            height: 3px;
            background-color: rgb(52, 52, 53);
            transition: width 0.3s ease, left 0.3s ease;
        }
        .nav-hover:hover::after {
            width: 100%;
            left: 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light w-100 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="Images/11.png" alt="Login Image" style="width: 150px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link nav-hover" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-hover" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-hover" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-hover" href="cart.php">Cart</a>
                </li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link nav-hover" href="profile.php">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover text-danger" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item active">
                        <a class="nav-link nav-hover" href="login.php">Log in</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="login-container mt-5">
    <h2>Login to Your Account</h2>
    <form action="login.php" method="POST">
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <button type="submit" class="btn btn-login w-100">Login</button>
    </form>
    <p class="mt-3">
        <a href="password-reset.php">Forgot Password?</a>
    </p>
    <p>
        Don't have an account? <a href="sign-in.php">Sign Up</a>
    </p>
</div>


</body>
</html>
