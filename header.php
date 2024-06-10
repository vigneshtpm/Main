<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');
$id = 1;
$stmt = $conn->prepare('SELECT `headerLine1`, `headerLine2`, `headerLine3`, `logoImage1`, `logoImage2` FROM `header` WHERE id = ?');
$stmt->bind_param('i', $id);  // 'i' for integer
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    echo json_encode(['success' => true, 'data' => $row]);
} else {
    echo json_encode(['success' => false, 'error' => 'Data not found']);
}
$stmt->close();
$conn->close();
?>
