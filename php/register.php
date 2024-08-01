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

        $stmt1=$conn->prepare("SELECT id FROM registration WHERE e_mail = ?");
        $stmt1->bind_param("s",$email);
        $stmt1->execute();
        $result1=$stmt1->get_result();
        $id = $result1->fetch_assoc()["id"]; 

        $stmt2=$conn->prepare("INSERT INTO personal(id) VALUES(?)");
        $stmt2->bind_param("s",$id);
        $stmt2->execute();

        $stmt3=$conn->prepare("INSERT INTO education_school(id) VALUES(?)");
        $stmt3->bind_param("s",$id);
        $stmt3->execute();

        $stmt4=$conn->prepare("INSERT INTO education_college(id) VALUES(?)");
        $stmt4->bind_param("s",$id);
        $stmt4->execute();

        $stmt5=$conn->prepare("INSERT INTO college_sem_1(id) VALUES(?)");
        $stmt5->bind_param("s",$id);
        $stmt5->execute();

       
        $stmt6=$conn->prepare("INSERT INTO college_sem_2(id) VALUES(?)");
        $stmt6->bind_param("s",$id);
        $stmt6->execute();

        
        $stmt7=$conn->prepare("INSERT INTO college_sem_3(id) VALUES(?)");
        $stmt7->bind_param("s",$id);
        $stmt7->execute();

        
        $stmt8=$conn->prepare("INSERT INTO college_sem_4(id) VALUES(?)");
        $stmt8->bind_param("s",$id);
        $stmt8->execute();

        
        $stmt9=$conn->prepare("INSERT INTO college_sem_5(id) VALUES(?)");
        $stmt9->bind_param("s",$id);
        $stmt9->execute();

        
        $stmt10=$conn->prepare("INSERT INTO college_sem_6(id) VALUES(?)");
        $stmt10->bind_param("s",$id);
        $stmt10->execute();

        
        $stmt11=$conn->prepare("INSERT INTO college_sem_7(id) VALUES(?)");
        $stmt11->bind_param("s",$id);
        $stmt11->execute();

        
        $stmt12=$conn->prepare("INSERT INTO college_sem_8(id) VALUES(?)");
        $stmt12->bind_param("s",$id);
        $stmt12->execute();
        
        $stmt13=$conn->prepare("INSERT INTO education_result(id) VALUES(?)");
        $stmt13->bind_param("s",$id);
        $stmt13->execute();

        $stmt14=$conn->prepare("INSERT INTO cirtificate(id) VALUES(?)");
        $stmt14->bind_param("s",$id);
        $stmt14->execute();
        
        echo json_encode(['success' => true, 'message' => 'Registration successful. Please log in to complete your profile.']);

        $stmt->close();
        $stmt1->close();
        $stmt2->close();
        $stmt3->close(); 
        $stmt4->close();
        $stmt5->close();
        $stmt6->close();
        $stmt7->close();
        $stmt8->close();
        $stmt9->close();
        $stmt10->close();
        $stmt11->close();
        $stmt12->close();
        $stmt13->close();
        $stmt14->close();

    }

    $check_stmt->close();
    $conn->close();
}

