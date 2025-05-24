<?php
session_start();

// Database connection
$host = 'localhost';
$dbname = 'rcommerce';
$username = 'root';
$password = 'arya1306';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Simulate a logged-in user (replace with actual user ID from session or auth)
$userId = $_SESSION['user_id'] ?? 1; // Replace 1 with the logged-in user's ID

// Fetch cart items for the user
$stmt = $pdo->prepare("SELECT product_name, price FROM cart_items WHERE user_id = ?");
$stmt->execute([$userId]);
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Calculate total price
$totalPrice = array_sum(array_column($cartItems, 'price'));

// Handle Order Confirmation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order'])) {
    $customerName = trim($_POST['customer_name']);
    $address = trim($_POST['address']);

    // Basic input validation
    if (empty($customerName) || empty($address)) {
        $errorMessage = "Please fill in all the required fields.";
    } elseif (strlen($customerName) < 3 || strlen($address) < 10) {
        $errorMessage = "Name should be at least 3 characters and address at least 10 characters long.";
    } else {
        // Insert order details into the database
        try {
            $stmt = $pdo->prepare("INSERT INTO orders (user_id, customer_name, address, total_price) VALUES (?, ?, ?, ?)");
            $stmt->execute([$userId, $customerName, $address, $totalPrice]);
            $orderId = $pdo->lastInsertId();

            // Clear the cart after order placement
            $stmt = $pdo->prepare("DELETE FROM cart_items WHERE user_id = ?");
            $stmt->execute([$userId]);

            // Redirect to payment page with order details
            $_SESSION['order_details'] = [
                'order_id' => $orderId,
                'customer_name' => $customerName,
                'address' => $address,
                'total_price' => $totalPrice,
            ];

            header('Location: payment.php');
            exit;
        } catch (PDOException $e) {
            $errorMessage = "Error processing your order: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 20px;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .cart-summary {
            margin-bottom: 20px;
        }

        .cart-summary ul {
            list-style-type: none;
            padding: 0;
        }

        .cart-summary ul li {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .cart-summary p {
            font-size: 16px;
            margin: 5px 0;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
            padding: 10px;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<header>
    <h1>Checkout</h1>
</header>

<div class="container">
    <div class="cart-summary">
        <h2>Order Summary</h2>
        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty. <a href="index.php">Go back to shop</a></p>
        <?php else: ?>
            <ul>
                <?php foreach ($cartItems as $item): ?>
                    <li><?php echo htmlspecialchars($item['product_name']); ?> - <?php echo htmlspecialchars($item['price']); ?>₹</li>
                <?php endforeach; ?>
            </ul>
            <p><strong>Total:</strong> <?php echo $totalPrice; ?>₹</p>
        <?php endif; ?>
    </div>

    <?php if (!empty($errorMessage)): ?>
        <p class="error"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form method="POST" action="checkout.php">
        <label for="customer_name">Full Name</label>
        <input type="text" id="customer_name" name="customer_name" required placeholder="Enter your full name">

        <label for="address">Shipping Address</label>
        <textarea id="address" name="address" rows="4" required placeholder="Enter your shipping address"></textarea>

        <button type="submit" name="confirm_order">Confirm Order</button>
    </form>
</div>

<footer>
    &copy; <?php echo date('Y '); ?>Vegetable Store. All rights reserved.
</footer>
</body>
</html>
