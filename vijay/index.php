<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <link rel="stylesheet" href="assets/css/index1.css">
    <link rel="stylesheet" href="bootstrap-5.2.3-dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
       
                @media (min-width: 768px) {
        .navbar-toggler {
            display: none;
        }
        }
        
    </style>
</head>
<body>
    <!--Start Header-->
     <div class="header" style='margin-top: 20px;'>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3 col-xl-2  text-center">
                            <img src="assets/images/Periyar_University_logo.png" alt="logo" width="120px" class="imageHandle">
                        </div>
                        <div class="col-6 col-xl-8">
                            <div class="text-primary fw-bold responsive-text-PU text-center" style="font-size: 25px;">PERIYAR UNIVERSITY</div>
                            <div class="fw-bold responsive-text text-center">Salem-636 011, Tamil Nadu, India NAAC with 'A++' Grade - State University NIRF Rank 59</div>
                            <div class="fw-bold responsive-text text-center">NIRF Innovation Band of 11-50</div>
                        </div>
                        <div class="col-3 col-xl-2 text-center">
                            <img src="assets/images/periyar.jpg" alt="periyar" width="120px" class="imageHandle">
                        </div>
                    </div>
                </div>
            </div>
    <!--End Header-->
    <!--Navigation bar-->
    <nav class="navbar navbar-light  bg-opacity-75 border-bottom-0" style="background-color: #000064;">
        <div class="container-fluid">
            <button class="navbar-toggler d-block d-md-none  " style="background-color: white;" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" >
                <span class="navbar-toggler-icon" ></span>
              </button>
              <a class="navbar-brand text-white" href="#" >Student Application</a>
                <div class="dropdown">
                    <button class="dropbtn">
                        <i class="fa-solid fa-user text-white" ></i>
                    </button>
                    
                    <div class="dropdown-content">
                        <a href="#section1">Profile</a>
                        <a href="#section2">Logout</a>
                        
                    </div>
                </div>
        </div>
    </nav> 
      <!--End Navigation bar-->
      <!--Menu Side bar-->
      <!--Mobile Menu-->
      <div class="offcanvas offcanvas-start 
                  d-md-block" 
        tabindex="-1" id="sidebar"style="background-color: #000064;"
        aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title text-white "
                id="sidebarLabel">Menu</h5>
            <button type="button" style="background-color: white;"
                    class="btn-close"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close">
            </button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column navFix" >
               
                <li class="nav-item">
                    <a class="nav-link  text-white"
                    href="Personal.html">
                    <i class="fa-solid fa-user"></i> &emsp;
                        Personal Information
                    </a>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link  text-white"
                    href="education.html"><i class="fa-solid fa-user-graduate"></i> &emsp;
                        Education Details
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-white"
                    href="Certificate.html"><i class="fa-solid fa-cloud-arrow-up"></i> &ensp;
                        Certificate Upload
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-white"
                    href="preview.html"><i class="fa-regular fa-eye"></i> &ensp;
                        Perview Details
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-white"
                    href="#"><i class="fa-solid fa-indian-rupee-sign"></i> &emsp;
                        Payment 
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link  text-white"
                    href="download.html"><i class="fa-solid fa-file-pdf"></i> &emsp;
                        Download Application
                    </a>
                </li>
               
            </ul>
           
        </div>
    </div>
    <!--End Mobile Menu-->
