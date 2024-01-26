<!DOCTYPE html>
<html lang="en">
<?php
include 'connection.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            display: flex;
            justify-content: space-between; /* Align items to the start and end of the header */
        }

        nav {
            background-color: #444;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex; /* Use flexbox for the navigation list */
        }

        nav li {
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        /* Added styles for top right corner positioning */
        nav li.logout {
            margin-left: auto; /* Push the logout link to the right */
        }

        main {
            margin: 20px;
        }

        .profile-section {
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
        }

        footer {
            background-color: #444;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
    </style>

    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
               
                <li class="logout"><a href="http://127.0.0.1/Petcare/homepage/index.html">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        $sql = "select * from user_data";
        $result = $connect->query($sql);
        if ($result->num_rows > 0) {
        ?>
            <table border="1">
                <tr>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>';
                    echo $row["username"];
                    echo '</td>';
                    echo '<td>';
                    echo $row["email"];
                    echo '</td>';
                    echo '<td>';
                    echo $row["password"];
                    echo '</td>';
                }
            }
                ?>
            </table>
    </main>

    <footer>
        &copy; Pawsitive 2023
    </footer>
</body>

</html>
 