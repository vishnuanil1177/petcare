<?php
// Your database connection code
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $uname = $_GET["username"];
    $em = $_GET["email"];
    $pass = $_GET["password"];
    $user_type = $_GET["user_type"];

    // Hash the password before storing it in the database
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Prepare and execute the SQL statement with prepared statements
    $stmt = $connect->prepare("INSERT INTO user_data (username, email, password, user_type) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $uname, $em, $hashed_password, $user_type);
    
    // Execute the prepared statement
    if ($stmt->execute()) {
        $stmt->close();
        
        // Redirect users based on user type
        if ($user_type == "1") {
            header("Location: user.php");
            exit();
        } elseif ($user_type == "2") {
            header("Location: expert-dash.php");
            exit();
        }
    } else {
        // Handle the case where the insertion failed
        echo "Error: " . $stmt->error;
    }
}
?>
