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
        $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'R');
    }
}

$pdf = new PDF('P', 'mm', 'A4');
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
$pdf->SetX(95); // Adjust the X position
$pdf->MultiCell(80, 5, 'Master of Computer Application - Computer Application', 0, 'L');

//Applicant Image 
$pdf->Image("D:\Vicky\Photo\photo.jpg", 173, 60, 27, 30, 'jpg'); 

$email = $_SESSION['email'];
$stmt = $conn->prepare('SELECT `dof`, `applicant_name`, `mobile`, `father_name`, `mother_name` FROM `registration` WHERE e_mail = ?');
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$conn->close();

//Applicant Name
$pdf->Cell(5, 8, '2.', 0, 0);
$pdf->Cell(40, 8, 'Name of the Applicant', 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $row['applicant_name'],0,1, 'L');

//Applicant DOB
$pdf->Cell(5, 8, '3.', 0, 0);
$pdf->Cell(40, 8, 'Date of Birth ', 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,  $row['dof'],0,1, 'L');

//Applicant Father & Mother Name
$pdf->Cell(5, 8, '4.', 0, 0);
$pdf->Cell(40, 8, 'Name of the Father & Mother ', 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,  $row['father_name'].'&' .$row['mother_name'],0,1, 'L');

//Applicant Guardian Name
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, 'Name of the Guardian  ', 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Guardian Name',0,1, 'L');

