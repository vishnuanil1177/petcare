<?php
$localhost = "127.0.0.1";
$username = "root";
$passwd = "";
$dbname = "dogcare";

// Create a single connection
$connect = new mysqli($localhost, $username, $passwd, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Handle breed profile insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if adding breed profile or dog profile for adoption
    if (isset($_POST['breed_name']) && isset($_POST['origin']) && isset($_POST['dog_picture_path'])) {
        $breed_name = $_POST["breed_name"];
        $origin = $_POST["origin"];
        $dog_picture_path = $_POST["dog_picture_path"];

        // Validate and sanitize user input for breed profiles
        $breed_name = mysqli_real_escape_string($connect, $breed_name);
        $origin = mysqli_real_escape_string($connect, $origin);
        $dog_picture_path = mysqli_real_escape_string($connect, $dog_picture_path);
        echo "Breed Profile Added Successfully";

    
    }
    
}