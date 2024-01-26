<!-- display_dog_profiles.php -->
<?php
include 'connection.php';

$sql = "SELECT * FROM dogs_for_adoption";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div>';
        echo '<h3>' . $row['dog_id'] . '</h3>';
        echo '<p>Breed: ' . $row['breed_name'] . '</p>';
        echo '<p>Age: ' . $row['age'] . '</p>';
        echo '<p>Location : ' . $row['location'] . '</p>';
        echo '<p>Contact Number: ' . $row['contact_number'] . '</p>';
        echo '<img src="' . $row['dog_image_path'] . '" alt="Dog Image">';
        echo '</div>';
    }
} else {
    echo '<p>No dog profiles available for adoption.</p>';
}
?>
