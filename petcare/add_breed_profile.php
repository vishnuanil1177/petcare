<!DOCTYPE html>
<html>
<head>
    <title>Message Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .message-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .go-back {
            display: block;
            text-align: right;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php
        include 'connection.php';

        $message = ''; // Initializing the message variable

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $breed_name = mysqli_real_escape_string($connect, $_POST["breed_name"]);
            $origin = mysqli_real_escape_string($connect, $_POST["origin"]);
            $desc = mysqli_real_escape_string($connect, $_POST["description"]);
            $dog_picture_path = mysqli_real_escape_string($connect, $_POST["dog_picture_path"]);

            $sql = "INSERT INTO breed_profiles (breed_name, origin, description, dog_picture_path) VALUES ('$breed_name', '$origin','$desc', '$dog_picture_path')";

            if ($connect->query($sql) === TRUE) {
                $message = '<p class="message success">Breed profile added successfully!</p>';
                // Redirect to expert-dash.php after a delay (3 seconds)
                header("refresh:3;url=expert-dash.php");
                exit(); // Ensure no further code execution after redirection
            } else {
                $message = '<p class="message error">Error: ' . $sql . '<br>' . $connect->error . '</p>';
            }
        }

        echo $message;
        ?>
        <a href="expert-dash.php" class="go-back">Go Back</a>
    </div>
</body>
</html>
