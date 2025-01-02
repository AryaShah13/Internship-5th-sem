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

// Check if order details are available in the session
if (!isset($_SESSION['order_details'])) {
    header('Location: checkout.php');
    exit;
}

$orderDetails = $_SESSION['order_details'];
$customerName = $orderDetails['customer_name'];
$address = $orderDetails['address'];
$totalPrice = $orderDetails['total_price'];
$orderId = $orderDetails['order_id'];

// Handle Payment Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['make_payment'])) {
    $paymentMethod = $_POST['payment_method'];

    if ($paymentMethod === 'upi') {
        $upiId = $_POST['upi_id'];
        // Save UPI payment details to database
        $stmt = $pdo->prepare("INSERT INTO payments (order_id, payment_method, details, amount) VALUES (?, ?, ?, ?)");
        $stmt->execute([$orderId, 'UPI', $upiId, $totalPrice]);
        $paymentStatus = "Payment successful via UPI: $upiId";
    } elseif ($paymentMethod === 'card') {
        $cardNumber = $_POST['card_number'];
        $expiryDate = $_POST['expiry_date'];
        $cvv = $_POST['cvv'];
        // Save Card payment details to database
        $stmt = $pdo->prepare("INSERT INTO payments (order_id, payment_method, details, amount) VALUES (?, ?, ?, ?)");
        $stmt->execute([$orderId, 'Card', "Card ending in " . substr($cardNumber, -4), $totalPrice]);
        $paymentStatus = "Payment successful via Card ending in " . substr($cardNumber, -4);
    } else {
        $paymentStatus = "Invalid payment method.";
    }

    // Clear session and redirect to a success page
    unset($_SESSION['order_details']);
    $_SESSION['payment_status'] = $paymentStatus;
    header('Location: success.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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

        input {
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

        footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
            padding: 10px;
        }

        .payment-method {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<header>
    <h1>Payment</h1>
</header>

<div class="container">
    <h2>Order Details</h2>
    <p><strong>Customer Name:</strong> <?php echo htmlspecialchars($customerName); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
    <p><strong>Total Amount:</strong> <?php echo htmlspecialchars($totalPrice); ?>₹</p>

    <form method="POST" action="payment.php">
        <div class="payment-method">
            <h3>Payment Method</h3>

            <label>
                <input type="radio" name="payment_method" value="upi" required> UPI
            </label>
            <input type="text" name="upi_id" placeholder="Enter UPI ID (e.g., name@bank)" pattern="[a-zA-Z0-9.]+@[a-zA-Z]+"></input>

            <label>
                <input type="radio" name="payment_method" value="card" required> MasterCard
            </label>
            <input type="text" name="card_number" placeholder="Card Number (16 digits)" pattern="\d{16}">
            <input type="text" name="expiry_date" placeholder="Expiry Date (MM/YY)" pattern="(0[1-9]|1[0-2])/\d{2}">
            <input type="text" name="cvv" placeholder="CVV (3 digits)" pattern="\d{3}">
        </div>

        <button type="submit" name="make_payment">Make Payment</button>
    </form>
</div>

<footer>
    &copy; <?php echo date('Y '); ?>Vegetable Store. All rights reserved.
</footer>
</body>
</html>
