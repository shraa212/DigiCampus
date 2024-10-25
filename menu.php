<?php
session_start();
include 'db.php';

// Initialize the cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding items to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_id']) && isset($_POST['quantity'])) {
    $item_id = (int)$_POST['item_id'];
    $quantity = (int)$_POST['quantity'];

    // If item is already in the cart, increase the quantity
    if ($quantity > 0) { // Only add to cart if quantity is greater than 0
        if (isset($_SESSION['cart'][$item_id])) {
            $_SESSION['cart'][$item_id] += $quantity;
        } else {
            $_SESSION['cart'][$item_id] = $quantity;
        }
    }
}

// Fetch menu items
$query = "SELECT * FROM menu_items";
$result = $conn->query($query);

// Calculate total amount from the cart
$total_amount = 0;
$cart_items = [];
foreach ($_SESSION['cart'] as $id => $qty) {
    $cart_items[$id] = $qty; // Store quantities
    $item_query = "SELECT price FROM menu_items WHERE id = $id";
    $item_result = $conn->query($item_query);
    if ($item_row = $item_result->fetch_assoc()) {
        $total_amount += $item_row['price'] * $qty; // Calculate total amount
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Smart Canteen</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            padding: 20px;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 800px;
        }
        h2, h3 {
            color: #06bbcc;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }
        th {
            background-color: #06bbcc;
            color: white;
        }
        button {
            background-color: #06bbcc;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #05a2b0;
        }
        input[type="number"] {
            width: 60px;
            margin-left: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
        }
        .summary {
            margin-top: 20px;
            text-align: center;
        }
        .empty-cart {
            text-align: center;
            font-style: italic;
            color: #999;
        }
        .proceed-button {
            width: 100%;
            margin-top: 20px;
        }
        .back-button {
            background-color: #ccc;
            color: black;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🍔🥗 Satisfy Your Cravings:🍰🍕</br>
    </h2>
    
    

    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td>₹<?php echo number_format($row['price'], 2); ?></td>
                <td>
                    <form action="" method="POST" style="display: inline;">
                        <input type="hidden" name="item_id" value="<?php echo $row['id']; ?>">
                        <input type="number" name="quantity" value="1" min="1" required>
                        <button type="submit">Add to Cart</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <div class="summary">
        <h3>Cart Summary</h3>
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php if (!empty($cart_items)): ?>
                <?php foreach ($cart_items as $item_id => $qty): ?>
                    <?php
                    $item_query = "SELECT name, price FROM menu_items WHERE id = $item_id";
                    $item_result = $conn->query($item_query);
                    if ($item_row = $item_result->fetch_assoc()):
                        $item_total = $item_row['price'] * $qty;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item_row['name']); ?></td>
                            <td>₹<?php echo number_format($item_row['price'], 2); ?></td>
                            <td><?php echo htmlspecialchars($qty); ?></td>
                            <td>₹<?php echo number_format($item_total, 2); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Total Amount:</strong></td>
                    <td><strong>₹<?php echo number_format($total_amount, 2); ?></strong></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="empty-cart">Your cart is empty. Add items to the cart to see a summary.</td>
                </tr>
            <?php endif; ?>
        </table>
        
        <form action="confirm_payment.php" method="POST" class="proceed-button">
            <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
            <button type="submit" <?php echo $total_amount > 0 ? '' : 'disabled'; ?>>Proceed to Payment</button>
        </form>
        <form>
        <br><button type="submit" onsubmit="canteen.php">BACK</button>
        </form>
    </div>
</div>

</body>
</html>
