<?php 
include('header.php');
// create object of user class

$repobj = new Rep;

$rep = $repobj->getRep();

//echo "<pre>";
//echo print_r($rep);
//echo "</pre>";
?>
<div class="col">
<h2>View All Users</h2>
<table class="table table-striped" style="color:white;">
	<thead>
	<tr>
		<th>#</th>
		<th>Username</th>
		<th>Full Name</th>
		<th>Phone No</th>
		<th>Email Address</th>
		<th>Employer</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$kounter = 1;
		foreach($rep as $item) {
			?>
		<tr>
			<td><?php echo $kounter;?></td>
			<td><?php echo $item['username']; ?></td>
			<td><?php echo $item['rep_fname']; ?></td>
			<td><?php echo $item['rep_phone']; ?></td>
			<td><?php echo $item['email']; ?></td>
			<td><?php echo $item['employer']; ?></td>
			<td>
				<a href="edituser.php?rep_id=<?php echo $item['rep_id'];?>&username=<?php echo $item['username'];?>&rep_fname=<?php echo $item['rep_fname'];?>">Edit</a><br>
				
				<a href="deleterep.php?rep_id=<?php echo $item['rep_id'];?>&rep_fname=<?php echo $item['rep_fname'];?>&employer=<?php echo $item['employer'];?>">Delete</a>
				
			</td>
		</tr>
		<?php
			$kounter++;
		}
		?>
	</tbody>
</table>
</div>
<?php include('footer.php');  ?>