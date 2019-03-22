<?php 
include("header.php");

if(	$_SERVER['REQUEST_METHOD']==='GET'){
$product_id=$_GET['product_id'];
// create object of Rep class
$prodobj = new Product();

$prod = $prodobj->editProduct($product_id);
	
//echo print_r($prod);

	}
?>
<div class="container">
	<div class="row" id="id012">
		<form class="modal-content2" action="updateproduct.php?" method="post" >
		<div class="row">
		<div class="col" style="margin-left:10px;">
			<h1>Edit :  <?php echo $prod['p_name']." | ".$prod['manufacturer']; ?></h1>
			<p>Please kindly Edit a Product</p>
		</div>
		</div>
				<hr>
			<div class="row" style="padding:10px;">
			
			<div class="col-md-12">
				<label>
					<b>Product Name</b>
				</label>
				<input type="text" name="p_name" required value="<?php if(isset($prod['p_name'])){echo $prod['p_name'];} ?>">

				<label>
					<b>Manufacturer</b>
				</label>
				<input type="text" name="manufacturer" required value="<?php if(isset($prod['manufacturer'])){echo $prod['manufacturer'];} ?>">

				<label >
					<b>Price</b>
				</label>
				<input type="text" name="price" required value="<?php if(isset($prod['price'])){echo $prod['price'];} ?>">
				
				<input required type="hidden" name="product_id" value="<?php echo $prod['product_id'];?>"/>
				
				<input required type="hidden" name="rep_id" value="<?php echo $prod['rep_id'];?>"/>

				<p>By Editing this product you agree to our <a href='#' style='color:dodgerblue;'>Terms and Privacy</a> </p>
				<div class="clearfix2">
					<button  onclick="document.getElementById('id012').style.display='none'" class="cancelbtn2">Cancel</button><button type="submit" class="signup2">Save Changes</button>
				</div>
			</div>
		</div>
	</form>

</div>
</div>
<?php include('footer.php'); ?>