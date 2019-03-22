<?php
include('classes.php');

//echo "<pre>";
//echo print_r($_POST);
//echo "</pre>";

//create object of class rep
$prod = new Product();

$prod->updateProduct($_POST['p_name'], $_POST['manufacturer'], $_POST['price'], $_POST['product_id'], $_POST['rep_id']);


?>