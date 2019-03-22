<?php
include('header.php');
include('classes.php');

if($_SERVER['REQUEST_METHOD']==='GET'){
	
	$rep_id = $_GET['rep_id'];
	$rep_fname = $_GET['rep_fname'];
	$employer = $_GET['employer'];
}

	// checks if radio button value is yes / methos id post
if ($_SERVER['REQUEST_METHOD']==='POST' && $_POST['delete']=='yes') {
	// create object of User class
	$repobj = new Rep();
	
	$output = $repobj->deleteRep($_POST['rep_id']);
	
	echo $output. "<a href='viewusers.php'>View all Reps</a>";
}

if($_SERVER['REQUEST_METHOD']==='GET'){
	
	$userid = $_GET['rep_id'];
	$rep_fname = $_GET['rep_fname'];
	$employer = $_GET['employer'];



?>
<h4>
	Are You sure you want to Delete
	<?php if(isset($rep_fname)){echo $_GET['rep_fname']; } ?>
	|
	<?php if(isset($employer)){echo $_GET['employer']; } ?>
	Data?

</h4>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
&nbsp;
<input type="radio" name="delete" value="yes"> Yes
<input type="radio" name="delete" value="no"> No
	
<input type="hidden" name="rep_id" value="<?php echo $rep_id; ?>">
<input type="submit" name="submit" value="Delete"> 

</form>

<?php } ?>
<?php include('footer.php');?>