<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fertility";

// if save change happen
	if(!isset($_POST['save_change'])){
		echo "Something wrong!";
		exit;
	}

	$doctorID = trim($_POST['doctorID']);
	$doctorEmail = trim($_POST['doctorEmail']);
	$doctorPassword = trim($_POST['doctorPassword']);
	$doctorName = trim($_POST['doctorName']);
	$doctorSpecialty = trim($_POST['doctorSpecialty']);
	$doctorPhone = trim($_POST['doctorPhone']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "UPDATE doctor SET  
	doctorID = '$doctorID', 
	doctorEmail = '$doctorEmail', 
	doctorPassword = '$doctorPassword', 
	doctorName = '$doctorName',
	doctorSpecialty = '$doctorSpecialty',
	doctorPhone = '$doctorPhone'
	WHERE doctorID = '$doctorID'";
	

	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: managedoctor.php?doctorID=$doctorID");
	}

$conn->close();
?>