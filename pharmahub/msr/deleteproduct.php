<?php
include('header.php');

if($_SERVER['REQUEST_METHOD']==='GET'){
	
	$product_id = $_GET['product_id'];
	$p_name = $_GET['p_name'];
	$manufacturer = $_GET['manufacturer'];
}

	// checks if radio button value is yes / methos id post
if ($_SERVER['REQUEST_METHOD']==='POST' && $_POST['delete']=='yes') {
	// create object of User class
	$prodobj = new Product();
	
	$output = $prodobj->deleteProduct($_POST['product_id']);
	
	echo $output. "<a href='msrdashboard.php'>Back to Dashboard</a>";
}

if($_SERVER['REQUEST_METHOD']==='GET'){
	
	$productid = $_GET['product_id'];
	$p_name = $_GET['p_name'];
	$manufacturer = $_GET['manufacturer'];



?>
<h4>
	Are You sure you want to Delete
	<?php if(isset($p_name)){echo $_GET['p_name']; } ?>
	|
	<?php if(isset($manufacturer)){echo $_GET['manufacturer']; } ?>
	Data?

</h4>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
&nbsp;
<input type="radio" name="delete" value="yes"> Yes
<input type="radio" name="delete" value="no"> No
	
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
<input type="submit" name="submit" value="Delete"> 

</form>

<?php } ?>
<?php include('footer.php');?>