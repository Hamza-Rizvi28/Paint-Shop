<?php  include('Userconnection.php'); 

if (isset($_GET['edit'])) {
	$id= $_GET['edit'];
	$update=true;
	$answer = mysqli_query($conn, "SELECT * FROM USERS_13195 WHERE USERID= $id");
	
		$record= mysqli_fetch_array($answer);
		$userid = $record['USERID'];
		$username = $record['USERNAME'];
		$password = $record['PASSWORD'];
		$active = $record['ACTIVE'];
		$salesperson = $record['SALESPERSON'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="index.php">Customers</a>
  <a href="salesperson.php">Salesperson</a>
  <a href="product.php">Products</a>
  <a href="users.php">Users</a> 
  <a href="login.php?logout='1'" style="color: red;">logout</a>
  </div> 
	<?php if (isset($_SESSION['message'])) { ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
	<?php } ?>
		
		<?php $results = mysqli_query($conn, "SELECT * FROM USERS_13195"); ?>

<table>
	<thead>
		<tr>
			<th>USER ID</th>
			<th>USER NAME</th>
			<th>PASSWORD</th>
			<th>ACTIVE</th>
			<th>SALESPERSON</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php
		while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td> 
				<?php echo $row['USERID']; ?> 
			</td>
			<td> 
				<?php echo $row['USERNAME']; ?> 
			</td>
			
			<td>
				<?php echo $row['PASSWORD']; ?>	
			</td>
			<td> 
				<?php echo $row['ACTIVE']; ?> 
			</td>
			<td> 
				<?php echo $row['SALESPERSON']; ?> 
			</td>
			<td>
				<a href="users.php?edit= <?php echo $row['USERID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="Userconnection.php?del=<?php echo $row['USERID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>	
		
		
	<?php } ?>
</table>
	
		<form method="post" action="Userconnection.php">
			<!-- <input type="hidden" name="id" value= "<?php echo $customerid; ?>"> -->
			<div class="input-group">
				<label>User ID</label>
				<input type="text" name="userid" value="<?php  echo $userid?>">
			</div>

			<div class="input-group">
				<label>User Name</label>
				<input type="text" name="username" value="<?php  echo $username?>">
			</div>

			<div class="input-group">
				<label>Password</label>
				<input type="text" name="password" value="<?php  echo $password ?>">
			</div>

			<div class="input-group">
				<label>Active</label>
				<input type="text" name="active" value="<?php  echo $active ?>">
			</div>

			<div class="input-group">
				<label>Salesperson</label>
				<input type="text" name="salesperson" value="<?php  echo $salesperson?>">
			</div>
			<div class="input-group">
				<?php if ($update==false): ?>
					<button type= "submit" name="save" class= "bttn">Save</button>	
				<?php else: ?> 
					<button type= "submit" name="update" class= "bttn">Update</button>
				<?php endif ?>
			</div>
		</form>
</body>
</html>