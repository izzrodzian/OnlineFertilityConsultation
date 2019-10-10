<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$patientEmail = $patientPassword = $patientName = $patientIC = $patientGender = $patientMaritalStatus = $patientPhone ="";
$patientEmail_err = $patientPassword_err = $patientName_err = $patientIC_err = $patientGender_err = $patientMaritalStatus_err = $patientPhone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["patientEmail"]))){
        $patientEmail_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT patientID FROM patient WHERE patientEmail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_patientEmail);
            
            // Set parameters
            $param_username = trim($_POST["patientEmail"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $patientEmail_err = "This email already registered.";
                } else{
                    $patientEmail = trim($_POST["patientEmail"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["patientPassword"]))){
        $patientPassword_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["patientPassword"])) < 6){
        $patientPassword_err = "Password must have atleast 6 characters.";
    } else{
        $patientPassword = trim($_POST["patientPassword"]);
    }
    
    // Validate name
     if(empty(trim($_POST["patientName"]))){
        $patientName_err = "Please enter a name.";     
    } else{
        $patientName = trim($_POST["patientName"]);
    }

    // Validate ic
     if(empty(trim($_POST["patientIC"]))){
        $patientIC_err = "Please enter IC number.";     
    } else{
        $patientIC = trim($_POST["patientIC"]);
    }

     // Validate gender
     if(empty(trim($_POST["patientGender"]))){
        $patientGender_err = "Please select gender.";     
    } else{
        $patientGender = trim($_POST["patientGender"]);
    }

    // Validate marital status
     if(empty(trim($_POST["patientMaritalStatus"]))){
        $patientMaritalStatus_err = "Please enter marital status.";     
    } else{
        $patientMaritalStatus = trim($_POST["patientMaritalStatus"]);
    }

 // Validate phone number
     if(empty(trim($_POST["patientPhone"]))){
        $patientPhone_err = "Please enter phone number.";     
    } else{
        $patientPhone = trim($_POST["patientPhone"]);
    }


    // Check input errors before inserting in database
    if(empty($patientEmail_err) && empty($patientPassword_err) && empty($patientName_err) && empty($patientIC_err) && empty($patientGender_err) && empty($patientMaritalStatus_err) && empty($patientPhone_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO patient (patientEmail, patientPassword, patientName, patientIC, $patientGender, patientMaritalStatus, patientPhone) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss", $param_patientEmail, $param_patientPassword, $param_patientName, $param_patientIC, $param_patientGender, $param_patientMaritalStatus, $patientPhone_err);
            
            // Set parameters
            $param_patientEmail = $patientEmail;
            $param_patientPassword = $patientPassword;
            $param_patientName = $patientName;
            $param_patientIC = $patientIC;
            $param_patientGender = $patientGender;
            $param_patientMaritalStatus = $patientMaritalStatus;
            $param_patientPhone = $patientPhone;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }


             // Close statement
          mysqli_stmt_close($stmt);

          }
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
  
  <title>Register</title>
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

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-toggleable-sm">
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
                        Treatments</a><div class="dropdown-menu"><div class="dropdown"><a class="text-white dropdown-item dropdown-toggle display-4" href="fertilitytests.php" data-toggle="dropdown-submenu" aria-expanded="false">Fertility Tests</a><div class="dropdown-menu dropdown-submenu"><a class="text-white dropdown-item display-4" href="femaleanalysis.php">Female Analaysis</a><a class="text-white dropdown-item display-4" href="eggcount.php" aria-expanded="false">Egg Count (AMH) Test</a><a class="text-white dropdown-item display-4" href="semenanalysis.php" aria-expanded="false">Semen Analysis</a><a class="text-white dropdown-item display-4" href="killercells.php" aria-expanded="false">Natural Killer Cells</a><a class="text-white dropdown-item display-4" href="genetictesting.php" aria-expanded="false">Genetic Testing PGT</a><a class="text-white dropdown-item display-4" href="nextgeneration.php" aria-expanded="false">Next Generation Sequencing</a><a class="text-white dropdown-item display-4" href="karyomapping.php" aria-expanded="false">Karyomapping</a><a class="text-white dropdown-item display-4" href="geneticsclinic.php" aria-expanded="false">Genetics Clinic</a></div></div><div class="dropdown"><a class="text-white dropdown-item dropdown-toggle display-4" href="treatments.php" aria-expanded="false" data-toggle="dropdown-submenu">Fertility Treatments</a><div class="dropdown-menu dropdown-submenu"><a class="text-white dropdown-item display-4" href="ovulationcycle.php" aria-expanded="false">Ovulation Cycle Tracking</a><a class="text-white dropdown-item display-4" href="ovulationinduction.php" aria-expanded="false">Ovulation Induction (OI)</a><a class="text-white dropdown-item display-4" href="artificialinsemination.php" aria-expanded="false">Artificial Insemination (IUI)</a><a class="text-white dropdown-item display-4" href="ivf.php" aria-expanded="false">IVF Treatment</a><a class="text-white dropdown-item display-4" href="icsi.php" aria-expanded="false">ICSI Treatment</a><a class="text-white dropdown-item display-4" href="fet.php" aria-expanded="false">Frozen Embryo Transfer (FET)</a><a class="text-white dropdown-item display-4" href="fertilitysurgery.php" aria-expanded="false">Fertility Surgery</a><a class="text-white dropdown-item display-4" href="vasectomy.php" aria-expanded="false">Advanced Science</a><a class="text-white dropdown-item display-4" href="digitalhighmag.php" aria-expanded="false">Digital High Magnification</a><a class="text-white dropdown-item display-4" href="aiinivf.php" aria-expanded="false">Artificial Intelligence in IVF</a><a class="text-white dropdown-item display-4" href="hatching.php" aria-expanded="false">Assisted Hatching</a><a class="text-white dropdown-item display-4" href="polscope.php" aria-expanded="false">PolScope</a></div></div><a class="text-white dropdown-item display-4" href="consultation.php" aria-expanded="false">Online Consultation</a></div></li><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="aboutus.php"><span class="mobi-mbri mobi-mbri-file mbr-iconfont mbr-iconfont-btn"></span>
                        
                        About Us
                    </a>
                </li></ul>
            
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
    <title>Sign Up</title>
    <style type="text/css">
        body{  }
        .wrapper{ width: 450px; padding: 30px; }
    </style>
