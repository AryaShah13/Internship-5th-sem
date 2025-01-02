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

// Handle Add to Cart action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $price = $_POST['product_price'];

    // Insert the product into the database
    $stmt = $pdo->prepare("INSERT INTO cart_items (product_id, product_name, price, user_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$productId, $productName, $price, $userId]);
}

// Handle Remove from Cart action
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_cart'])) {
    $itemId = $_POST['item_id'];

    // Delete the item from the database
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE id = ? AND user_id = ?");
    $stmt->execute([$itemId, $userId]);
}

// Fetch cart items for the user
$stmt = $pdo->prepare("SELECT id, product_id, product_name, price, created_at FROM cart_items WHERE user_id = ?");
$stmt->execute([$userId]);
$cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
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
            margin-top: 20px;
            color: #333;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button, .checkout-btn, .shop-btn {
            padding: 10px 20px;
            margin: 10px 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        button {
            background: #dc3545;
            color: white;
        }

        button:hover {
            background: #c82333;
        }

        .checkout-btn {
            background-color: #007bff;
            color: white;
        }

        .checkout-btn:hover {
            background-color: #0056b3;
        }

        .shop-btn {
            background-color: #28a745;
            color: white;
            display: inline-block;
        }

        .shop-btn:hover {
            background-color: #218838;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
            padding: 10px;
        }
    </style>
</head>
<body>
<header>
    <h1>Your Shopping Cart</h1>
</header>

<?php if (empty($cartItems)): ?>
    <p style="text-align: center; margin-top: 20px; font-size: 18px;">Your cart is empty. <a href="index.php" class="shop-btn">Go back to shop</a></p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($item['price']); ?>₹</td>
                    <td>
                        <form method="POST" action="cart.php">
                            <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                            <button type="submit" name="remove_from_cart">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="text-align: center;">
        <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
        <a href="index.php" class="shop-btn">Continue Shopping</a>
    </div>
<?php endif; ?>

<footer>
    &copy; <?php echo date('Y '); ?>Vegetable Store. All rights reserved.
</footer>
</body>
</html>
