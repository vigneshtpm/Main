<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$username = 'root';
$password = '';
$database = "dept";

$mysqli = new mysqli("localhost", $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT * FROM course";

$courses = array();
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = array(
            "department" => $row["department"],
            "course" => $row["course"]
        );
    }
    $result->free();
}

$mysqli->close();

header('Content-Type: application/json');
echo json_encode(array("courses" => $courses));
?>
