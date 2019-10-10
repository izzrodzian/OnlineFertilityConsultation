<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fertility";

$patientID = $_GET['patientID'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$query = "DELETE FROM patient WHERE patientID = '$patientID'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Delete data unsuccessfully " . mysqli_error($conn);
    exit;
  }
  header("Location: managepatient.php");
$conn->close();


?>