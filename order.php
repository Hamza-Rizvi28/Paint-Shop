 <?php  include('connection.php'); 

if (isset($_GET['edit'])) {
	$id= $_GET['edit'];
	$update=true;
	$answer = mysqli_query($conn, "SELECT * FROM SALESORDER_13195 WHERE ORDERID= $id");
	
	
		$record= mysqli_fetch_array($answer);
		$orderid = $record['ORDERID'];
		$customername = $record['SHOPID'];
		$orderdate = $record['ORDERDATE'];
		$salesperson = $record['SPID'];
		$product = $record['PCODE'];
		$quantity = $record['QUANTITY'];
		$rate = $record['RATE'];
		$amount = $record['AMOUNT'];
	
}

?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Paint Shop</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" rel="stylesheet">
 </head>
 <body>
 	<div class="topnav">
  		<a class="active" href="home.php">Home</a>
  		<a href="index.php">Customers</a>
  		<a href="product.php">Products</a>
  		<a href="order.php">Sales Order</a> 
  		<a href="login.php?logout='1'" style="color: red;">logout</a>
	</div> 

	<?php $results = mysqli_query($conn, "SELECT * FROM SALESORDER_13195"); ?>

<table>
	<thead>
		<tr>
			<th>Order ID</th>
			<th>Customer Name</th>
			<th>Order Date</th>
			<th>Salesperson</th>
			<th>Product</th>
			<th>Quantity</th>
			<th>Rate</th>
			<th>Amount</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php
		while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td> 
				<?php echo $row['ORDERID']; ?> 
			</td>
			<td>
				<?php echo $row['SHOPID']; ?>	
			</td>
			<td> 
				<?php echo $row['ORDERDATE']; ?> 
			</td>
			<td> 
				<?php echo $row['SPID']; ?> 
			</td>
			<td> 
				<?php echo $row['PCODE']; ?> 
			</td>
			<td> 
				<?php echo $row['QUANTITY']; ?> 
			</td>
			<td> 
				<?php echo $row['RATE']; ?> 
			</td>
			<td> 
				<?php echo $row['AMOUNT']; ?> 
			</td>
			
			<td>
				<a href="order.php?edit= <?php echo $row['ORDERID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<!-- <a href="connection.php?del=<?php echo $row['SHOPID']; ?>" class="del_btn">Delete</a> -->
			</td>
		</tr>	
	<?php } ?>
</table>

		<form method="post" action="connection.php">
			<!-- <input type="hidden" name="id" value= "<?php echo $customerid; ?>"> -->
			<div class="input-group">
				<label>Order ID</label>
				<input type="text" name="orderid" value="<?php  echo $orderid?>">
			</div>

			<div class="input-group">
				<label>Customer Name</label>
				<input type="text" name="customername" value="<?php  echo $customername?>">
			</div>

			<div class="input-group">
				<label>Order Date</label>
				<input type="text" name="orderdate" value="<?php  echo $orderdate?>">
			</div>

			<div class="input-group">
				<label>Sales Person</label>
				<input type="text" name="salesperson" value="<?php  echo $salesperson?>">
			</div>

			<div class="input-group">
				<label>Product</label>
				<input type="text" name="product" value="<?php  echo $product?>">
			</div>

			<div class="input-group">
				<label>Quantity</label>
				<input type="text" name="quantity" value="<?php  echo $quantity?>">
			</div>

			<div class="input-group">
				<label>Rate</label>
				<input type="text" name="rate" value="<?php  echo $rate?>">
			</div>

			<div class="input-group">
				<label>Amount</label>
				<input type="text" name="amount" value="<?php  echo $amount?>">
			</div>

			<div class="input-group">
				<?php if ($update==false): ?>
					<button type= "submit" name="order_save" class= "bttn">Save</button>	
				<?php else: ?> 
					<button type= "submit" name="order_update" class= "bttn">Update</button>
				<?php endif ?>
			</div>
		</form>
 </body>
 </html>