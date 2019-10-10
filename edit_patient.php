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

	$patientID = trim($_POST['patientID']);
	$patientEmail = trim($_POST['patientEmail']);
	$patientPassword = trim($_POST['patientPassword']);
	$patientName = trim($_POST['patientName']);
	$patientIC = trim($_POST['patientIC']);
	$patientMaritalStatus = trim($_POST['patientMaritalStatus']);
	$patientPhone = trim($_POST['patientPhone']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "UPDATE patient SET  
	patientID = '$[patientID]', 
	patientEmail = '$patientEmail', 
	patientPassword = '$patientPassword', 
	patientName = '$patientName',
	patientIC = '$patientIC',
	patientMaritalStatus = '$patientMaritalStatus',
	patientPhone = '$patientPhone'
	WHERE patientID = '$patientID'";
	

	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: managepatient.php?patientID=$patientID");
	}

$conn->close();
?>