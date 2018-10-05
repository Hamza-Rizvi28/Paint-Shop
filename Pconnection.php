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
	$pcode = "";
	$brand= "";
	$type= "";
	$shade= "";
	$size="";
	$salesprice="";
	$update = false;

	//save button 
	if (isset($_POST['save'])) {
		$pcode = $_POST['pcode'];
		$brand = $_POST['brand'];
		$type = $_POST['type'];
		$shade = $_POST['shade'];
		$size = $_POST['size'];
		$salesprice = $_POST['salesprice'];
		mysqli_query($conn, "INSERT INTO PRODUCT_13195 VALUES ('$pcode', '$brand', '$type', '$shade', '$size', '$salesprice')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: product.php');
	}

	//update records
	if (isset($_POST['update'])) {
		$pcode = $_POST['pcode'];
		$brand = $_POST['brand'];
		$type = $_POST['type'];
		$shade = $_POST['shade'];
		$size = $_POST['size'];
		$salesprice = $_POST['salesprice'];
		mysqli_query($conn, "UPDATE PRODUCT_13195 SET PCODE='$pcode', BRAND='$brand', TYPE='$type', SHADE='$shade', SIZE= '$size', SALESPRICE='$salesprice' WHERE PCODE=$pcode");
		$_SESSION['message'] = "Address updated!"; 
		header('location: product.php');
	}


	//show records
	$results = mysqli_query($conn, "SELECT * FROM PRODUCT_13195");

	// deleting records
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM PRODUCT_13195 WHERE PCODE=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: product.php');
}

?>
