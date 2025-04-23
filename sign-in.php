<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "champions_choice";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']); // Trim spaces to prevent empty values
    $number = trim($_POST['number']);
    $pin_code = trim($_POST['pin_code']);
    $address = trim($_POST['address']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Check if the email is already registered
    $check_email = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email->store_result();

    if ($check_email->num_rows > 0) {
        echo "<script>alert('Email already registered. Please login!'); window.location='login.php';</script>";
    } else {
        // Insert into users table
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            $user_id = $stmt->insert_id; // Get the last inserted user ID
            
            // Insert user details into user_details table, including `name`
            $stmt_details = $conn->prepare("INSERT INTO user_details (user_id, name, mobile_number, pin_code, address) VALUES (?, ?, ?, ?, ?)");
            $stmt_details->bind_param("issss", $user_id, $name, $number, $pin_code, $address);
            $stmt_details->execute();
            $stmt_details->close();

            echo "<script>alert('Registration successful! Please login.'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Error registering user');</script>";
        }
        $stmt->close();
    }
    $check_email->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: url('https://img.freepik.com/premium-photo/toy-shopping-cart-with-boxes-credit-card-with-copy-space_339191-197.jpg') 
                        no-repeat center center fixed;
            background-size: cover;
            padding-top: 80px; /* Ensure content does not overlap navbar */
        }
        .login-container {
            background: rgba(185, 215, 232, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Sticky Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="Images/11.png" alt="Logo" style="width: 150px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="cart.php">Cart</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="profile.php">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Signup Form Container -->
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="login-container">
        <h2 class="text-center mb-4">Sign Up</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Mobile Number</label>
                <input type="number" class="form-control" name="number" placeholder="Enter number" required>
            </div>
            <div class="mb-3">
                <label for="pin_code" class="form-label">Pin Code</label>
                <input type="text" class="form-control" name="pin_code" placeholder="Enter pin code" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Enter address" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">Sign Up</button>
        </form>
        <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
    </div>
</div>

</body>
</html>
