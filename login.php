<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="topnav">
  <a class="active" href="#">Home</a>
  <a href="#">Customers</a>
  <a href="#">Salesperson</a>
  <a href="#">Products</a>
  <a href="#">Users</a> 
  <a href="#" style="color: red;">logout</a>
  </div> 
  <div class="header">
  	<center><h3>Login</h3></center>
  </div>
	 
  <form method="post" action="loginConnection.php">
  	<div>
      <label>User Name</label>
      <input type="text" name="username" > 
    </div>
    <div>
      <label>Password</label>
      <input type="password" name="password">  
    </div>
    <div>
      <button type = "submit" name="login">Login</button>  
    </div>
    <div>
      <p>Not a member yet? <button type="submit" name= "register" formaction="register.php">Sign Up</button></p>
    </div>
  </form>
</body>
</html>
