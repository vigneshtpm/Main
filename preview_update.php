<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["applicant_name"]) && isset($_POST["dob"]) && isset($_POST["mother-name"]) && isset($_POST["father-name"])) {
        $email = $_SESSION['email'];
        $applicant_name=$_POST["applicant_name"];
        $dob = $_POST["dob"];
        $father_name = $_POST["father-name"];
        $mother_name = $_POST["mother-name"];

        // Update user data
        $stmt = $conn->prepare("UPDATE registration SET  applicant_name=?,  dof = ?, father_name= ?, mother_name = ? WHERE e_mail = ?");
        $stmt->bind_param("sssss", $applicant_name, $dob, $father_name, $mother_name, $email);
        $stmt->execute();

        echo json_encode(['success' => true,'message' => 'Edit updated successfully ']);

        $stmt->close();
        $conn->close();

    } else {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
    }
}
?>
