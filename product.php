<?php  include('Pconnection.php'); 

if (isset($_GET['edit'])) {
	$id= $_GET['edit'];
	$update=true;
	$answer = mysqli_query($conn, "SELECT * FROM PRODUCT_13195 WHERE PCODE= $id");
	
	
		$record= mysqli_fetch_array($answer);
		$pcode = $record['PCODE'];
		$brand = $record['BRAND'];
		$type = $record['TYPE'];
		$shade = $record['SHADE'];
		$size = $record['SIZE'];
		$salesprice = $record['SALESPRICE'];
		
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
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
		
		<?php $results = mysqli_query($conn, "SELECT * FROM PRODUCT_13195"); ?>

<table>
	<thead>
		<tr>
			<th>PRODUCT CODE</th>
				<th>BRAND</th>
				<th>TYPE</th>
				<th>SHADE</th>
				<th>SIZE</th>
				<th>SALES PRICE</th>
				<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php
		while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td> 
				<?php echo $row['PCODE']; ?> 
			</td>
			<td>
				<?php echo $row['BRAND']; ?>	
			</td>
			<td> 
				<?php echo $row['TYPE']; ?> 
			</td>
			<td> 
				<?php echo $row['SHADE']; ?> 
			</td>
			<td> 
				<?php echo $row['SIZE']; ?> 
			</td>
			<td> 
				<?php echo $row['SALESPRICE']; ?> 
			</td>
			<td>
				<a href="product.php?edit= <?php echo $row['PCODE']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="Pconnection.php?del=<?php echo $row['PCODE']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>	
		
		
	<?php } ?>
</table>
	
		<form method="post" action="Pconnection.php">
			<!-- <input type="hidden" name="id" value= "<?php echo $customerid; ?>"> -->
			<div class="input-group">
				<label>Product Code</label>
				<input type="text" name="pcode" value="<?php  echo $pcode?>">
			</div>

			<div class="input-group">
				<label>Brand</label>
				<input type="text" name="brand" value="<?php  echo $brand?>">
			</div>

			<div class="input-group">
				<label>Type</label>
				<input type="text" name="type" value="<?php  echo $type?>">
			</div>

			<div class="input-group">
				<label>Shade</label>
				<input type="text" name="shade" value="<?php  echo $shade?>">
			</div>

			<div class="input-group">
				<label>Size</label>
				<input type="text" name="size" value="<?php  echo $size?>">
			</div>

			<div class="input-group">
				<label>Sales Price</label>
				<input type="text" name="salesprice" value="<?php  echo $salesprice?>">
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