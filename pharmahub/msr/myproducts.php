<?php
include('header.php');


//echo "<pre>";
//echo print_r($_POST);
//echo "</pre>";

// create object of User clss
$prod = new Product();

// insert record into users table
$prod->newProduct($_POST['p_name'], $_POST['manufacturer'], $_POST['price'], $_POST['p_photo'], $_POST['catid'], $_POST['rep_id']);

?>

<div class="container">



</div>

<?php include('footer.php'); ?>