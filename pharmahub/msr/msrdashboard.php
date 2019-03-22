<?php include('header.php'); ?>
<!-- MAIN BODY BOARD -->
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

<!-------------------------------- FIRST CARD ROWS ---------------------------------------->

<div class="row" style="z-index:0;">
	<!--- CARD ONE --->
	<div class="col-md-4">
		<div class="card text-white bg-success mb-3" >
			<div class="card-header" style="text-align:center;"><h5>OTC</h5></div>
			<div class="card-body">
				<p class="card-text"><a href="#otcmodal" data-toggle="modal" data-target="#otcmodal"><img class="msrimg" src="images/iconfinder_Bandage_2415608.png"></a></p>
			</div>
		</div>
	</div>

	<!--- CARD TWO --->
	<div class="col-md-4">
		<div class="card text-white bg-warning mb-3">
			<div class="card-header" style="text-align:center;"><h5>MEDICINES</h5></div>
			<div class="card-body">
				<p class="card-text"><a href="#"><img class="msrimg" src="images/iconfinder_Medicines_2415601.png"></a></p>
			</div>
		</div>
	</div>


	<!--- CARD THREE --->
	<div class="col-md-4">
		<div class="card text-white bg-danger mb-3">
			<div class="card-header" style="text-align:center;"><h5>INJECTIONS</h5></div>
			<div class="card-body">
				<p class="card-text"><a href="#"><img class="msrimg" src="images/iconfinder_Injection_2415602.png"></a></p>
			</div>
		</div>
	</div>

</div>


<!----------------------------------- SECOND CARD ROWS --------------------------------->

<div class="row">
	<!--- CARD ONE --->
	<div class="col-md-4">
		<div class="card text-white bg-info mb-3">
			<div class="card-header" style="text-align:center;"><h5>INSTRUMENTS</h5></div>
			<div class="card-body">
				<p class="card-text"><a href="#"><img class="msrimg" src="images/iconfinder_Svtethoscope_2415600.png"></a></p>
			</div>
		</div>
	</div>

	<!--- CARD TWO --->
	<div class="col-md-4">
		<div class="card text-white bg-warning mb-3">
			<div class="card-header"  style="text-align:center;"><h5>DENTAL</h5></div>
			<div class="card-body">
				<p class="card-text"><a href="#"><img class="msrimg" src="images/iconfinder_tooth_3708101.png"></a></p>
			</div>
		</div>
	</div>


	<!--- CARD THREE --->
	<div class="col-md-4">
		<div class="card text-white bg-success mb-3">
			<div class="card-header" style="text-align:center;"><h5>PHYSIO</h5></div>
			<div class="card-body">
				<p class="card-text"><a href="#"><img class="msrimg" src="images/iconfinder_Casual_exercise_4042256.png"></a></p>
			</div>
		</div>
	</div>

</div>

<!----------------------------------- THIRD CARD ROWS --------------------------------->

<div class="row">
	<!--- CARD ONE --->
	<div class="col-md-4">
		<div class="card text-white bg-info mb-3">
			<div class="card-header" style="text-align:center;"><h5>FERTILITY</h5></div>
			<div class="card-body">
				<p class="card-text"><a href="#"><img class="msrimg" src="images/iconfinder_uterus-womb-organ-female-reproduction_4312976.png"></a></p>
			</div>
		</div>
	</div>

	<!--- CARD TWO --->
	<div class="col-md-4">
		<div class="card text-white bg-danger mb-3">
			<div class="card-header" style="text-align:center;"><h5>BLOOD BANK</h5></div>
			<div class="card-body">
				<p class="card-text"><a href="#"><img class="msrimg" src="images/iconfinder_593_Blood_aid_blood_drop_droplets_drops_hospital_4212205.png"></a></p>
			</div>
		</div>
	</div>


	<!--- CARD THREE --->
	<div class="col-md-4">
		<div class="card text-white bg-info mb-3">
			<div class="card-header" style="text-align:center;"><h5>DERMATOLOGY</h5></div>
			<div class="card-body">
				<p class="card-text"><a href="#"><img class="msrimg" src="images/iconfinder_Hand_washing_4042267.png"></a></p>
			</div>
		</div>
	</div>

</div>

<?php include('footer.php'); ?>
