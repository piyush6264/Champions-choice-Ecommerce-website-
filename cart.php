<?php
session_start();  //  Start the session to access user data
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>

        .cart-item { margin: 15px 0; }
        .cart-img { height: 100px; object-fit: cover; }
        .card { background-color: rgba(255, 255, 255, 0.9); transition: 0.2s; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .card:hover { transform: scale(1.02); }
        .total-section {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
                    <li class="nav-item ">
                        <a class="nav-link nav-hover" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover" href="products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-hover" href="about.php">About</a>
                    </li>
                    <li class="nav-item active">
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
    
    <!-- Cart Section -->
    <div class="container mt-5">
        <h2 class="text-center">Shopping Cart</h2>
        <div id="cart-items"></div>

        <!-- Total Amount Section -->
        <div class="total-section mt-4 p-3">
            <h4>Total: $<span id="total-price">0.00</span></h4>
            <button class="btn btn-danger" onclick="clearCart()">Clear Cart</button>
            <button class="btn btn-success" onclick="buyNow()">Buy Now</button>
            
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


    <script>
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let cartItemsDiv = document.getElementById("cart-items");
            let totalPrice = 0;
            cartItemsDiv.innerHTML = "";

            if (cart.length === 0) {
                cartItemsDiv.innerHTML = "<p class='text-center'>Your cart is empty.</p>";
                document.getElementById("total-price").textContent = "0.00";
                return;
            }

            cart.forEach((item, index) => {
                let itemTotal = item.price * item.quantity;
                totalPrice += itemTotal;

                let cartItem = `
                    <div class="card p-3 mb-3">
                        <div class="row align-items-center">
                            <div class="col-md-2"><img src="${item.image}" class="cart-img" alt="${item.name}"></div>
                            <div class="col-md-4"><h5>${item.name}</h5></div>
                            <div class="col-md-2"><p>$${item.price.toFixed(2)}</p></div>
                            <div class="col-md-2"><p>Qty: ${item.quantity}</p></div>
                            <div class="col-md-2"><button class="btn btn-danger btn-sm" onclick="removeItem(${index})">Remove</button></div>
                        </div>
                    </div>`;
                cartItemsDiv.innerHTML += cartItem;
            });

            document.getElementById("total-price").textContent = totalPrice.toFixed(2);
        }

        function removeItem(index) {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            loadCart();
        }

        function clearCart() {
            localStorage.removeItem("cart");
            loadCart();
        }
        function buyNow() {
            
    window.location.href = "payment.php";
}

        window.onload = loadCart;
    </script>

</body>
</html>
