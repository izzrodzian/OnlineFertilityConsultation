<?php

// Include config file
require_once "config.php";

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Define variables and initialize with empty values
$symptoms = $history = "";
$symptoms_err = $history_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Validate symptoms
    $input_symptoms = trim($_POST["symptoms"]);
    if(empty($input_symptoms)){
        $symptoms_err = "Please enter related symptoms.";     
    } else{
        $symptoms = $input_symptoms;
    }
    
   
    // Validate symptoms
    $input_symptoms = trim($_POST["symptoms"]);
    if(empty($input_symptoms)){
        $symptoms_err = "Please enter related symptoms.";     
    } else{
        $symptoms = $input_symptoms;
    }
    
    // Validate history
    $input_history = trim($_POST["history"]);
    if(empty($input_history)){
        $history_err = "Please enter related history.";     
    } else{
        $history = $input_history;
    }
    
    // Check input errors before inserting in database
    if(empty($symptoms_err) && empty($history_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO consultation (symptoms, history) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_symptoms, $param_history);
            
            // Set parameters
            $param_symptoms = $symptoms;
            $param_history = $history;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: consultationhistory.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}

?>


<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.9.7, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.9.7, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/mbr-1-122x122.jpg" type="image/x-icon">
  <meta name="description" content="Web Site Creator Description">
  
  <title>Early Diagnosis</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/animatecss/animate.min.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
 <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-4">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.html">
                         <img src="assets/images/mbr-1-122x122.jpg" alt="Online Fertility Consultation" title="Online Fertility Consultation" style="height: 3.8rem;">
                    </a>
                </span>
                 <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="index.php">ONLINE FERTILITY CONSULTATION</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="index.php"><span class="mobi-mbri mobi-mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Home</a>
                </li><li class="nav-item dropdown"><a class="nav-link link text-white dropdown-toggle display-4" href="consultation.php" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mobi-mbri mobi-mbri-idea mbr-iconfont mbr-iconfont-btn"></span>
                        Planning for Pregnancy</a><div class="dropdown-menu"><div class="dropdown"><a class="text-white dropdown-item dropdown-toggle display-4" href="consultation.php" data-toggle="dropdown-submenu" aria-expanded="false">How to Get Pregnant</a><div class="dropdown-menu dropdown-submenu"><a class="text-white dropdown-item display-4" href="insightsprogram.php">Fertility Insights Program</a><a class="text-white dropdown-item display-4" href="prepregnancy.php" aria-expanded="false">Prepregnancy Health</a><a class="text-white dropdown-item display-4" href="fertilitycalculation.php" aria-expanded="false">Fertile Window Calculation</a><a class="text-white dropdown-item display-4" href="chromosomal.php" aria-expanded="false">Chromosomal Abnormalities</a><a class="text-white dropdown-item display-4" href="bmi.php" aria-expanded="false">BMI for Pregnancy</a><a class="text-white dropdown-item display-4" href="assessment.php" aria-expanded="false">Fertility Assessment</a></div></div><div class="dropdown"><a class="text-white dropdown-item dropdown-toggle display-4" href="consultation.php" aria-expanded="false" data-toggle="dropdown-submenu">Female Fertility</a><div class="dropdown-menu dropdown-submenu"><a class="text-white dropdown-item display-4" href="menstrual.php" aria-expanded="false">Menstrual Cycle</a><a class="text-white dropdown-item display-4" href="contraception.php" aria-expanded="false">Effects of Contraception</a><a class="text-white dropdown-item display-4" href="age.php" aria-expanded="false">Effect of Age</a><a class="text-white dropdown-item display-4" href="endometriosis.php" aria-expanded="false">Endometriosis</a><a class="text-white dropdown-item display-4" href="fibroids.php" aria-expanded="false">Fibroids</a><a class="text-white dropdown-item display-4" href="pcos.php" aria-expanded="false">PCOS</a><a class="text-white dropdown-item display-4" href="prevpregnancies.php" aria-expanded="false">Previous Pregnancies</a><a class="text-white dropdown-item display-4" href="blockeedtubes.php" aria-expanded="false">Blocked Fallopian Tubes</a></div></div><div class="dropdown"><a class="text-white dropdown-item dropdown-toggle display-4" href="consultation.php" aria-expanded="false" data-toggle="dropdown-submenu">Male Fertility</a><div class="dropdown-menu dropdown-submenu"><a class="text-white dropdown-item display-4" href="abnormal.php" aria-expanded="false">Abnormal Sperm Production</a><a class="text-white dropdown-item display-4" href="malefertility.php" aria-expanded="false">Male Fertility Predictor</a></div></div><a class="text-white dropdown-item display-4" href="miscarriage.php" aria-expanded="false">About Miscarriage</a><a class="text-white dropdown-item display-4" href="infertility.php" aria-expanded="false">About Infertility</a></div></li><li class="nav-item dropdown"><a class="nav-link link text-white dropdown-toggle display-4" href="consultation.php" data-toggle="dropdown-submenu" aria-expanded="false"><span class="mobi-mbri mobi-mbri-contact-form mbr-iconfont mbr-iconfont-btn"></span>

                        Treatments</a><div class="dropdown-menu"><a class="dropdown-item text-white display-4" href="fertilitytests.php" aria-expanded="false">Fertility Tests</a><a class="dropdown-item text-white display-4" href="treatments.php" aria-expanded="false">Fertility Treatments</a><a class="dropdown-item text-white display-4" href="consultation.php" aria-expanded="false">Online Consultation</a></div></li><li class="nav-item"><a class="nav-link link text-white display-4" href="aboutus.php" aria-expanded="false"><span class="mobi-mbri mobi-mbri-file mbr-iconfont mbr-iconfont-btn"></span>
                        
                        About Us</a>
                </li><li class="nav-item dropdown open">
                    <a class="nav-link link text-white dropdown-toggle display-4" data-toggle="dropdown-submenu" aria-expanded="true"><span class="mobi-mbri mobi-mbri-user-2 mbr-iconfont mbr-iconfont-btn"></span>
                        Account</a><div class="dropdown-menu"><a class="text-white dropdown-item display-4" href="patientdashboard.php">Dashboard</a><a class="text-white dropdown-item display-4" href="profile.php">Profile</a><a class="text-white dropdown-item display-4" href="consultationhistory.php" aria-expanded="false">Consultation History</a><a class="text-white dropdown-item display-4" href="logout.php" aria-expanded="false">Log Out</a></div>
                </li></ul>
        </div>
    </nav>
