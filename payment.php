<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7">
                <h3 class="mb-4">Select Payment Method</h3>
                
                <div class="card mb-3">
                    <div class="card-body">
                        <input type="radio" name="payment" id="cod" class="form-check-input"> 
                        <label for="cod" class="form-check-label">Cash on Delivery (COD)</label>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-body">
                        <input type="radio" name="payment" id="upi" class="form-check-input"> 
                        <label for="upi" class="form-check-label">UPI</label>
                        <input type="text" class="form-control mt-2" placeholder="Enter UPI ID" id="upiInput" disabled>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-body">
                        <input type="radio" name="payment" id="debitcard" class="form-check-input"> 
                        <label for="debitcard" class="form-check-label">Debit Card</label>
                        <input type="text" class="form-control mt-2" placeholder="Card Number" id="cardNumber" disabled>
                        <div class="row mt-2">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Expiry Date" id="expiry" disabled>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="CVV" id="cvv" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button class="btn btn-primary w-100" onclick="showBillPage()">Proceed to Pay</button>
            </div>
            
            <div class="col-md-5">
                <h3 class="mb-4">Order Summary</h3>
                <div class="card">
                    <div class="card-body" id="order-summary">
                        <p>Your cart is empty.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadOrderSummary() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let summaryDiv = document.getElementById("order-summary");
            let totalPrice = 0;
            summaryDiv.innerHTML = "";

            if (cart.length === 0) {
                summaryDiv.innerHTML = "<p>Your cart is empty.</p>";
                return;
            }

            cart.forEach(item => {
                let itemTotal = item.price * item.quantity;
                totalPrice += itemTotal;
                summaryDiv.innerHTML += `
                    <p><strong>Product:</strong> ${item.name} (Qty: ${item.quantity})</p>
                    <p><strong>Price:</strong> $${item.price.toFixed(2)}</p>
                    <hr>
                `;
            });

            summaryDiv.innerHTML += `<h5><strong>Total: $${totalPrice.toFixed(2)}</strong></h5>`;
        }

        function showBillPage() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            if (cart.length === 0) {
                alert("Your cart is empty.");
                return;
            }

            localStorage.setItem("bill", JSON.stringify(cart)); // Store bill data in localStorage
            window.location.href = "bill.html"; // Redirect to Bill Page
        }

        window.onload = loadOrderSummary;
    </script>
</body>
</html>
