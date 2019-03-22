<?php
include('classes.php');

//echo "<pre>";
//echo print_r($_POST);
//echo "</pre>";

//create object of class rep
$rep = new Rep();

$rep->updateRep($_POST['username'], $_POST['rep_fname'], $_POST['rep_phone'], $_POST['email'], $_POST['employer'], $_POST['rep_id']);


?>