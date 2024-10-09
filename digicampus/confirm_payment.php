<?php 
error_reporting(0);
session_start();
include 'db.php'; // Ensure this file connects to your database.

// Store the current page in the session
$_SESSION['last_page'] = $_SERVER['REQUEST_URI']; // Store the current URL

// Calculate total amount from the cart
$total_amount = 0;
foreach ($_SESSION['cart'] as $id => $qty) {
    $item_query = "SELECT price FROM menu_items WHERE id = $id";
    $item_result = $conn->query($item_query);
    if ($item_row = $item_result->fetch_assoc()){
        $total_amount += $item_row['price'] * $qty; // Calculate total amount
    }
}

// Set a default payment amount (in rupees)
$payment_amount = $total_amount; // Total amount from the cart
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proceed to Payment</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your external CSS if needed -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h3 {
            color: #06bbcc;
            margin-bottom: 20px;
        }
        button {
            background-color: #06bbcc;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 16px;
        }
        button:hover {
            background-color: #05a2b0;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Total Amount: ₹<?php echo number_format($total_amount, 2); ?></h3>
    <button id="payBtn">Proceed to Payment</button>
    <br><br><button type="submit" onclick="window.location.href = 'canteen.php';">BACK</button>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
$(document).ready(function() {
    var amount = <?= $payment_amount ?>; // Get the total amount
    var productid = 1; // This should be your product ID if applicable
    var productname = "Smart Canteen Order"; // Description of the order

    // Razorpay options
    var options = {
        "key": "rzp_test_Qza2QdGUm13tNS", // Your Razorpay key here
        "amount": parseInt(amount * 100), // Convert to paise
        "name": "Smart Canteen",
        "description": productname,
        "handler": function(response) {
            console.log(response);
            var payment_id = response.razorpay_payment_id;
            $.ajax({
                url: "payment_process.php",
                type: "post",
                data: {product_id: productid, payment_id: payment_id, amount: amount}, // Include the amount
                success: function(finalresponse) {
                    if (finalresponse == 'Done') {
                        // Payment processing was successful, redirect to the last page
                        location.href = '<?php echo $_SESSION["menu"]; ?>'; // Redirect to the previous page
                    } else {
                        // Payment processing failed
                        alert('Payment Successful.');
                        <?php
                            session_unset();
                        ?>
                        window.location.href='canteen.php'; // Redirect to menu after failure
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert('Payment Successful.');
                }
            });
        },
        "theme": {
            "color": "#06bbcc"
        }
    };

    // Trigger Razorpay payment on button click
    $("#payBtn").click(function(event) {
        var rzp1 = new Razorpay(options);
        rzp1.open();
        event.preventDefault(); // Prevent the default action
    });
});

</script>

</body>
</html>
