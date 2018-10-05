<?php  include('SPconnection.php'); 

if (isset($_GET['edit'])) {
	$id= $_GET['edit'];
	$update=true;
	$answer = mysqli_query($conn, "SELECT * FROM SALESPERSON_13195 WHERE SPID= $id");
	
	
		$record= mysqli_fetch_array($answer);
		$spid = $record['SPID'];
		$name = $record['NAME'];
		$contactnumber = $record['CONTACTNO'];
		$customers = $record['CUSTOMERS'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Salespersons</title>
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
		
		<?php $results = mysqli_query($conn, "SELECT * FROM SALESPERSON_13195"); ?>

<table>
	<thead>
		<tr>
			<th>Salesperson ID</th>
			<th>Name</th>
			<th>Contact Number</th>
			<th>Customers</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php
		while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td> 
				<?php echo $row['SPID']; ?> 
			</td>
			<td>
				<?php echo $row['NAME']; ?>	
			</td>
			<td> 
				<?php echo $row['CONTACTNO']; ?> 
			</td>
			<td> 
				<?php echo $row['CUSTOMERS']; ?> 
			</td>
			<td>
				<a href="salesperson.php?edit= <?php echo $row['SPID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="SPconnection.php?del=<?php echo $row['SPID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>	
		
		
	<?php } ?>
</table>
	
		<form method="post" action="SPconnection.php">
			<!-- <input type="hidden" name="id" value= "<?php echo $customerid; ?>"> -->
			<div class="input-group">
				<label>Salesperson ID</label>
				<input type="text" name="spid" value="<?php  echo $spid?>">
			</div>

			<div class="input-group">
				<label>Customer Name</label>
				<input type="text" name="spname" value="<?php  echo $name?>">
			</div>

			<div class="input-group">
				<label>Contact Number</label>
				<input type="text" name="contactnumber" value="<?php  echo $contactnumber?>">
			</div>

			<div class="input-group">
				<label>Customers</label>
				<input type="text" name="customers" value="<?php  echo $customers?>">
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