<?php
session_start();

if (!isset($_SESSION['username'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7; /* Your preferred background color */
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        h2 {
            color: #444;
        }

        p {
            color: #666;
            margin-bottom: 10px;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        ul li {
            margin-bottom: 5px;
            border: 1px solid #ccc; /* Border around each option */
            border-radius: 5px; /* Rounded corners */
            padding: 8px; /* Padding inside the box */
        }

        a {
            text-decoration: none;
            color: #009688;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Added styles for the logout link */
        .logout {
            position: absolute;
            top: 10px;
            right: 20px;
            text-decoration: none;
            color: #009688;
        }
    </style>
</head>
<body>
    <a class="logout" href="login.html">Logout</a>

    <div class="container">
        <h1>Welcome to Your Dashboard, <?php echo $_SESSION['username']; ?></h1>
      
        <?php
        include 'connection.php';

        $username = $_SESSION['username'];
        // Fetch user data based on the logged-in user's username
        $query = "SELECT username, email FROM user_data WHERE username='$username'";
        $result = mysqli_query($connect, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            echo "<p>Username: " . $row['username'] . "</p>";
            echo "<p>Email: " . $row['email'] . "</p>";
        } else {
            echo "Error fetching data: " . mysqli_error($connect);
        }
        ?>
        <h2>Options</h2>
        <ul>
            <li><a href="dog_profiles.php">Adoption</a></li>
            <li><a href="homepage/index.html">Go to Home</a></li>
        </ul>
    </div>
</body>
</html>
