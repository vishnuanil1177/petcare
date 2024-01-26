<?php
include 'connection.php';

$sql = "SELECT * FROM dogs_for_adoption";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display dog adoption profile details
        echo '<h2>' . $row['breed_name'] . '</h2>';
        echo '<p>Dog ID: ' . $row['dog_id'] . '</p>'; // Display the Dog ID
        echo '<p>Age: ' . $row['age'] . '</p>';
        echo '<p>Location: ' . $row['location'] . '</p>';
        echo '<p>Contact Number: ' . $row['contact_number'] . '</p>';
        echo '<img src="' . $row['dog_image_path'] . '" alt="Dog Image">';
        // Include an "Adopt" button for each profile
       
        echo '<a href="adoption_form.php">Adopt</a>';
    }
} else {
    echo '<p>No dog adoption profiles available.</p>';
}
?>
