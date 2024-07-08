<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['applicant-name'];
    $email = $_POST['email-id'];
    $mobile = $_POST['mobile-no'];
    $password = $_POST['confirmPassword'];

    // Check if email already exists
    $check_stmt = $conn->prepare("SELECT * FROM registration WHERE e_mail = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Email already exists']);
    } else {
        // Insert into registration table
        $stmt = $conn->prepare("INSERT INTO registration (applicant_name, e_mail, mobile, app_password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $mobile, $password);
        $stmt->execute();

        echo json_encode(['success' => true, 'message' => 'Registration successful. Please log in to complete your profile.']);

        $stmt->close();
    }

    $check_stmt->close();
    $conn->close();
}

