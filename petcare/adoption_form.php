<!DOCTYPE html>
<html>
<head>
    <title>Adoption Form</title>
</head>
<body>
<style>
        body {
            background-color: rgb(93, 121, 182); /* Background color for pet care theme */
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .form-group {
            margin: 20px 0;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #009688; /* Green submit button color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #007567; /* Darker green on hover */
        }
    </style> 
    <h2>Adoption Form</h2>
    <form action="process_adoption.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="dog_id">Dog ID:</label>
        <input type="text" id="dog_id" name="dog_id" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
