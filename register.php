<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$patientEmail = $patientPassword = $patientName = $patientIC = $patientGender = $patientMaritalStatus = $patientPhone = "";
$patientEmail_err = $patientPassword_err = $patientName_err = $patientIC_err = $patientGender_err = $patientMaritalStatus_err = $patientPhone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate patient
    if(empty(trim($_POST["patientEmail"]))){
        $patientEmail_err = "Please enter your email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT patientID FROM patient WHERE patientEmail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_patient);
            
            // Set parameters
            $param_name = trim($_POST["patientEmail"]);
            
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
        $patientName_err = "Please enter your name.";     
    } else{
        $patientName = trim($_POST["patientName"]);
    }

    // Validate IC
     if(empty(trim($_POST["patientIC"]))){
        $patientIC_err = "Please enter your IC number.";     
    } else{
        $patientIC = trim($_POST["patientIC"]);
    }

    // Validate gender
     if(empty(trim($_POST["patientGender"]))){
        $patientGender_err= "Please select your gender.";     
    } else{
        $patientGender = trim($_POST["patientGender"]);
    }


    // Validate marital status
     if(empty(trim($_POST["patientMaritalStatus"]))){
        $patientMaritalStatus_err = "Please enter your marital status.";     
    } else{
        $patientMaritalStatus = trim($_POST["patientMaritalStatus"]);
    }


     // Validate phone
     if(empty(trim($_POST["patientPhone"]))){
        $patientPhone_err= "Please enter your phone number.";     
    } else{
        $patientPhone = trim($_POST["patientPhone"]);
    }

    // Check input errors before inserting in database
    if(empty($patientEmail_err) && empty($patientPassword_err) && empty($patientName_err) && empty($patientIC_err) && empty($patientGender_err) && empty($patientMaritalStatus_err) && empty($patientPhone_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO patient (patientEmail, patientPassword, patientName, patientIC, patientGender, patientMaritalStatus, patientPhone) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "sssssss", $param_patientEmail, $param_patientPassword, $param_patientName, $param_patientIC, $param_patientGender, $param_patientMaritalStatus, $param_patientPhone);
            
            // Set parameters
            $param_patientEmail= $patientEmail;
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
    <title>Register</title>
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
        <h2>Register</h2>
        <p>Please fill this form to register.</p>
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
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
            <a href="login.php">
            <input type="button" class="btn btn-primary" value="Back">
            </a>
        </form>
    </div> </center>
</body>
</html>