</section>

  <section class="engine"><a href="https://mobirise.info/d">web maker</a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/viewportchecker/jquery.viewportchecker.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
 <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
    <input name="animation" type="hidden">
  </body>
</html>

 <br>
 <br>
 <br>
 <br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Consultation Form</title>
    <style type="text/css">
        body{  }
        .wrapper{ width: 450px; padding: 20px; }
    </style>
</head>
<body>
  <br>
  <br>
  <br>
  <br>
    <center>
      <h1><font color="#3377A9">Early Diagnosis</font></h1>
      <br><br>

      <table class="table" style="margin-top: 20px; width: 50%;" align="center">    
      <tr>
      <th>Question</th>
      <th>Yes</th>
      <th>No</th>
      </tr>
    
      <tr>
      <td>Persistent coughing, at times with phlegm<p id="symptom1"required></p></td>
      <td><input type="radio" id="cyst1" name="answer1" value="yes"></td>
      <td><input type="radio" id="cyst2"  name="answer1" value="yes"></td>
      </tr>
    
      <tr>
      <td>Frequent lung infections including pneumonia or bronchitis<p id="symptom2"required></p></td>
      <td><input type="radio" id="cyst3" name="answer2" value="yes"></td>
      <td><input type="radio" id="cyst4"  name="answer2" value="yes"></td>
    </tr>
    
    <tr>
      <td>Wheezing or shortness of breath<p id="symptom3"required></p></td>
      <td><input type="radio" id="cyst5" name="answer3" value="yes"></td>
      <td><input type="radio" id="cyst6"  name="answer3" value="yes"></td>
    </tr>
    
    <tr>
      <td>Poor growth or weight gain in spite of a good appetite<p id="symptom4"required></p></td>
      <td><input type="radio" id="cyst7"  name="answer4" value="yes"></td>
      <td><input type="radio" id="cyst8"  name="answer4" value="yes"></td>
    </tr>
    
    <tr>
      <td>Frequent greasy, bulky stools or difficulty with bowel movements<p id="symptom5"required></p></td>
      <td><input type="radio" id="cyst9" name="answer5" value="yes"></td>
      <td><input type="radio" id="cyst10"  name="answer5" value="yes"></td>
    </tr>
    
    <tr>
      <td>Irregular periods or no periods at all<p id="symptom6"required></p></td>
      <td><input type="radio" id="pcos1"  name="answer6" value="yes"></td>
      <td><input type="radio" id="pcos2"  name="answer6" value="yes"></td>
    </tr>
    
    <tr>
      <td>Difficulty getting pregnant (because of irregular ovulation or failure to ovulate)<p id="symptom7"required></p></td>
      <td><input type="radio" id="pcos3" name="answer7" value="yes"></td>
      <td><input type="radio" id="pcos4"  name="answer7" value="yes"></td>
    </tr>
    
    <tr>
      <td>Excessive hair growth (hirsutism) – usually on the face, chest, back or buttocks<p id="symptom8"required></p></td>
      <td><input type="radio" id="pcos5"  name="answer8" value="yes"></td>
      <td><input type="radio" id="pcos6"  name="answer8" value="yes"></td>
    </tr>
    
    <tr>
      <td>Oily skin or acne<p id="symptom9"required></p></td>
      <td><input type="radio" id="pcos7"  name="answer9" value="yes"></td>
      <td><input type="radio" id="pcos8"  name="answer9" value="yes"></td>
    </tr>
    
    <!-- CONTINUE HERE -->
    <tr>
      <td>Did you feel persistent abdominal discomfort, such as cramps, gas or pain<p id="sym11"required></p></td>
      <td><input type="radio" id="t21"  name="answer6" value="yes"></td>
      <td><input type="radio" id="t22"  name="answer6" value="yes"></td>
      </tr>
      
    <tr>
      <td>Did you have lump in the underarm area?<p id="sym12"required></p></td>
      <td><input type="radio" id="s21"  name="answer05" value="yes"></td>
      <td><input type="radio" id="s22"  name="answer05" value="yes"></td>
      </tr>
      
    <tr>
      <td>Did you have shortness of breath?<p id="sym13"required></p></td>
      <td><input type="radio" id="s25"  name="answer7" value="yes"></td>
      <td><input type="radio" id="s26"  name="answer7" value="yes"></td>
      </tr>
      
    <tr>
      <td>Have you unexplained weight loss?<p id="sym14"required></p></td>
      <td><input type="radio" id="s29"  name="answer8" value="yes"></td>
      <td><input type="radio" id="s30"  name="answer8" value="yes"></td>
      </tr>
      
    <tr>
      <td>Did you have persistent chest pain?<p id="sym15"required></p></td>
      <td><input type="radio" id="s33"  name="answer9" value="yes"></td>
      <td><input type="radio" id="s34"  name="answer9" value="yes"></td>
      </tr>
      
    <tr>
      <td>Have your periods heavier and of longer duration than usual?<p id="sym16"required></p></td>
      <td><input type="radio" id="t25"  name="answer10" value="yes"></td>
      <td><input type="radio" id="t26"  name="answer10" value="yes"></td>
      </tr>
      
      <tr>
      <td>Difficulty swallowing or pain while swallowing<p id="sym17"required></p></td>
      <td><input type="radio" id="s37"  name="answer06" value="yes"></td>
      <td><input type="radio" id="s38"  name="answer06" value="yes"></td>
      </tr>
      
      <tr>
      <td>Swelling of the face, arms or neck<p id="sym18"required></p></td>
      <td><input type="radio" id="t37"  name="answer07" value="yes"></td>
      <td><input type="radio" id="t38"  name="answer07" value="yes"></td>
      </tr>
      
    <tr>
      <td>Did you have multiple sexual partners?<p id="sym19"required></p></td>
      <td><input type="radio" id="s41"  name="answer11" value="yes"></td>
      <td><input type="radio" id="s42"  name="answer11" value="yes"></td>
      </tr>
      
    <tr>
      <td>Did you have bleeding between periods?<p id="sym20"required></p></td>
      <td><input type="radio" id="s45"  name="answer12" value="yes"></td>
      <td><input type="radio" id="s46"  name="answer12" value="yes"></td>
      </tr>
  
              </div>

    </table>
        <br>
        <div class="w3-bar">
          <button onclick="myFunction()" class="button button3" name="compare"type="submit">Compare</button>      
          <p id="demo"></p>         
        </div>
      </div>
    </div>
    </center>   
</body>
</html>
