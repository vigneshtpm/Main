<?php
// Start output buffering
ob_start();
session_start();
/*
// Database connection
$conn = new mysqli("localhost", "root", "", "student");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
*/
// Include the FPDF library
require('fpdf186/fpdf.php');
include 'connection.php';

header('Content-Type: application/json');
class PDF extends FPDF
{
    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        
        // Select Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        
        // Print current and total page numbers
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'L');
        
        // Print current time
        $this->SetY(-15); // Reset Y position
        $this->SetX(-50); // Adjust the X position to place the time
        $this->Cell(0, 10, date('Y-m-d H:i:s'), 0, 0, 'R');
    }
}

// Create PDF instance
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 16);

/*
$pdf->Image('assets\images\download 2.jpg', 10, 10, 30, 25, 'jpg');

// Header 
$pdf->SetTextColor(0,0,100);
$pdf->Cell(180, 10, 'PERIYAR UNIVERSITY', 0, 1, 'C');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(180,4,'Salem-636 011, Tamil Nadu, India',0,1,'C' ) ;
$pdf->Cell(180,4,"NAAC with 'A++' Grade - State University NIRF Rank 59",0,1,"C") ;
$pdf->Cell(180,4,"NIRF Innovation Band of 11-50",0,1,"C") ;
$pdf->ln(4);


// Add another image
$pdf->Image('assets\images\periyar.jpg', 175, 9, 25, 25, 'jpg');
*/
$id = 1;
$stmt = $conn->prepare('SELECT  `headerLine3`, `headerLine4`, `logoImage1`, `logoImage2` FROM `header` WHERE id = ?');
$stmt->bind_param('i', $id);  // 'i' for integer
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();


// Create instance of FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Set colors and font for the header
$pdf->SetTextColor(0, 0, 100);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(180, 10, 'PERIYAR UNIVERSITY', 0, 1, 'C');

// Reset color and font for the subheader
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(180, 4, 'Salem-636 011, Tamil Nadu, India', 0, 1, 'C');
$pdf->Cell(180, 4, $row['headerLine4'], 0, 1, 'C');
$pdf->Cell(180, 4, $row['headerLine3'], 0, 1, 'C');
$pdf->Ln(4);

// Add images
$pdf->Image($row['logoImage1'], 10, 10, 30, 25, 'jpg');
$pdf->Image($row['logoImage2'], 175, 9, 25, 25, 'jpg');

$pdf->SetLineWidth(0.3);
// Line 
$pdf->Line(10,38,200,38);

