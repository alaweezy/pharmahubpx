<?php 
include("header.php");

if(	$_SERVER['REQUEST_METHOD']==='GET'){
$rep_id=$_GET['rep_id'];
// create object of Rep class
$repobj = new Rep();

$rep = $repobj->editRep($rep_id);
	
//echo print_r($rep);

	}
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

<!-------------------------------------------------------------------------------------------------------->
<!---------------------------------------- EDIT USER ACCOUNT --------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<div class="container">
	<div class="row" id="id012">
		<form class="modal-content2" action="updaterep.php?" method="post" >
		<div class="row">
		<div class="col" style="margin-left:10px;">
			<h1>Edit :  <?php echo $rep['rep_fname']." | ".$rep['employer']; ?></h1>
			<p>Please kindly Edit your MSR Account</p>
		</div>
		</div>
				<hr>
			<div class="row" style="padding:10px;">
			
			<div class="col-md-6">
				<label>
					<b>Username</b>
				</label>
				<input type="text" name="username" required value="<?php if(isset($rep['username'])){echo $rep['username'];} ?>">

				<label>
					<b>Fullname</b>
				</label>
				<input type="text" name="rep_fname" required value="<?php if(isset($rep['rep_fname'])){echo $rep['rep_fname'];} ?>">

				<label >
					<b>Phone no</b>
				</label>
				<input type="text" name="rep_phone" required value="<?php if(isset($rep['rep_phone'])){echo $rep['rep_phone'];} ?>">

				<label>
					<b>Email</b>
				</label>
				<input type="text" name="email" value="<?php if(isset($rep['email'])){echo $rep['email'];} ?>" required >
			</div>
			
			<div class="col-md-6">
				<label>
					<b>Employer</b>
				</label>
				<input type="text" name="employer" required value="<?php if(isset($rep['employer'])){echo $rep['employer'];} ?>">

				<label><input type='checkbox' name="remember" style="margin-bottom:15px;"/>Remember me</label>
					
					
				<input required type="hidden" name="rep_id" value="<?php echo $rep['rep_id'];?>"/>
				
				
				<p>By editing you agree to our <a href='#' style='color:dodgerblue;'>Terms and Privacy</a> </p>
				<div class="clearfix2">
					<button type='submit' onclick="document.getElementById('id012').style.display='none'" class="cancelbtn2">Cancel</button><button type="submit" class="signup2">Save Changes</button>
				</div>
			</div>
		</div>
	</form>

</div>
</div>
<?php include('footer.php'); ?>