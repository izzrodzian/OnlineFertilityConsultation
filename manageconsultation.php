
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

$sql = "SELECT consultationID, patientID, consultationDate, symptoms, history, diagnosis, treatments, suggestion, doctorID FROM consultation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

  ?>

  <br>
  <br>
  <br>
  <br>
  <center>
<table border="0">
<tr>
  <td><img src="images/consultation.png" style="width:128px;height:128px;"></td>
  <td><h1>Manage Consultation Database</h1></td>
</tr>
</table>
</center>
<br>
  <table class="table" width="80%" style="margin-top: 20px" align="center">
    <tr>
      <th>Consultation ID</th>
      <th>Consultation Date</th>
      <th>Symptoms</th>
      <th>History</th>
      <th>Diagnosis</th>
      <th>Treatments</th>
      <th>Suggestion</th>
      <th>Doctor ID</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
      <td><?php echo $row['consultationID']; ?></td>
      <td><?php echo $row['consultationDate']; ?></td>
      <td><?php echo $row['symptoms']; ?></td>
      <td><?php echo $row['history']; ?></td>
      <td><?php echo $row['diagnosis']; ?></td>
      <td><?php echo $row['treatments']; ?></td>
      <td><?php echo $row['suggestion']; ?></td>
      <td><?php echo $row['doctorID']; ?></td>
      <td><a href="manageconsultation_edit.php?consultationID=<?php echo $row['consultationID']; ?>">Edit</a></td>
      <td><a href="manageconsultation_delete.php?consultationID=<?php echo $row['consultationID']; ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
   
   <?php   
}

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
  
  <title>Manage Consultation</title>
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


<br>
<br>
<center>
<table border="0">
<td><a href="doctordashboard.php">
  <input type="button" class="btn btn-primary" value="Doctor Dashboard">
</a></td>
</tr>
</table>
</center>
<br>
<br>