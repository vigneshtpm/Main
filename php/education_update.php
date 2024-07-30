<?php
session_start();
include 'connection.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["sslc_ins"]) ) {

        $email = $_SESSION['email'];
        $sslc_inst=$_POST["sslc_ins"];
        $sslc_board=$_POST["sslc_board"];
        $sslc_sub=$_POST["sslc_sub"];
        $sslc_reg_no=$_POST["sslc_reg_no"];
        $sslc_perc=$_POST["sslc_perc"];
        $sslc_month=$_POST["sslc_month"];
        $sslc_year=$_POST["sslc_year"];
        $sslc_mode=$_POST["sslc_mode"];
        $hsc_course=$_POST["hsc_course"];
        $hsc_ins=$_POST["hsc_ins"];
        $hsc_board=$_POST["hsc_board"];
        $hsc_sub=$_POST["hsc_sub"];
        $hsc_reg_no=$_POST["hsc_reg_no"];
        $hsc_perc=$_POST["hsc_perc"];
        $hsc_month=$_POST["hsc_month"];
        $hsc_year=$_POST["hsc_year"];
        $hsc_mode=$_POST["hsc_mode"];
 
        

        $stmt = $conn->prepare("UPDATE education_school
        SET sslc_inst= ?,sslc_board=?,sslc_sub= ?,sslc_reg=?,sslc_per=?,sslc_month=?,sslc_year= ?,
        sslc_mode= ?,hsc_course= ?,hsc_inst= ?,hsc_board= ?,hsc_sub= ?,hsc_reg= ?,hsc_per= ?,hsc_month=?,
        hsc_year= ?,hsc_mode= ?
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt->bind_param("ssssssssssssssssss", $sslc_inst,$sslc_board,$sslc_sub, $sslc_reg_no,$sslc_perc,
        $sslc_month,$sslc_year, $sslc_mode,$hsc_course,$hsc_ins,$hsc_board,$hsc_sub,$hsc_reg_no,$hsc_perc,
        $hsc_month,$hsc_year,$hsc_mode,
        $email);
        $stmt->execute();

        

        $collegeName=$_POST["collegeName"];
        $universityName=$_POST["universityName"];
        $qualification_type=$_POST["qualification_type"];
        $qualificationdegree=$_POST["qualificationdegree"];
        $month_degree=$_POST["month_degree"];
        $year_degree=$_POST["year_degree"];
        $semester_type=$_POST["semester_type"];
        $no_of_sem=$_POST["no-of-sem"];
        
        $programme_applied=$_POST["programme-applied"];
        $select_programme=$_POST["select-programme"];

 

        $stmt1 = $conn->prepare("UPDATE education_college
        SET college_Name= ?,university_Name= ?,qualification_type= ?,qualification_degree= ?,month_degree= ?,
        year_degree= ?,semester_type= ?,no_of_sem= ?,
        programme_applied= ?,selected_programme = ?
        
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt1->bind_param("sssssssssss",$collegeName,$universityName,$qualification_type,$qualificationdegree,
        $month_degree,$year_degree,$semester_type,$no_of_sem,
        $programme_applied,$select_programme,
       
        $email);
        $stmt1->execute();
 
        
        $sub_1_1=$_POST["Sub_1_1"];
        $cat_1_1=$_POST["Cat_1_1"];
        $maxi_1_1=$_POST["Maxi_1_1"];
        $obt_1_1=$_POST["Obt_1_1"];
        $mon_1_1=$_POST["Mon_1_1"];
        $year_1_1=$_POST["Year_1_1"];
        $sub_1_2=$_POST["Sub_1_2"];
        $cat_1_2=$_POST["Cat_1_2"];
        $maxi_1_2=$_POST["Maxi_1_2"];
        $obt_1_2=$_POST["Obt_1_2"];
        $mon_1_2=$_POST["Mon_1_2"];
        $year_1_2=$_POST["Year_1_2"];
        $sub_1_3=$_POST["Sub_1_3"];
        $cat_1_3=$_POST["Cat_1_3"];
        $maxi_1_3=$_POST["Maxi_1_3"];
        $obt_1_3=$_POST["Obt_1_3"];
        $mon_1_3=$_POST["Mon_1_3"];
        $year_1_3=$_POST["Year_1_3"];
        $sub_1_4=$_POST["Sub_1_4"];
        $cat_1_4=$_POST["Cat_1_4"];
        $maxi_1_4=$_POST["Maxi_1_4"];
        $obt_1_4=$_POST["Obt_1_4"];
        $mon_1_4=$_POST["Mon_1_4"];
        $year_1_4=$_POST["Year_1_4"];
        $sub_1_5=$_POST["Sub_1_5"];
        $cat_1_5=$_POST["Cat_1_5"];
        $maxi_1_5=$_POST["Maxi_1_5"];
        $obt_1_5=$_POST["Obt_1_5"];
        $mon_1_5=$_POST["Mon_1_5"];
        $year_1_5=$_POST["Year_1_5"];
        $sub_1_6=$_POST["Sub_1_6"];
        $cat_1_6=$_POST["Cat_1_6"];
        $maxi_1_6=$_POST["Maxi_1_6"];
        $obt_1_6=$_POST["Obt_1_6"];
        $mon_1_6=$_POST["Mon_1_6"];
        $year_1_6=$_POST["Year_1_6"];
        $sub_1_7=$_POST["Sub_1_7"];
        $cat_1_7=$_POST["Cat_1_7"];
        $maxi_1_7=$_POST["Maxi_1_7"];
        $obt_1_7=$_POST["Obt_1_7"];
        $mon_1_7=$_POST["Mon_1_7"];
        $year_1_7=$_POST["Year_1_7"];
        $sub_1_8=$_POST["Sub_1_8"];
        $cat_1_8=$_POST["Cat_1_8"];
        $maxi_1_8=$_POST["Maxi_1_8"];
        $obt_1_8=$_POST["Obt_1_8"];
        $mon_1_8=$_POST["Mon_1_8"];
        $year_1_8=$_POST["Year_1_8"];
        $sub_1_9=$_POST["Sub_1_9"];
        $cat_1_9=$_POST["Cat_1_9"];
        $maxi_1_9=$_POST["Maxi_1_9"];
        $obt_1_9=$_POST["Obt_1_9"];
        $mon_1_9=$_POST["Mon_1_9"];
        $year_1_9=$_POST["Year_1_9"];
        $sub_1_10=$_POST["Sub_1_10"];
        $cat_1_10=$_POST["Cat_1_10"];
        $maxi_1_10=$_POST["Maxi_1_10"];
        $obt_1_10=$_POST["Obt_1_10"];
        $mon_1_10=$_POST["Mon_1_10"];
        $year_1_10=$_POST["Year_1_10"];


        $stmt2 = $conn->prepare("UPDATE college_sem_1
        SET sub_1_1= ?,cat_1_1= ?,maxi_1_1= ?,obt_1_1= ?,mon_1_1= ?,year_1_1= ?,
        sub_1_2= ?,cat_1_2= ?,maxi_1_2= ?,obt_1_2= ?,mon_1_2= ?,year_1_2= ?,
        sub_1_3= ?,cat_1_3= ?,maxi_1_3= ?,obt_1_3= ?,mon_1_3= ?,year_1_3= ?,
        sub_1_4= ?,cat_1_4= ?,maxi_1_4= ?,obt_1_4= ?,mon_1_4= ?,year_1_4= ?,
        sub_1_5= ?,cat_1_5= ?,maxi_1_5= ?,obt_1_5= ?,mon_1_5= ?,year_1_5= ?,
        sub_1_6= ?,cat_1_6= ?,maxi_1_6= ?,obt_1_6= ?,mon_1_6= ?,year_1_6= ?,
        sub_1_7= ?,cat_1_7= ?,maxi_1_7= ?,obt_1_7= ?,mon_1_7= ?,year_1_7= ?,
        sub_1_8= ?,cat_1_8= ?,maxi_1_8= ?,obt_1_8= ?,mon_1_8= ?,year_1_8= ?,
        sub_1_9= ?,cat_1_9= ?,maxi_1_9= ?,obt_1_9= ?,mon_1_9= ?,year_1_9= ?,
        sub_1_10= ?,cat_1_10= ?,maxi_1_10= ?,obt_1_10= ?,mon_1_10= ?,year_1_10= ?
        
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt2->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $sub_1_1,$cat_1_1,$maxi_1_1,$obt_1_1,$mon_1_1,$year_1_1,
        $sub_1_2,$cat_1_2,$maxi_1_2,$obt_1_2,$mon_1_2,$year_1_2,
        $sub_1_3,$cat_1_3,$maxi_1_3,$obt_1_3,$mon_1_3,$year_1_3 ,
        $sub_1_4,$cat_1_4,$maxi_1_4,$obt_1_4,$mon_1_4,$year_1_4 ,
        $sub_1_5,$cat_1_5,$maxi_1_5,$obt_1_5,$mon_1_5,$year_1_5 ,
        $sub_1_6,$cat_1_6,$maxi_1_6,$obt_1_6,$mon_1_6,$year_1_6 ,
        $sub_1_7,$cat_1_7,$maxi_1_7,$obt_1_7,$mon_1_7,$year_1_7 ,
        $sub_1_8,$cat_1_8,$maxi_1_8,$obt_1_8,$mon_1_8,$year_1_8 ,
        $sub_1_9,$cat_1_9,$maxi_1_9,$obt_1_9,$mon_1_9,$year_1_9,
        $sub_1_10,$cat_1_10,$maxi_1_10,$obt_1_10,$mon_1_10,$year_1_10,
        $email);
        $stmt2->execute();

        $sub_2_1=$_POST["Sub_2_1"];
        $cat_2_1=$_POST["Cat_2_1"];
        $maxi_2_1=$_POST["Maxi_2_1"];
        $obt_2_1=$_POST["Obt_2_1"];
        $mon_2_1=$_POST["Mon_2_1"];
        $year_2_1=$_POST["Year_2_1"];

        $sub_2_2=$_POST["Sub_2_2"];
        $cat_2_2=$_POST["Cat_2_2"];
        $maxi_2_2=$_POST["Maxi_2_2"];
        $obt_2_2=$_POST["Obt_2_2"];
        $mon_2_2=$_POST["Mon_2_2"];
        $year_2_2=$_POST["Year_2_2"];

        $sub_2_3=$_POST["Sub_2_3"];
        $cat_2_3=$_POST["Cat_2_3"];
        $maxi_2_3=$_POST["Maxi_2_3"];
        $obt_2_3=$_POST["Obt_2_3"];
        $mon_2_3=$_POST["Mon_2_3"];
        $year_2_3=$_POST["Year_2_3"];

        $sub_2_4=$_POST["Sub_2_4"];
        $cat_2_4=$_POST["Cat_2_4"];
        $maxi_2_4=$_POST["Maxi_2_4"];
        $obt_2_4=$_POST["Obt_2_4"];
        $mon_2_4=$_POST["Mon_2_4"];
        $year_2_4=$_POST["Year_2_4"];

        $sub_2_5=$_POST["Sub_2_5"];
        $cat_2_5=$_POST["Cat_2_5"];
        $maxi_2_5=$_POST["Maxi_2_5"];
        $obt_2_5=$_POST["Obt_2_5"];
        $mon_2_5=$_POST["Mon_2_5"];
        $year_2_5=$_POST["Year_2_5"];

        $sub_2_6=$_POST["Sub_2_6"];
        $cat_2_6=$_POST["Cat_2_6"];
        $maxi_2_6=$_POST["Maxi_2_6"];
        $obt_2_6=$_POST["Obt_2_6"];
        $mon_2_6=$_POST["Mon_2_6"];
        $year_2_6=$_POST["Year_2_6"];

        $sub_2_7=$_POST["Sub_2_7"];
        $cat_2_7=$_POST["Cat_2_7"];
        $maxi_2_7=$_POST["Maxi_2_7"];
        $obt_2_7=$_POST["Obt_2_7"];
        $mon_2_7=$_POST["Mon_2_7"];
        $year_2_7=$_POST["Year_2_7"];

        $sub_2_8=$_POST["Sub_2_8"];
        $cat_2_8=$_POST["Cat_2_8"];
        $maxi_2_8=$_POST["Maxi_2_8"];
        $obt_2_8=$_POST["Obt_2_8"];
        $mon_2_8=$_POST["Mon_2_8"];
        $year_2_8=$_POST["Year_2_8"];

        $sub_2_9=$_POST["Sub_2_9"];
        $cat_2_9=$_POST["Cat_2_9"];
        $maxi_2_9=$_POST["Maxi_2_9"];
        $obt_2_9=$_POST["Obt_2_9"];
        $mon_2_9=$_POST["Mon_2_9"];
        $year_2_9=$_POST["Year_2_9"];

        $sub_2_10=$_POST["Sub_2_10"];
        $cat_2_10=$_POST["Cat_2_10"];
        $maxi_2_10=$_POST["Maxi_2_10"];
        $obt_2_10=$_POST["Obt_2_10"];
        $mon_2_10=$_POST["Mon_2_10"];
        $year_2_10=$_POST["Year_2_10"];


        $stmt3 = $conn->prepare("UPDATE college_sem_2
        SET sub_2_1= ?,cat_2_1= ?,maxi_2_1= ?,obt_2_1= ?,mon_2_1= ?,year_2_1= ?,
        sub_2_2= ?,cat_2_2= ?,maxi_2_2= ?,obt_2_2= ?,mon_2_2= ?,year_2_2= ?,
        sub_2_3= ?,cat_2_3= ?,maxi_2_3= ?,obt_2_3= ?,mon_2_3= ?,year_2_3= ?,
        sub_2_4= ?,cat_2_4= ?,maxi_2_4= ?,obt_2_4= ?,mon_2_4= ?,year_2_4= ?,
        sub_2_5= ?,cat_2_5= ?,maxi_2_5= ?,obt_2_5= ?,mon_2_5= ?,year_2_5= ?,
        sub_2_6= ?,cat_2_6= ?,maxi_2_6= ?,obt_2_6= ?,mon_2_6= ?,year_2_6= ?,
        sub_2_7= ?,cat_2_7= ?,maxi_2_7= ?,obt_2_7= ?,mon_2_7= ?,year_2_7= ?,
        sub_2_8= ?,cat_2_8= ?,maxi_2_8= ?,obt_2_8= ?,mon_2_8= ?,year_2_8= ?,
        sub_2_9= ?,cat_2_9= ?,maxi_2_9= ?,obt_2_9= ?,mon_2_9= ?,year_2_9= ?,
        sub_2_10= ?,cat_2_10= ?,maxi_2_10= ?,obt_2_10= ?,mon_2_10= ?,year_2_10= ?
        
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        "); 

        $stmt3->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $sub_2_1,$cat_2_1,$maxi_2_1,$obt_2_1,$mon_2_1,$year_2_1,
        $sub_2_2,$cat_2_2,$maxi_2_2,$obt_2_2,$mon_2_2,$year_2_2,
        $sub_2_3,$cat_2_3,$maxi_2_3,$obt_2_3,$mon_2_3,$year_2_3 ,
        $sub_2_4,$cat_2_4,$maxi_2_4,$obt_2_4,$mon_2_4,$year_2_4 ,
        $sub_2_5,$cat_2_5,$maxi_2_5,$obt_2_5,$mon_2_5,$year_2_5 ,
        $sub_2_6,$cat_2_6,$maxi_2_6,$obt_2_6,$mon_2_6,$year_2_6 ,
        $sub_2_7,$cat_2_7,$maxi_2_7,$obt_2_7,$mon_2_7,$year_2_7 ,
        $sub_2_8,$cat_2_8,$maxi_2_8,$obt_2_8,$mon_2_8,$year_2_8 ,
        $sub_2_9,$cat_2_9,$maxi_2_9,$obt_2_9,$mon_2_9,$year_2_9,
        $sub_2_10,$cat_2_10,$maxi_2_10,$obt_2_10,$mon_2_10,$year_2_10,
        $email);
        $stmt3->execute(); 

        $sub_3_1=$_POST["Sub_3_1"];
        $cat_3_1=$_POST["Cat_3_1"];
        $maxi_3_1=$_POST["Maxi_3_1"];
        $obt_3_1=$_POST["Obt_3_1"];
        $mon_3_1=$_POST["Mon_3_1"];
        $year_3_1=$_POST["Year_3_1"];

        $sub_3_2=$_POST["Sub_3_2"];
        $cat_3_2=$_POST["Cat_3_2"];
        $maxi_3_2=$_POST["Maxi_3_2"];
        $obt_3_2=$_POST["Obt_3_2"];
        $mon_3_2=$_POST["Mon_3_2"];
        $year_3_2=$_POST["Year_3_2"];

        $sub_3_3=$_POST["Sub_3_3"];
        $cat_3_3=$_POST["Cat_3_3"];
        $maxi_3_3=$_POST["Maxi_3_3"];
        $obt_3_3=$_POST["Obt_3_3"];
        $mon_3_3=$_POST["Mon_3_3"];
        $year_3_3=$_POST["Year_3_3"];

        $sub_3_4=$_POST["Sub_3_4"];
        $cat_3_4=$_POST["Cat_3_4"];
        $maxi_3_4=$_POST["Maxi_3_4"];
        $obt_3_4=$_POST["Obt_3_4"];
        $mon_3_4=$_POST["Mon_3_4"];
        $year_3_4=$_POST["Year_3_4"];

        $sub_3_5=$_POST["Sub_3_5"];
        $cat_3_5=$_POST["Cat_3_5"];
        $maxi_3_5=$_POST["Maxi_3_5"];
        $obt_3_5=$_POST["Obt_3_5"];
        $mon_3_5=$_POST["Mon_3_5"];
        $year_3_5=$_POST["Year_3_5"];

        $sub_3_6=$_POST["Sub_3_6"];
        $cat_3_6=$_POST["Cat_3_6"];
        $maxi_3_6=$_POST["Maxi_3_6"];
        $obt_3_6=$_POST["Obt_3_6"];
        $mon_3_6=$_POST["Mon_3_6"];
        $year_3_6=$_POST["Year_3_6"];

        $sub_3_7=$_POST["Sub_3_7"];
        $cat_3_7=$_POST["Cat_3_7"];
        $maxi_3_7=$_POST["Maxi_3_7"];
        $obt_3_7=$_POST["Obt_3_7"];
        $mon_3_7=$_POST["Mon_3_7"];
        $year_3_7=$_POST["Year_3_7"];

        $sub_3_8=$_POST["Sub_3_8"];
        $cat_3_8=$_POST["Cat_3_8"];
        $maxi_3_8=$_POST["Maxi_3_8"];
        $obt_3_8=$_POST["Obt_3_8"];
        $mon_3_8=$_POST["Mon_3_8"];
        $year_3_8=$_POST["Year_3_8"];

        $sub_3_9=$_POST["Sub_3_9"];
        $cat_3_9=$_POST["Cat_3_9"];
        $maxi_3_9=$_POST["Maxi_3_9"];
        $obt_3_9=$_POST["Obt_3_9"];
        $mon_3_9=$_POST["Mon_3_9"];
        $year_3_9=$_POST["Year_3_9"];

        $sub_3_10=$_POST["Sub_3_10"];
        $cat_3_10=$_POST["Cat_3_10"];
        $maxi_3_10=$_POST["Maxi_3_10"];
        $obt_3_10=$_POST["Obt_3_10"];
        $mon_3_10=$_POST["Mon_3_10"];
        $year_3_10=$_POST["Year_3_10"];


        $stmt4 = $conn->prepare("UPDATE college_sem_3
        SET sub_3_1= ?,cat_3_1= ?,maxi_3_1= ?,obt_3_1= ?,mon_3_1= ?,year_3_1= ?,
        sub_3_2= ?,cat_3_2= ?,maxi_3_2= ?,obt_3_2= ?,mon_3_2= ?,year_3_2= ?,
        sub_3_3= ?,cat_3_3= ?,maxi_3_3= ?,obt_3_3= ?,mon_3_3= ?,year_3_3= ?,
        sub_3_4= ?,cat_3_4= ?,maxi_3_4= ?,obt_3_4= ?,mon_3_4= ?,year_3_4= ?,
        sub_3_5= ?,cat_3_5= ?,maxi_3_5= ?,obt_3_5= ?,mon_3_5= ?,year_3_5= ?,
        sub_3_6= ?,cat_3_6= ?,maxi_3_6= ?,obt_3_6= ?,mon_3_6= ?,year_3_6= ?,
        sub_3_7= ?,cat_3_7= ?,maxi_3_7= ?,obt_3_7= ?,mon_3_7= ?,year_3_7= ?,
        sub_3_8= ?,cat_3_8= ?,maxi_3_8= ?,obt_3_8= ?,mon_3_8= ?,year_3_8= ?,
        sub_3_9= ?,cat_3_9= ?,maxi_3_9= ?,obt_3_9= ?,mon_3_9= ?,year_3_9= ?,
        sub_3_10= ?,cat_3_10= ?,maxi_3_10= ?,obt_3_10= ?,mon_3_10= ?,year_3_10= ?
        
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt4->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $sub_3_1,$cat_3_1,$maxi_3_1,$obt_3_1,$mon_3_1,$year_3_1,
        $sub_3_2,$cat_3_2,$maxi_3_2,$obt_3_2,$mon_3_2,$year_3_2,
        $sub_3_3,$cat_3_3,$maxi_3_3,$obt_3_3,$mon_3_3,$year_3_3,
        $sub_3_4,$cat_3_4,$maxi_3_4,$obt_3_4,$mon_3_4,$year_3_4,
        $sub_3_5,$cat_3_5,$maxi_3_5,$obt_3_5,$mon_3_5,$year_3_5,
        $sub_3_6,$cat_3_6,$maxi_3_6,$obt_3_6,$mon_3_6,$year_3_6,
        $sub_3_7,$cat_3_7,$maxi_3_7,$obt_3_7,$mon_3_7,$year_3_7,
        $sub_3_8,$cat_3_8,$maxi_3_8,$obt_3_8,$mon_3_8,$year_3_8,
        $sub_3_9,$cat_3_9,$maxi_3_9,$obt_3_9,$mon_3_9,$year_3_9,
        $sub_3_10,$cat_3_10,$maxi_3_10,$obt_3_10,$mon_3_10,$year_3_10,
        $email);

        $stmt4->execute();

        // Semester 4
        $sub_4_1 = $_POST["Sub_4_1"];
        $cat_4_1 = $_POST["Cat_4_1"];
        $maxi_4_1 = $_POST["Maxi_4_1"];
        $obt_4_1 = $_POST["Obt_4_1"];
        $mon_4_1 = $_POST["Mon_4_1"];
        $year_4_1 = $_POST["Year_4_1"];

        $sub_4_2 = $_POST["Sub_4_2"];
        $cat_4_2 = $_POST["Cat_4_2"];
        $maxi_4_2 = $_POST["Maxi_4_2"];
        $obt_4_2 = $_POST["Obt_4_2"];
        $mon_4_2 = $_POST["Mon_4_2"];
        $year_4_2 = $_POST["Year_4_2"];

        $sub_4_3 = $_POST["Sub_4_3"];
        $cat_4_3 = $_POST["Cat_4_3"];
        $maxi_4_3 = $_POST["Maxi_4_3"];
        $obt_4_3 = $_POST["Obt_4_3"];
        $mon_4_3 = $_POST["Mon_4_3"];
        $year_4_3 = $_POST["Year_4_3"];

        $sub_4_4 = $_POST["Sub_4_4"];
        $cat_4_4 = $_POST["Cat_4_4"];
        $maxi_4_4 = $_POST["Maxi_4_4"];
        $obt_4_4 = $_POST["Obt_4_4"];
        $mon_4_4 = $_POST["Mon_4_4"];
        $year_4_4 = $_POST["Year_4_4"];

        $sub_4_5 = $_POST["Sub_4_5"];
        $cat_4_5 = $_POST["Cat_4_5"];
        $maxi_4_5 = $_POST["Maxi_4_5"];
        $obt_4_5 = $_POST["Obt_4_5"];
        $mon_4_5 = $_POST["Mon_4_5"];
        $year_4_5 = $_POST["Year_4_5"];

        $sub_4_6 = $_POST["Sub_4_6"];
        $cat_4_6 = $_POST["Cat_4_6"];
        $maxi_4_6 = $_POST["Maxi_4_6"];
        $obt_4_6 = $_POST["Obt_4_6"];
        $mon_4_6 = $_POST["Mon_4_6"];
        $year_4_6 = $_POST["Year_4_6"];

        $sub_4_7 = $_POST["Sub_4_7"];
        $cat_4_7 = $_POST["Cat_4_7"];
        $maxi_4_7 = $_POST["Maxi_4_7"];
        $obt_4_7 = $_POST["Obt_4_7"];
        $mon_4_7 = $_POST["Mon_4_7"];
        $year_4_7 = $_POST["Year_4_7"];

        $sub_4_8 = $_POST["Sub_4_8"];
        $cat_4_8 = $_POST["Cat_4_8"];
        $maxi_4_8 = $_POST["Maxi_4_8"];
        $obt_4_8 = $_POST["Obt_4_8"];
        $mon_4_8 = $_POST["Mon_4_8"];
        $year_4_8 = $_POST["Year_4_8"];

        $sub_4_9 = $_POST["Sub_4_9"];
        $cat_4_9 = $_POST["Cat_4_9"];
        $maxi_4_9 = $_POST["Maxi_4_9"];
        $obt_4_9 = $_POST["Obt_4_9"];
        $mon_4_9 = $_POST["Mon_4_9"];
        $year_4_9 = $_POST["Year_4_9"];

        $sub_4_10 = $_POST["Sub_4_10"];
        $cat_4_10 = $_POST["Cat_4_10"];
        $maxi_4_10 = $_POST["Maxi_4_10"];
        $obt_4_10 = $_POST["Obt_4_10"];
        $mon_4_10 = $_POST["Mon_4_10"];
        $year_4_10 = $_POST["Year_4_10"];

        $stmt5 = $conn->prepare("UPDATE college_sem_4
        SET sub_4_1= ?,cat_4_1= ?,maxi_4_1= ?,obt_4_1= ?,mon_4_1= ?,year_4_1= ?,
        sub_4_2= ?,cat_4_2= ?,maxi_4_2= ?,obt_4_2= ?,mon_4_2= ?,year_4_2= ?,
        sub_4_3= ?,cat_4_3= ?,maxi_4_3= ?,obt_4_3= ?,mon_4_3= ?,year_4_3= ?,
        sub_4_4= ?,cat_4_4= ?,maxi_4_4= ?,obt_4_4= ?,mon_4_4= ?,year_4_4= ?,
        sub_4_5= ?,cat_4_5= ?,maxi_4_5= ?,obt_4_5= ?,mon_4_5= ?,year_4_5= ?,
        sub_4_6= ?,cat_4_6= ?,maxi_4_6= ?,obt_4_6= ?,mon_4_6= ?,year_4_6= ?,
        sub_4_7= ?,cat_4_7= ?,maxi_4_7= ?,obt_4_7= ?,mon_4_7= ?,year_4_7= ?,
        sub_4_8= ?,cat_4_8= ?,maxi_4_8= ?,obt_4_8= ?,mon_4_8= ?,year_4_8= ?,
        sub_4_9= ?,cat_4_9= ?,maxi_4_9= ?,obt_4_9= ?,mon_4_9= ?,year_4_9= ?,
        sub_4_10= ?,cat_4_10= ?,maxi_4_10= ?,obt_4_10= ?,mon_4_10= ?,year_4_10= ?
        
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt5->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $sub_4_1,$cat_4_1,$maxi_4_1,$obt_4_1,$mon_4_1,$year_4_1,
        $sub_4_2,$cat_4_2,$maxi_4_2,$obt_4_2,$mon_4_2,$year_4_2,
        $sub_4_3,$cat_4_3,$maxi_4_3,$obt_4_3,$mon_4_3,$year_4_3,
        $sub_4_4,$cat_4_4,$maxi_4_4,$obt_4_4,$mon_4_4,$year_4_4,
        $sub_4_5,$cat_4_5,$maxi_4_5,$obt_4_5,$mon_4_5,$year_4_5,
        $sub_4_6,$cat_4_6,$maxi_4_6,$obt_4_6,$mon_4_6,$year_4_6,
        $sub_4_7,$cat_4_7,$maxi_4_7,$obt_4_7,$mon_4_7,$year_4_7,
        $sub_4_8,$cat_4_8,$maxi_4_8,$obt_4_8,$mon_4_8,$year_4_8,
        $sub_4_9,$cat_4_9,$maxi_4_9,$obt_4_9,$mon_4_9,$year_4_9,
        $sub_4_10,$cat_4_10,$maxi_4_10,$obt_4_10,$mon_4_10,$year_4_10,
        $email);
        $stmt5->execute();

        $sub_5_1 = $_POST["Sub_5_1"];
        $cat_5_1 = $_POST["Cat_5_1"];
        $maxi_5_1 = $_POST["Maxi_5_1"];
        $obt_5_1 = $_POST["Obt_5_1"];
        $mon_5_1 = $_POST["Mon_5_1"];
        $year_5_1 = $_POST["Year_5_1"];

        $sub_5_2 = $_POST["Sub_5_2"];
        $cat_5_2 = $_POST["Cat_5_2"];
        $maxi_5_2 = $_POST["Maxi_5_2"];
        $obt_5_2 = $_POST["Obt_5_2"];
        $mon_5_2 = $_POST["Mon_5_2"];
        $year_5_2 = $_POST["Year_5_2"];

        $sub_5_3 = $_POST["Sub_5_3"];
        $cat_5_3 = $_POST["Cat_5_3"];
        $maxi_5_3 = $_POST["Maxi_5_3"];
        $obt_5_3 = $_POST["Obt_5_3"];
        $mon_5_3 = $_POST["Mon_5_3"];
        $year_5_3 = $_POST["Year_5_3"];

        $sub_5_4 = $_POST["Sub_5_4"];
        $cat_5_4 = $_POST["Cat_5_4"];
        $maxi_5_4 = $_POST["Maxi_5_4"];
        $obt_5_4 = $_POST["Obt_5_4"];
        $mon_5_4 = $_POST["Mon_5_4"];
        $year_5_4 = $_POST["Year_5_4"];

        $sub_5_5 = $_POST["Sub_5_5"];
        $cat_5_5 = $_POST["Cat_5_5"];
        $maxi_5_5 = $_POST["Maxi_5_5"];
        $obt_5_5 = $_POST["Obt_5_5"];
        $mon_5_5 = $_POST["Mon_5_5"];
        $year_5_5 = $_POST["Year_5_5"];

        $sub_5_6 = $_POST["Sub_5_6"];
        $cat_5_6 = $_POST["Cat_5_6"];
        $maxi_5_6 = $_POST["Maxi_5_6"];
        $obt_5_6 = $_POST["Obt_5_6"];
        $mon_5_6 = $_POST["Mon_5_6"];
        $year_5_6 = $_POST["Year_5_6"];

        $sub_5_7 = $_POST["Sub_5_7"];
        $cat_5_7 = $_POST["Cat_5_7"];
        $maxi_5_7 = $_POST["Maxi_5_7"];
        $obt_5_7 = $_POST["Obt_5_7"];
        $mon_5_7 = $_POST["Mon_5_7"];
        $year_5_7 = $_POST["Year_5_7"];

        $sub_5_8 = $_POST["Sub_5_8"];
        $cat_5_8 = $_POST["Cat_5_8"];
        $maxi_5_8 = $_POST["Maxi_5_8"];
        $obt_5_8 = $_POST["Obt_5_8"];
        $mon_5_8 = $_POST["Mon_5_8"];
        $year_5_8 = $_POST["Year_5_8"];

        $sub_5_9 = $_POST["Sub_5_9"];
        $cat_5_9 = $_POST["Cat_5_9"];
        $maxi_5_9 = $_POST["Maxi_5_9"];
        $obt_5_9 = $_POST["Obt_5_9"];
        $mon_5_9 = $_POST["Mon_5_9"];
        $year_5_9 = $_POST["Year_5_9"];

        $sub_5_10 = $_POST["Sub_5_10"];
        $cat_5_10 = $_POST["Cat_5_10"];
        $maxi_5_10 = $_POST["Maxi_5_10"];
        $obt_5_10 = $_POST["Obt_5_10"];
        $mon_5_10 = $_POST["Mon_5_10"];
        $year_5_10 = $_POST["Year_5_10"];

        $stmt6 = $conn->prepare("UPDATE college_sem_5
        SET sub_5_1= ?,cat_5_1= ?,maxi_5_1= ?,obt_5_1= ?,mon_5_1= ?,year_5_1= ?,
        sub_5_2= ?,cat_5_2= ?,maxi_5_2= ?,obt_5_2= ?,mon_5_2= ?,year_5_2= ?,
        sub_5_3= ?,cat_5_3= ?,maxi_5_3= ?,obt_5_3= ?,mon_5_3= ?,year_5_3= ?,
        sub_5_4= ?,cat_5_4= ?,maxi_5_4= ?,obt_5_4= ?,mon_5_4= ?,year_5_4= ?,
        sub_5_5= ?,cat_5_5= ?,maxi_5_5= ?,obt_5_5= ?,mon_5_5= ?,year_5_5= ?,
        sub_5_6= ?,cat_5_6= ?,maxi_5_6= ?,obt_5_6= ?,mon_5_6= ?,year_5_6= ?,
        sub_5_7= ?,cat_5_7= ?,maxi_5_7= ?,obt_5_7= ?,mon_5_7= ?,year_5_7= ?,
        sub_5_8= ?,cat_5_8= ?,maxi_5_8= ?,obt_5_8= ?,mon_5_8= ?,year_5_8= ?,
        sub_5_9= ?,cat_5_9= ?,maxi_5_9= ?,obt_5_9= ?,mon_5_9= ?,year_5_9= ?,
        sub_5_10= ?,cat_5_10= ?,maxi_5_10= ?,obt_5_10= ?,mon_5_10= ?,year_5_10= ?
        
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt6->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $sub_5_1, $cat_5_1, $maxi_5_1, $obt_5_1, $mon_5_1, $year_5_1,
        $sub_5_2, $cat_5_2, $maxi_5_2, $obt_5_2, $mon_5_2, $year_5_2,
        $sub_5_3, $cat_5_3, $maxi_5_3, $obt_5_3, $mon_5_3, $year_5_3,
        $sub_5_4, $cat_5_4, $maxi_5_4, $obt_5_4, $mon_5_4, $year_5_4,
        $sub_5_5, $cat_5_5, $maxi_5_5, $obt_5_5, $mon_5_5, $year_5_5,
        $sub_5_6, $cat_5_6, $maxi_5_6, $obt_5_6, $mon_5_6, $year_5_6,
        $sub_5_7, $cat_5_7, $maxi_5_7, $obt_5_7, $mon_5_7, $year_5_7,
        $sub_5_8, $cat_5_8, $maxi_5_8, $obt_5_8, $mon_5_8, $year_5_8,
        $sub_5_9, $cat_5_9, $maxi_5_9, $obt_5_9, $mon_5_9, $year_5_9,
        $sub_5_10, $cat_5_10, $maxi_5_10, $obt_5_10, $mon_5_10, $year_5_10,
        $email);
        $stmt6->execute();

        // Semester 6
        $sub_6_1 = $_POST["Sub_6_1"];
        $cat_6_1 = $_POST["Cat_6_1"];
        $maxi_6_1 = $_POST["Maxi_6_1"];
        $obt_6_1 = $_POST["Obt_6_1"];
        $mon_6_1 = $_POST["Mon_6_1"];
        $year_6_1 = $_POST["Year_6_1"];

        $sub_6_2 = $_POST["Sub_6_2"];
        $cat_6_2 = $_POST["Cat_6_2"];
        $maxi_6_2 = $_POST["Maxi_6_2"];
        $obt_6_2 = $_POST["Obt_6_2"];
        $mon_6_2 = $_POST["Mon_6_2"];
        $year_6_2 = $_POST["Year_6_2"];

        $sub_6_3 = $_POST["Sub_6_3"];
        $cat_6_3 = $_POST["Cat_6_3"];
        $maxi_6_3 = $_POST["Maxi_6_3"];
        $obt_6_3 = $_POST["Obt_6_3"];
        $mon_6_3 = $_POST["Mon_6_3"];
        $year_6_3 = $_POST["Year_6_3"];

        $sub_6_4 = $_POST["Sub_6_4"];
        $cat_6_4 = $_POST["Cat_6_4"];
        $maxi_6_4 = $_POST["Maxi_6_4"];
        $obt_6_4 = $_POST["Obt_6_4"];
        $mon_6_4 = $_POST["Mon_6_4"];
        $year_6_4 = $_POST["Year_6_4"];

        $sub_6_5 = $_POST["Sub_6_5"];
        $cat_6_5 = $_POST["Cat_6_5"];
        $maxi_6_5 = $_POST["Maxi_6_5"];
        $obt_6_5 = $_POST["Obt_6_5"];
        $mon_6_5 = $_POST["Mon_6_5"];
        $year_6_5 = $_POST["Year_6_5"];

        $sub_6_6 = $_POST["Sub_6_6"];
        $cat_6_6 = $_POST["Cat_6_6"];
        $maxi_6_6 = $_POST["Maxi_6_6"];
        $obt_6_6 = $_POST["Obt_6_6"];
        $mon_6_6 = $_POST["Mon_6_6"];
        $year_6_6 = $_POST["Year_6_6"];

        $sub_6_7 = $_POST["Sub_6_7"];
        $cat_6_7 = $_POST["Cat_6_7"];
        $maxi_6_7 = $_POST["Maxi_6_7"];
        $obt_6_7 = $_POST["Obt_6_7"];
        $mon_6_7 = $_POST["Mon_6_7"];
        $year_6_7 = $_POST["Year_6_7"];

        $sub_6_8 = $_POST["Sub_6_8"];
        $cat_6_8 = $_POST["Cat_6_8"];
        $maxi_6_8 = $_POST["Maxi_6_8"];
        $obt_6_8 = $_POST["Obt_6_8"];
        $mon_6_8 = $_POST["Mon_6_8"];
        $year_6_8 = $_POST["Year_6_8"];

        $sub_6_9 = $_POST["Sub_6_9"];
        $cat_6_9 = $_POST["Cat_6_9"];
        $maxi_6_9 = $_POST["Maxi_6_9"];
        $obt_6_9 = $_POST["Obt_6_9"];
        $mon_6_9 = $_POST["Mon_6_9"];
        $year_6_9 = $_POST["Year_6_9"];

        $sub_6_10 = $_POST["Sub_6_10"];
        $cat_6_10 = $_POST["Cat_6_10"];
        $maxi_6_10 = $_POST["Maxi_6_10"];
        $obt_6_10 = $_POST["Obt_6_10"];
        $mon_6_10 = $_POST["Mon_6_10"];
        $year_6_10 = $_POST["Year_6_10"];

        $stmt7 = $conn->prepare("UPDATE college_sem_6
        SET sub_6_1= ?,cat_6_1= ?,maxi_6_1= ?,obt_6_1= ?,mon_6_1= ?,year_6_1= ?,
        sub_6_2= ?,cat_6_2= ?,maxi_6_2= ?,obt_6_2= ?,mon_6_2= ?,year_6_2= ?,
        sub_6_3= ?,cat_6_3= ?,maxi_6_3= ?,obt_6_3= ?,mon_6_3= ?,year_6_3= ?,
        sub_6_4= ?,cat_6_4= ?,maxi_6_4= ?,obt_6_4= ?,mon_6_4= ?,year_6_4= ?,
        sub_6_5= ?,cat_6_5= ?,maxi_6_5= ?,obt_6_5= ?,mon_6_5= ?,year_6_5= ?,
        sub_6_6= ?,cat_6_6= ?,maxi_6_6= ?,obt_6_6= ?,mon_6_6= ?,year_6_6= ?,
        sub_6_7= ?,cat_6_7= ?,maxi_6_7= ?,obt_6_7= ?,mon_6_7= ?,year_6_7= ?,
        sub_6_8= ?,cat_6_8= ?,maxi_6_8= ?,obt_6_8= ?,mon_6_8= ?,year_6_8= ?,
        sub_6_9= ?,cat_6_9= ?,maxi_6_9= ?,obt_6_9= ?,mon_6_9= ?,year_6_9= ?,
        sub_6_10= ?,cat_6_10= ?,maxi_6_10= ?,obt_6_10= ?,mon_6_10= ?,year_6_10= ?
        
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt7->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $sub_6_1, $cat_6_1, $maxi_6_1, $obt_6_1, $mon_6_1, $year_6_1,
        $sub_6_2, $cat_6_2, $maxi_6_2, $obt_6_2, $mon_6_2, $year_6_2,
        $sub_6_3, $cat_6_3, $maxi_6_3, $obt_6_3, $mon_6_3, $year_6_3,
        $sub_6_4, $cat_6_4, $maxi_6_4, $obt_6_4, $mon_6_4, $year_6_4,
        $sub_6_5, $cat_6_5, $maxi_6_5, $obt_6_5, $mon_6_5, $year_6_5,
        $sub_6_6, $cat_6_6, $maxi_6_6, $obt_6_6, $mon_6_6, $year_6_6,
        $sub_6_7, $cat_6_7, $maxi_6_7, $obt_6_7, $mon_6_7, $year_6_7,
        $sub_6_8, $cat_6_8, $maxi_6_8, $obt_6_8, $mon_6_8, $year_6_8,
        $sub_6_9, $cat_6_9, $maxi_6_9, $obt_6_9, $mon_6_9, $year_6_9,
        $sub_6_10, $cat_6_10, $maxi_6_10, $obt_6_10, $mon_6_10, $year_6_10,
        $email);
        $stmt7->execute();

        $sub_7_1 = $_POST["Sub_7_1"];
        $cat_7_1 = $_POST["Cat_7_1"];
        $maxi_7_1 = $_POST["Maxi_7_1"];
        $obt_7_1 = $_POST["Obt_7_1"];
        $mon_7_1 = $_POST["Mon_7_1"];
        $year_7_1 = $_POST["Year_7_1"];

        $sub_7_2 = $_POST["Sub_7_2"];
        $cat_7_2 = $_POST["Cat_7_2"];
        $maxi_7_2 = $_POST["Maxi_7_2"];
        $obt_7_2 = $_POST["Obt_7_2"];
        $mon_7_2 = $_POST["Mon_7_2"];
        $year_7_2 = $_POST["Year_7_2"];

        $sub_7_3 = $_POST["Sub_7_3"];
        $cat_7_3 = $_POST["Cat_7_3"];
        $maxi_7_3 = $_POST["Maxi_7_3"];
        $obt_7_3 = $_POST["Obt_7_3"];
        $mon_7_3 = $_POST["Mon_7_3"];
        $year_7_3 = $_POST["Year_7_3"];

        $sub_7_4 = $_POST["Sub_7_4"];
        $cat_7_4 = $_POST["Cat_7_4"];
        $maxi_7_4 = $_POST["Maxi_7_4"];
        $obt_7_4 = $_POST["Obt_7_4"];
        $mon_7_4 = $_POST["Mon_7_4"];
        $year_7_4 = $_POST["Year_7_4"];

        $sub_7_5 = $_POST["Sub_7_5"];
        $cat_7_5 = $_POST["Cat_7_5"];
        $maxi_7_5 = $_POST["Maxi_7_5"];
        $obt_7_5 = $_POST["Obt_7_5"];
        $mon_7_5 = $_POST["Mon_7_5"];
        $year_7_5 = $_POST["Year_7_5"];

        $sub_7_6 = $_POST["Sub_7_6"];
        $cat_7_6 = $_POST["Cat_7_6"];
        $maxi_7_6 = $_POST["Maxi_7_6"];
        $obt_7_6 = $_POST["Obt_7_6"];
        $mon_7_6 = $_POST["Mon_7_6"];
        $year_7_6 = $_POST["Year_7_6"];

        $sub_7_7 = $_POST["Sub_7_7"];
        $cat_7_7 = $_POST["Cat_7_7"];
        $maxi_7_7 = $_POST["Maxi_7_7"];
        $obt_7_7 = $_POST["Obt_7_7"];
        $mon_7_7 = $_POST["Mon_7_7"];
        $year_7_7 = $_POST["Year_7_7"];

        $sub_7_8 = $_POST["Sub_7_8"];
        $cat_7_8 = $_POST["Cat_7_8"];
        $maxi_7_8 = $_POST["Maxi_7_8"];
        $obt_7_8 = $_POST["Obt_7_8"];
        $mon_7_8 = $_POST["Mon_7_8"];
        $year_7_8 = $_POST["Year_7_8"];

        $sub_7_9 = $_POST["Sub_7_9"];
        $cat_7_9 = $_POST["Cat_7_9"];
        $maxi_7_9 = $_POST["Maxi_7_9"];
        $obt_7_9 = $_POST["Obt_7_9"];
        $mon_7_9 = $_POST["Mon_7_9"];
        $year_7_9 = $_POST["Year_7_9"];

        $sub_7_10 = $_POST["Sub_7_10"];
        $cat_7_10 = $_POST["Cat_7_10"];
        $maxi_7_10 = $_POST["Maxi_7_10"];
        $obt_7_10 = $_POST["Obt_7_10"];
        $mon_7_10 = $_POST["Mon_7_10"];
        $year_7_10 = $_POST["Year_7_10"];

        $stmt8 = $conn->prepare("UPDATE college_sem_7
        SET sub_7_1= ?,cat_7_1= ?,maxi_7_1= ?,obt_7_1= ?,mon_7_1= ?,year_7_1= ?,
        sub_7_2= ?,cat_7_2= ?,maxi_7_2= ?,obt_7_2= ?,mon_7_2= ?,year_7_2= ?,
        sub_7_3= ?,cat_7_3= ?,maxi_7_3= ?,obt_7_3= ?,mon_7_3= ?,year_7_3= ?,
        sub_7_4= ?,cat_7_4= ?,maxi_7_4= ?,obt_7_4= ?,mon_7_4= ?,year_7_4= ?,
        sub_7_5= ?,cat_7_5= ?,maxi_7_5= ?,obt_7_5= ?,mon_7_5= ?,year_7_5= ?,
        sub_7_6= ?,cat_7_6= ?,maxi_7_6= ?,obt_7_6= ?,mon_7_6= ?,year_7_6= ?,
        sub_7_7= ?,cat_7_7= ?,maxi_7_7= ?,obt_7_7= ?,mon_7_7= ?,year_7_7= ?,
        sub_7_8= ?,cat_7_8= ?,maxi_7_8= ?,obt_7_8= ?,mon_7_8= ?,year_7_8= ?,
        sub_7_9= ?,cat_7_9= ?,maxi_7_9= ?,obt_7_9= ?,mon_7_9= ?,year_7_9= ?,
        sub_7_10= ?,cat_7_10= ?,maxi_7_10= ?,obt_7_10= ?,mon_7_10= ?,year_7_10= ?
        
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt8->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $sub_7_1, $cat_7_1, $maxi_7_1, $obt_7_1, $mon_7_1, $year_7_1,
        $sub_7_2, $cat_7_2, $maxi_7_2, $obt_7_2, $mon_7_2, $year_7_2,
        $sub_7_3, $cat_7_3, $maxi_7_3, $obt_7_3, $mon_7_3, $year_7_3,
        $sub_7_4, $cat_7_4, $maxi_7_4, $obt_7_4, $mon_7_4, $year_7_4,
        $sub_7_5, $cat_7_5, $maxi_7_5, $obt_7_5, $mon_7_5, $year_7_5,
        $sub_7_6, $cat_7_6, $maxi_7_6, $obt_7_6, $mon_7_6, $year_7_6,
        $sub_7_7, $cat_7_7, $maxi_7_7, $obt_7_7, $mon_7_7, $year_7_7,
        $sub_7_8, $cat_7_8, $maxi_7_8, $obt_7_8, $mon_7_8, $year_7_8,
        $sub_7_9, $cat_7_9, $maxi_7_9, $obt_7_9, $mon_7_9, $year_7_9,
        $sub_7_10, $cat_7_10, $maxi_7_10, $obt_7_10, $mon_7_10, $year_7_10,
        $email);
        $stmt8->execute();

        // Semester 8
        $sub_8_1 = $_POST["Sub_8_1"];
        $cat_8_1 = $_POST["Cat_8_1"];
        $maxi_8_1 = $_POST["Maxi_8_1"];
        $obt_8_1 = $_POST["Obt_8_1"];
        $mon_8_1 = $_POST["Mon_8_1"];
        $year_8_1 = $_POST["Year_8_1"];

        $sub_8_2 = $_POST["Sub_8_2"];
        $cat_8_2 = $_POST["Cat_8_2"];
        $maxi_8_2 = $_POST["Maxi_8_2"];
        $obt_8_2 = $_POST["Obt_8_2"];
        $mon_8_2 = $_POST["Mon_8_2"];
        $year_8_2 = $_POST["Year_8_2"];

        $sub_8_3 = $_POST["Sub_8_3"];
        $cat_8_3 = $_POST["Cat_8_3"];
        $maxi_8_3 = $_POST["Maxi_8_3"];
        $obt_8_3 = $_POST["Obt_8_3"];
        $mon_8_3 = $_POST["Mon_8_3"];
        $year_8_3 = $_POST["Year_8_3"];

        $sub_8_4 = $_POST["Sub_8_4"];
        $cat_8_4 = $_POST["Cat_8_4"];
        $maxi_8_4 = $_POST["Maxi_8_4"];
        $obt_8_4 = $_POST["Obt_8_4"];
        $mon_8_4 = $_POST["Mon_8_4"];
        $year_8_4 = $_POST["Year_8_4"];

        $sub_8_5 = $_POST["Sub_8_5"];
        $cat_8_5 = $_POST["Cat_8_5"];
        $maxi_8_5 = $_POST["Maxi_8_5"];
        $obt_8_5 = $_POST["Obt_8_5"];
        $mon_8_5 = $_POST["Mon_8_5"];
        $year_8_5 = $_POST["Year_8_5"];

        $sub_8_6 = $_POST["Sub_8_6"];
        $cat_8_6 = $_POST["Cat_8_6"];
        $maxi_8_6 = $_POST["Maxi_8_6"];
        $obt_8_6 = $_POST["Obt_8_6"];
        $mon_8_6 = $_POST["Mon_8_6"];
        $year_8_6 = $_POST["Year_8_6"];

        $sub_8_7 = $_POST["Sub_8_7"];
        $cat_8_7 = $_POST["Cat_8_7"];
        $maxi_8_7 = $_POST["Maxi_8_7"];
        $obt_8_7 = $_POST["Obt_8_7"];
        $mon_8_7 = $_POST["Mon_8_7"];
        $year_8_7 = $_POST["Year_8_7"];

        $sub_8_8 = $_POST["Sub_8_8"];
        $cat_8_8 = $_POST["Cat_8_8"];
        $maxi_8_8 = $_POST["Maxi_8_8"];
        $obt_8_8 = $_POST["Obt_8_8"];
        $mon_8_8 = $_POST["Mon_8_8"];
        $year_8_8 = $_POST["Year_8_8"];

        $sub_8_9 = $_POST["Sub_8_9"];
        $cat_8_9 = $_POST["Cat_8_9"];
        $maxi_8_9 = $_POST["Maxi_8_9"];
        $obt_8_9 = $_POST["Obt_8_9"];
        $mon_8_9 = $_POST["Mon_8_9"];
        $year_8_9 = $_POST["Year_8_9"];

        $sub_8_10 = $_POST["Sub_8_10"];
        $cat_8_10 = $_POST["Cat_8_10"];
        $maxi_8_10 = $_POST["Maxi_8_10"];
        $obt_8_10 = $_POST["Obt_8_10"];
        $mon_8_10 = $_POST["Mon_8_10"];
        $year_8_10 = $_POST["Year_8_10"];

        $stmt9 = $conn->prepare("UPDATE college_sem_8
        SET sub_8_1= ?,cat_8_1= ?,maxi_8_1= ?,obt_8_1= ?,mon_8_1= ?,year_8_1= ?,
        sub_8_2= ?,cat_8_2= ?,maxi_8_2= ?,obt_8_2= ?,mon_8_2= ?,year_8_2= ?,
        sub_8_3= ?,cat_8_3= ?,maxi_8_3= ?,obt_8_3= ?,mon_8_3= ?,year_8_3= ?,
        sub_8_4= ?,cat_8_4= ?,maxi_8_4= ?,obt_8_4= ?,mon_8_4= ?,year_8_4= ?,
        sub_8_5= ?,cat_8_5= ?,maxi_8_5= ?,obt_8_5= ?,mon_8_5= ?,year_8_5= ?,
        sub_8_6= ?,cat_8_6= ?,maxi_8_6= ?,obt_8_6= ?,mon_8_6= ?,year_8_6= ?,
        sub_8_7= ?,cat_8_7= ?,maxi_8_7= ?,obt_8_7= ?,mon_8_7= ?,year_8_7= ?,
        sub_8_8= ?,cat_8_8= ?,maxi_8_8= ?,obt_8_8= ?,mon_8_8= ?,year_8_8= ?,
        sub_8_9= ?,cat_8_9= ?,maxi_8_9= ?,obt_8_9= ?,mon_8_9= ?,year_8_9= ?,
        sub_8_10= ?,cat_8_10= ?,maxi_8_10= ?,obt_8_10= ?,mon_8_10= ?,year_8_10= ?
        
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt9->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
        $sub_8_1, $cat_8_1, $maxi_8_1, $obt_8_1, $mon_8_1, $year_8_1,
        $sub_8_2, $cat_8_2, $maxi_8_2, $obt_8_2, $mon_8_2, $year_8_2,
        $sub_8_3, $cat_8_3, $maxi_8_3, $obt_8_3, $mon_8_3, $year_8_3,
        $sub_8_4, $cat_8_4, $maxi_8_4, $obt_8_4, $mon_8_4, $year_8_4,
        $sub_8_5, $cat_8_5, $maxi_8_5, $obt_8_5, $mon_8_5, $year_8_5,
        $sub_8_6, $cat_8_6, $maxi_8_6, $obt_8_6, $mon_8_6, $year_8_6,
        $sub_8_7, $cat_8_7, $maxi_8_7, $obt_8_7, $mon_8_7, $year_8_7,
        $sub_8_8, $cat_8_8, $maxi_8_8, $obt_8_8, $mon_8_8, $year_8_8,
        $sub_8_9, $cat_8_9, $maxi_8_9, $obt_8_9, $mon_8_9, $year_8_9,
        $sub_8_10, $cat_8_10, $maxi_8_10, $obt_8_10, $mon_8_10, $year_8_10,
        $email);
        $stmt9->execute();

        
        $max_mark_disp = $_POST["max_mark_disp"];
        $mark_obt_disp = $_POST["mark_obt_disp"];
        $perc_mark_disp = $_POST["perc_mark_disp"];
        $cls_obt = $_POST["cls_obt"];
        $cgpa = $_POST["cgpa"];
        $grade = $_POST["grade"];


        $stmt10 = $conn->prepare("UPDATE education_result
        SET max_mark_disp= ?,mark_obt_disp= ?,perc_mark_disp= ?,cls_obt=?,cgpa= ?,grade= ?
        WHERE id = (SELECT id FROM registration WHERE e_mail = ?);
        ");

        $stmt10->bind_param("sssssss",
        $max_mark_disp,$mark_obt_disp,$perc_mark_disp,$cls_obt,$cgpa,$grade,
        $email);
        $stmt10->execute();

        echo json_encode(['success' => true,'message' => 'Profile updated successfully ']);
    
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
        $conn->close();
        
    } else {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
    }
}
?>