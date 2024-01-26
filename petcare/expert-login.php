<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expert Login</title>
</head>
<body>
    <style>
        body {
            background-color:rgb(106, 138, 205); /* Background color for pet care theme */
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #009688; /* Green submit button color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #007567; /* Darker green on hover */
        }
    </style>
        <div class="container">
    <h2>Expert Login</h2>
    <form action="expert-login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" name="submit" value="Login">
    </form>
    <?php
    include('connection.php'); // Assuming connection.php contains the database connection

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Use prepared statements to prevent SQL injection
        $stmt = $connect->prepare("SELECT * FROM expert_signup WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0){
            session_start();
            $_SESSION['usname'] = $username;
            echo "<script>window.location.href='expert-dash.php';</script>";
            exit();
        } else {
            echo "<script> alert('Invalid credentials, please try again')</script>";
        }
    }
    ?>
</body>
</html>
