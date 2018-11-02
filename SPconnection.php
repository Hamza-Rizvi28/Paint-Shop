<?php
	
	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname= "Project1";

	// Creating connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Checking connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	// initialize variables
	$spid = "";
	$name= "";
	$contactnumber= "";
	$customers= "";
	$update = false;

	//save button 
	if (isset($_POST['save'])) {
		$spid = $_POST['spid'];
		$name = $_POST['spname'];
		$contactnumber = $_POST['contactnumber'];
		$customers = $_POST['customers'];
		mysqli_query($conn, "INSERT INTO SALESPERSON_13195 VALUES ('$spid', '$name', '$contactnumber', '$customers')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: salesperson.php');
	}

	//update records
	if (isset($_POST['update'])) {
		$spid = $_POST['spid'];
		$name = $_POST['spname'];
		$contactnumber = $_POST['contactnumber'];
		$customers = $_POST['customers'];
		mysqli_query($conn, "UPDATE SALESPERSON_13195 SET SPID='$spid', NAME='$name', CONTACTNO='$contactnumber', CUSTOMERS= '$customers'WHERE SPID=$spid");
		$_SESSION['message'] = "Address updated!"; 
		header('location: salesperson.php');
	}


	//show records
	$results = mysqli_query($conn, "SELECT * FROM SALESPERSON_13195");

	// deleting records
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM SALESPERSON_13195 WHERE SPID=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: salesperson.php');
}

?>
