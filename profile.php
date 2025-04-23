<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "champions_choice";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Get User ID
$user_id = $_SESSION['user_id'];

// ✅ Fetch User Details
$stmt = $conn->prepare("SELECT name, mobile_number, pin_code, address FROM user_details WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_details = $stmt->get_result()->fetch_assoc();
$stmt->close();

// ✅ Fetch Cart Items
$stmt = $conn->prepare("SELECT product_name, price, quantity FROM cart WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$cart_items = $stmt->get_result();
$stmt->close();

// ✅ Fetch Purchase History
$stmt = $conn->prepare("SELECT product_name, price, quantity, purchase_date FROM orders WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$order_history = $stmt->get_result();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Champion's Choice - Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="Images/11.png" alt="Logo" style="width: 150px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link nav-hover" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link nav-hover" href="products.php">Products</a></li>
                <li class="nav-item"><a class="nav-link nav-hover" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link nav-hover" href="cart.php">Cart</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item active"><a class="nav-link nav-hover" href="profile.php">My Profile</a></li>
                    <li class="nav-item"><a class="nav-link nav-hover text-danger" href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link nav-hover" href="login.php">Log in</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2>My Profile</h2>
    <table class="table table-bordered">
        <tr><th>Full Name</th><td><?= htmlspecialchars($user_details['name']) ?></td></tr>
        <tr><th>Mobile Number</th><td><?= htmlspecialchars($user_details['mobile_number']) ?></td></tr>
        <tr><th>Pin Code</th><td><?= htmlspecialchars($user_details['pin_code']) ?></td></tr>
        <tr><th>Address</th><td><?= htmlspecialchars($user_details['address']) ?></td></tr>
    </table>

    <!-- Order History Section -->
    <h2 class="mt-4">Order History</h2>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Product Name</th>
                <th>Price (₹)</th>
                <th>Quantity</th>
                <th>Purchase Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($order_history->num_rows > 0): ?>
                <?php while ($order = $order_history->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['product_name']) ?></td>
                        <td>₹<?= number_format($order['price'], 2) ?></td>
                        <td><?= htmlspecialchars($order['quantity']) ?></td>
                        <td><?= htmlspecialchars($order['purchase_date']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No orders found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>