//Menu
$pdf->SetFont('Arial', 'UB', 10);
$pdf->Cell(180,15,"Admission for the year 2024-25",0,1,"C") ;
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 3, "Application No. :", 0, 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 3, 'PU/PA/23/1471', 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(80, 3, "Enrollment No. :", 0, 0,'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(30, 4, "", 1, 1);
$pdf->Ln(5);

/*
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(5,15,'1.',1,0);
$pdf->Cell(40,15,'Programme Applied',1,0);
$pdf->Cell(40,15,':',1,0,'R');
$pdf->Cell(70,15,'Master of Computer Application - Computer Application',1,1,'L'); 
$pdf->Image('C:\Users\Vigneshwaran K\Downloads\black.jpg', 173, 55, 27, 30, 'jpg');   
 */

//Applicant Program
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(5, 8, '1.', 0, 0);
$pdf->Cell(40, 8, 'Programme Applied', 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(95); // Adjust the X position
$pdf->MultiCell(80, 5, 'Master of Computer Application - Computer Application', 0, 'L');
$pdf->SetFont('Arial', '', 10);


$email = $_SESSION['email'];
$stmt = $conn->prepare('
    SELECT 
    registration.*, 
    personal.*,
    education_school.*, 
    education_college.*,
    cirtificate.*
   
FROM 
    registration
JOIN 
    education_school ON registration.id = education_school.id
JOIN
    education_college ON registration.id = education_college.id
JOIN
    personal ON registration.id = personal.id
JOIN
    cirtificate ON registration.id = cirtificate.id
WHERE 
    registration.e_mail = ?; 
');
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

//Applicant Image 
$pdf->Image('php/'.$row['photoFile'], 173, 60, 27, 30, 'jpg'); 



//Applicant Name
$pdf->Cell(5, 8, '2.', 0, 0);
$pdf->Cell(40, 8, 'Name of the Applicant', 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['applicant_name'],0,1, 'L');

//Applicant DOB
$pdf->Cell(5, 8, '3.', 0, 0);
$pdf->Cell(40, 8, 'Date of Birth ', 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,  $row['dob'],0,1, 'L');

//Applicant Father & Mother Name
$pdf->Cell(5, 8, '4.', 0, 0);
$pdf->Cell(40, 8, 'Name of the Father & Mother ', 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,  $row['father_name'].' & ' .$row['mother_name'],0,1, 'L');

//Applicant Guardian Name
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Name of the Guardian  ', 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['guardian'],0,1, 'L');

//Applicant Father Occupation
$pdf->Cell(5, 8, '5.', 0, 0);
$pdf->Cell(40, 8, "Father's & Mother's Occupation  ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 9, $row['father_occupation'].' & '.$row['mother_occupation'],0,1, 'L');

//Applicant Gender
$pdf->Cell(5, 8, '6.', 0, 0);
$pdf->Cell(40, 8, "Gender   ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['gender'],0,1, 'L');

//Applicant Mother Tongue
$pdf->Cell(5, 8, '7.', 0, 0);
$pdf->Cell(40, 8, "Mother Tongue  ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,$row['mother_tongue'],0,1, 'L');

//Applicant Nationality
$pdf->Cell(5, 8, '8.', 0, 0);
$pdf->Cell(40, 8, "Nationality   ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['nationality'],0,1, 'L');

//Applicant Religion 
$pdf->Cell(5, 8, '9.', 0, 0);
$pdf->Cell(40, 8, "Religion    ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['religion'],0,1, 'L');

//Applicant Community 
$pdf->Cell(5, 8, '10.', 0, 0);
$pdf->Cell(40, 8, "Community", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,$row['community'],0,1, 'L');

//Applicant Address Communication
$pdf->Cell(5, 8, '11.', 0, 0);
$pdf->Cell(40, 8, " Communication  Address  ", 0, 1);

$pdf->SetX(95);
$pdf->MultiCell(80, 5, $row['communication_address_1'].', '.$row['communication_address_2'].', '.$row['communication_address_3'], 0, 'L'); 

//Address Com District
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "District", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['communication_district'].' - '.$row['communication_pincode'],0,1, 'L');

//Address Com State
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "State", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['Communication_state'],0,1, 'L');

//Address Com Country
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Country  ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,$row['Communication_country'],0,1, 'L');

//Applicant Moblie Number
$pdf->Cell(5, 8, '12.', 0, 0);
$pdf->Cell(40, 8, "Mobile No.", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,  $row['mobile'],0,1, 'L');

//Applicant Telephone No.
$pdf->Cell(5, 8, '13.', 0, 0);
$pdf->Cell(40, 8, "Telephone No.(LL)", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['telephone'],0,1, 'L');

//Applicant E-mail ID
$pdf->Cell(5, 8, '14.', 0, 0);
$pdf->Cell(40, 8, "E-Mail ID", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $email,0,1, 'L');

//Applicant Aahaar Card No. 
$pdf->Cell(5, 8, '15.', 0, 0);
$pdf->Cell(40, 8, "Aadhaar Card No.", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['aadhar'],0,1, 'L');

//Applicant ABC ID No. 
$pdf->Cell(5, 8, '16.', 0, 0);
$pdf->Cell(40, 8, "ABC ID No.", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['abc'],0,1, 'L');

//Applicant Special Quota
$pdf->Cell(5, 8, '17.', 0, 0);
$pdf->Cell(40, 8, "Special Quota", 0, 1);

//Applicant Ex-Servicemen
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Ex-Servicemen", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['ex_servicemen'],0,1, 'L');

//Applicant Differently Abled
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Differently Abled", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['differently_abled'],0,1, 'L');

//Applicant Sports Quota
$pdf->Cell(5, 7, '', 0, 0);
$pdf->Cell(40, 7, "Sports Quota", 0, 0);
$pdf->Cell(40, 7, ':', 0, 0, 'R');
$pdf->Cell(75, 7, $row['sportsquota'],0,1, 'L');

//Applicant Other
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Other", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['others'],0,1, 'L');
$pdf->Ln(3);

//Applicant Address Permanent
$pdf->Cell(5, 8, '19.', 0, 0);
$pdf->Cell(40, 8, " Permanent Address ", 0, 1);

$pdf->SetX(95);
$pdf->MultiCell(80, 5, $row['permanent_address_1'].', '.$row['permanent_address_2'].', '.$row['permanent_address_3'], 0, 'L'); 

/*
//Address Per Line 1
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Line 1", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'S/O: KRISHNAMOORHTY, 219/1',0,1, 'L');

//Address Per Line 2
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Line 2 ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'INDIRA NAGAR, THIMMAPURAM, PANDIYANKUPPAM POST',0,1, 'L');

//Address Per Line 3
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Line 3 ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'CHINNASELAM TALUK',0,1, 'L');

 */
//Address Per District
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "District", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,$row['permanent_district'].' - '.$row['permanent_pincode'],0,1, 'L');

//Address Per State
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "State", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['permanent_state'],0,1, 'L');

//Address Per Country
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Country  ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['permanent_country'],0,1, 'L');

//Applicant Education
$pdf->Cell(5, 8, '20.', 0, 0);
$pdf->Cell(40, 8, "Educational Qualification", 0, 1);

//Menu
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 25, 'Course', 1, 0,'C');
$pdf->Cell(35, 25, 'Institution', 1, 0,'C');
$pdf->Cell(15, 25, 'Board', 1, 0,'C');
$pdf->Cell(40, 25, 'Subject Studied', 1, 0,'C');
$pdf->Cell(21, 25, 'Register No.', 1, 0,'C');
$pdf->SetY(55);
$pdf->setx(136);
$pdf->Rect(136,55,21,25,'D');
$pdf->MultiCell(22, 7, 'Mark obtained in Percentage', 0,'C');
$pdf->SetY(55);
$pdf->setx(157);
$pdf->Rect(157,55,20,25,'D');
$pdf->MultiCell(20, 7, 'Month and Year of Passing', 0,'C');
$pdf->SetY(55);
$pdf->setx(177);
$pdf->Rect(177,55,23,25,'D');
$pdf->MultiCell(23, 7, 'Regular / Private Other Study ', 0,'C');

//SSLC
$pdf->SetFont('Arial', '', 10);
$pdf->SetY(80);
$pdf->setx(10);
$pdf->Rect(10,80,15,25);
$pdf->MultiCell(15, 5, 'S.S.L.C.(X Std.)', 0,'C');
$pdf->SetY(80);
$pdf->setx(25);
$pdf->Rect(25,80,35,25);
$pdf->MultiCell(35, 5, $row['sslc_inst'], 0,'C');
$pdf->SetY(80);
$pdf->setx(60);
$pdf->Rect(60,80,15,25,'D');
$pdf->MultiCell(15, 5,  $row['sslc_board'], 0,'C');
$pdf->SetY(80);
$pdf->setX(75);
$pdf->Rect(75,80,40,25,'D');
$pdf->MultiCell(40, 5,  $row['sslc_sub'], 0,'C');
$pdf->SetY(80);
$pdf->setx(115);
$pdf->Rect(115,80,21,25,'D');
$pdf->MultiCell(21, 5, $row['sslc_reg'], 0,'C');
$pdf->SetY(80);
$pdf->setx(136);
$pdf->Rect(136,80,21,25,'D');
$pdf->MultiCell(21, 5, $row['sslc_per'], 0,'C');
$pdf->SetY(80);
$pdf->setx(157);
$pdf->Rect(157,80,20,25,'D');
$pdf->MultiCell(20, 5,  $row['sslc_month'].' & '.$row['sslc_year'], 0,'C');
$pdf->SetY(80);
$pdf->setx(177);
$pdf->Rect(177,80,23,25,'D');
$pdf->MultiCell(23, 5,  $row['sslc_mode'], 0,'C');

//HSC 
$pdf->SetY(105);
$pdf->setx(10);
$pdf->Rect(10,105,15,25);
$pdf->MultiCell(15, 5,  $row['hsc_course'], 0,'C');
$pdf->SetY(105);
$pdf->setx(25);
$pdf->Rect(25,105,35,25);
$pdf->MultiCell(35, 5,  $row['hsc_inst'], 0,'C');
$pdf->SetY(105);
$pdf->setx(60);
$pdf->Rect(60,105,15,25,'D');
$pdf->MultiCell(15, 5, $row['hsc_board'], 0,'C');
$pdf->SetY(105);
$pdf->setX(75);
$pdf->Rect(75,105,40,25,'D');
$pdf->MultiCell(40, 5, $row['hsc_sub'], 0,'C');
$pdf->SetY(105);
$pdf->setx(115);
$pdf->Rect(115,105,21,25,'D');
$pdf->MultiCell(21, 5,  $row['hsc_reg'], 0,'C');
$pdf->SetY(105);
$pdf->setx(136);
$pdf->Rect(136,105,21,25,'D');
$pdf->MultiCell(21, 5,  $row['hsc_per'], 0,'C');
$pdf->SetY(105);
$pdf->setx(157);
$pdf->Rect(157,105,20,25,'D');
$pdf->MultiCell(20, 5, $row['hsc_month'].' & '. $row['hsc_year'], 0,'C');
$pdf->SetY(105);
$pdf->setx(177);
$pdf->Rect(177,105,23,25,'D');
$pdf->MultiCell(23, 5, $row['hsc_mode'], 0,'C');

$pdf->Ln(23);
$pdf->Cell(5, 8, '21.', 0, 0);
$pdf->Cell(40, 8, "Graduation", 0, 1);

$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Name of the College Last Studied", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->MultiCell(95,5,  $row['college_Name'],  0, 'L');
$pdf->Ln(3);


$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Name of the University Last Studied", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,  $row['university_Name'],0,1, 'L');

$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Qualifying Degree", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,  $row['qualification_degree'],0,1, 'L');

$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Month & Year of Passing", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,  $row['month_degree'].' & '. $row['year_degree'],0,1, 'L');

$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Awaiting for Final Semester Marksheet", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,'yes',0,1, 'L');

$pdf->ln(150);
$email = $_SESSION['email'];

// Update the SQL query to select specific columns, excluding 'id'
$stmt2 = $conn->prepare('
    SELECT 
        `sub_1_1`, `cat_1_1`, `maxi_1_1`, `obt_1_1`, `mon_1_1`, `year_1_1`, 
        `sub_1_2`, `cat_1_2`, `maxi_1_2`, `obt_1_2`, `mon_1_2`, `year_1_2`, 
        `sub_1_3`, `cat_1_3`, `maxi_1_3`, `obt_1_3`, `mon_1_3`, `year_1_3`, 
        `sub_1_4`, `cat_1_4`, `maxi_1_4`, `obt_1_4`, `mon_1_4`, `year_1_4`, 
        `sub_1_5`, `cat_1_5`, `maxi_1_5`, `obt_1_5`, `mon_1_5`, `year_1_5`, 
        `sub_1_6`, `cat_1_6`, `maxi_1_6`, `obt_1_6`, `mon_1_6`, `year_1_6`, 
        `sub_1_7`, `cat_1_7`, `maxi_1_7`, `obt_1_7`, `mon_1_7`, `year_1_7`, 
        `sub_1_8`, `cat_1_8`, `maxi_1_8`, `obt_1_8`, `mon_1_8`, `year_1_8`, 
        `sub_1_9`, `cat_1_9`, `maxi_1_9`, `obt_1_9`, `mon_1_9`, `year_1_9`, 
        `sub_1_10`, `cat_1_10`, `maxi_1_10`, `obt_1_10`, `mon_1_10`, `year_1_10`
    FROM 
        registration
    JOIN
        college_sem_1 ON registration.id = college_sem_1.id
    WHERE 
        registration.e_mail = ?; 
');

$stmt2->bind_param("s", $email);
$stmt2->execute();
$result2 = $stmt2->get_result();



$row = $result2->fetch_assoc();

if ($row) {
 
    // Check if all fields in the row are empty
    $allFieldsEmpty = true;
    for ($i = 1; $i <= 10; $i++) {
        if (!empty($row['sub_1_' . $i])) {
            $allFieldsEmpty = false;
            break;
        }
    }

    if (!$allFieldsEmpty) {
         // Semester 3
         $pdf->Cell(40,8,'Semester 1 / Year 1',0,1);

         $pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
         $pdf->Cell(20,10,'Category',1,0, 'C');
         $pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
         $pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
         $pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');
        for ($i = 1; $i <= 10; $i++) {
           

            $sub = $row['sub_1_' . $i] ?? '';
            $cat = $row['cat_1_' . $i] ?? '';
            $maxi = $row['maxi_1_' . $i] ?? '';
            $obt = $row['obt_1_' . $i] ?? '';
            $mon = $row['mon_1_' . $i]?? '';
            $year = $row['year_1_' . $i]?? '';
            $pdf->Cell(75,8,$sub,1,0, 'C');
            $pdf->Cell(20,8,$cat,1,0, 'C');
            $pdf->Cell(30,8,$maxi,1,0, 'C');
            $pdf->Cell(30,8,$obt,1,0, 'C');
            $pdf->Cell(35,8,$mon.' '.$year,1,1, 'C');
        }
    } else {
      
    }
} else {
    $pdf->Cell(0,10,'No data available for Semester 1',1,1, 'C');
}


// Update the SQL query to select specific columns, excluding 'id'
$stmt3 = $conn->prepare('
    SELECT 
        `sub_2_1`, `cat_2_1`, `maxi_2_1`, `obt_2_1`, `mon_2_1`, `year_2_1`,
        `sub_2_2`, `cat_2_2`, `maxi_2_2`, `obt_2_2`, `mon_2_2`, `year_2_2`, 
        `sub_2_3`, `cat_2_3`, `maxi_2_3`, `obt_2_3`, `mon_2_3`, `year_2_3`, 
        `sub_2_4`, `cat_2_4`, `maxi_2_4`, `obt_2_4`, `mon_2_4`, `year_2_4`, 
        `sub_2_5`, `cat_2_5`, `maxi_2_5`, `obt_2_5`, `mon_2_5`, `year_2_5`, 
        `sub_2_6`, `cat_2_6`, `maxi_2_6`, `obt_2_6`, `mon_2_6`, `year_2_6`, 
        `sub_2_7`, `cat_2_7`, `maxi_2_7`, `obt_2_7`, `mon_2_7`, `year_2_7`, 
        `sub_2_8`, `cat_2_8`, `maxi_2_8`, `obt_2_8`, `mon_2_8`, `year_2_8`, 
        `sub_2_9`, `cat_2_9`, `maxi_2_9`, `obt_2_9`, `mon_2_9`, `year_2_9`, 
        `sub_2_10`, `cat_2_10`, `maxi_2_10`, `obt_2_10`, `mon_2_10`, `year_2_10` 
    FROM 
        registration
    JOIN
        college_sem_2 ON registration.id = college_sem_2.id
    WHERE 
        registration.e_mail = ?; 
');

$stmt3->bind_param("s", $email);
$stmt3->execute();
$result3 = $stmt3->get_result();



$row = $result3->fetch_assoc();

if ($row) {
 
    // Check if all fields in the row are empty
    $allFieldsEmpty = true;
    for ($i = 1; $i <= 10; $i++) {
        if (!empty($row['sub_2_' . $i])) {
            $allFieldsEmpty = false;
            break;
        }
    }

    if (!$allFieldsEmpty) {
         // Semester 2
         $pdf->ln(10);
         $pdf->Cell(40,8,'Semester 2 / Year 2',0,1);

         $pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
         $pdf->Cell(20,10,'Category',1,0, 'C');
         $pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
         $pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
         $pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');
        for ($i = 1; $i <= 10; $i++) {
           

            $sub = $row['sub_2_' . $i] ?? '';
            $cat = $row['cat_2_' . $i] ?? '';
            $maxi = $row['maxi_2_' . $i] ?? '';
            $obt = $row['obt_2_' . $i] ?? '';
            $mon = $row['mon_2_' . $i]?? '';
            $year = $row['year_2_' . $i]?? '';
            $pdf->Cell(75,8,$sub,1,0, 'C');
            $pdf->Cell(20,8,$cat,1,0, 'C');
            $pdf->Cell(30,8,$maxi,1,0, 'C');
            $pdf->Cell(30,8,$obt,1,0, 'C');
            $pdf->Cell(35,8,$mon.' '.$year,1,1, 'C');
        }
        $pdf->ln(100);
    } else {
      
    }
} else {
    $pdf->Cell(0,10,'No data available for Semester 2',1,1, 'C');
}



$pdf->ln(10);

// Update the SQL query to select specific columns, excluding 'id'
$stmt4 = $conn->prepare('
    SELECT 
       `sub_3_1`, `cat_3_1`, `maxi_3_1`, `obt_3_1`, `mon_3_1`, `year_3_1`, 
       `sub_3_2`, `cat_3_2`, `maxi_3_2`, `obt_3_2`, `mon_3_2`, `year_3_2`, 
       `sub_3_3`, `cat_3_3`, `maxi_3_3`, `obt_3_3`, `mon_3_3`, `year_3_3`, 
       `sub_3_4`, `cat_3_4`, `maxi_3_4`, `obt_3_4`, `mon_3_4`, `year_3_4`, 
       `sub_3_5`, `cat_3_5`, `maxi_3_5`, `obt_3_5`, `mon_3_5`, `year_3_5`, 
       `sub_3_6`, `cat_3_6`, `maxi_3_6`, `obt_3_6`, `mon_3_6`, `year_3_6`, 
       `sub_3_7`, `cat_3_7`, `maxi_3_7`, `obt_3_7`, `mon_3_7`, `year_3_7`, 
       `sub_3_8`, `cat_3_8`, `maxi_3_8`, `obt_3_8`, `mon_3_8`, `year_3_8`, 
       `sub_3_9`, `cat_3_9`, `maxi_3_9`, `obt_3_9`, `mon_3_9`, `year_3_9`, 
       `sub_3_10`, `cat_3_10`, `maxi_3_10`, `obt_3_10`, `mon_3_10`, `year_3_10`
    FROM 
        registration
    JOIN
        college_sem_3 ON registration.id = college_sem_3.id
    WHERE 
        registration.e_mail = ?; 
');

$stmt4->bind_param("s", $email);
$stmt4->execute();
$result4 = $stmt4->get_result();



$row = $result4->fetch_assoc();

if ($row) {
 
    // Check if all fields in the row are empty
    $allFieldsEmpty = true;
    for ($i = 1; $i <= 10; $i++) {
        if (!empty($row['sub_3_' . $i])) {
            $allFieldsEmpty = false;
            break;
        }
    }

    if (!$allFieldsEmpty) {
            // Semester 3
            $pdf->Cell(40,8,'Semester 3 / Year 3',0,1);

            $pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
            $pdf->Cell(20,10,'Category',1,0, 'C');
            $pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
            $pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
            $pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');
        for ($i = 1; $i <= 10; $i++) {
           

            $sub = $row['sub_3_' . $i] ?? '';
            $cat = $row['cat_3_' . $i] ?? '';
            $maxi = $row['maxi_3_' . $i] ?? '';
            $obt = $row['obt_3_' . $i] ?? '';
            $mon = $row['mon_3_' . $i]?? '';
            $year = $row['year_3_' . $i]?? '';
            $pdf->Cell(75,8,$sub,1,0, 'C');
            $pdf->Cell(20,8,$cat,1,0, 'C');
            $pdf->Cell(30,8,$maxi,1,0, 'C');
            $pdf->Cell(30,8,$obt,1,0, 'C');
            $pdf->Cell(35,8,$mon.' '.$year,1,1, 'C');
        }
    } else {
      
    }
} else {
    $pdf->Cell(0,10,'No data available for Semester 3',1,1, 'C');
}

  
// Update the SQL query to select specific columns, excluding 'id'
$stmt5 = $conn->prepare('
SELECT 
    `sub_4_1`, `cat_4_1`, `maxi_4_1`, `obt_4_1`, `mon_4_1`, `year_4_1`, 
    `sub_4_2`, `cat_4_2`, `maxi_4_2`, `obt_4_2`, `mon_4_2`, `year_4_2`, 
    `sub_4_3`, `cat_4_3`, `maxi_4_3`, `obt_4_3`, `mon_4_3`, `year_4_3`, 
    `sub_4_4`, `cat_4_4`, `maxi_4_4`, `obt_4_4`, `mon_4_4`, `year_4_4`, 
    `sub_4_5`, `cat_4_5`, `maxi_4_5`, `obt_4_5`, `mon_4_5`, `year_4_5`,
    `sub_4_6`, `cat_4_6`, `maxi_4_6`, `obt_4_6`, `mon_4_6`, `year_4_6`, 
    `sub_4_7`, `cat_4_7`, `maxi_4_7`, `obt_4_7`, `mon_4_7`, `year_4_7`, 
    `sub_4_8`, `cat_4_8`, `maxi_4_8`, `obt_4_8`, `mon_4_8`, `year_4_8`, 
    `sub_4_9`, `cat_4_9`, `maxi_4_9`, `obt_4_9`, `mon_4_9`, `year_4_9`, 
    `sub_4_10`, `cat_4_10`, `maxi_4_10`, `obt_4_10`, `mon_4_10`, `year_4_10`
FROM 
    registration
JOIN
    college_sem_4 ON registration.id = college_sem_4.id
WHERE 
    registration.e_mail = ?; 
');

$stmt5->bind_param("s", $email);
$stmt5->execute();
$result5 = $stmt5->get_result();



$row = $result5->fetch_assoc();

if ($row) {

// Check if all fields in the row are empty
$allFieldsEmpty = true;
for ($i = 1; $i <= 10; $i++) {
    if (!empty($row['sub_4_' . $i])) {
        $allFieldsEmpty = false;
        break;
    }
}

if (!$allFieldsEmpty) {
        // Semester 3
        $pdf->ln(10);
        $pdf->Cell(40,8,'Semester 4',0,1);

        $pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
        $pdf->Cell(20,10,'Category',1,0, 'C');
        $pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
        $pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
        $pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');
    for ($i = 1; $i <= 10; $i++) {
       
       

        $sub = $row['sub_4_' . $i] ?? '';
        $cat = $row['cat_4_' . $i] ?? '';
        $maxi = $row['maxi_4_' . $i] ?? '';
        $obt = $row['obt_4_' . $i] ?? '';
        $mon = $row['mon_4_' . $i]?? '';
        $year = $row['year_4_' . $i]?? '';
        $pdf->Cell(75,8,$sub,1,0, 'C');
        $pdf->Cell(20,8,$cat,1,0, 'C');
        $pdf->Cell(30,8,$maxi,1,0, 'C');
        $pdf->Cell(30,8,$obt,1,0, 'C');
        $pdf->Cell(35,8,$mon.' '.$year,1,1, 'C');
    }
    $pdf->ln(100);
} else {
  
}
} else {
$pdf->Cell(0,10,'No data available for Semester 4',1,1, 'C');
}

 
// Update the SQL query to select specific columns, excluding 'id'
$stmt6 = $conn->prepare('
SELECT 
   `sub_5_1`, `cat_5_1`, `maxi_5_1`, `obt_5_1`, `mon_5_1`, `year_5_1`, 
   `sub_5_2`, `cat_5_2`, `maxi_5_2`, `obt_5_2`, `mon_5_2`, `year_5_2`, 
   `sub_5_3`, `cat_5_3`, `maxi_5_3`, `obt_5_3`, `mon_5_3`, `year_5_3`, 
   `sub_5_4`, `cat_5_4`, `maxi_5_4`, `obt_5_4`, `mon_5_4`, `year_5_4`, 
   `sub_5_5`, `cat_5_5`, `maxi_5_5`, `obt_5_5`, `mon_5_5`, `year_5_5`, 
   `sub_5_6`, `cat_5_6`, `maxi_5_6`, `obt_5_6`, `mon_5_6`, `year_5_6`, 
   `sub_5_7`, `cat_5_7`, `maxi_5_7`, `obt_5_7`, `mon_5_7`, `year_5_7`, 
   `sub_5_8`, `cat_5_8`, `maxi_5_8`, `obt_5_8`, `mon_5_8`, `year_5_8`, 
   `sub_5_9`, `cat_5_9`, `maxi_5_9`, `obt_5_9`, `mon_5_9`, `year_5_9`, 
   `sub_5_10`, `cat_5_10`, `maxi_5_10`, `obt_5_10`, `mon_5_10`, `year_5_10`
FROM 
    registration
JOIN
    college_sem_5 ON registration.id = college_sem_5.id
WHERE 
    registration.e_mail = ?; 
');

$stmt6->bind_param("s", $email);
$stmt6->execute();
$result6 = $stmt6->get_result();



$row = $result6->fetch_assoc();

if ($row) {

// Check if all fields in the row are empty
$allFieldsEmpty = true;
for ($i = 1; $i <= 10; $i++) {
    if (!empty($row['sub_5_' . $i])) {
        $allFieldsEmpty = false;
        break;
    }
}

if (!$allFieldsEmpty) {
        // Semester 3
        $pdf->Cell(40,8,'Semester 5',0,1);

        $pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
        $pdf->Cell(20,10,'Category',1,0, 'C');
        $pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
        $pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
        $pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');
    for ($i = 1; $i <= 10; $i++) {
       
       

        $sub = $row['sub_5_' . $i] ?? '';
        $cat = $row['cat_5_' . $i] ?? '';
        $maxi = $row['maxi_5_' . $i] ?? '';
        $obt = $row['obt_5_' . $i] ?? '';
        $mon = $row['mon_5_' . $i]?? '';
        $year = $row['year_5_' . $i]?? '';
        $pdf->Cell(75,8,$sub,1,0, 'C');
        $pdf->Cell(20,8,$cat,1,0, 'C');
        $pdf->Cell(30,8,$maxi,1,0, 'C');
        $pdf->Cell(30,8,$obt,1,0, 'C');
        $pdf->Cell(35,8,$mon.' '.$year,1,1, 'C');
    }
} else {
  
}
} else {
$pdf->Cell(0,10,'No data available for Semester 5',1,1, 'C');
}

    //Semester 6
 
// Update the SQL query to select specific columns, excluding 'id'
// Prepare and execute the SQL query
$stmt7 = $conn->prepare('
SELECT 
   `sub_6_1`, `cat_6_1`, `maxi_6_1`, `obt_6_1`, `mon_6_1`, `year_6_1`, 
   `sub_6_2`, `cat_6_2`, `maxi_6_2`, `obt_6_2`, `mon_6_2`, `year_6_2`, 
   `sub_6_3`, `cat_6_3`, `maxi_6_3`, `obt_6_3`, `mon_6_3`, `year_6_3`, 
   `sub_6_4`, `cat_6_4`, `maxi_6_4`, `obt_6_4`, `mon_6_4`, `year_6_4`, 
   `sub_6_5`, `cat_6_5`, `maxi_6_5`, `obt_6_5`, `mon_6_5`, `year_6_5`, 
   `sub_6_6`, `cat_6_6`, `maxi_6_6`, `obt_6_6`, `mon_6_6`, `year_6_6`, 
   `sub_6_7`, `cat_6_7`, `maxi_6_7`, `obt_6_7`, `mon_6_7`, `year_6_7`, 
   `sub_6_8`, `cat_6_8`, `maxi_6_8`, `obt_6_8`, `mon_6_8`, `year_6_8`, 
   `sub_6_9`, `cat_6_9`, `maxi_6_9`, `obt_6_9`, `mon_6_9`, `year_6_9`, 
   `sub_6_10`, `cat_6_10`, `maxi_6_10`, `obt_6_10`, `mon_6_10`, `year_6_10`
FROM 
    registration
JOIN
    college_sem_6 ON registration.id = college_sem_6.id
WHERE 
    registration.e_mail = ?; 
');

$stmt7->bind_param("s", $email);
$stmt7->execute();
$result7 = $stmt7->get_result();

$row = $result7->fetch_assoc();

if ($row) {
    // Check if all fields in the row are empty
    $allFieldsEmpty = true;
    for ($i = 1; $i <= 10; $i++) {
        if (!empty($row['sub_6_' . $i])) {
            $allFieldsEmpty = false;
            break;
        }
    }

    if (!$allFieldsEmpty) {
        // Semester 6
        $pdf->Ln(10);
        $pdf->Cell(40, 8, 'Semester 6', 0, 1);

        $pdf->Cell(75, 10, 'Subject / Course Name', 1, 0, 'C');
        $pdf->Cell(20, 10, 'Category', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Maximum Marks', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Obtained Marks', 1, 0, 'C');
        $pdf->MultiCell(0, 5, 'Month & Year of Passing', 1, 'C');

        for ($i = 1; $i <= 10; $i++) {
            $sub = $row['sub_6_' . $i] ?? '';
            $cat = $row['cat_6_' . $i] ?? '';
            $maxi = $row['maxi_6_' . $i] ?? '';
            $obt = $row['obt_6_' . $i] ?? '';
            $mon = $row['mon_6_' . $i] ?? '';
            $year = $row['year_6_' . $i] ?? '';
            $pdf->Cell(75, 8, $sub, 1, 0, 'C');
            $pdf->Cell(20, 8, $cat, 1, 0, 'C');
            $pdf->Cell(30, 8, $maxi, 1, 0, 'C');
            $pdf->Cell(30, 8, $obt, 1, 0, 'C');
            $pdf->Cell(35, 8, $mon . ' ' . $year, 1, 1, 'C');
        }
    } else {
        // If all fields are empty, handle appropriately
       
    }
} else {
    $pdf->Cell(0, 10, 'No data available for Semester 6', 1, 1, 'C');
}

    $pdf->Ln(10);
    //Semester 7
 
// Update the SQL query to select specific columns, excluding 'id'
$stmt8 = $conn->prepare('
SELECT 
   `sub_7_1`, `cat_7_1`, `maxi_7_1`, `obt_7_1`, `mon_7_1`, `year_7_1`, 
   `sub_7_2`, `cat_7_2`, `maxi_7_2`, `obt_7_2`, `mon_7_2`, `year_7_2`, 
   `sub_7_3`, `cat_7_3`, `maxi_7_3`, `obt_7_3`, `mon_7_3`, `year_7_3`, 
   `sub_7_4`, `cat_7_4`, `maxi_7_4`, `obt_7_4`, `mon_7_4`, `year_7_4`, 
   `sub_7_5`, `cat_7_5`, `maxi_7_5`, `obt_7_5`, `mon_7_5`, `year_7_5`, 
   `sub_7_6`, `cat_7_6`, `maxi_7_6`, `obt_7_6`, `mon_7_6`, `year_7_6`, 
   `sub_7_7`, `cat_7_7`, `maxi_7_7`, `obt_7_7`, `mon_7_7`, `year_7_7`, 
   `sub_7_8`, `cat_7_8`, `maxi_7_8`, `obt_7_8`, `mon_7_8`, `year_7_8`, 
   `sub_7_9`, `cat_7_9`, `maxi_7_9`, `obt_7_9`, `mon_7_9`, `year_7_9`, 
   `sub_7_10`, `cat_7_10`, `maxi_7_10`, `obt_7_10`, `mon_7_10`, `year_7_10`
FROM 
    registration
JOIN
    college_sem_7 ON registration.id = college_sem_7.id
WHERE 
    registration.e_mail = ?; 
');

$stmt8->bind_param("s", $email);
$stmt8->execute();
$result8 = $stmt8->get_result();



$row = $result8->fetch_assoc();

if ($row) {

// Check if all fields in the row are empty
$allFieldsEmpty = true;
for ($i = 1; $i <= 10; $i++) {
    if (!empty($row['sub_7_' . $i])) {
        $allFieldsEmpty = false;
        break;
    }
}

if (!$allFieldsEmpty) {
        // Semester 3
        $pdf->Cell(40,8,'Semester 7',0,1);

        $pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
        $pdf->Cell(20,10,'Category',1,0, 'C');
        $pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
        $pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
        $pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');
    for ($i = 1; $i <= 10; $i++) {
       
       

        $sub = $row['sub_7_' . $i] ?? '';
        $cat = $row['cat_7_' . $i] ?? '';
        $maxi = $row['maxi_7_' . $i] ?? '';
        $obt = $row['obt_7_' . $i] ?? '';
        $mon = $row['mon_7_' . $i]?? '';
        $year = $row['year_7_' . $i]?? '';
        $pdf->Cell(75,8,$sub,1,0, 'C');
        $pdf->Cell(20,8,$cat,1,0, 'C');
        $pdf->Cell(30,8,$maxi,1,0, 'C');
        $pdf->Cell(30,8,$obt,1,0, 'C');
        $pdf->Cell(35,8,$mon.' '.$year,1,1, 'C');
    }
} else {
  
}
} else {
$pdf->Cell(0,10,'No data available for Semester 7',1,1, 'C');
}

 //Semester 8
 
// Update the SQL query to select specific columns, excluding 'id'
$stmt9 = $conn->prepare('
SELECT 
    `sub_8_1`, `cat_8_1`, `maxi_8_1`, `obt_8_1`, `mon_8_1`, `year_8_1`,
    `sub_8_2`, `cat_8_2`, `maxi_8_2`, `obt_8_2`, `mon_8_2`, `year_8_2`, 
    `sub_8_3`, `cat_8_3`, `maxi_8_3`, `obt_8_3`, `mon_8_3`, `year_8_3`, 
    `sub_8_4`, `cat_8_4`, `maxi_8_4`, `obt_8_4`, `mon_8_4`, `year_8_4`, 
    `sub_8_5`, `cat_8_5`, `maxi_8_5`, `obt_8_5`, `mon_8_5`, `year_8_5`, 
    `sub_8_6`, `cat_8_6`, `maxi_8_6`, `obt_8_6`, `mon_8_6`, `year_8_6`, 
    `sub_8_7`, `cat_8_7`, `maxi_8_7`, `obt_8_7`, `mon_8_7`, `year_8_7`, 
    `sub_8_8`, `cat_8_8`, `maxi_8_8`, `obt_8_8`, `mon_8_8`, `year_8_8`, 
    `sub_8_9`, `cat_8_9`, `maxi_8_9`, `obt_8_9`, `mon_8_9`, `year_8_9`, 
    `sub_8_10`, `cat_8_10`, `maxi_8_10`, `obt_8_10`, `mon_8_10`, `year_8_10`
FROM 
    registration
JOIN
    college_sem_8 ON registration.id = college_sem_8.id
WHERE 
    registration.e_mail = ?; 
');

$stmt9->bind_param("s", $email);
$stmt9->execute();
$result9 = $stmt9->get_result();



$row = $result9->fetch_assoc();

if ($row) {

// Check if all fields in the row are empty
$allFieldsEmpty = true;
for ($i = 1; $i <= 10; $i++) {
    if (!empty($row['sub_8_' . $i])) {
        $allFieldsEmpty = false;
        break;
    }
}

if (!$allFieldsEmpty) {
        // Semester 3
        $pdf->ln(10);
        $pdf->Cell(40,8,'Semester 8',0,1);

        $pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
        $pdf->Cell(20,10,'Category',1,0, 'C');
        $pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
        $pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
        $pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');
    for ($i = 1; $i <= 10; $i++) {
       

        $sub = $row['sub_8_' . $i] ?? '';
        $cat = $row['cat_8_' . $i] ?? '';
        $maxi = $row['maxi_8_' . $i] ?? '';
        $obt = $row['obt_8_' . $i] ?? '';
        $mon = $row['mon_8_' . $i]?? '';
        $year = $row['year_8_' . $i]?? '';
        $pdf->Cell(75,8,$sub,1,0, 'C');
        $pdf->Cell(20,8,$cat,1,0, 'C');
        $pdf->Cell(30,8,$maxi,1,0, 'C');
        $pdf->Cell(30,8,$obt,1,0, 'C');
        $pdf->Cell(35,8,$mon.' '.$year,1,1, 'C');
    }
    $pdf->ln(100);
} else {
  
}
} else {
$pdf->Cell(0,10,'No data available for Semester 8',1,1, 'C');
}

$pdf->ln(10);
$pdf->Cell(40,8,'Total Maximum Marks',1,0, 'C');
$pdf->Cell(40,8,'Total Marks Obtained',1,0, 'C');
$pdf->Cell(38,8,'Percentage of Marks',1,0, 'C');
$pdf->Cell(30,8,'Class Obtained',1,0, 'C');
$pdf->Cell(15,8,'CGPA',1,0, 'C');
$pdf->Cell(27,8,'Overall Grade',1, 1, 'C');
$stmt = $conn->prepare('
    SELECT 
    registration.*, 
    education_result.*
   
FROM 
    registration

JOIN
    education_result ON registration.id = education_result.id
WHERE 
    registration.e_mail = ?; 
');
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$pdf->Cell(40,8,$row['max_mark_disp'],1,0, 'C');
$pdf->Cell(40,8,$row['mark_obt_disp'],1,0, 'C');
$pdf->Cell(38,8,$row['perc_mark_disp'],1,0, 'C');
$pdf->Cell(30,8,$row['cls_obt'],1,0, 'C');
$pdf->Cell(15,8,$row['cgpa'],1,0, 'C');
$pdf->Cell(27,8,$row['grade'],1, 1, 'C');
/* 
$pdf->ln(5);
$pdf->Cell(5, 8, 'Do you have internet facility at your home?', 0, 0);
$pdf->Cell(40, 8, "", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Yes',0,1, 'L');
*/
$pdf->Cell(30,6,'DECLARATION :',0,0, 'L');
$pdf->Cell(0,6,'I declare that the information given above are true to the best of my knowledge and that I shall, if ',0,1, 'C');
$pdf->Cell(0,6,'admitted abide by the rules of the University.',0,1, 'L');

$pdf->ln(5);
$pdf->Cell(12,6,'Date :',0,0, 'C');
$pdf->Cell(20,6,date('d-m-Y'),0,1, 'L');
$pdf->Cell(20,6,'Place :',0,1, 'L');

$pdf->ln(3);
// Parent Sign
// Save the current position
$x = $pdf->GetX();
$y = $pdf->GetY();
$stmt = $conn->prepare('
    SELECT 
    registration.*, 
    cirtificate.*
   
FROM 
    registration

JOIN
    cirtificate ON registration.id = cirtificate.id
WHERE 
    registration.e_mail = ?; 
');
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
// Display the first image
$pdf->Image('php/'.$row['parentSignatureFile'], $x + 82, $y, 40, 13, 'jpg');

// Display the second image
$pdf->Image('php/'.$row['signatureFile'], $x + 148, $y, 40, 13, 'jpg');

// Move down by the height of the image
$pdf->SetY($y + 15);

// Display the text below the images
$pdf->Cell(120,6,'Signature of the Parent',0,0, 'R');
$pdf->Cell(70,6,'Signature of the Applicant',0,1, 'R');

 


// Output the PDF to the browser
$pdf->Output();

// End output buffering and flush the buffer
ob_end_flush();
