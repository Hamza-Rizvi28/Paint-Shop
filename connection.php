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

	//order delete
	if (isset($_GET['order_del'])) {
	$id = $_GET['order_del'];
	mysqli_query($conn, "DELETE FROM SALESORDER_13195 WHERE ORDERID=$id");
	$_SESSION['message'] = "Order deleted!"; 
	header('location: order.php');
	}

	//save order button 
	if (isset($_POST['order_save'])) {
		$orderid = $_POST['orderid'];
		$customername = $_POST['customername'];
		$orderdate = $_POST['orderdate'];
		$salesperson = $_POST['salesperson'];
		$product = $_POST['product'];
		$quantity = $_POST['quantity'];
		$rate = $_POST['rate'];
		$amount= intval($quantity) * intval($rate);
		if ('input[type=checkbox]:checked') {
			$return='Y';
		}
		else {
			$return= 'N';
		}
		
		//$amount = $_POST['amount'];
		mysqli_query($conn, "INSERT INTO SALESORDER_13195 VALUES ('$orderid', '$customername', '$orderdate', '$salesperson','$product', '$quantity', '$rate', '$amount', '$return')"); 
		$_SESSION['message'] = "Order saved"; 
		header('location: order.php');
	}

	//update order records
	
	if (isset($_POST['order_update'])) {
		$orderid = $_POST['orderid'];
		$customername = $_POST['customername'];
		$orderdate = $_POST['orderdate'];
		$salesperson = $_POST['salesperson'];
		$product = $_POST['product'];
		$quantity = $_POST['quantity'];
		$rate = $_POST['rate'];
		$amount = intval($quantity) * intval($rate);

		if ('input[type=checkbox]:checked') {
			$return='Y';
		}
		else {
			$return= 'N';
		}

		mysqli_query($conn, "UPDATE SALESORDER_13195 SET ORDERID='$orderid', SHOPID='$customername', ORDERDATE='$orderdate', SPID='$salesperson', PCODE= '$product', QUANTITY='$quantity', RATE= '$rate', AMOUNT='$amount', SALESRETURN='$return' WHERE ORDERID=$orderid");
		$_SESSION['message'] = "Address updated!"; 
		header('location: order.php');
	}
?>