</head>
<body>
  <br>
  <br>
  <br>
  <br>
    <center><div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($patientEmail_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="patientEmail" class="form-control" value="<?php echo $patientEmail; ?>">
                <span class="help-block"><?php echo $patientEmail_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($patientPassword_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="patientPassword" class="form-control" value="<?php echo $patientPassword; ?>">
                <span class="help-block"><?php echo $patientPassword_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($patientName_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="patientName" class="form-control" value="<?php echo $patientName; ?>">
                <span class="help-block"><?php echo $patientName_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($patientIC_err)) ? 'has-error' : ''; ?>">
                <label>IC Number</label>
                <input type="text" name="patientIC" class="form-control" value="<?php echo $patientIC; ?>">
                <span class="help-block"><?php echo $patientIC_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($patientGender_err)) ? 'has-error' : ''; ?>">
                <label>Gender</label>
                <input type="text" name="patientGender" class="form-control" value="<?php echo $patientGender; ?>">
                <span class="help-block"><?php echo $patientGender_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($patientMaritalStatus_err)) ? 'has-error' : ''; ?>">
                <label>Marital Status</label>
                <input type="text" name="patientMaritalStatus" class="form-control" value="<?php echo $patientMaritalStatus; ?>">
                <span class="help-block"><?php echo $patientMaritalStatus_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($patientPhone_err)) ? 'has-error' : ''; ?>">
                <label>Phone Number</label>
                <input type="text" name="patientPhone" class="form-control" value="<?php echo $patientPhone; ?>">
                <span class="help-block"><?php echo $patientPhone_err; ?></span>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
          </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div> </center>
</body>
</html>