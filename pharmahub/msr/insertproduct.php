<?php 

include("classes.php");
include("header.php");

if(	$_SERVER['REQUEST_METHOD']==='GET'){
$product_id=$_GET['product_id'];
// create object of Rep class
$proobj = new Product();

$proo = $proobj->editProduct($product_id);
	
//echo print_r($rep);

	}
?>
<div class="container">
	<div class="row" id="id012">
		<form class="modal-content2" action="msrdashboard.php?rep_id=<?php echo $_SESSION['product_id'];?>" method="post" >
		<div class="row">
		<div class="col" style="margin-left:10px;">
			<h1>Edit :  <?php echo $rep['rep_fname']." | ".$rep['employer']; ?></h1>
			<p>Please kindly Add a Product</p>
		</div>
		</div>
				<hr>
			<div class="row" style="padding:10px;">
			
			<div class="col-md-6">
				<label>
					<b>Product Name</b>
				</label>
				<input type="text" name="p_name" required>

				<label>
					<b>Manufacturer</b>
				</label>
				<input type="text" name="manufacturer">

				<label >
					<b>Price</b>
				</label>
				<input type="text" name="price" required>
			</div>
			
			<div class="col-md-6">

				<p>By adding a Product you agree to our <a href='#' style='color:dodgerblue;'>Terms and Privacy</a> </p>
				<div class="clearfix2">
					<button type='submit'  class="cancelbtn2">Cancel</button><button type="submit" class="signup2">Save Changes</button>
				</div>
			</div>
		</div>
	</form>

</div>
</div>
<?php include('footer.php'); ?>