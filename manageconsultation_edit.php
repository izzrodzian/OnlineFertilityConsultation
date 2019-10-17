<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fertility";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
if(isset($_GET['consultationID'])){
    $consultationID = $_GET['consultationID'];
  } else {
    echo "Empty query!";
    exit;
  }

  if(!isset($consultationID)){
    echo "Empty Consultation ID! check again!";
    exit;
  }

  // get consultation data
  $query = "SELECT * FROM consultation WHERE consultationID = '$consultationID'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }
  $row = mysqli_fetch_assoc($result);

$conn->close();

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
  
  <title>Edit Consultation Details</title>
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
                        Treatments</a><div class="dropdown-menu"><div class="dropdown"><a class="text-white dropdown-item dropdown-toggle display-4" href="fertilitytests.php" data-toggle="dropdown-submenu" aria-expanded="false">Fertility Tests</a><div class="dropdown-menu dropdown-submenu"><a class="text-white dropdown-item display-4" href="femaleanalysis.php">Female Analaysis</a><a class="text-white dropdown-item display-4" href="eggcount.php" aria-expanded="false">Egg Count (AMH) Test</a><a class="text-white dropdown-item display-4" href="semenanalysis.php" aria-expanded="false">Semen Analysis</a><a class="text-white dropdown-item display-4" href="killercells.php" aria-expanded="false">Natural Killer Cells</a><a class="text-white dropdown-item display-4" href="genetictesting.php" aria-expanded="false">Genetic Testing PGT</a><a class="text-white dropdown-item display-4" href="nextgeneration.php" aria-expanded="false">Next Generation Sequencing</a><a class="text-white dropdown-item display-4" href="karyomapping.php" aria-expanded="false">Karyomapping</a><a class="text-white dropdown-item display-4" href="geneticsclinic.php" aria-expanded="false">Genetics Clinic</a></div></div><div class="dropdown"><a class="text-white dropdown-item dropdown-toggle display-4" href="treatments.php" aria-expanded="false" data-toggle="dropdown-submenu">Fertility Treatments</a><div class="dropdown-menu dropdown-submenu"><a class="text-white dropdown-item display-4" href="ovulationcycle.php" aria-expanded="false">Ovulation Cycle Tracking</a><a class="text-white dropdown-item display-4" href="ovulationinduction.php" aria-expanded="false">Ovulation Induction (OI)</a><a class="text-white dropdown-item display-4" href="artificialinsemination.php" aria-expanded="false">Artificial Insemination (IUI)</a><a class="text-white dropdown-item display-4" href="ivf.php" aria-expanded="false">IVF Treatment</a><a class="text-white dropdown-item display-4" href="icsi.php" aria-expanded="false">ICSI Treatment</a><a class="text-white dropdown-item display-4" href="fet.php" aria-expanded="false">Frozen Embryo Transfer (FET)</a><a class="text-white dropdown-item display-4" href="fertilitysurgery.php" aria-expanded="false">Fertility Surgery</a><a class="text-white dropdown-item display-4" href="vasectomy.php" aria-expanded="false">Advanced Science</a><a class="text-white dropdown-item display-4" href="digitalhighmag.php" aria-expanded="false">Digital High Magnification</a><a class="text-white dropdown-item display-4" href="aiinivf.php" aria-expanded="false">Artificial Intelligence in IVF</a><a class="text-white dropdown-item display-4" href="hatching.php" aria-expanded="false">Assisted Hatching</a><a class="text-white dropdown-item display-4" href="polscope.php" aria-expanded="false">PolScope</a></div></div><a class="text-white dropdown-item display-4" href="consultation.php" aria-expanded="false">Online Consultation</a></div></li><li class="nav-item">
                    <a class="nav-link link text-white display-4" href="aboutus.php"><span class="mobi-mbri mobi-mbri-file mbr-iconfont mbr-iconfont-btn"></span>
                        
                        About Us
                    </a>
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
    <title>Edit Consultation Details</title>
    <style type="text/css">
        body{  }
        .wrapper{ width: 500px; padding: 20px; }
    </style>
</head>
<body>
  <br>
  <br>
  <br>
  <br>
    <center><div class="wrapper">
        <h2>Edit Consultation Details</h2>
        <br>
        <form method="post" action="edit_consultation.php" enctype="multipart/form-data">
        <table class="table">
          <tr>
            <th>Consultation ID</th>
            <td><input type="text" name="consultationID" value="<?php echo $row['consultationID'];?>" readOnly="true"></td>
          </tr>
          <tr>
            <th>Consultation Date</th>
            <td><input type="text" name="consultationDate" value="<?php echo $row['consultationDate'];?>" required></td>
          </tr>
          <tr>
            <th>Symptoms</th>
            <td><textarea name="symptoms"  cols="40"><?php echo $row['symptoms'];?></textarea></td>
          </tr>
          <tr>
            <th>History</th>
            <td><textarea name="history" cols="40"><?php echo $row['history'];?></textarea></td>
          </tr>
          <tr>
            <th>Diagnosis</th>
            <td><textarea name="diagnosis" cols="40"><?php echo $row['diagnosis'];?></textarea>
              <a href="diagnosisDB.php"><input type="button" value="Select Diagnosis" onclick="myFunction()"></a></td>
          </tr>
          <tr>
            <th>Treatments</th>
            <td><textarea name="treatments" cols="40"><?php echo $row['treatments'];?></textarea>
              <a href="diagnosisDB.php"><input type="button" value="Select Treatments" onclick="myFunction()"></a>
            </td>
          </tr>
          <tr>
            <th>Suggestion</th>
            <td><textarea name="suggestion" cols="40"><?php echo $row['suggestion'];?></textarea></td>
          </tr>
          <tr>
            <th>Doctor ID</th>
            <td><input type="text" name="doctorID" value="<?php echo $row['doctorID'];?>" required></td>
          </tr>
        </table>
        <input type="submit" name="save_change" value="Change" class="btn btn-primary">
        <input type="reset" value="Reset" class="btn btn-default"></a>
        <a href ="manageconsultation.php"><input type="button" value="Cancel" class="btn btn-default"></a>
      </form>
    </div> </center>   
</body>
</html>