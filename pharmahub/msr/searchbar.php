<?php include('classes.php');
	$search = $_POST['searchtxt'];
// create object of
$repobj = new Rep();

$rep = $repobj->searchRep($search);

$rep = json_decode($rep, true);

//var_dump($rep);
if (isset($rep) > 0){
foreach ($rep as $value) {
	?>

<div style="margin-buttom:5px; border-bottom:2px solid red; z-index:1;">
	<img src="images/man.png" style="width:50px; height:50pg;">
	<span>
		<?php echo $value['rep_fname']." | ".$value['employer']; ?>
	</span>
</div>

<?php
}
}
?>