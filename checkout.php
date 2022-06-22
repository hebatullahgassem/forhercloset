<?php
	include 'config.php';
	session_start();
	$uid=$_SESSION['uid'];
	if(!$uid){
		header('Location: login.php');
	}
	 $query="SELECT Name,Email,Phone,Address,products.Name,Photo,Price,SUM(Quantities) as qsum,SUM(Total)as tsum FROM orders JOIN products ON orders.P_Id=products.P_Id JOIN users ON orders.U_Id=users.U_Id WHERE users.U_Id='$uid' and Status='0' GROUP BY products.P_Id";
	 $result=mysqli_query($conn,$query);
/////////////////////////////////////////////////////////////////////////////
	 $query1="SELECT SUM(Total) as sumtotal from orders WHERE U_Id='$uid' and Status='0'";
	 $result1=mysqli_query($conn,$query1);
	 $row1=mysqli_fetch_array($result1);
/////////////////////////////////////////////////////////////////////////////
	$query2="SELECT * FROM users WHERE U_Id='$uid'";
	$result2=mysqli_query($conn,$query2);
	$row2=mysqli_fetch_array($result2);
/////////////////////////////////////////////////////////////////////////////
if(isset($_POST['submit'])){
	 $query3="UPDATE orders SET Status='1' WHERE U_Id=$uid";
	 $result3=mysqli_query($conn,$query3);
	  if($result3){
		 ?>
		 <script>
		 alert("Done. Your order will be delivered within 24 hours")
		 window.location = "home.php"
		 </script>  
		 <?php
}
}
	 ?>
<html>
<head>
<title>forhercloset/checkout</title>
<link rel="stylesheet" href="css/checkout.css">
</head>
<body>

 <div class="navbar__container">

<ul class="navbar__menu">
<li class="logo"><a href="home.php" class="navbar__links">FOR HER CLOSET</a></li>
      <li class="navbar__item">
  <a href="cart.php" class="navbar__links">Cart</a>
      </li>
      <li class="navbar__item">
  <a href="home.php" class="navbar__links">Home</a>
      </li>
      <li class="navbar__item">
  <a href="login.php" class="navbar__links">Login</a>
      </li>
      <li class="navbar__item">
  <a href="register.php" class="navbar__links">Register</a>
      </li>
	  <li class="navbar__item">
  <a href="jackets.php" class="navbar__links">Jackets</a>
      </li>
	        <li class="navbar__item">
  <a href="tops.php" class="navbar__links">Tops</a>
      </li>
	        <li class="navbar__item">
  <a href="jeans.php" class="navbar__links">Jeans</a>
      </li>
	        <li class="navbar__item">
  <a href="checkout.php" class="navbar__links">Checkout</a>
      </li>
      <li class="navbar__btn">
  <a href="logout.php" class="button">Logout</a>
      </li>
</ul>
  </div>
  
    
  	<div class="header">
	<header>
	<h2>this is header</h2>
	</header>
	</div>

<div style="width:45%;float:right;margin:0 5px;">
<form method="POST">
<div>
<h4>Cart Totals</h4>
<span>Subtotal:</span>
<div class="size-209">
<span>$<?php echo $row1['sumtotal'];?></span>
</div>
</div>

<div>
<span>Shipping:</span>
</div>
<div>
<span>$100</span>
</div>
<div>
<p>
<label>Name</label>
<input type="text" name="name" value="<?php echo $row2['Username'];?>" size="50">
</p>
<p> 
<label>Email</label>
<input type="text" name="email" value="<?php echo $row2['Email'];?>" size="50">
</p>
<p> 
<label>Address</label>
<input type="text" name="address" value="<?php echo $row2['Address'];?>" size="50">
</p>
<p> 
<label>Phone</label>
<input type="text" name="phone" value="<?php echo $row2['Phone'];?>" size="11">
</p>
</div>
<div>
<div>
<span>Total:</span>
</div>
<div>
<span>$<?php echo $row1['sumtotal']+100;?></span>
</div>
</div>
<div>
<input type="submit" name="submit" value="Checkout" style="background-color:#1d99ff;margin:15px 35%;padding:1% 5%;border-radius: 25px;"/>
</div>
</form>
</div>

</body>
</html>


		<table >
			<tr >
				<th>Product</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</tr>
		<?php
			while($row=mysqli_fetch_array($result)){
		?>
			<tr >				
				<td>
					<div>
						<img src="img/products/<?php echo $row['Photo'];?>" alt="IMG">
					</div>
				</td>
				<td><?php echo $row['Name'];?></td>
				<td><?php echo $row['Price'];?></td>
				<td><?php echo $row['qsum'];?></td>
				<td>$ <?php echo $row['tsum'];?></td>
			</tr>
		 <?php } ?>
		</table>
	