<?php
session_start();  // ✅ Start the session to access user data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Champion's Choice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

 <!-- Navigation Bar -->

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="Images/11.png" alt="Login Image" style="width: 150px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link nav-hover" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover" href="products.php">Products</a>
                    </li>
                    <li class="nav-item active">
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
   

    <header class="bg-dark text-white text-center py-5">
        <h1>About Us</h1>
        <p>Your trusted online shopping destination</p>
    </header>
    
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6">
            <img src="Images/11.png" class="img-fluid rounded" alt="About Us" style="height: 250px; width: 550px;">
            </div>
            <div class="col-md-6">
                <h2>Who We Are</h2><br>
                <p>At champions Choice, we are more than just a sports eCommerce store—we are a community of athletes, fitness enthusiasts, and sports lovers who believe in the power of high-quality gear to elevate performance.<br><br>

Founded with a passion for sports and a commitment to excellence, we bring you top-tier sports equipment, apparel, and accessories from the most trusted brands in the industry. Whether you are a professional athlete, a weekend warrior, or just starting your fitness journey, we provide the gear you need to push your limits and achieve your goals.</p>
            </div>
        </div>
    </section>
    
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2>Our Mission</h2>
            <p>To connect people with the best products, ensuring quality and affordability for all.</p>
            <p>We strive to make sports accessible to everyone by offering premium-quality products at competitive prices. Our mission is to empower individuals to stay active, stay fit, and pursue their passion with confidence.</p>
        </div>
    </section>
    
    <section class="container my-5 text-center">
        <h2>Meet Our Team</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <img src="Images\customer-2.jpg" class="rounded-circle mb-3" alt="Team Member"  style="height: 250px; width: 250px;">
                <h5>John Doe</h5>
                <p>Founder & CEO</p>
            </div>
            <div class="col-md-4">
                <img src="Images\customer-3.jpg" class="rounded-circle mb-3" alt="Team Member"  style="height: 250px; width: 250px;">
                <h5>Jane Smith</h5>
                <p>Head of Marketing</p>
            </div>
            <div class="col-md-4">
                <img src="Images\customer-1.jpg" class="rounded-circle mb-3" alt="Team Member"  style="height: 250px; width: 250px;">
                <h5>Mike Johnson</h5>
                <p>Lead Developer</p>
            </div>
        </div>
    </section>
<!-- Footer -->
<footer class="footer bg-light text-center text-lg-start mt-5 py-4">
    <div class="container">
        <div class="row">
            <!-- About Us Section -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h3>About Us</h3>
                <p>We provide the best quality products at affordable prices.</p>
            </div>

            <!-- Quick Links Section -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h3>Quick Links</h3>
                <ul class="list-unstyled">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="cart.php">Cart</a></li>
                </ul>
            </div>

            <!-- Customer Support Section -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h3>Customer Support</h3>
                <ul class="list-unstyled">
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Follow Us Section -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h3>Follow Us</h3>
                <div class="social-icons d-flex justify-content-center">
                    <a href="https://www.instagram.com/yourbrand" target="_blank" class="me-3">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                    <a href="https://www.facebook.com/yourbrand" target="_blank" class="me-3">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                    <a href="https://wa.me/yourwhatsappnumber" target="_blank">
                        <i class="fab fa-whatsapp fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom text-center py-3 mt-3 bg-secondary text-white">
        &copy; 2025 YourBrand. All Rights Reserved.
    </div>
</footer>


</body>
</html>