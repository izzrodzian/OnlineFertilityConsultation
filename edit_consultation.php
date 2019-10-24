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

	$consultationID = trim($_POST['consultationID']);
	$consultationDate = trim($_POST['consultationDate']);
	$symptoms = trim($_POST['symptoms']);
	$history = trim($_POST['history']);
	$diagnosis = trim($_POST['diagnosis']);
	$treatments = trim($_POST['treatments']);
	$suggestion = trim($_POST['suggestion']);
	$doctorID = trim($_POST['doctorID']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "UPDATE consultation SET  
	consultationID = '$consultationID', 
	consultationDate = '$consultationDate', 
	symptoms = '$symptoms', 
	history = '$history',
	diagnosis = '$diagnosis',
	treatments = '$treatments',
	suggestion = '$suggestion',
	doctorID = '$doctorID'
	WHERE consultationID = '$consultationID'";
	
	

	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: manageconsultation_edit.php?consultationID=$consultationID");
	}

$conn->close();
?>