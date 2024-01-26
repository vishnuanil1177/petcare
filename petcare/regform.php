<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        body {
            background-color: #f7e0c3;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin: 20px 0;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #009688;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #007567;
        }

        a {
            color: #009688;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php
    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST["username"];
        $em = $_POST["email"];
        $pass = $_POST["password"];
        $cpass = $_POST["confirm_password"];

        // Validate and sanitize user input
        $uname = mysqli_real_escape_string($connect, $uname);
        $em = mysqli_real_escape_string($connect, $em);
        $pass = mysqli_real_escape_string($connect, $pass);
        $cpass = mysqli_real_escape_string($connect, $cpass);

        // Check if passwords match
        if ($pass !== $cpass) {
            echo '<div class="container">';
            echo '<h1>Registration</h1>';
            echo '<p>Passwords do not match. Please try again.</p>';
            echo '<p><a href="regform.php">Go back to registration</a></p>';
            echo '</div>';
            exit();
        }

        // Insert user data into the database
      
        $sql = "INSERT INTO user_data (username, email, password) VALUES ('$uname', '$em', '$pass')";
        if ($connect->query($sql) === TRUE) {
            echo '<div class="container">';
            echo '<h1>Registration</h1>';
            echo '<p>Registration successful!</p>';
            echo '<p>You are registered. Redirecting to login page...</p>';
            echo '<meta http-equiv="refresh" content="2;url=user.php">';
            echo '</div>';
            exit();
        } else {
            echo '<div class="container">';
            echo '<h1>Registration</h1>';
            echo '<p>Error: ' . $sql . '<br>' . $connect->error . '</p>';
            echo '<p><a href="regform.php">Go back to registration</a></p>';
            echo '</div>';
            exit();
        }
    }
    ?>

    <div class="container">
        <h1>Registration</h1>
        <form action="regform.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>
        <p>Already an user? <a href="login.html">Sign in now</a></p>
    </div>
</body>
</html>
