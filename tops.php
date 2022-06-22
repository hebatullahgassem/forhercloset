<html>
<head>
<title>forhercloset/tops</title>
<link rel="stylesheet" href="css/tops.css">
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
		include 'config.php';
		session_start();
		$email=$_SESSION['email'];
		$query="SELECT * FROM users where Email='$email'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		$uid=$row['U_Id'];
		$_SESSION['uid']=$uid;
		$query = "SELECT * FROM products where Category='tops' ORDER BY P_Id ASC"; 
		$result = mysqli_query($conn, $query);   			  
               ?>

<?php
 if(mysqli_num_rows($result))  {  
                     while($row=mysqli_fetch_array($result)) {  
			    ?>  
               <div>
                     <a href="product.php?pid=<?php echo $row['P_Id'];?>">
                           <h4><?php echo $row["Name"]; ?></h4>
                           <img src="img/products/<?php echo $row["Photo"]; ?>" />
						    <h4><?php echo $row["Price"]; ?>EGP</h4>
                     </a>
                  </div>
                 <?php
				 }
				
				}
				 ?>
				 
				 