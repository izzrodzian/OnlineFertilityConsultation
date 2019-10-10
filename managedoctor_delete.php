<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fertility";

$doctorID = $_GET['doctorID'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$query = "DELETE FROM doctor WHERE doctorID = '$doctorID'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Delete data unsuccessfully " . mysqli_error($conn);
    exit;
  }
  header("Location: managedoctor.php");
$conn->close();


?>