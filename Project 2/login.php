<?php
session_start(); 
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $query = "SELECT * FROM data WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['data_id'] = $row['id']; 
            echo "<script>alert('Login successful!'); window.location.href='index.php';</script>"; // Redirect to main page
        } else {
            echo "<script>alert('Incorrect password.');</script>";
        }
    } else {
        echo "<script>alert('No user found with that email.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url(bg.png);
            background-size: cover;
            background-position: center;
            color: white;
        }

        .container {
            margin: 5% auto;
            background: #1e1e2f;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.6);
            width: 350px;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            text-align: left;
            color: #cccccc;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #444;
            border-radius: 5px;
            background: #2c2c3e;
            color: #ffffff;
        }

        .form-group input::placeholder {
            color: #888;
        }

        .form-group input:focus {
            outline: none;
            border-color: #888;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background: #4CAF50;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-primary:hover {
            background: #3e8e41;
        }

        .form-footer {
            margin-top: 20px;
            font-size: 14px;
        }

        .form-footer a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }

        .form-footer a:hover {
            color: #3e8e41;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn-primary">Log In</button>
        </form>
        <div class="form-footer">
            <p style="padding-left: 20px;">Don't have an account? <a href="signup.php" class="c">Sign up here!</a></p>
        </div>
    </div>
</body>
</html>
