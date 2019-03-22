<?php
include('header.php');
include('classes.php');

//echo "<pre>";
//echo print_r($_POST);
//echo "</pre>";

// create object of User clss
$rep = new Rep();

// insert record into users table
$rep->newRep($_POST['username'], $_POST['password'], $_POST['rep_fname'], $_POST['rep_phone'], $_POST['email'], $_POST['employer']);

?>

<div class="col-md-9 dash">


</div>

<?php include('footer.php'); ?>