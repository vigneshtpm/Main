<?php
include 'db.php';

$applicant_name = $_POST['applicant_name'];
$father_name = $_POST['father_name'];
$father_occupation = $_POST['father_occupation'];
$dob = $_POST['dob'];
$mother_name = $_POST['mother_name'];
$guardian_name = $_POST['guardian_name'];

$sql = "UPDATE applicants SET applicant_name='$applicant_name', father_name='$father_name', father_occupation='$father_occupation', dob='$dob', mother_name='$mother_name', guardian_name='$guardian_name' WHERE id=1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
