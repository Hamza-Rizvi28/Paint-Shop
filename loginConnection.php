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

	$username = "";
	$password= "";
	$id_records= mysqli_query($conn, "SELECT USERID FROM USERS_13195");


	if (isset($_POST['signup'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$active= "NO";
		$salesperson="NO";
		mysqli_query($conn, "INSERT INTO USERS_13195 VALUES (5,'$username', '$password','$active', '$salesperson')");
		header('location: users.php'); 	
	}

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if ($username == 'admin' && $password=="admin") {
			$_SESSION['message'] = "Admin access granted!"; 
			header('location: home.php');
		}
		else if ($username !== 'admin'){
			while ($row = mysqli_fetch_array($id_records)) {
				$id=$row['USERID'];
				if ($username == (mysqli_query($conn, "SELECT USERNAME FROM USERS_13195 where USERID= $id")) && $password == (mysqli_query($conn, "SELECT PASSWORD FROM USERS_13195 where USERID= $id"))) {
					$_SESSION['message'] = "Welcome "."$username";
					header('location: home.php');
					break;
				}
			}		
			// $_SESSION['message'] = "Enter valid credentials!";
			// header('location:login.php');
		}
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}