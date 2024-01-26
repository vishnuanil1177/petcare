


<!DOCTYPE html>
<html>
<head>
    <title>Adoption Form</title>
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
            border-radius: 10px;
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

        input[type="number"], /* Changed type to number */
        input[type="text"],
        input[type="submit"] {
            width: 100%; /* Set the width to 100% */
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="number"]:focus,
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
    <h2>Dog Profiles for Adoption</h2>
    <form action="add_dog_profile.php" method="post">
        <label for="dog_id">Dog ID:</label>
        <input type="number" name="dog_id" required> <!-- Changed input type to number -->
        <label for="breed_name">Breed Name:</label>
        <input type="text" name="breed_name" required>
        <label for="Age">Age:</label>
    <input type="text" name="age" required>

    <label for="location">Location:</label>
    <input type="text" name="location" required>

    <label for="contact_number">Contact Number:</label>
    <input type="text" name="contact_number" required>

    <label for="dog_image_path">Dog Image Path:</label>
    <input type="text" name="dog_image_path" placeholder="Enter the path" required>
        <input type="submit" value="Add Dog Profile">
    </form>
</div>
</body>
</html>
