<?php
$localhost = "127.0.0.1";
$username = "root";
$passwd = "";
$dbname = "dogcare";

$connect = new mysqli($localhost, $username, $passwd, $dbname);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['request_id'])) {
    $request_id = $_POST['request_id'];

    // Prepare a DELETE statement
    $sql = "DELETE FROM adoption_form WHERE dog_id = $request_id";

    if ($connect->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $connect->error;
    }
}
?>
