<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gallery</title>
    <style>
        /* CSS styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #444;
        }

        .breed-gallery {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .breed-section {
            background-color: #f1f1f1;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .breed-section:hover {
            transform: scale(1.05);
        }

        .breed-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
            font-family: 'Georgia', serif;
            color: #333;
        }

        .breed-info {
            margin-bottom: 15px;
        }

        .breed-info p {
            margin: 5px 0;
            color: #666;
        }

        .desc-info {
            font-size: 10px;
            margin-bottom: 10px;
            font-family: 'Georgia';
            color: #333;
        }
    
        .breed-images img {
            max-width: 100%;
            max-height: 200px; /* Set a maximum height for the images */
            border-radius: 8px;
            border: 2px solid #ddd; /* Border around images */
            transition: transform 0.3s ease-in-out;
        }

        .breed-images img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="breed-gallery">
        <?php
        include 'connection.php';
        
        // Retrieve dog profiles from the database
        $sql = "SELECT * FROM breed_profiles";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            // Output each dog profile
            while ($row = $result->fetch_assoc()) {
                $breedName = $row["breed_name"];
                $origin = $row["origin"];
                $desc = $row["description"];
                $dog_picture_path = $row["dog_picture_path"];

                // Display dog profile with image
                echo '<div class="breed-section">';
                echo '<h2 class="breed-title">' . $breedName . '</h2>';
                echo '<div class="breed-info">';
                echo '<p><strong>Origin:</strong> ' . $origin . '</p>';
                echo '</div>';
                echo '<div class="desc-info">';
                echo '<h2 class="description">' . $desc . '</h2>';
                echo '<div class="breed-images"><img src="' . $dog_picture_path . '" alt="' . $breedName . '"></div>';
                echo '</div>';
            }
        } else {
            echo '<p>No dog profiles found.</p>';
        }
        ?>
    </div>
</body>
</html>
