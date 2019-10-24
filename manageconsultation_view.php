
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
if(isset($_GET['diagnosisID'])){
    $diagnosisID = $_GET['diagnosisID'];
  }


  // get diagnosis data
  $query = "SELECT symptoms, diagnosis, explanation, treatments FROM diagnosisDB WHERE diagnosisID = '$diagnosisID'";
  $result = mysqli_query($conn, $query);
  // if(!$result){
  //   echo "Can't retrieve data " . mysqli_error($conn);
  //   exit;
  // }
  
  if(isset($_POST['confirm'])){
    $diagnosis = $_POST['diagnosis'];
    $treatments = $_POST['treatments'];

    $sql = "INSERT INTO consultation (diagnosis, treatments) VALUES (?, ?)";
    $query2 = mysqli_query($conn, $sql);
  }



$conn->close();

?>

  <style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/images/search.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 50%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>




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
  
  <title>Diagnosis DB</title>
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
  <br>
  <br>
  <center>
<table border="0">
<tr>
  <td><img src="images/consultation.png" style="width:128px;height:128px;"></td>
  <td><h1>Manage Diagnosis Database</h1></td>
</tr>
</table>

<br>
<form method="post">
<table id="myTable" style="margin-top: 20px; width: 95%" align="center">
  
    <tr>
    
      <th  style="width: 30%;">Symptoms</th>
      <th>Diagnosis</th>
      <th>Explanation</th>
      <th>Treatments</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
      
      <td><?php echo $row['symptoms']; ?></td>
      <td><?php echo $row['diagnosis']; ?></td>
      <td><?php echo $row['explanation']; ?></td>
      <td><?php echo $row['treatments']; ?></td>
    </tr>
    <?php } ?>
</table>
  <a href="manageconsultation_edit.php?consultationID=<?php echo $row['consultationID']; ?>"><input type="submit" name="confirm" value="Confirm" class="btn btn-primary"></a>
</form>
</center>

<br><br>