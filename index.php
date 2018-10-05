<?php  include('connection.php'); 

if (isset($_GET['edit'])) {
	$id= $_GET['edit'];
	$update=true;
	$answer = mysqli_query($conn, "SELECT * FROM CUSTOMERS_13195 WHERE SHOPID= $id");
	
	
		$record= mysqli_fetch_array($answer);
		$customerid = $record['SHOPID'];
		$customername = $record['SHOPNAME'];
		$contactperson = $record['CONTACTPERSON'];
		$contactnumber = $record['CONTACTNO'];
		$address = $record['ADDRESS'];
		$area = $record['AREA'];
		$coordinates = $record['COORDINATES'];
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>
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
		
		<?php $results = mysqli_query($conn, "SELECT * FROM CUSTOMERS_13195"); ?>

<table>
	<thead>
		<tr>
			<th>Customer ID</th>
				<th>Customer Name</th>
				<th>Contact Person</th>
				<th>Contact Number</th>
				<th>Address</th>
				<th>Area</th>
				<th>Coordinates</th>
				<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php
		while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td> 
				<?php echo $row['SHOPID']; ?> 
			</td>
			<td>
				<?php echo $row['SHOPNAME']; ?>	
			</td>
			<td> 
				<?php echo $row['CONTACTPERSON']; ?> 
			</td>
			<td> 
				<?php echo $row['CONTACTNO']; ?> 
			</td>
			<td> 
				<?php echo $row['ADDRESS']; ?> 
			</td>
			<td> 
				<?php echo $row['AREA']; ?> 
			</td>
			<td> 
				<?php echo $row['COORDINATES']; ?> 
			</td>
			<td>
				<a href="index.php?edit= <?php echo $row['SHOPID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="connection.php?del=<?php echo $row['SHOPID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>	
		
		
	<?php } ?>
</table>
	
		<form method="post" action="connection.php">
			<!-- <input type="hidden" name="id" value= "<?php echo $customerid; ?>"> -->
			<div class="input-group">
				<label>Customer ID</label>
				<input type="text" name="customerid" value="<?php  echo $customerid?>">
			</div>

			<div class="input-group">
				<label>Customer Name</label>
				<input type="text" name="customername" value="<?php  echo $customername?>">
			</div>

			<div class="input-group">
				<label>Contact Person</label>
				<input type="text" name="contactperson" value="<?php  echo $contactperson?>">
			</div>

			<div class="input-group">
				<label>Contact Number</label>
				<input type="text" name="contactnumber" value="<?php  echo $contactnumber?>">
			</div>

			<div class="input-group">
				<label>Address</label>
				<input type="text" name="address" value="<?php  echo $address?>">
			</div>

			<div class="input-group">
				<label>Area</label>
				<input type="text" name="area" value="<?php  echo $area?>">
			</div>

			<div class="input-group">
				<label>Coordinates</label>
				<input type="text" name="coordinates" value="<?php  echo $coordinates?>">
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