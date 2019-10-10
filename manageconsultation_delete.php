<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fertility";

$consultationID = $_GET['consultationID'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$query = "DELETE FROM consultation WHERE consultationID = '$consultationID'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Delete data unsuccessfully " . mysqli_error($conn);
    exit;
  }
  header("Location: manageconsultation.php");
$conn->close();


?>