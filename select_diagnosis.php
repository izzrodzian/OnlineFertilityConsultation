<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fertility";

// if save change happen
	if(!isset($_POST['select_diagnosis'])){
		echo "Something wrong!";
		exit;
	}

	$diagnosis = trim($_POST['diagnosis']);
	$treatments = trim($_POST['treatments']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "UPDATE consultation SET  
	diagnosis = '$[diagnosis]',
	treatments = '$[treatments]',
	WHERE consultationID = '$consultationID'";
	

	// two cases for fie , if file submit is on => change a lot
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't update data " . mysqli_error($conn);
		exit;
	} else {
		header("Location: manageconsultation.php?consultationID=$consultationID");
	}

$conn->close();
?>