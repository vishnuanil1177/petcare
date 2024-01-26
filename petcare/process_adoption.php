<!DOCTYPE html>
<html>
<head>
    <title>Adoption Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>
<body>
<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dog_id = $_POST['dog_id'];

    $insertQuery = "INSERT INTO adoption_form (username, email, dog_id) VALUES ('$username', '$email', '$dog_id')";

    if ($connect->query($insertQuery) === TRUE) {
        echo '<div class="message success">';
        echo "Your adoption request has been submitted for approval. You will be notified about the status via email.";
        echo '</div>';
        // Include code to send an email notification to the user about their submission
        
        echo '<a href="user.php">Go Back</a>';
    } else {
        echo '<div class="message error">';
        echo "Error: " . $insertQuery . "<br>" . $connect->error;
        echo '</div>';
        echo '<a href="user.php">Go Back</a>';
    }

    $connect->close();
} else {
    echo '<div class="message error">';
    echo "Form submission error!";
    echo '</div>';
    echo '<a href="user.php">Go Back</a>';
}
?>
</body>
</html>
