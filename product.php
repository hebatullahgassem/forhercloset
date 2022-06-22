
<?php  
    include 'config.php';
	session_start();
	
	$pid=$_GET['pid'];
    $query="SELECT * FROM products WHERE P_Id='$pid'";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result); 
	if(isset($_POST['submit'])){
		$nop=$_POST['nop'];
		header("location:cart.php?id=$pid&nop=$nop");
	}
?>

<div>
			<h4><?php echo $row['Name']; ?></h4>
			<img src="img/products/<?php echo $row['Photo']; ?>"/>
					<h4>Description</h4>
                    <p><?php echo $row['Description']; ?></p>
				<h4><?php echo  "$ ".$row['Price']; ?></h4>
				<h4><?php echo  "No. of Products:  ".$row['Quantity']; ?></h4>
                    <form method="post">
						<select name="nop">
							<?php for ($i=1 ;$i<=$row['Quantity'];$i++) { ?>
							<option value="<?php echo $i; ?>"> <?php echo $i; $_POST['nop']=$i;?></option>
							<?php } ?>
						</select>
						<button  name="submit"> Add to Cart</button>								
					</form>		
</div>