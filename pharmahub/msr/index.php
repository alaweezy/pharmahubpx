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

	<div class="container">
		<div class="row">
			<!-- style="margin-top: 10px; margin-left: 430px;" -->
			<div class="col-md-8">
				<div class='row' id="indexhd">
					<div class='col-12' style="color:beige; font-size:30px; text-align:center; margin:5px; font-family:Bisi;">
						<p>Genuine Manufacturers.......Legitimate Pharmacies</p><br>
					</div>
				</div>

				<div class="row" style="text-align:center; font-size:90px; margin:auto; font-family:Bisi; ">
					<div class="col-md-12" style=" margin-top:40px; margin-bottom:260px;">
						<div id="phub"><a href="#" style="text-decoration: none; color:beige; margin:auto;"> PharmaHub</a></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4"></div>
					<div class="col-4" id="btmfooter">

						<p style="color:black; font-size:30px; text-align:center; font-family:Bisi; margin-top: 10px;"><a href="#" style="text-decoration:none; color:black;">About us</a></p>
					</div>
					<div class="col-md-4"></div>
				</div>
			</div>


<?php
			
			
	// starts php session
session_start(); 
include('classes.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

$role = $_POST['role'];
$username = $_POST['username'];
$password = $_POST['password'];
//$role = $_POST['role'];

//var_dump($_POST);
// server side validation
	$err_username='';
	$err_password='';
	$err_role='';
	
	// validate role
	if($role == null){
		$err_role = 'Please select a Role!';
	}
	
	// validate username
	if(empty($username)){
		$err_username = "<div class='error'>Username Field is required!</div>";
	}elseif(strlen($username) < 4){
		$err_username = "<div class='error'>Invalid Username!</div>";
		}
	
	// validate password field
	if(empty($password)){
		$err_password = "<div class='error'>Password Field is Required!</div>";
	}elseif(strlen($password) < 4){
		$err_password = "<div class='error'>Password Field must have at Least 4 Characters!</div>";
	}
	
	// check if email and password is valid / a valid login credential
	if($err_username=='' && $err_password=='' && $err_role==null){
		// create User class object and make use of login method()
		$repobj = new Rep();
		
		// clean your data, remove whitespace, do html entities, add slashes
		$cleanusername = Rep::checkInput($username);
	
		// reference login method
		$output = $repobj->loginMSR($cleanusername, $password, $role);
	}
	
}
// ================New type = radio validation-----------------------
//-------------------------------------------------------			
/*if($_SERVER['REQUEST_METHOD']==='GET'){
	
	//$username = $_GET['username'];
}
	// checks if radio button value is yes / methos id post
if ($_SERVER['REQUEST_METHOD']==='POST' && $_POST['role']=='MSR') {
	// create object of User class
	$repobj = new Rep();
	
	$output = $repobj->login($_POST['username']['password']);
	
	echo $output. "<a href='msrdashboard.php'>View all Reps</a>";
}
*/
?>


			<!-- Second Major DIV -->
			<div class="col-md-4">
				<form action=" <?php //echo $_SERVER['PHP_SELF']; ?>" style="margin-top:10px;" method="post">
					<div class="row imgcontainer" style="margin:auto;">
						<img src="images/pharma1.jpg" alt="Avatar" class="avatar" style="height:150px; width:150px;">
					</div>
					<div class="container">
						<?php if(isset($output)){echo $output;} ?>
						<div class="row">
							
							<input type="radio" name="role" value="Pharmacy" style="margin-left: 90px;">
							&nbsp;	
							<label><b>Pharmacy</b></label>
							
							<input type="radio" name="role" value="MSR" style="margin-left: 30px;">
							&nbsp;
							<label><b>MSR</b></label>
						<?php
							if(isset($err_role)){
								echo $err_role;
							}
						?>
						</div>
						
						<label for="username">
							<b>Username</b>
						</label>
						<input type="text" id='username' placeholder="Enter Username" name="username"><br>

						<?php
							if(isset($err_username)){
								echo $err_username;
							}
						?>

						<label for="password">
							<b>Password</b>
						</label>
						<input type="password" id="password" placeholder="Enter Password" name="password"><br>

						<?php
							if(isset($err_password)){
								echo $err_password;
							}
						?>

						
						<button type="submit">Login</button>
						<label><input type="checkbox" checked="checked" name="remember">Remember me</label>
						<span class="psw">Forgot <a href="#">password</a></span>
					</div>


				</form>
				<div class="container" style="background-color: #f1f1f1; border:3px solid skyblue; border-radius:10px;">
					<button onclick="document.getElementById('id011').style.display='block'" class="btn-info">
						Sign up
					</button>
				</div>
			</div>
		</div>
	</div>

	<!-- SIGNUP MODAL -->
	<div class="modal1" id="id011">
		<span onclick="document.getElementById('id011').style.display='none'" class="close1" title="Close Modal">
			&times;
		</span>
<form class="modal-content1" action="myuser.php" method="post">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>Sign Up</h1>
				<p>Please fill in this form to create a New Account</p>
			</div>
			<div class="col-md-6" style="margin-top:30px;">
				<input type="radio" name="role" value="Pharmacy" style="margin-left: 90px;" required>
				&nbsp;	
				<label><b>Pharmacy</b></label>
				
				<input type="radio" name="role" value="msr" style="margin-left: 30px;" required>
				&nbsp;
				<label><b>MSR</b></label>
			</div>
		</div>
				<hr>
				
		<div class="row">				
			<div class="col-md-6">
				<label>
					<b>Username</b>
				</label>
				<input type="text" placeholder="Enter Username" name="username" required>

				<label>
					<b>Password</b>
				</label>
				<input type="password" placeholder="Enter Password" name="password" required>

				<label>
					<b>Fullname</b>
				</label>
				<input type="text" placeholder="Enter Fullname" name="rep_fname" required>

				<label>
					<b>Phone no</b>
				</label>
				<input type="text" placeholder="Enter Phone no" name="rep_phone" required>
			</div>
	
			<div class="col-md-6">
		
				<label>
					<b>Email</b>
				</label>
				<input type="text" placeholder="Enter Email" name="email" required>

				<label>
					<b>Employer</b>
				</label>
				<input type="text" placeholder="Enter Employer" name="employer" required>

				<label><input type='checkbox' name="remember" style="margin-bottom:15px;">Remember me</label>
				<p>By creating an account you agree to our <a href='#' style='color:dodgerblue;'>Terms and Privacy</a> </p>
				<div class="clearfix1">
					<button type='button' onclick="document.getElementById('id011').style.display='none'" class="cancelbtn1">Cancel</button><button type="submit" class="signup1">Register</button>
				</div>

			</div>
		</div>
	</div>
</form>
</div>
</body>
<script src="jquery/jquery.js"></script>
<script src="bootstrap/popper.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>
<script type='text/javascript'>


</script>

</html>
