<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["father-occupation"]) && isset($_POST["father-occupation"]) && isset($_POST["guardian-name"])) {
        $email = $_SESSION['email'];
        $father_occupation= $_POST["father-occupation"];
        $mother_occupation = $_POST["mother-occupation"];
        $guardian_name = $_POST["guardian-name"];

        // Update user data
        $stmt = $conn->prepare("UPDATE personal
        SET mother_occupation = ?, father_occupation = ? , guardian =?
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");
        $stmt->bind_param("ssss", $mother_occupation, $father_occupation,$guardian_name,$email);
        $stmt->execute();

        echo json_encode(['success' => true,'message' => 'Profile updated successfully ']);

        $stmt->close();
        $conn->close();

        
    } else {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
    }
}
?>
