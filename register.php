<?php include('loginConnection.php') ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
</head>
<body>
	<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="#">Customers</a>
  <a href="#">Salesperson</a>
  <a href="#">Products</a>
  <a href="#">Users</a> 
  <a href="#" style="color: red;">logout</a>
  </div> 
  <div class="header">
  	<center><h3>REGISTER</h3></center>
  </div>
	 
  <form method="post" action="loginConnection.php">
  	<div>
      <label>User Name</label>
      <input type="text" name="username" > 
    </div>
    <div>
      <label>Password</label>
      <input type="varchar" name="password">  
    </div>
    <div>
      <button type = "submit" name="signup">Sign Up</button>  
    </div>
    <div>
    	<p>Already a member? <button type= "submit" name= "login" formaction="login.php">Login</button></p>
    </div>
  </form>
</body>
</html>