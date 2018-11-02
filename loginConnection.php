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
	$id_records= mysqli_query($conn, "SELECT USERID,USERNAME,PASSWORD FROM USERS_13195");


	if (isset($_POST['signup'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$active= "NO";
		$salesperson="NO";
		mysqli_query($conn, "INSERT INTO USERS_13195(USERNAME,PASSWORD,ACTIVE,SALESPERSON) VALUES ('$username', '$password','$active', '$salesperson')");
		header('location: users.php'); 	
	}
	$count=0;
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if ($username == 'admin' && $password=="admin") {
			$_SESSION['message'] = "Admin access granted!"; 
			header('location: admin.php');
		}
		else if ($username != 'admin' || $password != "admin"){
			//$row=mysqli_fetch_array($id_records,MYSQLI_ASSOC);
			while ($row=mysqli_fetch_array($id_records,MYSQLI_ASSOC)) {
				if ($username == $row['USERNAME'] && $password==$row['PASSWORD']) {
					$_SESSION['message'] = "User access granted!"; 
					header('location: home.php');
				}
				else {
					$count++;
				}				
			}
			$answer= mysqli_query($conn, "SELECT * FROM USERS_13195");
			if ($answer->num_rows == $count) {
				$_SESSION['message'] = "Enter valid credentials!";
				header('location:login.php');
			}	
		}
		
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location: login.php');
	}