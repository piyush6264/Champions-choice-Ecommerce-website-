<?php
session_start();  // ✅ Start the session to access user data
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Champion's Choice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Light background for better contrast */
        }
        .product-card {
            transition: transform 0.2s; /* Smooth scaling effect */
            margin: 10px; /* Decrease margin between cards */
        }
        .product-card:hover {
            transform: scale(1.05); /* Scale up on hover */
        }
        .card-img-top {
            height: 200px; /* Fixed height for product images */
            object-fit: cover; /* Maintain aspect ratio */
        }
        .card-title {
            font-weight: bold; /* Bold product titles */
        }
        .btn-primary {
            background-color:rgb(0, 0, 0); /* Custom primary button color */
            border: none; /* Remove border */
        }
        .btn-primary:hover {
            background-color:rgb(117, 117, 117); /* Darker shade on hover */
        }
    </style>
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
                    <li class="nav-item active">
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
    
    
<!-- Product Showcase -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Our Products</h2>
    <div class="row justify-content-center">
        <div class="col-md-4 col-lg-4 product-card">
            <div class="card">
                <img src="Images/2.jpg" class="card-img-top" alt="Sport Shoes">
                <div class="card-body">
                    <h5 class="card-title">Sport Shoes</h5>
                    <p class="card-text">High-performance shoes designed for comfort and speed.</p>
                    <p class="card-text"><strong>Price: $79.99</strong></p>
                    <button class="btn btn-primary" onclick="addToCart('Sport Shoes', 79.99, 'Images/2.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 product-card">
            <div class="card">
                <img src="Images/4.jpg" class="card-img-top" alt="Tennis Racket">
                <div class="card-body">
                    <h5 class="card-title">Tennis Racket</h5>
                    <p class="card-text">Lightweight racket for enhanced control and power.</p>
                    <p class="card-text"><strong>Price: $49.99</strong></p>
                    <button class="btn btn-primary" onclick="addToCart('Tennis Racket', 49.99, 'Images/4.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 product-card">
            <div class="card">
                <img src="Images/3.jpg" class="card-img-top" alt="Basketball">
                <div class="card-body">
                    <h5 class="card-title">Basketball</h5>
                    <p class="card-text">Durable basketball for indoor and outdoor play.</p>
                    <p class="card-text"><strong>Price: $29.99</strong></p>
                    <button class="btn btn-primary" onclick="addToCart('Basketball', 29.99, 'Images/3.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 product-card">
            <div class="card">
                <img src="Images/14.jpg" class="card-img-top" alt="Soccer Ball">
                <div class="card-body">
                    <h5 class="card-title">Soccer Ball</h5>
                    <p class="card-text">Official size and weight soccer ball for all ages.</p>
                    <p class="card-text"><strong>Price: $24.99</strong></p>
                    <button class="btn btn-primary" onclick="addToCart('Soccer Ball', 24.99, 'Images/14.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 product-card">
            <div class="card">
                <img src="Images/15.jpg" class="card-img-top" alt="Baseball Glove">
                <div class="card-body">
                    <h5 class="card-title">Baseball Glove</h5>
                    <p class="card-text">High-quality leather glove for better grip and control.</p>
                    <p class="card-text"><strong>Price: $39.99</strong></p>
                    <button class="btn btn-primary" onclick="addToCart('Baseball Glove', 39.99, 'Images/15.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 product-card">
            <div class="card">
                <img src="Images/16.jpg" class="card-img-top" alt="Yoga Mat">
                <div class="card-body">
                    <h5 class="card-title">Yoga Mat</h5>
                    <p class="card-text">Non-slip mat for yoga and fitness exercises.</p>
                    <p class="card-text"><strong>Price: $19.99</strong></p>
                    <button class="btn btn-primary" onclick="addToCart('Yoga Mat', 19.99, 'Images/16.jpg')">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>


   <script>
        function addToCart(productName, price, image) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            // Check if product exists, increase quantity if true
            let existingProduct = cart.find(item => item.name === productName);
            if (existingProduct) {
                existingProduct.quantity += 1;
            } else {
                cart.push({ name: productName, price: price, image: image, quantity: 1 });
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            alert("Product added to cart!");
        }
    </script>
	
	
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
        &copy; 2025 Champions choice. All Rights Reserved.
    </div>
</footer>

</body>

</html>
