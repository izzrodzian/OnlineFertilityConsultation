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

	$diagnosisID = trim($_POST['diagnosisID']);
	$diagnosis = trim($_POST['diagnosis']);
	$symptoms = trim($_POST['symptoms']);
	$explanation = trim($_POST['explanation']);
	$treatments = trim($_POST['treatments']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "UPDATE diagnosisDB SET  
	diagnosisID = '$diagnosisID', 
	diagnosis = '$diagnosis', 
	symptoms = '$symptoms', 
	explanation = '$explanation',
	treatments = '$treatments'
	WHERE diagnosisID = '$diagnosisID'";
	

	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: managediagnosis.php?diagnosisID=$diagnosisID");
	}

$conn->close();
?>