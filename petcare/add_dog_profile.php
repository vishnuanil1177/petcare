<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $breed_name = $_POST["breed_name"];
    $age = $_POST["age"];
    $location = $_POST["location"];
    $contact_number = $_POST["contact_number"];
    $dog_image_path = $_POST["dog_image_path"];

    // Validate and sanitize user input
    // ...

    // Insert dog profile data into the database
    $sql = "INSERT INTO dogs_for_adoption (breed_name, age, location, contact_number, dog_image_path) VALUES ('$breed_name','$age', '$location', '$contact_number', '$dog_image_path')";

    if ($connect->query($sql) === TRUE) {
        echo '<p>Dog profile added successfully!</p>';
    } else {
        echo '<p>Error: ' . $sql . '<br>' . $connect->error . '</p>';
    }
}
?>
 <a href="expert-dash.php" class="go-back">Go Back</a>