//Applicant Father Occupation
$pdf->Cell(5, 8, '5.', 0, 0);
$pdf->Cell(40, 8, "Father's & Mother's Occupation  ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 9, 'FARMER & HOUSE WIFE',0,1, 'L');

//Applicant Gender
$pdf->Cell(5, 8, '6.', 0, 0);
$pdf->Cell(40, 8, "Gender   ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Male',0,1, 'L');

//Applicant Mother Tongue
$pdf->Cell(5, 8, '7.', 0, 0);
$pdf->Cell(40, 8, "Mother Tongue  ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Tamil',0,1, 'L');

//Applicant Nationality
$pdf->Cell(5, 8, '8.', 0, 0);
$pdf->Cell(40, 8, "Nationality   ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'INDIA',0,1, 'L');

//Applicant Religion 
$pdf->Cell(5, 8, '9.', 0, 0);
$pdf->Cell(40, 8, "Religion    ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'HINDU',0,1, 'L');

//Applicant Community 
$pdf->Cell(5, 8, '10.', 0, 0);
$pdf->Cell(40, 8, "Community", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'MBC',0,1, 'L');

//Applicant Address Communication
$pdf->Cell(5, 8, '11.', 0, 0);
$pdf->Cell(40, 8, " Address for Communication  ", 0, 1);

$pdf->SetX(95);
$pdf->MultiCell(80, 5, 'S/O: KRISHNAMOORHTY, 219/1,INDIRA NAGAR, THIMMAPURAM, PANDIYANKUPPAM POST,CHINNASELAM TALUK', 0, 'L'); 

/* 
//Address Com Line 1
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Line 1", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'S/O: KRISHNAMOORHTY, 219/1',0,1, 'L');

//Address Com Line 2
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Line 2 ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'INDIRA NAGAR, THIMMAPURAM, PANDIYANKUPPAM POST',0,1, 'L');

//Address Com Line 3
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Line 3 ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'CHINNASELAM TALUK',0,1, 'L');
*/

//Address Com District
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "District", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'KALLAKURICHI - 606201',0,1, 'L');

//Address Com State
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "State", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Tamil Nadu',0,1, 'L');

//Address Com Country
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Country  ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'INDIA',0,1, 'L');

//Applicant Moblie Number
$pdf->Cell(5, 8, '12.', 0, 0);
$pdf->Cell(40, 8, "Mobile No.", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8,  $row['mobile'],0,1, 'L');

//Applicant Telephone No.
$pdf->Cell(5, 8, '13.', 0, 0);
$pdf->Cell(40, 8, "Telephone No.(LL)", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, '',0,1, 'L');

//Applicant E-mail ID
$pdf->Cell(5, 8, '14.', 0, 0);
$pdf->Cell(40, 8, "E-Mail ID", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, $email,0,1, 'L');

//Applicant Aahaar Card No. 
$pdf->Cell(5, 8, '15.', 0, 0);
$pdf->Cell(40, 8, "Aadhaar Card No.", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, '987654321987',0,1, 'L');

//Applicant ABC ID No. 
$pdf->Cell(5, 8, '16.', 0, 0);
$pdf->Cell(40, 8, "ABC ID No.", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, '987654321987581',0,1, 'L');

//Applicant Special Quota
$pdf->Cell(5, 8, '17.', 0, 0);
$pdf->Cell(40, 8, "Special Quota", 0, 1);

//Applicant Ex-Servicemen
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Ex-Servicemen", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, '',0,1, 'L');

//Applicant Differently Abled
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Differently Abled", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, '',0,1, 'L');

//Applicant Sports Quota
$pdf->Cell(5, 7, '', 0, 0);
$pdf->Cell(40, 7, "Sports Quota", 0, 0);
$pdf->Cell(40, 7, ':', 0, 0, 'R');
$pdf->Cell(75, 7, '',0,1, 'L');

//Applicant Other
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Other", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, '',0,1, 'L');

//Applicant Native Place
$pdf->Cell(5, 8, '18.', 0, 0);
$pdf->Cell(40, 8, "Native Place", 0, 1);

//Applicant Native Village
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Native Village / Town", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'THMMAPURAM',0,1, 'L');

//Applicant District
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "District", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Kallakurichi',0,1, 'L');

//Applicant State

$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "State", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Tamil Nadu',0,1, 'L');

//Applicant Address Permanent
$pdf->Cell(5, 8, '19.', 0, 0);
$pdf->Cell(40, 8, " Address for Communication  ", 0, 1);

$pdf->SetX(95);
$pdf->MultiCell(80, 5, 'S/O: KRISHNAMOORHTY, 219/1,INDIRA NAGAR, THIMMAPURAM, PANDIYANKUPPAM POST,CHINNASELAM TALUK', 0, 'L'); 

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
$pdf->Cell(75, 8, 'KALLAKURICHI - 606201',0,1, 'L');

//Address Per State
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "State", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Tamil Nadu',0,1, 'L');

//Address Per Country
$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Country  ", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'INDIA',0,1, 'L');

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
$pdf->SetY(97);
$pdf->setx(136);
$pdf->Rect(136,97,21,25,'D');
$pdf->MultiCell(22, 7, 'Mark obtained in Percentage', 0,'C');
$pdf->SetY(97);
$pdf->setx(157);
$pdf->Rect(157,97,20,25,'D');
$pdf->MultiCell(20, 7, 'Month and Year of Passing', 0,'C');
$pdf->SetY(97);
$pdf->setx(177);
$pdf->Rect(177,97,23,25,'D');
$pdf->MultiCell(23, 7, 'Regular / Private Other Study ', 0,'C');

//SSLC
$pdf->SetFont('Arial', '', 10);
$pdf->SetY(122);
$pdf->setx(10);
$pdf->Rect(10,122,15,25);
$pdf->MultiCell(15, 5, 'S.S.L.C.(X Std.)', 0,'C');
$pdf->SetY(122);
$pdf->setx(25);
$pdf->Rect(25,122,35,25);
$pdf->MultiCell(35, 5, 'GOVT HR SEC SCHOOL NAGAKUPPAM   NAGAKUPPAM NAGAKUPPAM ', 0,'C');
$pdf->SetY(122);
$pdf->setx(60);
$pdf->Rect(60,122,15,25,'D');
$pdf->MultiCell(15, 5, 'STATE BOARD', 0,'C');
$pdf->SetY(122);
$pdf->setX(75);
$pdf->Rect(75,122,40,25,'D');
$pdf->MultiCell(40, 5, 'TAMIL, ENGLISH, MATHEMATICS, SCIENCE, SOCIAL SCIENCE', 0,'C');
$pdf->SetY(122);
$pdf->setx(115);
$pdf->Rect(115,122,21,25,'D');
$pdf->MultiCell(21, 5, '5963061 ', 0,'C');
$pdf->SetY(122);
$pdf->setx(136);
$pdf->Rect(136,122,21,25,'D');
$pdf->MultiCell(21, 5, '67', 0,'C');
$pdf->SetY(122);
$pdf->setx(157);
$pdf->Rect(157,122,20,25,'D');
$pdf->MultiCell(20, 5, 'March 2018', 0,'C');
$pdf->SetY(122);
$pdf->setx(177);
$pdf->Rect(177,122,23,25,'D');
$pdf->MultiCell(23, 5, 'Regular ', 0,'C');

//HSC 
$pdf->SetY(147);
$pdf->setx(10);
$pdf->Rect(10,147,15,25);
$pdf->MultiCell(15, 5, 'HSC ', 0,'C');
$pdf->SetY(147);
$pdf->setx(25);
$pdf->Rect(25,147,35,25);
$pdf->MultiCell(35, 5, 'GOVT HR SEC SCHOOL NAGAKUPPAM   NAGAKUPPAM NAGAKUPPAM ', 0,'C');
$pdf->SetY(147);
$pdf->setx(60);
$pdf->Rect(60,147,15,25,'D');
$pdf->MultiCell(15, 5, 'STATE BOARD', 0,'C');
$pdf->SetY(147);
$pdf->setX(75);
$pdf->Rect(75,147,40,25,'D');
$pdf->MultiCell(40, 5, 'TAMIL, ENGLISH, PHYSICS, CHEMISTRY, COMPUTER SCIENCE, MATHEMATICS', 0,'C');
$pdf->SetY(147);
$pdf->setx(115);
$pdf->Rect(115,147,21,25,'D');
$pdf->MultiCell(21, 5, '5963061 ', 0,'C');
$pdf->SetY(147);
$pdf->setx(136);
$pdf->Rect(136,147,21,25,'D');
$pdf->MultiCell(21, 5, '67', 0,'C');
$pdf->SetY(147);
$pdf->setx(157);
$pdf->Rect(157,147,20,25,'D');
$pdf->MultiCell(20, 5, 'March 2018', 0,'C');
$pdf->SetY(147);
$pdf->setx(177);
$pdf->Rect(177,147,23,25,'D');
$pdf->MultiCell(23, 5, 'Regular ', 0,'C');

$pdf->Ln(23);
$pdf->Cell(5, 8, '21.', 0, 0);
$pdf->Cell(40, 8, "Graduation", 0, 1);

$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Name of the College Last Studied", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->MultiCell(95,5, '',  0, 'L');
$pdf->Ln(3);


$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Name of the University Last Studied", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'BHARATHIDASAN UNIVERSITY',0,1, 'L');

$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Qualifying Degree", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'BACHELOR OF COMPUTER APPLICATIONS (BCA)',0,1, 'L');

$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Month & Year of Passing", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'UG Arts & Science',0,1, 'L');

$pdf->Cell(5, 8, '', 0, 0);
$pdf->Cell(40, 8, "Awaiting for Final Semester Marksheet", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Yes',0,1, 'L');

$pdf->Ln(60);
$pdf->Cell(5, 8, '', 0, 1);
$pdf->Cell(40,8,'Semester 1 / Year 1',0,1);

$pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
$pdf->Cell(20,10,'Category',1,0, 'C');
$pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
$pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
$pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->ln(10);

$pdf->Cell(40,8,'Semester 2 / Year 2',0,1);

$pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
$pdf->Cell(20,10,'Category',1,0, 'C');
$pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
$pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
$pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->ln(10);

$pdf->Cell(40,8,'Semester 3 / Year 3',0,1);

$pdf->Cell(75,10,'Subject / Course Name',1,0, 'C');
$pdf->Cell(20,10,'Category',1,0, 'C');
$pdf->Cell(30,10,'Maximum Marks',1,0, 'C');
$pdf->Cell(30,10,'Obtained Marks',1,0, 'C');
$pdf->MultiCell(0,5,'Month & Year of Passing',1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');


$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->Cell(75,8,'',1,0, 'C');
$pdf->Cell(20,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(35,8,'',1,1, 'C');

$pdf->ln(10);
$pdf->Cell(40,8,'Total Maximum Marks',1,0, 'C');
$pdf->Cell(40,8,'Total Marks Obtained',1,0, 'C');
$pdf->Cell(38,8,'Percentage of Marks',1,0, 'C');
$pdf->Cell(30,8,'Class Obtained',1,0, 'C');
$pdf->Cell(15,8,'CGPA',1,0, 'C');
$pdf->Cell(27,8,'Overall Grade',1, 1, 'C');

$pdf->Cell(40,8,'',1,0, 'C');
$pdf->Cell(40,8,'',1,0, 'C');
$pdf->Cell(38,8,'',1,0, 'C');
$pdf->Cell(30,8,'',1,0, 'C');
$pdf->Cell(15,8,'',1,0, 'C');
$pdf->Cell(27,8,'',1, 1, 'C');

$pdf->ln(5);
$pdf->Cell(5, 8, 'Do you have internet facility at your home?', 0, 0);
$pdf->Cell(40, 8, "", 0, 0);
$pdf->Cell(40, 8, ':', 0, 0, 'R');
$pdf->Cell(75, 8, 'Yes',0,1, 'L');

$pdf->Cell(30,6,'DECLARATION :',0,0, 'L');
$pdf->Cell(0,6,'I declare that the information given above are true to the best of my knowledge and that I shall, if ',0,1, 'C');
$pdf->Cell(0,6,'admitted abide by the rules of the University.',0,1, 'L');

$pdf->ln(5);
$pdf->Cell(12,6,'Date :',0,0, 'C');
$pdf->Cell(20,6,'21/05/2023',0,1, 'L');
$pdf->Cell(20,6,'Place :',0,1, 'L');

$pdf->ln(3);
$pdf->Cell(120,6,'Signature of the Parent',0,0, 'R');
$pdf->Cell(70,6,'Signature of the Applicant',0,0, 'R');

// Parent Sign
$pdf->Image("assets\images\black.jpg", 92, 123, 40, 13, 'jpg');
//Applicant Sign 
$pdf->Image("assets\images\VICTUS Dark 3.jpg", 160, 123, 40, 13, 'jpg'); 


/*
// Query the database for specific email
$email = 'mothish2@gmail.com';
$sql = "SELECT photo, sign FROM upload WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();

    // Assign data to specific variables
    $field1 = $row['photo'];
    $field2 = $row['sign'];
    
    // Output the data to the PDF
    $pdf->SetFont('Arial', '', 12);
    $pdf->Ln(20); // Line break

    $pdf->Cell(50, 10, 'Field 1:', 0);
    $pdf->Cell(130, 10, $field1, 0);
    $pdf->Ln();

    $pdf->Cell(50, 10, 'Field 2:', 0);
    $pdf->Cell(130, 10, $field2, 0);
    $pdf->Ln();

    
} else {
    $pdf->SetFont('Arial', 'I', 12);
    $pdf->Cell(0, 10, 'No data found for the provided email.', 0, 1, 'C');
}

// Close the database connection
$conn->close();
*/
// Output the PDF to the browser
$pdf->Output('Application.pdf','D',true);

// End output buffering and flush the buffer
ob_end_flush();
