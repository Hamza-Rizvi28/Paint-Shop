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
	$customerid = "";
	$customername= "";
	$contactperson= "";
	$contactnumber= "";
	$address="";
	$area="";
	$coordinates="";
	$update = false;

	$orderid = "";
		$customername = "";
		$orderdate = "";
		$salesperson = "";
		$product = "";
		$quantity = "";
		$rate = "";
		$amount = "";

	//save button 
	if (isset($_POST['save'])) {
		$customerid = $_POST['customerid'];
		$customername = $_POST['customername'];
		$contactperson = $_POST['contactperson'];
		$contactnumber = $_POST['contactnumber'];
		$address = $_POST['address'];
		$area = $_POST['area'];
		$coordinates = $_POST['coordinates'];
		mysqli_query($conn, "INSERT INTO CUSTOMERS_13195 VALUES ('$customerid', '$customername', '$contactperson', '$contactnumber',       '$address', '$area', '$coordinates')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

	//update records
	if (isset($_POST['update'])) {
		$customerid = $_POST['customerid'];
		$customername = $_POST['customername'];
		$contactperson = $_POST['contactperson'];
		$contactnumber = $_POST['contactnumber'];
		$address = $_POST['address'];
		$area = $_POST['area'];
		$coordinates = $_POST['coordinates'];
	

		mysqli_query($conn, "UPDATE CUSTOMERS_13195 SET SHOPID='$customerid', SHOPNAME='$customername', CONTACTPERSON='$contactperson', CONTACTNO='$contactnumber', ADDRESS= '$address', AREA='$area', COORDINATES= '$coordinates' WHERE SHOPID=$customerid");
		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
	}


	//show records
	$results = mysqli_query($conn, "SELECT * FROM CUSTOMERS_13195");

	// deleting records
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($conn, "DELETE FROM CUSTOMERS_13195 WHERE SHOPID=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
	}

	//save order button 
	if (isset($_POST['order_save'])) {
		$orderid = $_POST['ORDERID'];
		$customername = $_POST['SHOPID'];
		$orderdate = $_POST['ORDERDATE'];
		$salesperson = $_POST['SPID'];
		$product = $_POST['PCODE'];
		$quantity = $_POST['QUANTITY'];
		$rate = $_POST['RATE'];
		$amount = $_POST['AMOUNT'];
		mysqli_query($conn, "INSERT INTO SALESORDER_13195 VALUES ('$orderid', '$customername', '$orderdate', '$salesperson','$product', '$quantity', '$rate', '$amount')"); 
		$_SESSION['message'] = "Order saved"; 
		header('location: index.php');
	}

	//update order records
	/*
	if (isset($_POST['update'])) {
		$orderid = $_POST['ORDERID'];
		$customername = $_POST['SHOPID'];
		$orderdate = $_POST['ORDERDATE'];
		$salesperson = $_POST['SPID'];
		$product = $_POST['PCODE'];
		$quantity = $_POST['QUANTITY'];
		$rate = $_POST['RATE'];
		$amount = $_POST['AMOUNT'];

		mysqli_query($conn, "UPDATE SALESO_13195 SET SHOPID='$customerid', SHOPNAME='$customername', CONTACTPERSON='$contactperson', CONTACTNO='$contactnumber', ADDRESS= '$address', AREA='$area', COORDINATES= '$coordinates' WHERE SHOPID=$customerid");
		$_SESSION['message'] = "Address updated!"; 
		header('location: index.php');
	}*/
?>