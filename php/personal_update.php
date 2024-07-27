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
        $dob=$_POST["dob"];
        $mother_name=$_POST["mother-name"];
        $father_name=$_POST["father-name"];
        $gender=$_POST["gender"];
        $mother_tongue = $_POST["mother-tongue"];
        $nationality = $_POST["nationality"];
        $religion = $_POST["religion"];
        $community = $_POST["community"];
        $aadhar = $_POST["aadhar"];
        $abc = $_POST["abc"];
        $telephone = $_POST["telephone"];
        $communication_address_1 = $_POST["communication-address-1"];
        $communication_address_2 = $_POST["communication-address-2"];
        $communication_address_3 = $_POST["communication-address-3"];
        $Communication_country = $_POST["Communication-country"];
        $Communication_state = $_POST["Communication-state"];
        $communication_district = $_POST["communication-district"];
        $communication_pincode = $_POST["communication-pincode"];
        $permanent_address_1 = $_POST["permanent-address-1"];
        $permanent_address_2 = $_POST["permanent-address-2"];
        $permanent_address_3 = $_POST["permanent-address-3"];
        $permanent_country = $_POST["permanent-country"];
        $permanent_state = $_POST["permanent-state"];
        $permanent_district = $_POST["permanent-district"];
        $permanent_pincode = $_POST["permanent-pincode"];
        $ex_servicemen = $_POST["ex_servicemen"];
        $differently_abled = $_POST["differently-abled"];
        $percentage_disability = $_POST["percentage-disability"];
        $sportsquota = $_POST["sportsquota"];
        $others = $_POST["others"];

        // Update user data
        $stmt = $conn->prepare("UPDATE personal
        SET mother_occupation = ?, father_occupation = ? , guardian =?, dob =?, father_name= ?, mother_name=?, gender=?,mother_tongue = ?,nationality = ?, religion = ?, community = ?, aadhar = ?, abc = ?, telephone = ?,communication_address_1 = ?, communication_address_2 = ?, communication_address_3 = ?, Communication_country = ?, Communication_state = ?,communication_district = ?,communication_pincode = ?,permanent_address_1 = ?, permanent_address_2 = ?, permanent_address_3 = ?,
        permanent_country = ?,permanent_state = ?, permanent_district = ?, permanent_pincode = ?, ex_servicemen = ?, differently_abled = ?,percentage_disability = ?, sportsquota = ?, others = ?
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");
        $stmt->bind_param("ssssssssssssssssssssssssssssssssss", $mother_occupation, $father_occupation,$guardian_name,$dob,$father_name,$mother_name,$gender, $mother_tongue,$nationality, $religion, $community, $aadhar, $abc, $telephone, $communication_address_1, $communication_address_2, $communication_address_3, $Communication_country,$Communication_state, $communication_district,$communication_pincode,$permanent_address_1,$permanent_address_2, $permanent_address_3,
        $permanent_country,$permanent_state, $permanent_district, $permanent_pincode,$ex_servicemen, $differently_abled,$percentage_disability, $sportsquota, $others,$email);
        $stmt->execute();

        echo json_encode(['success' => true,'message' => 'Profile updated successfully ']);

        $stmt->close();
        $conn->close();

        
    } else {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
    }
}
?>
