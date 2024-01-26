<?php
// Establish database connection

if (isset($_GET['request_id'])) {
    $requestId = $_GET['request_id'];

    // Update the database to mark the request as responded based on $requestId
    // Perform SQL UPDATE query to update the status of the request
    // Example:
    $sqlUpdate = "UPDATE adoption_form SET status = 'responded' WHERE dog_id = $requestId";

    if ($connect->query($sqlUpdate) === TRUE) {
        // Handle success if needed
        http_response_code(200); // Respond with 200 OK status
    } else {
        // Handle failure if needed
        http_response_code(500); // Respond with 500 Internal Server Error status
    }
} else {
    http_response_code(400); // Respond with 400 Bad Request status if request_id is not provided
}
?>
