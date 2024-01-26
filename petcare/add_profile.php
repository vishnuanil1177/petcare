<!DOCTYPE html>
<html>
<head>
    <title>Breed Profiles Form</title>
    <style>
        /* CSS styles */
        .section form {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="text"]:focus,
        input[type="submit"]:focus {
            outline: none;
            border-color: #61b15a;
        }

        input[type="submit"] {
            background-color: #61b15a;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4a934d;
        }
    </style>
</head>
<body>
    <div class="section">
        <h2>Breed Profiles</h2>
        <form action="add_breed_profile.php" method="post">
            <label for="breed_name">Breed Name:</label>
            <input type="text" name="breed_name" required>
        
            <label for="origin">Origin:</label>
            <input type="text" name="origin" required>
            <label for="description">Description:</label>
            <input type="text" name="description" required>
            <label for="dog_picture_path">Dog Picture :</label>
            <input type="text" name="dog_picture_path" placeholder="Enter the path" required>

            <input type="submit" value="Add Breed Profile">
        </form>
    </div>
</body>
</html>
