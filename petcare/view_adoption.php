<?php
// Establishing a database connection
$localhost = "127.0.0.1";
$username = "root";
$passwd = "";
$dbname = "dogcare";

// Create connection
$connect = new mysqli($localhost, $username, $passwd, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Fetch adoption requests from the database
$sql = "SELECT * FROM adoption_form";
$result = $connect->query($sql);
?>

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

        .adoption-request {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .responded-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="section">
        <h2>Adoption Requests</h2>
        <li><a href="homepage/index.html">Go to Home</a></li>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='adoption-request'>";
                echo "<strong>User:</strong> " . $row["username"] . "<br>";
                echo "<strong>Email:</strong> " . $row["email"] . "<br>";
                echo "<strong>Dog ID:</strong> " . $row["dog_id"] . "<br>";
                echo "<button class='responded-btn' data-request-id='" . $row["dog_id"] . "'>Mark as Responded</button>";
                echo "</div><hr>";
            }
        } else {
            echo "No adoption requests found.";
        }
  
    ?>
</div>

<script>
   const respondedBtns = document.querySelectorAll('.responded-btn');

respondedBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        const requestId = e.target.getAttribute('data-request-id');
        
        // Send an AJAX request to delete the request
        fetch('process_adoption_actions.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'request_id=' + requestId,
        })
        .then(response => {
            if (response.ok) {
                e.target.parentNode.remove(); // Removes the request box from the dashboard
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

</script>
</body>
</html>