<?php
	
	session_start();

	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname= "Project1";

	// Creating connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Checking connection
	if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
	}

	// initialize variables
	$userid = "";
	$username = "";
	$password= "";
	$active= "";
	$salesperson= "";
	$update = false;

	//save button 
	if (isset($_POST['save'])) {
		$userid = $_POST['userid'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$active = $_POST['active'];
		$salesperson = $_POST['salesperson'];
		mysqli_query($conn, "INSERT INTO USERS_13195 VALUES ('$userid', '$username', '$password', '$active', '$salesperson')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: users.php');
	}

	//update records
	if (isset($_POST['update'])) {
		$userid = $_POST['userid'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$active = $_POST['active'];
		$salesperson = $_POST['salesperson'];
		mysqli_query($conn, "UPDATE USERS_13195 SET USERID='$userid', USERNAME='$username' ,PASSWORD='$password', ACTIVE='$active', SALESPERSON='$salesperson' WHERE USERID=$userid");
		$_SESSION['message'] = "Address updated!"; 
		header('location: users.php');
	}


	//show records
	$results = mysqli_query($conn, "SELECT * FROM USERS_13195");

	// deleting records
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM USERS_13195 WHERE USERID=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: users.php');
}

?>
