<?php
include 'connection.php';

$sql = "SELECT * FROM rescue_stories";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display rescue story details
        echo '<h2>' . $row['story_title'] . '</h2>';
        echo '<img src="' . $row['story_picture_path'] . '" alt="Story Image" style="max-width: 700px; height: auto;">';
        echo '<p>' . $row['story_content'] . '</p>';
    }
} else {
    echo '<p>No rescue stories available.</p>';
}
?>
