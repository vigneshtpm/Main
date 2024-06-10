<?php

session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'uploads/';
    $response = [];

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $email = "mothish2@gmail.com";
    $fields = [
        'photoFile' => ['prefix' => 'photo', 'maxSize' => 30720, 'minSize' => 1, 'dbField' => 'photo'], // 30KB max, > 0 min
        'signatureFile' => ['prefix' => 'signature', 'maxSize' => 30720, 'minSize' => 1, 'dbField' => 'sign'], // 30KB max, > 0 min
        'parentSignatureFile' => ['prefix' => 'parent_signature', 'maxSize' => 30720, 'minSize' => 1, 'dbField' => 'parentsign'], // 400KB max, > 0 min
        'communityCertificateFile' => ['prefix' => 'community_certificate', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'community'], // 400KB max, > 0 min
        'incomeCertificateFile' => ['prefix' => 'income_certificate', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'income'], // 400KB max, > 0 min
        'aadhaarCardFile' => ['prefix' => 'aadhaar_card', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'aadhaar'], // 400KB max, > 0 min
        '10marksheetFile' => ['prefix' => '10mark', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => '10mark'], // 400KB max, > 0 min
        '12marksheetFile' => ['prefix' => '12mark', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => '12mark'], // 400KB max, > 0 min
        'ugmarksheetFile' => ['prefix' => 'ugmark', 'maxSize' => 1048576, 'minSize' => 1, 'dbField' => 'ugmark'], // 400KB max, > 0 min
        'exServicemenFile' => ['prefix' => 'ex_servicemen', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'exservice'], // 400KB max, > 0 min
        'differentlyAbledFile' => ['prefix' => 'differently_abled', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'differently'], // 400KB max, > 0 min
        'sportsQuotaFile' => ['prefix' => 'sports_quota', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'sports'], // 400KB max, > 0 min
        'othersFile' => ['prefix' => 'others', 'maxSize' => 409600, 'minSize' => 1, 'dbField' => 'others'], // 400KB max, > 0 min
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
                $sql = "SELECT $dbField FROM upload WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                
                if ($row[$dbField]) {
                
                    $response[$fieldName] = $row[$dbField];
                    unlink($row[$dbField]);
                    move_uploaded_file($fileTmpPath, $dest_path);
                    $sql = "UPDATE upload SET $dbField = ? WHERE email = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('ss', $dest_path, $email);
                    if ($stmt->execute()) {
                        $response[$fieldName] = 'uploaded successfully and database updated';
                    } else {
                        $response[$fieldName] = 'uploaded successfully but database update failed';
                    }
                } elseif (move_uploaded_file($fileTmpPath, $dest_path)) {
                    // Update the database with the file path
                    $sql = "UPDATE upload SET $dbField = ? WHERE email = ?";
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


