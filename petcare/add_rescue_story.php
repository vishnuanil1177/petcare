<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST['story_title']) &&
        isset($_POST['story_picture_path']) &&
        isset($_POST['story_id']) &&
        isset($_POST['story_content'])
    ) {
        $story_title = $_POST['story_title'];
        $story_id = $_POST['story_id'];
        $story_picture_path = $_POST['story_picture_path']; // Assuming this is the image path
        $story_content = $_POST['story_content'];

        // Insert story details into the database
        $sql = "INSERT INTO rescue_stories (story_title, story_id, story_picture_path, story_content) VALUES (?, ?, ?, ?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssss", $story_title, $story_id, $story_picture_path, $story_content);

        if ($stmt->execute()) {
            echo "Rescue Story Added Successfully";
        } else {
            echo "Error: " . $connect->error;
        }
    }
}
?>
 <a href="expert-dash.php" class="go-back">Go Back</a>