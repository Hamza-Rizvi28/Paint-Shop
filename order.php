 <?php  include('connection.php'); 

if (isset($_GET['order_edit'])) {
	$id= $_GET['order_edit'];
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
				<a href="order.php?order_edit= <?php echo $row['ORDERID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="connection.php?order_del=<?php echo $row['ORDERID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>	
	<?php } ?>
</table>

		<form method="post" action="connection.php">
			
			<div class="input-group">
				<label>Order ID</label>
				<input type="text" name="orderid" value="<?php  echo $orderid?>">
			</div>

			<div class="input-group">
				<label>Customer Name</label>
				
				<?php $data= mysqli_query($conn, "SELECT SHOPNAME FROM CUSTOMERS_13195"); 
				echo '<select name="customername">';
    			echo '<option value="">--Please choose Customer--</option>';
				while ($row = mysqli_fetch_array($data)) {
					?>
					<option value="<?php  echo $row['SHOPNAME']?> "> <?php echo $row['SHOPNAME']; ?>	</option>
    			<?php	
				} 
				echo '</select>';
				?>
				</div>

			<div class="input-group">
				<label>Order Date</label>
				<input type="date" name="orderdate" value="<?php  echo $orderdate?>">
			</div>

			<div class="input-group">
				<label>Sales Person</label>
				<?php $data= mysqli_query($conn, "SELECT NAME FROM SALESPERSON_13195"); 
				echo '<select name="salesperson">';
    			echo '<option value="">--Please choose Salesperson--</option>';
    				
				while ($row = mysqli_fetch_array($data)) {
					?>
					<option value="<?php  echo $row['NAME']?> "> <?php echo $row['NAME']; ?>	</option>
    			<?php	
				} 
				echo '</select>';
				?>
			</div>

			<div class="input-group">
				<label>Product</label>
				<?php $data= mysqli_query($conn, "SELECT BRAND FROM PRODUCT_13195"); 
				echo '<select name="product">';
    			echo '<option value="">--Please choose Product--</option>';
    				
				while ($row = mysqli_fetch_array($data)) {
					?>
					<option value="<?php  echo $row['BRAND']?> "> <?php echo $row['BRAND']; ?>	</option>
    			<?php	
				} 
				echo '</select>';
				?>
			</div>

			<div class="input-group">
				<label>Quantity</label>

				<input type="text" name="quantity" value="<?php  echo $quantity?>">
			</div>

			<div class="input-group">
				<label>Rate</label>
				<?php $data= mysqli_query($conn, "SELECT SALESPRICE FROM PRODUCT_13195"); 
				echo '<select name= "rate">';
    			echo '<option value="">--Please choose rate--</option>';
    				
				while ($row = mysqli_fetch_array($data)) {
					?>
					<option value="<?php  echo $row['SALESPRICE']?> "> <?php echo $row['SALESPRICE']; ?>	</option>
    			<?php	
				} 
				echo '</select>';
				?>				
			</div>

			<div class="input-group">
				<label>Sales Return</label>
				<input type="checkbox" name="salesreturn">
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