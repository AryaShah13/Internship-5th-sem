<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful - Craft Plus</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            text-align: center;
        }

        .success-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .success-icon {
            font-size: 80px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 28px;
            color: #333;
        }

        p {
            font-size: 18px;
            margin: 15px 0;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #45a049;
        }

        footer {
            margin-top: 50px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Craft Plus</h1>
    </header>

    <div class="success-container">
        <div class="success-icon">&#10003;</div>
        <h1>Thank You for Your Purchase!</h1>
        <p>Your order has been successfully placed. We appreciate your trust in Craft Plus and hope you enjoy your purchase.</p>
        <p>If you have any questions or need assistance, please don't hesitate to contact us.</p>
        <a href="index.php">Back to Home</a>
        <a href="orders.php">View My Orders</a>
    </div>

    <footer>
        &copy; <?php echo date('Y'); ?> Craft Plus. All rights reserved.
    </footer>
</body>
</html>
