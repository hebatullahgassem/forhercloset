<html>
<head>
<title>forhercloset/cart</title>
<link rel="stylesheet" href="css/cart.css">
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

</body>
</html>
<?php
 session_start();
include 'config.php';
	 $nop= $_GET['nop'];
	 $uid=$_SESSION['uid'];
	 $pid=$_GET['id'];
	 $query="SELECT * FROM products WHERE P_Id='$pid'";
	 $result=mysqli_query($conn,$query);
	 $row=mysqli_fetch_array($result);
	 $price=$row['Price'];
	 $total=$nop*$price;
	if($uid){
		$query1="UPDATE products SET Quantity=Quantity- $nop WHERE P_Id=$pid";
		$result1=mysqli_query($conn,$query1);
		$query2="INSERT INTO orders (U_Id,P_Id,Quantities,Time,Total,Status) VALUES( '$uid', '$pid','$nop',NOW(), '$total','0')";
		$result2=mysqli_query($conn,$query2);
		if($result&&$result1&&$result2){
		 ?>
		 <script>
		 alert("Done")	
		 window.location = " product.php?pid=<?php echo $pid;?>"
		 </script>
		 <?php
		 }else{
		 ?>
		 <script>
		 alert("Error")
		 </script>
		<?php
		 }
	}else{
		?>
		 <script>
		 alert("please login/register first")
		  window.location = "login.php"
		 </script>
		<?php
	}
		?>