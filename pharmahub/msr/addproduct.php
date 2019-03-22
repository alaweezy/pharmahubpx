<?php
include('header.php');


//echo "<pre>";
//echo print_r($_POST);
//echo "</pre>";

// create object of User clss
$prod = new Product();


?>

<div class="container">
<div class="row">
	<div class="col-sm-8">
		<div class="responsive" style="margin-top:5px; margin-bottom:20px; color:beige; border-bottom:4px solid beige; font-size:20px;">
			Welcome! <b><?php echo $_SESSION['rep_fname']; ?></b><?php echo " |  "?><?php echo $_SESSION['employer']; ?><?php echo "      " ?><span style="font-size:13px;"><?php echo date('l jS \of F Y'); ?></span>
			<a href="logout.php" style="float:right; color:beige; text-decoration:none;">Logout</a>
		</div>
	</div>

	<div class="col-sm-4">
		<input style="z-index:2; background-color:rgba(0,0,0,0.5); margin-top:10px; border-radius:12px; width:300px; height:30px; color:white; font-size:15px;" type="text" name="seachbar" id="searchbar" placeholder="Search" autocomplete="off" responsive>
	</div>

</div>
<div class="row" style="z-index:0;">

	<div class="col-sm-8"></div>

	<div class="col-sm-4" id="displayusers" style="color:beige;"></div>

</div>
<!------------------------------------------------------------------------------------------------------>
<!--------------------------------------- ADD PRODUCT MODAL -------------------------------------------->
<!------------------------------------------------------------------------------------------------------>
	<div class="row" id="id012">
		<span class="close1" title="Close Modal">
			&times;
		</span>
<form class="modal-content1" action="myproducts.php" method="post" responsive>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Add New Product </h1>
	
			</div>
		</div>
				<hr>
				
		<div class="row">		
			<div class="col-md-2"></div>
			<div class="col-md-8">
				
					<b>Product Name</b>
				
				<input type="text" placeholder="Enter Product Name" name="p_name">

				
					<b>Manufacturer</b>
			
				<input type="text" placeholder="Enter Manufacturer" name="manufacturer">

			
					<b>Price</b>
				
				<input type="text" placeholder="Enter Price" name="price">

			
					<b>Photo</b>
				
				<input type="text" placeholder="Enter Photo" name="p_photo">
	
<div class="input-group-addon">
					<?php
					$catid = $_POST['catid'];
					// create object of user class
					$catobj = new Product();
					
					$cat = $catobj->getProduct($catid);
					
					//var_dump($roles);
					
					
					?>
					<select name="catid">
						<span></span>
						<option>Choose Category</option>
					<!-- include php code -->
		
					<?php
					//for($c = 0; $c < count($category); $c++){
//
					//echo "<option value='".$cat[$c]['catid']."'>".$cat[$c]['catname']."</option>";
					//
					//$catid = $cat[$c]['catid'];
					//$catname = $cat[$r]['catname'];
					//echo "<option value=\"catid\">$catname</option>";
					
					
					foreach($cat as $value){
						$catid = $value['catid'];
						$catname = $value['catname'];
					echo "<option value=\"$catid\">$catname</option>";
					}
					
				  ?>
 
				</select>
				</div>				
				<p>By adding a product you agree to our <a href='#' style='color:dodgerblue;'>Terms and Privacy</a> </p>
				<div class="clearfix1">
					<button type='button' onclick="document.getElementById('id012').style.display='none'" class="cancelbtn1">Cancel</button><button type="submit" class="signup1">Add</button>
				</div>
<div class="col-md-2"></div>
			</div>
		</div>
	</div>
</form>
</div>


</div>

<?php include('footer.php'); ?>