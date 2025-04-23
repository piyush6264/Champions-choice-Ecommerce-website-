
<?php
session_start();  // ✅ Start the session to access user data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Champion's Choice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <style>
        /* ------- Custom carousel styles -----------*/

    .carousel-inner {
        display: flex;
        align-items: center;
    }

    .carousel-img {
        max-height: 100vh; /* Full screen height */
        max-width: 100%; /* Full width */
        object-fit: contain; /* Show full image without cropping */
    }

    @media (max-width: 768px) {
        .carousel-img {
            max-height: 400px; /* Reduce height for tablets */
        }
    }

    @media (max-width: 480px) {
        .carousel-img {
            max-height: 300px; /* Reduce height for mobile */
        }
    }

    
/* --------------------------------- Custom product showcase styles ----------------------------*/
.navbar {
    position: sticky;
    top: 0;
    z-index: 1000; 
    width: 100%;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Optional: adds a slight shadow */
    border-bottom: 2px solid black;

}
        .product-card, .feedback-card {
            margin: 15px 0;
        }
        .card {
            height: 100%; /* Make card take full height */
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Space out content */
        }
        .card-img-top {
            height: 200px; /* Set a fixed height for images */
            object-fit: cover; /* Maintain aspect ratio */
        }
        .feedback-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        .star-rating {
            color: gold;
        }
        .highlight {
            background-color: #f8f9fa; /* Light background for highlight */
            padding: 20px;
            border-radius: 5px;
            margin: 20px 200px;
        }

        /* --------------------------------- Custom Footer styles ----------------------------*/

            footer {
            background-color: #f8f9fa;
            padding: 10px 0;
        }
    </style>
</head>
<body>
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
                <li class="nav-item active">
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

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="Images/hero-1.png" class="d-block w-100 carousel-img" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="Images/hero.png" class="d-block w-100 carousel-img" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="Images/hero-2.png" class="d-block w-100 carousel-img" alt="Slide 3">
        </div>
        <div class="carousel-item">
            <img src="Images/hero-3.png" class="d-block w-100 carousel-img" alt="Slide 3">
        </div>
    </div>


    <!-- Website Details -->
    <div class="container mt-5">
        <h2>Welcome to Champion's Choice !</h2>
        <p>Discover the best sports gear and accessories tailored for champions like you. Elevate your game with our premium selection!</p>
    </div>

    <!-- Product Showcase -->
    <div class="container mt-5">
        <h3>Featured Products</h3>
        <div class="row">
            <div class="col-md-4 product-card">
                <div class="card">
                    <img src="Images\2.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Sport Shoes</h5>
                        <p class="card-text">High-performance shoes designed for comfort and speed.</p>
                        <p class="card-text"><strong>$79.99</strong></p>
                        <a href="products.php" class="btn btn-dark">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 product-card">
                <div class="card">
                    <img src="Images\4.jpg" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Tennis Racket</h5>
                        <p class="card-text">Lightweight racket for enhanced control and power.</p>
                        <p class="card-text"><strong>$49.99</strong></p>
                        <a href="products.php" class="btn btn-dark">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 product-card">
                <div class="card">
                    <img src="Images\3.jpg" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Basketball</h5>
                        <p class="card-text">Durable basketball for indoor and outdoor play.</p>
                        <p class="card-text"><strong>$29.99</strong></p>
                        <a href="products.php" class="btn btn-dark">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Highlight Section -->
<div class="container text-center py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-12">
            <h3 class="fw-bold">Why Choose Us?</h3>
            <p class="lead">
                At <strong>Champion's Choice</strong>, we prioritize quality and customer satisfaction. 
                Our products are designed to enhance your performance and provide the best experience possible.
            </p>
        </div>
    </div>
</div>

<!-- Optional CSS for Styling -->
<style>
    h3 {
        font-size: 2rem; /* Default for large screens */
    }
    .lead {
        font-size: 1.2rem; /* Text size for better readability */
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        h3 {
            font-size: 1.8rem; /* Slightly smaller heading */
        }
        .lead {
            font-size: 1rem; /* Adjust text for small screens */
        }
    }
</style>


    <!-- Customer Feedback -->
    <div class="container mt-5">
        <h3>Customer Feedback</h3>
        <div class="row">
            <div class="col-md-4 feedback-card">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="Images\customer-1.jpg" class="feedback-img" alt="Customer 1">
                        <h5 class="card-title">John Doe</h5>
                        <p class="star-rating">★★★★★</p>
                        <p class="card-text">"The sport shoes I bought are amazing! They provide great comfort and support during my runs."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 feedback-card">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="Images\customer-3.jpg" class="feedback-img" alt="Customer 2">
                        <h5 class="card-title">Jane </h5>
                        <p class="star-rating">★★★★☆</p>
                        <p class="card-text">"I love the tennis racket! It has improved my game significantly."</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 feedback-card">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="Images\customer-2.jpg" class="feedback-img" alt="Customer 3">
                        <h5 class="card-title">Mike Johnson</h5>
                        <p class="star-rating">★★★★★</p>
                        <p class="card-text">"The basketball is top-notch! Perfect for both indoor and outdoor games."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                    <li><a href="FAQ's.html">FAQs</a></li>
                    <li><a href="#">Returns</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <!-- Follow Us Section -->
            <div class="col-md-3 col-sm-6 mb-4">
                <h3>Follow Us</h3>
                <div class="social-icons d-flex justify-content-start">
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
        &copy; 2025 Champion's choice. All Rights Reserved.
    </div>
</footer>

</body>
</html>