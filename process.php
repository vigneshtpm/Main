<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "application";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$dob = $_POST['dob'];
$programme_applied = $_POST['programme-applied'];
$select_programme = $_POST['select-programme'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO form (name, dob, programme_applied, select_programme) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $dob, $programme_applied, $select_programme);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
