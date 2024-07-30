<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Retrieve user data
    $stmt = $conn->prepare(" SELECT 
    registration.*, 
    personal.*,
    education_school.*, 
    education_college.*,
    college_sem_1.*,
    college_sem_2.*,
    college_sem_3.*,
    college_sem_4.*,
    college_sem_5.*,
    college_sem_6.*,
    college_sem_7.*,
    college_sem_8.*
   
FROM 
    registration
JOIN 
    personal ON registration.id = personal.id
JOIN 
    education_school ON registration.id = education_school.id
JOIN
    education_college ON registration.id = education_college.id
JOIN
    college_sem_1 ON registration.id = college_sem_1.id
JOIN
    college_sem_2 ON registration.id = college_sem_2.id
JOIN
    college_sem_3 ON registration.id = college_sem_3.id
JOIN
    college_sem_4 ON registration.id = college_sem_4.id
JOIN
    college_sem_5 ON registration.id = college_sem_5.id
JOIN
    college_sem_6 ON registration.id = college_sem_6.id
JOIN
    college_sem_7 ON registration.id = college_sem_7.id
JOIN
    college_sem_8 ON registration.id = college_sem_8.id


WHERE 
    registration.e_mail = ?; 
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
