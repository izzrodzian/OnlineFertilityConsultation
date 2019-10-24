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
if(isset($_GET['doctorID'])){
    $doctorID = $_GET['doctorID'];
  } else {
    echo "Empty query!";
    exit;
  }

  if(!isset($doctorID)){
    echo "Empty Doctor ID! check again!";
    exit;
  }

  // get doctor data
  $query = "SELECT * FROM doctor WHERE doctorID = '$doctorID'";
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
  
  <title>Edit Doctor Details</title>
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
    <title>Edit Doctor Details</title>
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
        <h2>Edit Doctor Details</h2>
        <br>
        <form method="post" action="edit_doctor.php" enctype="multipart/form-data">
        <table class="table">
          <tr>
            <th>Doctor ID</th>
            <td><input type="text" name="doctorID" value="<?php echo $row['doctorID'];?>" readOnly="true"></td>
          </tr>
          <tr>
            <th>Doctor Email</th>
            <td><input type="text" name="doctorEmail" value="<?php echo $row['doctorEmail'];?>" required></td>
          </tr>
          <tr>
            <th>Doctor Password</th>
            <td><input type="text" name="doctorPassword" value="<?php echo $row['doctorPassword'];?>" required></td>
          </tr>
          <tr>
            <th>Doctor Name</th>
            <td><input type="text" name="doctorName" value="<?php echo $row['doctorName'];?>" required></td>
          </tr>
          <tr>
            <th>Doctor Specialty</th>
            <td><input type="text" name="doctorSpecialty" value="<?php echo $row['doctorSpecialty'];?>" required></td>
          </tr>
          <tr>
            <th>Doctor Phone</th>
            <td><input type="text" name="doctorPhone" value="<?php echo $row['doctorPhone'];?>" required></td>
          </tr>
        </table>
        <input type="submit" name="save_change" value="Change" class="btn btn-primary">
        <input type="reset" value="Reset" class="btn btn-default">
      </form>
      <a href="managedoctor.php" class="btn btn-success">Confirm</a>
    </div> </center>   
</body>
</html>