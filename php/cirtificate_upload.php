<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    $response = [];

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $email = $_SESSION['email'];
  
    $fields = [
        'photoFile' => ['prefix' => 'photoFile', 'maxSize' => 30720, 'minSize' => 1, 'dbField' => 'photoFile'], // 30KB max, > 0 min
        'signatureFile' => ['prefix' => 'signatureFile', 'maxSize' => 30720, 'minSize' => 1, 'dbField' => 'signatureFile'], // 30KB max, > 0 min
        'parentSignatureFile' => ['prefix' => 'parentSignatureFile', 'maxSize' => 30720, 'minSize' => 1, 'dbField' => 'parentSignatureFile'], // 400KB max, > 0 min
        'communityCertificateFile' => ['prefix' => 'communityCertificateFile', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'communityCertificateFile'], // 400KB max, > 0 min
        'incomeCertificateFile' => ['prefix' => 'incomeCertificateFile', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'incomeCertificateFile'], // 400KB max, > 0 min
        'aadhaarCardFile' => ['prefix' => 'aadhaarCardFile', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'aadhaarCardFile'], // 400KB max, > 0 min
        '10marksheetFile' => ['prefix' => '10marksheetFile', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => '10marksheetFile'], // 400KB max, > 0 min
        '12marksheetFile' => ['prefix' => '12marksheetFile', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => '12marksheetFile'], // 400KB max, > 0 min
        'ugmarksheetFile' => ['prefix' => 'ugmarksheetFile', 'maxSize' => 1048576, 'minSize' => 1, 'dbField' => 'ugmarksheetFile'], // 400KB max, > 0 min
        'exServicemenFile' => ['prefix' => 'exServicemenFile', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'exServicemenFile'], // 400KB max, > 0 min
        'differentlyAbledFile' => ['prefix' => 'differentlyAbledFile', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'differentlyAbledFile'], // 400KB max, > 0 min
        'sportsQuotaFile' => ['prefix' => 'sportsQuotaFile', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'sportsQuotaFile'], // 400KB max, > 0 min
        'othersFile' => ['prefix' => 'othersFile', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'othersFile'], // 400KB max, > 0 min
    ];

    foreach ($fields as $fieldName => $fileInfo) {
        if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES[$fieldName]['tmp_name'];
            $fileName = $_FILES[$fieldName]['name'];
            $fileSize = $_FILES[$fieldName]['size'];
            $fileType = $_FILES[$fieldName]['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = $fileInfo['prefix'] . '_' . time() . '.' . $fileExtension;
            $dest_path = $uploadDir . $newFileName;

            if ($fileSize > $fileInfo['maxSize']) {
                $response[$fieldName] = 'is too large. Max file size is ' . ($fileInfo['maxSize'] / 1024) . 'KB.';
            } elseif ($fileSize < $fileInfo['minSize']) {
                $response[$fieldName] = 'is too small. Min file size should be greater than 0 KB.';
            } else {
               
                // Check if the file already exists in the database
                $dbField = $fileInfo['dbField'];
                
                $sql = "SELECT $dbField FROM cirtificate WHERE id = (SELECT id FROM registration WHERE e_mail = ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                
                if ($row[$dbField]) {
                
                    $response[$fieldName] = $row[$dbField];
                    unlink($row[$dbField]);
                    move_uploaded_file($fileTmpPath, $dest_path);
                    $sql = "UPDATE cirtificate SET $dbField = ? WHERE id = (SELECT id FROM registration WHERE e_mail = ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ss', $dest_path, $email);
                    if ($stmt->execute()) {
                        $response[$fieldName] = 'uploaded successfully and database updated';
                    } else {
                        $response[$fieldName] = 'uploaded successfully but database update failed';
                    }
                } elseif (move_uploaded_file($fileTmpPath, $dest_path)) {
                    // Update the database with the file path
                    $sql = "UPDATE cirtificate SET $dbField = ? WHERE id = (SELECT id FROM registration WHERE e_mail = ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ss', $dest_path, $email);
                    if ($stmt->execute()) {
                        $response[$fieldName] = 'uploaded successfully and database updated';
                    } else {
                        $response[$fieldName] = 'uploaded successfully but database update failed';
                    }
                } else {
                    $response[$fieldName] = 'There was an error uploading ' . $fileName;
                }
            }
        } elseif (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'] !== UPLOAD_ERR_NO_FILE) {
            $response[$fieldName] = 'There was an error uploading ' . $fileName;
        }
    }

    echo json_encode($response);
} else {
    echo json_encode(['error' => 'No files uploaded.']);
}


