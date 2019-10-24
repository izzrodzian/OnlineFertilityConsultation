<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$diagnosis = $symptoms = $explanation = $treatments = "";
$diagnosis_err = $symptoms_err = $explanation_err = $treatments_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate diagnosis
    if(empty(trim($_POST["diagnosis"]))){
        $diagnosis_err = "Please enter a diagnosis.";
    } else{
        // Prepare a select statement
        $sql = "SELECT diagnosisID FROM diagnosisDB WHERE diagnosis = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_diagnosis);
            
            // Set parameters
            $param_name = trim($_POST["diagnosis"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $diagnosis_err = "This diagnosis already added.";
                } else{
                    $diagnosis = trim($_POST["diagnosis"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate symptoms
     if(empty(trim($_POST["symptoms"]))){
        $symptoms_err = "Please enter any symptoms related.";     
    } else{
        $symptoms = trim($_POST["symptoms"]);
    }

    // Validate explanation
     if(empty(trim($_POST["explanation"]))){
        $explanation_err = "Please enter any explanation related.";     
    } else{
        $explanation = trim($_POST["explanation"]);
    }

     // Validate treatments
     if(empty(trim($_POST["treatments"]))){
        $treatments_err= "Please any treatments related.";     
    } else{
        $treatments = trim($_POST["treatments"]);
    }

    // Check input errors before inserting in database
    if(empty($diagnosis_err) && empty($symptoms_err) && empty($explanation_err) && empty($treatments_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO diagnosisDB (diagnosis, symptoms, explanation, treatments) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_diagnosis, $param_symptoms, $param_explanation, $param_treatments);
            
            // Set parameters
            $param_diagnosis = $diagnosis;
            $param_symptoms = $symptoms;
            $param_explanation = $explanation;
            $param_treatments = $treatments;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to manage diagnosis page
                header("location: managediagnosis.php");
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
  
  <title>Add New Diagnosis</title>
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
                    <li class="nav-item"><a class="nav-link link text-white display-4" href="index.php"><span class="mobi-mbri mobi-mbri-user mbr-iconfont mbr-iconfont-btn"></span>
                        
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
    <title>Add New Diagnosis</title>
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
        <h2>Add New Diagnosis</h2>
        <p>Please fill this form to add new diagnosis.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($diagnosis_err)) ? 'has-error' : ''; ?>">
                <label>Diagnosis</label>
                <textarea name="diagnosis" cols="40" class="form-control" value="<?php echo $diagnosis; ?>"></textarea>
                <span class="help-block"><?php echo $diagnosis_err; ?></span>
            </div> 
            <div class="form-group <?php echo (!empty($symptoms_err)) ? 'has-error' : ''; ?>">
                <label>Symptoms</label>
                <textarea name="symptoms" cols="100" rows="5" class="form-control" value="<?php echo $symptoms; ?>"></textarea>
                <span class="help-block"><?php echo $symptoms_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($explanation_err)) ? 'has-error' : ''; ?>">
                <label>Explanation</label>
                <textarea name="explanation" cols="100" rows="5" class="form-control" value="<?php echo $explanation; ?>"></textarea>
                <span class="help-block"><?php echo $explanation_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($treatments_err)) ? 'has-error' : ''; ?>">
                <label>Treatments</label>
                <textarea name="treatments" cols="100" rows="5" class="form-control" value="<?php echo $treatments; ?>"></textarea>
                <span class="help-block"><?php echo $treatments_err; ?></span>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
            <input type="reset" class="btn btn-default" value="Reset">
            <a href="managediagnosis.php">
            <input type="button" class="btn btn-primary" value="Back">
            </a>
        </form>
    </div> </center>
</body>
</html>