<!--Windows Menu-->
    <div class="container-fluid" style="margin-top: 5px;">
        <div class="row">
            <nav id="sidebarMenu"
                class="col-md-4 col-lg-3 col-xxl-2 d-none 
                        d-md-block  sidebar" style="background-color: #000064;">
                <div class="position-sticky 
                             vh-100" style="background-color: #000064;">
                    <div class="pt-3">
                        <h4 class="offcanvas-title sidebar-heading d-flex 
                                justify-content-between 
                                align-items-center px-3 
                                mt-4 mb-1 text-muted">
                            <span class=" text-white" style="margin-bottom: 15px;">
                                Menu
                            </span>
                        </h4>
                        <ul class="nav flex-column navFix" >
                            
                            <li class="nav-item">
                                <a class="nav-link  text-white"
                                href="Personal.html">
                                <i class="fa-solid fa-user"></i> &emsp;
                                    Personal Information
                                </a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link  text-white"
                                href="education.html"><i class="fa-solid fa-user-graduate"></i>&emsp;
                                    Education Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white"
                                href="Certificate.html"><i class="fa-solid fa-cloud-arrow-up"></i> &ensp;
                                    Certificate Upload
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white"
                                href="preview.html"><i class="fa-regular fa-eye"></i> &ensp;
                                    Perview Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white"
                                href="#"><i class="fa-solid fa-indian-rupee-sign"></i></i> &emsp;
                                    Payment
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link  text-white"
                                href="download.html"><i class="fa-solid fa-file-pdf"></i> &emsp;
                                    Download Application
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4 ">
            
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-color text-center" style="color: #000064;">Personal Information</h2><br>

                            <form id="application-form">
                                <div class=" row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                    
                                    <h6>Programme Applied:<span style="color: red;">*</span></h6>
                                        <select id="programme-applied" name="programme-applied" class="form-control">
                                            <option value="">Select Programme Applied</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                    
                                    <h6>Select Programme:<span style="color: red;">*</span></h6>
                                        <select id="select-programme" name="select-programme" class="form-control">
                                            <option value="">Select Programme</option>
                                            
                                        </select>
                                    
                                     </div>
                             
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Name of Applicant:<span style="color: red;">*</span></h6>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Date of Birth:<span style="color: red;">*</span></h6>
                                        <input type="date" id="dob" name="dob" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Name of Father:<span style="color: red;">*</span></h6>
                                        <input type="text" id="father-name" name="father-name" class="form-control">
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                            <h6>Name of Mother:<span style="color: red;">*</span></h6>
                                            <input type="text" id="mother-name" name="mother-name" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Name of Guardian:</h6>
                                        <input type="text" id="guardian-name" name="guardian-name" class="form-control">
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                         <h6>Father's Occupation:<span style="color: red;">*</span></h6>
                                         <input type="text" id="father-occupation" name="father-occupation" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Mother's Occupation:<span style="color: red;">*</span></h6>
                                        <input type="text" id="mother-occupation" name="mother-occupation" class="form-control">
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Gender:<span style="color: red;">*</span></h6>
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Mother Tongue:<span style="color: red;">*</span></h6>
                                        <select id="mother-tongue" name="mother-tongue" class="form-control">
                                            <option value="OTHERS">OTHERS</option>
                                            <option value=" DSKJH"> DSKJH</option>
                                            <option value="ARABIC AND ENGLISH">ARABIC AND ENGLISH</option>
                                            <option value="ASSAMESE">ASSAMESE</option>
                                            <option value="BADAGA">BADAGA</option>
                                            <option value="BENGALI">BENGALI</option>
                                            <option value="ENGLISH">ENGLISH</option>
                                            <option value="HINDI">HINDI</option>
                                            <option value="KANNADA">KANNADA</option>
                                            <option value="LAMBADI">LAMBADI</option>
                                            <option value="MALAYALAM">MALAYALAM</option>
                                            <option value="MARATHI">MARATHI</option>
                                            <option value="MARWARI">MARWARI</option>
                                            <option value="MIZO">MIZO</option>
                                            <option value="NEPALI">NEPALI</option>
                                            <option value="NILL">NILL</option>
                                            <option value="ODIA ">ODIA </option>
                                            <option value="PAITE">PAITE</option>
                                            <option value="SOURASTRA">SOURASTRA</option>
                                            <option value="SOWRASHTRA">SOWRASHTRA</option>
                                            <option value="SOWRASTRA">SOWRASTRA</option>
                                            <option value="TAMIL">TAMIL</option>
                                            <option value="TELUGU">TELUGU</option>
                                            <option value="URDHU">URDHU</option>
                                            <option value="URDU">URDU</option>
                                            <option value="YJXV2XESYVP2JW3AQOJ">YJXV2XESYVP2JW3AQOJ</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                            <h6>Nationality:<span style="color: red;">*</span></h6>
                                            <select id="nationality" name="nationality" class="form-control">
                                            <option value="OTHERS">OTHERS</option>
                                            <option value="INDIA">INDIA</option>
                                            <option value="AFGHANISTAN">AFGHANISTAN</option>
                                            <option value="BANGLADESH">BANGLADESH</option>
                                            <option value="BHUTAN">BHUTAN</option>
                                            <option value="CONGOLESE">CONGOLESE</option>
                                            <option value="DRC">DRC</option>
                                            <option value="INDIAN">INDIAN</option>
                                            <option value="INDONESIA">INDONESIA</option>
                                            <option value="J KG">J KG</option>
                                            <option value="KENYAN">KENYAN</option>
                                            <option value="MALDIVES">MALDIVES</option>
                                            <option value="NEPAL">NEPAL</option>
                                            <option value="NEPALI">NEPALI</option>
                                            <option value="NILL">NILL</option>
                                            <option value="NRI">NRI</option>
                                            <option value="PAKISTAN">PAKISTAN</option>
                                            <option value="RWANDA">RWANDA</option>
                                            <option value="SRI LANKA">SRI LANKA</option>
                                            <option value="SRILANKA">SRILANKA</option>
                                            <option value="SRILANKAN">SRILANKAN</option>
                                            <option value="SRILANKAN REFUGEE">SRILANKAN REFUGEE</option>
                                            <option value="ULI1KACCSC0ZS66VOVMT">ULI1KACCSC0ZS66VOVMT</option>
                                            <option value="USA">USA</option>
                                            <option value="YEMEN">YEMEN</option>
                                            <option value="ZAMBIA">ZAMBIA</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Religion:<span style="color: red;">*</span></h6>
                                            <select id="religion" name="religion" class="form-control">
                                              <option value="OTHERS">OTHERS</option>
                                              <option value="HINDU">HINDU</option>
                                              <option value=" FKJGND"> FKJGND</option>
                                              <option value=" GOUNDAR"> GOUNDAR</option>
                                              <option value="AGNOSTIC">AGNOSTIC</option>
                                              <option value="ARUNDHATHIYAR">ARUNDHATHIYAR</option>
                                              <option value="BC">BC</option>
                                              <option value="BC MUSLIM">BC MUSLIM</option>
                                              <option value="BHUDDIST">BHUDDIST</option>
                                              <option value="BRAHMIN">BRAHMIN</option>
                                              <option value="CATHOLIC">CATHOLIC</option>
                                              <option value="CHRISTIAN">CHRISTIAN</option>
                                              <option value="CONVERTED CHRISTIAN">CONVERTED CHRISTIAN</option>
                                              <option value="DNC">DNC</option>
                                              <option value="HIDHU">HIDHU</option>
                                              <option value="HIDU">HIDU</option>
                                              <option value="HINDHU">HINDHU</option>
                                              <option value="HINDU  KARUNEEGAR">HINDU  KARUNEEGAR</option>
                                              <option value="HUNDH">HUNDH</option>
                                              <option value="HUNDU">HUNDU</option>
                                              <option value="INDIA">INDIA</option>
                                              <option value="INDIAN">INDIAN</option>
                                              <option value="ISLAM">ISLAM</option>
                                              <option value="JAIN">JAIN</option>
                                              <option value="JAINS">JAINS</option>
                                              <option value="LATIN CATHOLIC">LATIN CATHOLIC</option>
                                              <option value="MARATHA NON BRAHMIN">MARATHA NON BRAHMIN</option>
                                              <option value="MBC">MBC</option>
                                              <option value="MUSLIM">MUSLIM</option>
                                              <option value="MUSLIM LEBBAI">MUSLIM LEBBAI</option>
                                              <option value="MUSLIM LUBBI">MUSLIM LUBBI</option>
                                              <option value="NATTU GOUNDAR">NATTU GOUNDAR</option>
                                              <option value="NILL">NILL</option>
                                              <option value="OC">OC</option>
                                              <option value="OTHER RELIGION">OTHER RELIGION</option>
                                              <option value="PADAYATCHI GOUNDER">PADAYATCHI GOUNDER</option>
                                              <option value="PARAG6XKVTGW">PARAG6XKVTGW</option>
                                              <option value="QUATOLIC">QUATOLIC</option>
                                              <option value="ROMAN CATHOLIC">ROMAN CATHOLIC</option>
                                              <option value="SC">SC</option>
                                              <option value="SIKHS">SIKHS</option>
                                              <option value="SINGH">SINGH</option>
                                              <option value="SOZHIYA CHETTI">SOZHIYA CHETTI</option>
                                              <option value="SRILANKAN REFUGEE">SRILANKAN REFUGEE</option>
                                              <option value="THULUVA VELLALA">THULUVA VELLALA</option>
                                              <option value="VANNIYAR">VANNIYAR</option>
                                              <option value="VISHWAKARMA">VISHWAKARMA</option>
                                            </select>
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                    <h6>Community:<span style="color: red;">*</span></h6>
                                        <select id="community" name="community" class="form-control">
                                            <option value="">Select</option>
                                            <option value="1">OC</option>
                                            <option value="2">BC</option>
                                            <option value="3">BC(Muslim)</option>
                                            <option value="5">DNC</option>
                                            <option value="4">MBC</option>
                                            <option value="7">SC</option>
                                            <option value="8">SC(A)</option>
                                            <option value="9">ST</option>
                                        </select><br/>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Email ID:<span style="color: red;">*</span></h>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Aadhar Number:<span style="color: red;">*</span></h6>
                                        <input type="text" id="aadhar" name="aadhar" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>ABC ID:<span style="color: red;">*</span></h6>
                                        <input type="text" id="abc" name="abc" class="form-control">
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Telephone Number:<span style="color: red;">*</span></h6>
                                        <input type="tel" id="telephone" name="telephone" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Mobile Number:<span style="color: red;">*</span></h6>
                                        <div class="col-9 d-flex">
                                            <select id="countryCode" name="countryCode" class="form-control" style="width: 100px;">
                                                <option value="+1">+1 (USA)</option>
                                                <option value="+7">+7 (Russia)</option>
                                                <option value="+20">+20 (Egypt)</option>
                                                <option value="+27">+27 (South Africa)</option>
                                                <option value="+30">+30 (Greece)</option>
                                                <option value="+31">+31 (Netherlands)</option>
                                                <option value="+32">+32 (Belgium)</option>
                                                <option value="+33">+33 (France)</option>
                                                <option value="+34">+34 (Spain)</option>
                                                <option value="+36">+36 (Hungary)</option>
                                                <option value="+39">+39 (Italy)</option>
                                                <option value="+40">+40 (Romania)</option>
                                                <option value="+41">+41 (Switzerland)</option>
                                                <option value="+43">+43 (Austria)</option>
                                                <option value="+44">+44 (UK)</option>
                                                <option value="+45">+45 (Denmark)</option>
                                                <option value="+46">+46 (Sweden)</option>
                                                <option value="+47">+47 (Norway)</option>
                                                <option value="+48">+48 (Poland)</option>
                                                <option value="+49">+49 (Germany)</option>
                                                <option value="+51">+51 (Peru)</option>
                                                <option value="+52">+52 (Mexico)</option>
                                                <option value="+53">+53 (Cuba)</option>
                                                <option value="+54">+54 (Argentina)</option>
                                                <option value="+55">+55 (Brazil)</option>
                                                <option value="+56">+56 (Chile)</option>
                                                <option value="+57">+57 (Colombia)</option>
                                                <option value="+58">+58 (Venezuela)</option>
                                                <option value="+60">+60 (Malaysia)</option>
                                                <option value="+61">+61 (Australia)</option>
                                                <option value="+62">+62 (Indonesia)</option>
                                                <option value="+63">+63 (Philippines)</option>
                                                <option value="+64">+64 (New Zealand)</option>
                                                <option value="+65">+65 (Singapore)</option>
                                                <option value="+66">+66 (Thailand)</option>
                                                <option value="+81">+81 (Japan)</option>
                                                <option value="+82">+82 (South Korea)</option>
                                                <option value="+84">+84 (Vietnam)</option>
                                                <option value="+86">+86 (China)</option>
                                                <option value="+90">+90 (Turkey)</option>
                                                <option value="+91">+91 (India)</option>
                                                <option value="+92">+92 (Pakistan)</option>
                                                <option value="+93">+93 (Afghanistan)</option>
                                                <option value="+94">+94 (Sri Lanka)</option>
                                                <option value="+95">+95 (Myanmar)</option>
                                                <option value="+98">+98 (Iran)</option>
                                                <option value="+211">+211 (South Sudan)</option>
                                            </select>
                                            <input type="tel" id="mobile" name="mobile" class="form-control" maxlength="10" style="flex: 1; margin-left: 10px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="communication-address" class="col-md-3 col-form-label"><h6>Communication Address:</h6></label>
                                    <div class="col-md-9">
                                      <input type="text" id="communication-address" name="communication-address" class="form-control"></textarea>
                                    </div>
                                  </div><br>
                                  <div class="form-group row">
                                    <label for="communication-address-1" class="col-md-3 col-form-label"><h6> Communication Address Line 2 :</h6></label>
                                    <div class="col-md-9">
                                      <input type="text" id="communication-address-1" name="communication-address-1" class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="communication-address-2" class="col-md-3 col-form-label"><h6> Communication Address Line 3:</h6></label>
                                    <div class="col-md-9">
                                      <input type="text" id="communication-address-2" name="communication-address-2" class="form-control">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                    <h6>District:<span style="color: red;">*</span></h6>
                                        <select id="district" name="com_district" class="form-control">
                                            <option value="select">Select</option>
                                            <option value="ariyalur">Ariyalur</option>
                                            <option value="chengalpattu">Chengalpattu</option>
                                            <option value="chennai">Chennai</option>
                                            <option value="coimbatore">Coimbatore</option>
                                            <option value="cuddalore">Cuddalore</option>
                                            <option value="dharmapuri">Dharmapuri</option>
                                            <option value="dindigul">Dindigul</option>
                                            <option value="erode">Erode</option>
                                            <option value="kallakurichi">Kallakurichi</option>
                                            <option value="kanchipuram">Kanchipuram</option>
                                            <option value="kanyakumari">Kanyakumari</option>
                                            <option value="karur">Karur</option>
                                            <option value="krishnagiri">Krishnagiri</option>
                                            <option value="madurai">Madurai</option>
                                            <option value="mayiladuthurai">Mayiladuthurai</option>
                                            <option value="nagapattinam">Nagapattinam</option>
                                            <option value="namakkal">Namakkal</option>
                                            <option value="nilgiris">Nilgiris</option>
                                            <option value="perambalur">Perambalur</option>
                                            <option value="pudukkottai">Pudukkottai</option>
                                            <option value="ramanathapuram">Ramanathapuram</option>
                                            <option value="ranipet">Ranipet</option>
                                            <option value="salem">Salem</option>
                                            <option value="sivaganga">Sivaganga</option>
                                            <option value="tenkasi">Tenkasi</option>
                                            <option value="thanjavur">Thanjavur</option>
                                            <option value="theni">Theni</option>
                                            <option value="thoothukudi">Thoothukudi</option>
                                            <option value="tiruchirappalli">Tiruchirappalli</option>
                                            <option value="tirunelveli">Tirunelveli</option>
                                            <option value="tirupattur">Tirupattur</option>
                                            <option value="tiruppur">Tiruppur</option>
                                            <option value="tiruvallur">Tiruvallur</option>
                                            <option value="tiruvannamalai">Tiruvannamalai</option>
                                            <option value="tiruvarur">Tiruvarur</option>
                                            <option value="vellore">Vellore</option>
                                            <option value="viluppuram">Viluppuram</option>
                                            <option value="virudhunagar">Virudhunagar</option>
                                        </select><br/>
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                    <h6>State:<span style="color: red;">*</span></h6>
                                        <select id="state" name="com_state" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Andaman and Nicobar Islands ">Andaman and Nicobar Islands </option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh ">Chandigarh </option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadra and Nagar Haveli and Daman and Diu ">Dadra and Nagar Haveli and Daman and Diu </option>
                                            <option value="Delhi ">Delhi </option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir ">Jammu and Kashmir </option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Ladakh ">Ladakh </option>
                                            <option value="Lakshadweep ">Lakshadweep </option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Puducherry ">Puducherry </option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            </select><br/>
                                            <span class="req_symbol" id="state_span" style="display:none">State is Required!</span>                                
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Pincode:<span style="color: red;">*</span></h6>
                                        <input type="text" id="pincode" name="com_pincode" class="form-control">
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Country:<span style="color: red;">*</span></h6>
                                        <input type="text" id="country" name="com_country" class="form-control">
                                    </div>
                                </div>
                                
                                <h4>Special Quota</h4>
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                      <h6>Ex-serviceman:</h6></label>
                                      <select id="ex_servicemen" name="ex_servicemen" class="form-control">
                                         <option value="">Choose option</option>
                                         <option value="yes">Yes</option>
                                         <option value="no">No</option>
                                     </select>
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                       <h6>Differently Abled:</h6></label>
                                        <select id="differently-abled" name="differently-abled" class="form-control">
                                          <option value="">Choose option</option>
                                          <option value="1">Locomotor Disability</option>
                                          <option value="2">Leprosy Cured Person</option>
                                          <option value="3">Cerebral Palsy</option>
                                          <option value="4">Dwarfism</option>
                                          <option value="5">Muscular Dystrophy</option>
                                          <option value="6">Acid Attack Victims</option>
                                          <option value="7">Blindness</option>
                                          <option value="8">Low-Vision</option>
                                          <option value="9">Hearing Impairment (Deaf and Hard of Hearing)</option>
                                          <option value="10">Chronic Neurological Conditions</option>
                                          <option value="11">Speech and Language Disability</option>
                                          <option value="12">Intellectual Disability</option>
                                          <option value="13">Specific Learning Disabilities</option>
                                          <option value="14">Autism Spectrum Disorder</option>
                                          <option value="15">Mental Illness</option>
                                          <option value="16">Multiple Sclerosis</option>
                                          <option value="17">Parkinson's Disease</option>
                                          <option value="18">Haemophilia</option>
                                          <option value="19">Thalassemia</option>
                                          <option value="20">Sickle Cell Disease</option>
                                          <option value="21">Multiple Disabilities</option>
                                        </select>
                                     </div> 
                                </div>

                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                    <h6>Percentage of Disability:</h6></label>
                                        <select id="percentage-disability" name="percentage-disability" class="form-control">
                                            <option value="0">Select</option>
                                            <option value="40">40</option>
                                            <option value="41">41</option>
                                            <option value="42">42</option>
                                            <option value="43">43</option>
                                            <option value="44">44</option>
                                            <option value="45">45</option>
                                            <option value="46">46</option>
                                            <option value="47">47</option>
                                            <option value="48">48</option>
                                            <option value="49">49</option>
                                            <option value="50">50</option>
                                            <option value="51">51</option>
                                            <option value="52">52</option>
                                            <option value="53">53</option>
                                            <option value="54">54</option>
                                            <option value="55">55</option>
                                            <option value="56">56</option>
                                            <option value="57">57</option>
                                            <option value="58">58</option>
                                            <option value="59">59</option>
                                            <option value="60">60</option>
                                            <option value="61">61</option>
                                            <option value="62">62</option>
                                            <option value="63">63</option>
                                            <option value="64">64</option>
                                            <option value="65">65</option>
                                            <option value="66">66</option>
                                            <option value="67">67</option>
                                            <option value="68">68</option>
                                            <option value="69">69</option>
                                            <option value="70">70</option>
                                            <option value="71">71</option>
                                            <option value="72">72</option>
                                            <option value="73">73</option>
                                            <option value="74">74</option>
                                            <option value="75">75</option>
                                            <option value="76">76</option>
                                            <option value="77">77</option>
                                            <option value="78">78</option>
                                            <option value="79">79</option>
                                            <option value="80">80</option>
                                            <option value="81">81</option>
                                            <option value="82">82</option>
                                            <option value="83">83</option>
                                            <option value="84">84</option>
                                            <option value="85">85</option>
                                            <option value="86">86</option>
                                            <option value="87">87</option>
                                            <option value="88">88</option>
                                            <option value="89">89</option>
                                            <option value="90">90</option>
                                            <option value="91">91</option>
                                            <option value="92">92</option>
                                            <option value="93">93</option>
                                            <option value="94">94</option>
                                            <option value="95">95</option>
                                            <option value="96">96</option>
                                            <option value="97">97</option>
                                            <option value="98">98</option>
                                            <option value="99">99</option>
                                            <option value="100">100</option>
                                        </select>
                                 </div>
                                 <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                    <h6>Sports quota:</h6></label>
                                        <select id="sportsquota" name="sportsquota" class="form-control">
                                            <option value="None">None</option>
                                            <option value="District Level">District Level</option>
                                            <option value="State Level">State Level</option>
                                            <option value="National Leve">National Level</option>
                                            <option value="International Level">International Level</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                    <h6>Others:</h6></label>
                                    <div class="col-md-6">
                                        <select id="others" name="others" class="form-control">
                                            <option value="None">None</option>
                                            <option value="Repatriate">Repatriate</option>
                                            <option value="NRI">NRI</option>
                                            <option value="Foreign">Foreign</option>
                                        </select>
                                    </div>
                                </div>
                                </div>
                                <h4>Permanent Address</h4>
                                <div>
                                <div class="form-group row">
                                    <label for="native-place" class="col-md-3 col-form-label"><h6>Native Place:</h6></label>
                                    <div class="col-md-9">
                                        <input type="text" id="native-place" name="native-place" class="form-control">
                                    </div>
                                </div>
                                </div>
                                <div class="form-group row">
                                    <label for="permanent-address" class="col-md-3 col-form-label"><h6>Address(Line 1):</h6></label>
                                    <div class="col-md-9">
                                      <input type="text" id="permanent-address" name="permanent-address" class="form-control"></textarea>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="permanent-address-1" class="col-md-3 col-form-label"><h6>Permanent Address Line 2 :</h6></label>
                                    <div class="col-md-9">
                                      <input type="text" id="permanent-address-1" name="permanent-address-1" class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="permanent-address-2" class="col-md-3 col-form-label"><h6>Permanent Address Line 3:</h6></label>
                                    <div class="col-md-9">
                                      <input type="text" id="permanent-address-2" name="permanent-address-2" class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="same-as-communication-address" class="col-md-3 col-form-label"><h6>Same as Communication Address:</h6></label>
                                    <div class="col-md-9">
                                      <input type="checkbox" id="same-as-communication-address" name="same-as-communication-address">
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                    <h6>District:<span style="color: red;">*</span></h6>
                                        <select id="district" name="district" class="form-control">
                                            <option value="select">Select</option>
                                            <option value="ariyalur">Ariyalur</option>
                                            <option value="chengalpattu">Chengalpattu</option>
                                            <option value="chennai">Chennai</option>
                                            <option value="coimbatore">Coimbatore</option>
                                            <option value="cuddalore">Cuddalore</option>
                                            <option value="dharmapuri">Dharmapuri</option>
                                            <option value="dindigul">Dindigul</option>
                                            <option value="erode">Erode</option>
                                            <option value="kallakurichi">Kallakurichi</option>
                                            <option value="kanchipuram">Kanchipuram</option>
                                            <option value="kanyakumari">Kanyakumari</option>
                                            <option value="karur">Karur</option>
                                            <option value="krishnagiri">Krishnagiri</option>
                                            <option value="madurai">Madurai</option>
                                            <option value="mayiladuthurai">Mayiladuthurai</option>
                                            <option value="nagapattinam">Nagapattinam</option>
                                            <option value="namakkal">Namakkal</option>
                                            <option value="nilgiris">Nilgiris</option>
                                            <option value="perambalur">Perambalur</option>
                                            <option value="pudukkottai">Pudukkottai</option>
                                            <option value="ramanathapuram">Ramanathapuram</option>
                                            <option value="ranipet">Ranipet</option>
                                            <option value="salem">Salem</option>
                                            <option value="sivaganga">Sivaganga</option>
                                            <option value="tenkasi">Tenkasi</option>
                                            <option value="thanjavur">Thanjavur</option>
                                            <option value="theni">Theni</option>
                                            <option value="thoothukudi">Thoothukudi</option>
                                            <option value="tiruchirappalli">Tiruchirappalli</option>
                                            <option value="tirunelveli">Tirunelveli</option>
                                            <option value="tirupattur">Tirupattur</option>
                                            <option value="tiruppur">Tiruppur</option>
                                            <option value="tiruvallur">Tiruvallur</option>
                                            <option value="tiruvannamalai">Tiruvannamalai</option>
                                            <option value="tiruvarur">Tiruvarur</option>
                                            <option value="vellore">Vellore</option>
                                            <option value="viluppuram">Viluppuram</option>
                                            <option value="virudhunagar">Virudhunagar</option>
                                        </select><br/>
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                    <h6>State:<span style="color: red;">*</span></h6>
                                        <select id="state" name="state" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Andaman and Nicobar Islands ">Andaman and Nicobar Islands </option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh ">Chandigarh </option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadra and Nagar Haveli and Daman and Diu ">Dadra and Nagar Haveli and Daman and Diu </option>
                                            <option value="Delhi ">Delhi </option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir ">Jammu and Kashmir </option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Ladakh ">Ladakh </option>
                                            <option value="Lakshadweep ">Lakshadweep </option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Puducherry ">Puducherry </option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            </select><br/>
                                            <span class="req_symbol" id="state_span" style="display:none">State is Required!</span>                                
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Pincode:<span style="color: red;">*</span></h6>
                                        <input type="text" id="pincode" name="pincode" class="form-control">
                                    </div>
                                    <div class="mb-3 col-xs-12 col-lg-6 col-sm-12 col-xl-6 col-xxl-6">
                                        <h6>Country:<span style="color: red;">*</span></h6>
                                        <input type="text" id="country" name="country" class="form-control">
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-primary float-end mb-5 " value="Save & Continue">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                <script src="script.js"></script>
            </body>
            </html>
