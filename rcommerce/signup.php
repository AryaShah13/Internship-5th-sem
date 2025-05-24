<html>
<head>
    <title>Sign Up</title>
    <script>
        function login() {
            window.location.href = 'login.php';
        }
    </script>
</head>
<body class="b">
    <?php include 'db.php'; ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check if the username or email already exists
        $checkQuery = "SELECT * FROM data WHERE username='$username' OR email='$email'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            echo "<script>alert('Username or email already exists.'); login();</script>";
        } else {
            $insertQuery = "INSERT INTO data (username, email, password) VALUES ('$username', '$email', '$password')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "<script>alert('Sign up successful! You can now log in.'); login();</script>";
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }
    }
    $conn->close();
    ?>
 <div class="container">
        <h1>Sign Up</h1>
        <form action="signup.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn-primary">Sign Up</button>
        </form>
        <div class="form-footer">
            <p>Already have an account? <a href="login.php">Log in here!</a></p>
        </div>
    </div>
    

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