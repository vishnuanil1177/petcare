<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue Expert Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4; /* Adjust background color as needed */
}

.dashboard-container {
    width: 80%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    text-align: center;
}

.section {
    margin-bottom: 20px;
}

h2 {
    color: #555;
    margin-bottom: 10px;
}

a {
    display: block;
    padding: 10px 20px;
    background-color: #61b15a; /* Change button color */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #4a934d; /* Change button color on hover */
}

    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, Rescue Expert!</h1>

        <!-- Breed Profiles -->
        <div class="section">
            <h2>Breed Profiles</h2>
            <a href="add_profile.php">Add Breed Profile</a>
        </div>
        
        <!-- Rescue Stories -->
        <div class="section">
            <h2>Rescue Stories</h2>
            <a href="add_story.php">Add Rescue Story</a>
        </div>
        
        <!-- Dog Profiles for Adoption -->
        <div class="section">
            <h2>Dog Profiles for Adoption</h2>
            <a href="dog_adoption.php">Add Dog Profile</a>
        </div>
        
        <!-- Adoption Requests -->
        <div class="section">
            <h2>Adoption Requests</h2>
            <a href="view_adoption.php">View Adoption Requests</a>
        </div>
    </div>

    <script>
       let requests = [
    { id: 1, responded: false },
    { id: 2, responded: true },
    { id: 3, responded: false }
];

function markResponded(requestId) {
    let request = requests.find(req => req.id === requestId);
    if (request) {
        request.responded = true;
        console.log(`Request ${requestId} marked as responded.`);
        // You can perform further actions here based on the marking.
    } else {
        console.log(`Request ${requestId} not found.`);
    }
}

function displayRequests() {
    // Filter out the responded requests
    let pendingRequests = requests.filter(req => !req.responded);
    
    // Display pending requests
    console.log("Pending Requests:");
    pendingRequests.forEach(req => {
        console.log(`Request ID: ${req.id}, Responded: ${req.responded}`);
    });
}

// Mark request 2 as responded
markResponded(2);

// Display pending requests after marking
displayRequests();

    </script>
</body>
</html>
