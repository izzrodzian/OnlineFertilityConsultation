<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$patientEmail = $patientPassword = $patientName = $patientIC = $patientGender = $patientMaritalStatus = $patientPhone = "";
$patientEmail_err = $patientPassword_err = $patientName_err = $patientIC_err = $patientGender_err = $patientMaritalStatus_err = $patientPhone_err "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate patient
    if(empty(trim($_POST["doctorEmail"]))){
        $doctorName_err = "Please enter your email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT doctorID FROM doctor WHERE doctorEmail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_doctor);
            
            // Set parameters
            $param_name = trim($_POST["doctorEmail"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $doctorEmail_err = "This doctor already added.";
                } else{
                    $doctorEmail = trim($_POST["doctorEmail"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Validate password
    if(empty(trim($_POST["doctorPassword"]))){
        $doctorPassword_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["doctorPassword"])) < 6){
        $doctorPassword_err = "Password must have atleast 6 characters.";
    } else{
        $doctorPassword = trim($_POST["doctorPassword"]);
      }
    
    // Validate name
     if(empty(trim($_POST["doctorName"]))){
        $doctorName_err = "Please your name.";     
    } else{
        $doctorName = trim($_POST["doctorName"]);
    }

    // Validate specialty
     if(empty(trim($_POST["doctorSpecialty"]))){
        $doctorSpecialty_err = "Please enter your specialty.";     
    } else{
        $doctorSpecialty = trim($_POST["doctorSpecialty"]);
    }

     // Validate phone
     if(empty(trim($_POST["doctorPhone"]))){
        $doctorPhone_err= "Please your phone number.";     
    } else{
        $doctorPhone = trim($_POST["doctorPhone"]);
    }

    // Check input errors before inserting in database
    if(empty($doctorEmail_err) && empty($doctorPassword_err) && empty($doctorName_err) && empty($doctorSpecialty_err) && empty($doctorPhone_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO doctor (doctorEmail, doctorPassword, doctorName, doctorSpecialty, doctorPhone) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_doctorEmail, $param_doctorPassword, $param_doctorName, $param_doctorSpecialty, $param_doctorPhone);
            
            // Set parameters
            $param_doctorEmail= $doctorEmail;
            $param_doctorPassword = $doctorPassword;
            $param_doctorName = $doctorName;
            $param_doctorSpecialty = $doctorSpecialty;
            $param_doctorPhone = $doctorPhone;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to manage doctor page
                header("location: managedoctor.php");
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
  <meta name="description" content="Site Builder Description">
  
  <title>Add New Doctor</title>
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
  <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-5">

    

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
                </li><li class="nav-item"><a class="nav-link link text-white display-4" href="index.php"><span class="mobi-mbri mobi-mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                        
                        Log Out</a></li></ul>
        </div>
    </nav>
</section>


  <section class="engine"><a href="https://mobirise.info/j">website templates</a></section><script src="assets/web/assets/jquery/jquery.min.js"></script>
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


 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Doctor</title>
    <style type="text/css">
        body{  }
        .wrapper{ width: 550px; padding: 20px; }
    </style>
</head>
<body>
  <br>
  <br>
  <br>
  <br>
    <center><div class="wrapper">
        <h2>Add New Doctor</h2>
        <p>Please fill this form to add new doctor.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($doctorEmail_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="doctorEmail" class="form-control" value="<?php echo $doctorEmail; ?>">
                <span class="help-block"><?php echo $doctorEmail_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($doctorPassword_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="doctorPassword" class="form-control" value="<?php echo $doctorPassword; ?>">
                <span class="help-block"><?php echo $doctorPassword_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($doctorName_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="doctorName" class="form-control" value="<?php echo $doctorName; ?>">
                <span class="help-block"><?php echo $doctorName_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($doctorSpecialty_err)) ? 'has-error' : ''; ?>">
                <label>Specialty</label>
                <input type="text" name="doctorSpecialty" class="form-control" value="<?php echo $doctorSpecialty; ?>">
                <span class="help-block"><?php echo $doctorSpecialty_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($doctorPhone_err)) ? 'has-error' : ''; ?>">
                <label>Phone Number</label>
                <input type="text" name="doctorPhone" class="form-control" value="<?php echo $doctorPhone; ?>">
                <span class="help-block"><?php echo $doctorPhone_err; ?></span>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
            <a href="managedoctor.php">
            <input type="button" class="btn btn-primary" value="Back">
            </a>
        </form>
    </div> </center>
</body>
</html>