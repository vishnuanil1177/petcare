<?php
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $user_type = $_POST["user_type"];

    // Validate and sanitize user input (you may need more validation)
    $username = mysqli_real_escape_string($connect, $username);
    $email = mysqli_real_escape_string($connect, $email);
    $password = mysqli_real_escape_string($connect, $password);
    $confirm_password = mysqli_real_escape_string($connect, $confirm_password);
    $user_type = mysqli_real_escape_string($connect, $user_type);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo '<div class="modal">';
        echo '<p>Passwords do not match. Please try again.</p>';
        echo '<p><a href="registration.php">Go back to registration</a></p>';
        echo '</div>';
        exit();
    }

    
    // Insert user data into the database
    $sql = "INSERT INTO user_data (username, email, password, user_type) VALUES ('$username', '$email', '$hashed_password', '$user_type')";
    if ($connect->query($sql) === TRUE) {
        // Registration successful
        echo '<div class="modal">';
        echo '<p>Registration successful!</p>';
        
        // Check the user type for redirection
        if ($user_type == 'rescue_expert') {
            echo '<p>You are a Rescue Expert. Redirecting to expert-dash.html...</p>';
            echo '<meta http-equiv="refresh" content="2;url=expert-dash.html">';
        } else {
            echo '<p><a href="login.php">Login</a></p>';
        }
        
        echo '</div>';
        exit();
    } else {
        echo '<div class="modal">';
        echo '<p>Error: ' . $sql . '<br>' . $connect->error . '</p>';
        echo '<p><a href="registration.php">Go back to registration</a></p>';
        echo '</div>';
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <style>
        /* Your existing styles here */
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
        <form action="registration.php" method="post">
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
                <label for="user_type">User Type</label>
                <select id="user_type" name="user_type">
                    <option value="user">User</option>
                    <option value="rescue_expert">Rescue Expert</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>
    </div>

    <!-- Modal for success message -->

</body>
</html>
