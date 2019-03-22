<?php	
	date_default_timezone_set("Africa/Lagos");

	session_start();	

	if(!isset($_SESSION['rep_id'])){
		
	header("Location: http://localhost/pharmahub/");
		
	}
	//if(!isset($_SESSION['product_id'])){
	//	
	//header("Location: http://localhost/pharmahub/");
	//	
	//}
include('classes.php');

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link href='bootstrap/bootstrap.css' rel='stylesheet' type='text/css'>
	<link href="bootstrap/animate.css" rel="stylesheet" type="text/css">
	<link href="css/external.css" rel="stylesheet" type="text/css">
	<style type="text/css">

	</style>
</head>

<body class="bd">
	<div class="container-fluid">
		<div class="row">
			<!-------------------------------------------------------------------------------------------->
			<!------------------------------------- SIDE BAR --------------------------------------------->
			<!-------------------------------------------------------------------------------------------->
			<div class="col-md-3" id="mainrw">
				<div id="rw1">
					<div class="col"><a href='msrdashboard.php'><img src="images/pharma1.jpg" style="width:140px; height:140px; margin-left:68px; margin-top:4px;"></a></div>
				</div>

				<div class="row rw">
					<div class="col">
						<p class="sidep"><a href="#" >Messages</a></p>
					</div>
				</div>

				<div class="row rw">
					<div class="col">
						<p class="sidep"><a href="#">Products</a></p>
					</div>
				</div>

				<div class="row rw">
					<div class="col">
						<p class="sidep"><a href="#">View MSR</a></p>
					</div>
				</div>

				<div class="row rw">
					<div class="col">
						<p class="sidep"><a href="#">View Pharmacy</a></p>
					</div>
				</div>

				<div class="row rw">
					<div class="col">
						<p class="sidep"><a href="addproduct.php" onclick="document.getElementById('id012').style.display='block'">Add Item</a></p>
					</div>
				</div>

				<div id="rwbtm">
					<div class="col">
						<p class="sidep"><a href="editrep.php?rep_id=<?php echo $_SESSION['rep_id'];?>">Edit Account</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-9 dash">

				<!-------------------------------------------------------------------------------------------->
				<!-------------------------------------------------------------------------------------------->
				<!-------------------------------------------------------------------------------------------->
