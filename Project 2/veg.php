

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegetable Store</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    height: 100vh; /* Full viewport height */
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    background-color: #f4f4f4; /* Optional: Add a background color */
}
        .veg-container {
    display: flex;
    gap: 20px;
    justify-content: center;
    flex-wrap: wrap;
    
    max-width: 800px; /* Optional: Restrict the maximum width */
    background: #fff; /* Optional: Add a background color */
    padding: 20px; /* Add some padding */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
}
        .veg-container :hover{ transform: scale(1.06);}
        
        .veg-item { border: 1px solid #ccc; padding: 20px; border-radius: 10px; width: 200px; }
        .veg-item img { width: 100%; height: auto; border-radius: 8px; }
        .veg-item button { margin-top: 10px; background: #28a745; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer; }
        .veg-item button:hover { background: #218838;   transform: scale(1.06);}
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <h1>Vegetable Store</h1>
    <h2>Fresh Vegetables for You!</h2>
    <br>
    <div class="veg-container">
        <!-- Cabbage -->
        <div class="veg-item">
            <img src="c.jpeg" alt="Cabbage">
            <p>Cabbage</p>
            <p>Price: 30₹ per kg</p>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" name="product_name" value="Cabbage">
                <input type="hidden" name="product_price" value="30">
                <input type="hidden" name="product_image" value="c.jpeg">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
        <!-- Tomato -->
        <div class="veg-item">
            <img src="to.jpeg" alt="Tomato">
            <p>Tomato</p>
            <p>Price: 35₹ per kg</p>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="2">
                <input type="hidden" name="product_name" value="Tomato">
                <input type="hidden" name="product_price" value="35">
                <input type="hidden" name="product_image" value="to.jpeg">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
        <!-- Add more items similarly -->
        <div class="veg-item">
            <img src="p.jpeg" alt="Pottato">
            <p>Pottato</p>
            <p>Price: 50₹ per kg</p>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" name="product_name" value="Pottato">
                <input type="hidden" name="product_price" value="50">
                <input type="hidden" name="product_image" value="p.jpeg">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
        <div class="veg-item">
            <img src="br.jpeg" alt="Brinjal">
            <p>Brinjal</p>
            <p>Price: 30₹ per kg</p>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" name="product_name" value="Brinjal">
                <input type="hidden" name="product_price" value="30">
                <input type="hidden" name="product_image" value="br.jpeg">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
    
    <div class="veg-item">
            <img src="on.jpeg" alt="Onion">
            <p>Onion</p>
            <p>Price: 30₹ per kg</p>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" name="product_name" value="Onion">
                <input type="hidden" name="product_price" value="30">
                <input type="hidden" name="product_image" value="on.jpeg">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
        <div class="veg-item">
            <img src="gar.jpeg" alt="Garlic">
            <p>Garlic</p>
            <p>Price: 800₹ per kg</p>
            <form method="POST" action="cart.php">
                <input type="hidden" name="product_id" value="1">
                <input type="hidden" name="product_name" value="Garlic">
                <input type="hidden" name="product_price" value="800">
                <input type="hidden" name="product_image" value="gar.jpeg">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
        </div>
        </div>
</body>
</html>
