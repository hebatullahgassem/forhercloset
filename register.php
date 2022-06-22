<html>
<head>
<title>forhercloset/register</title>
<link rel="stylesheet" href="css/register.css">
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

<form  method="POST" action="home.php">
Username: <input type="text" name="username" placeholder="Enter Your Name">
<br>
Email: <input type="text" name="email" placeholder="Enter Your Email">
<br>
Password: <input type="password" name="password" placeholder="Enter Your password">
<br>
Phone: <input type="text" name="phone" placeholder="Enter Your Phone Number">
<br>
Address: <input type="text" name="address" placeholder="Enter Your addres">
<br>
<input type="submit" name="submit" value="Register">
</form>

<div class="footer"> 
<footer>
<h4> this is the footer</h4>
</footer>
</div>

</body>
</html>
<?php   
 include 'config.php';
 session_start();
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
	$query="SELECT * FROM users WHERE Username='username' and Email='$email' and Password='password' and Phone='phone' and Address='address'";
	$result=mysqli_query($conn,$query);
	if(trim($username)!=''){//check username is not empty 
		if (mysqli_num_rows($result)==false){//the user doesn't exist in db
			if (is_numeric($phone)&&$phone!=''&&strlen($phone)==11){
				$query1 ="INSERT INTO users(Username,Email,Password,Phone,Address";
				$query1.=")VALUES('$username','$email','$password','$phone','$address')";
				$result1=mysqli_query($conn,$query1);
				if($result1){
					$_SESSION['email']=$email;
    ?>
					<script>
						alert("Congratulations, You have successfully registered!.")
						window.location = "home.php"
					</script>
    <?php
				}else{
     ?>
					<script>
						alert("Oops!.Registration Failed ")
						window.location = "register.php"
					</script>
    <?php
				}//closes else >> if($result1)
			}//closes if (is_numeric($phone)&&$phone!=''&&(strlen($phone)==11)
		}//closes if ((mysqli_num_rows($result)==false)
	}//closes if(trim($username)!='')
}//closes if(isset($_POST['submit']))
?>
