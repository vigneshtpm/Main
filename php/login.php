<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['passwd'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT * FROM registration WHERE e_mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $db_password = $user['app_password']; // Retrieve password from database

        // Directly compare passwords
        if ($password === $db_password) { // Assuming plain text comparison
            $_SESSION['email'] = $email;
            
            $current_stage = $user['current_stage']; 
            echo json_encode(['success' => true, 'message' => 'Login successful', 'stage' => $current_stage]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid password']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Email not found']);
    }

    $stmt->close();
    $conn->close();
}
?>
