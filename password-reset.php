
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Commerce</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
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
                    <li class="nav-item">
                        <a class="nav-link nav-hover" href="login.php">Log in</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

</head>
<body class="bg-light">
  <div class="auth-container">
    <div class="auth-form">
      <!-- Forget Password Form -->
      <div class="card shadow">
        <div class="card-header bg-warning text-dark text-center">
          <h5 class="mb-0">Forgot Password</h5>
        </div>
        <div class="card-body p-4">
          <form id="forgotPasswordForm">
            <div class="mb-3">
              <label for="forgotEmail" class="form-label"
                >Email address</label
              >
              <input
                type="email"
                class="form-control"
                id="forgotEmail"
                placeholder="Enter your email"
                required
              />
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-warning text-white">
                Reset Password
              </button>
              <div class="text-center mt-3">
                <p class="mb-0">
                  Remember your password? <a href="login.php">Login</a>
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#forgotPasswordForm").validate({
        rules: {
          forgotEmail: {
            required: true,
            email: true,
          },
        },
        messages: {
          forgotEmail: {
            required: "Please enter your email",
            email: "Please enter a valid email address",
          },
        },
        submitHandler: function (form) {
          $.ajax({
            type: "POST",
            url: "your-reset-password-endpoint",
            data: $(form).serialize(),
            success: function (response) {
              alert("Password reset link sent to your email!");
            },
            error: function (xhr, status, error) {
              alert("Password reset failed. Please try again.");
            },
          });
        },
      });
    });
  </script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
