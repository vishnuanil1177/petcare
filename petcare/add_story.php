<!DOCTYPE html>
<html>
<head>
    <title>Breed Profiles Form</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .section {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #61b15a;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="submit"],
        textarea {
            width: calc(100% - 22px); /* Adjust width for borders and padding */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        input[type="text"]:focus,
        input[type="submit"]:focus,
        textarea:focus {
            outline: none;
            border-color: #61b15a;
        }

        input[type="submit"] {
            background-color: #61b15a;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #4a934d;
        }
    </style>
</head>
<body>
    <div class="section">
        <h2>Rescue Stories</h2>
        <form action="add_rescue_story.php" method="post" enctype="multipart/form-data">
            <label for="story_title">Story Title:</label>
            <input type="text" name="story_title" required>

            <label for="story_picture_path">Story Picture Path:</label>
            <input type="text" name="story_picture_path" required>

            <label for="story_id">Story ID:</label>
            <input type="number" name="story_id" required>

            <label for="story_content">Story Content:</label>
            <textarea name="story_content" placeholder="Write your rescue story..." required></textarea>

            <input type="submit" value="Upload Rescue Story">
        </form>
    </div>
</body>
</html>
