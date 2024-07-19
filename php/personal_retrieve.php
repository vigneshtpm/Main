<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Retrieve user data
    $stmt = $conn->prepare("SELECT registration.father_name, registration.mother_name, registration.dof, registration.gender, personal.guardian, personal.mother_occupation, personal.father_occupation
        FROM registration
        JOIN personal ON registration.id = personal.id
        WHERE registration.e_mail = ?;
");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
}
?>
