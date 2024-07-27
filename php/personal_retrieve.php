<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

   // Prepare the SQL statement to fetch user data
    $stmt = $conn->prepare("
    SELECT 
        personal.father_name, 
        personal.mother_name, 
        personal.dob, 
        personal.gender, 
        personal.guardian, 
        personal.mother_occupation, 
        personal.father_occupation,
        personal.mother_tongue,
        personal.nationality,
        personal.religion,
        personal.community,
        personal.aadhar,
        personal.abc,
        personal.telephone,
        personal.communication_address_1,
        personal.communication_address_2,
        personal.communication_address_3,
        personal.Communication_country,
        personal.Communication_state,
        personal.communication_district,
        personal.communication_pincode,
        personal.permanent_address_1,
        personal.permanent_address_2,
        personal.permanent_address_3,
        personal.permanent_country,
        personal.permanent_state,
        personal.permanent_district,
        personal.permanent_pincode,
        personal.ex_servicemen,
        personal.differently_abled,
        personal.percentage_disability,
        personal.sportsquota,
        personal.others
    FROM registration
    JOIN personal ON registration.id = personal.id
    WHERE registration.e_mail = ?
    ");

    // Bind email parameter
    $stmt->bind_param("s", $email);

    // Execute the statement
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
