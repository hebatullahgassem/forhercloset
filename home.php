<?php  
		include 'config.php';
		session_start();
		$email=$_SESSION['email'];
		$query="SELECT * FROM users where Email='$email'";
		$result=mysqli_query($conn,$query);
		$row=mysqli_fetch_assoc($result);
		$uid=$row['U_Id'];
		$_SESSION['uid']=$uid;
		$query = "SELECT * FROM products ORDER BY P_Id ASC";  
		$result = mysqli_query($conn, $query);   			  
               ?>
<html>
<head>
<title>forhercloset/home</title>
<link rel="stylesheet" href="css/home.css">
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
  


<!-- Navbar
<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">Transparent Nav</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
				<li class="nav-item">FOR HER CLOSET</li>
				<li class="nav-item"><a href="cart.php" class="nav-link text-uppercase font-weight-bold">Cart</a></li>
                    <li class="nav-item active"><a href="home.php" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="login.php" class="nav-link text-uppercase font-weight-bold">Login</a></li>
                    <li class="nav-item"><a href="register.php" class="nav-link text-uppercase font-weight-bold">Register</a></li>
                    <li class="nav-item"><a href="jackets.php" class="nav-link text-uppercase font-weight-bold">Jackets</a></li>
                    <li class="nav-item"><a href="tops.php" class="nav-link text-uppercase font-weight-bold">Tops</a></li>
					<li class="nav-item"><a href="jeans.php" class="nav-link text-uppercase font-weight-bold">Jeans</a></li>
					<li class="nav-item"><a href="checkout.php" class="nav-link text-uppercase font-weight-bold">Checkout</a></li>
					<li class="nav-item"><a href="logout.php" class="nav-link text-uppercase font-weight-bold">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>-->

<!--hero section-->
<div class="hero" id="home">
  <div class="hero__container">
<h1 class="hero__heading">When Elegance Turns To Be Life <span>STYLE</span></h1>
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
  </div>
</div>


<!--about section-->
<div class="main" id="about">
<div class="main__container">
<div class="main__img--container">
<div class="main__img--card"><i class="fas fa-layer-group"></i></div>
</div>
<div class="main__content">
<h1>What do we do?</h1>
<h2>We deliver design art to be available for every one</h2>
<p>Intrest to know more ?</p>
</div>
</div>
</div>

<!--footer section-->
<div class="footer__container">
<div class="footer__links">
<div class="footer__link--items">
<h2>Social Media</h2>
<a href="/">Facebook</a> <a href="/">Instagram</a>
<a href="/">Whatsapp</a>
</div>
</div>
<div class="contact">Contact Us <span>011124557036</span> </div>
</div>
<section class="social__media">
<div class="social__media--wrap">
<div class="footer__logo">
<a href="/" id="footer__logo">FOR HER CLOSET</a>
</div>
<p class="website__rights">&copy; for her closet 2021. All rights reserved</p>
<div class="social__icons">
<a href="/" class="social__icon--link" target="_blank"><i class="fab fa-facebook"></i></a>
<a href="/" class="social__icon--link"><i class="fab fa-instagram"></i></a>
<a href="/" class="social__icon--link"><i class="fab fa-Whatsapp"></i></a>
</div>
</div>
</section>
</div>

</body>
</html>




				 
				 