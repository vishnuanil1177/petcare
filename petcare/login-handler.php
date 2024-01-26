<?php
session_start();
include 'connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize input
    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);

    // Check user credentials
    $query = "SELECT * FROM user_data WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        // Valid credentials, set session variable and redirect to user.php
        $_SESSION['username'] = $username;
        header("Location: user.php");
        exit();
    } else {
        // Invalid credentials, redirect back to login page with an error message
        header("Location: login.html?error=1");
        exit();
    }
}
?>
