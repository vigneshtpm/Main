<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["dob"]) && isset($_POST["father-name"]) && isset($_POST["mother-name"])) {
        $email = $_SESSION['email'];
        $dob = $_POST["dob"];
        $father_name = $_POST["father-name"];
        $mother_name = $_POST["mother-name"];

        // Update user data
        $stmt = $conn->prepare("UPDATE registration SET  dof = ?, father_name= ?, mother_name = ? WHERE e_mail = ?");
        $stmt->bind_param("ssss", $dob, $father_name, $mother_name, $email);
        $stmt->execute();

        echo json_encode(['success' => true,'message' => 'Profile updated successfully "' . $dob . '"']);

        $stmt->close();
        $conn->close();

        // Clear session data
        session_unset();
        session_destroy();
    } else {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
    }
}
?>
