			</div>
		</div>
	</div>
</body>

<script src="jquery/jquery.js"></script>
<script src="bootstrap/popper.min.js"></script>
<script src="bootstrap/bootstrap.min.js"></script>
<script type="text/javascript">
//-----------------------------------------------------------------------------------------
//-------------------------------------- OTC ADD ------------------------------------------
//-----------------------------------------------------------------------------------------
	
		function col(){
			var a = document.getElementById('scr4').value;
				if (isNaN(a)){
					document.getElementById('scr4').style = 'background-color:red;'
					alert ('Input Numbers Only!')
				}else if (a > 100){
					document.getElementById('val4').value = ('')
					document.getElementById('scr4').value = ('')
				}else if (a == ''){
					document.getElementById('val4').value = ('')
				}else if (a >= 500){
					document.getElementById('val4').value = ('')
					document.getElementById('scr4').style = 'border:4px solid green;'
				}else if (a >= 350){             
					document.getElementById('val4').value = ('C')
					document.getElementById('scr4').style = 'border:4px solid teal;'
				}else if (a >= 200){             
					document.getElementById('val4').value = ('D')
					document.getElementById('scr4').style = 'border:4px solid orange;'
				}else if (a >= 100){             
					document.getElementById('val4').value = ('E')
					document.getElementById('scr4').style = 'border:4px solid red;'
				}
		}
	
//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------
	
	$(function(){
	
//-----------------------------------------------------------------	
//----------- search for users using AJAX Jquery Method -----------
//-----------------------------------------------------------------
	$('#displayusers').hide();
	$('#searchbar').keyup(function(){
		
		var searchvalue = $('#searchbar').val();
		// send the parameter to searchbar.php using ajax method
		$.ajax({
			type:"POST",
			url:"searchbar.php",
			data:"searchtxt=" + searchvalue,
			datatype:"json",
			success:function(response){
				console.log(response);
				document.getElementById('displayusers').innerHTML = response;
				$('#displayusers').show();
			}
		});
		
	});
//-----------------------------------------------------------------
// ----------------------------------------------------------------
//-----------------------------------------------------------------
	
	
});
</script>
<!--------------------------------------------------------------------------------->
<!----------------------------------- OTC MODAL ----------------------------------->
<!--------------------------------------------------------------------------------->

<div class="modal fade" id="otcmodal" tabindex="-1" role="dialog" aria-labelledby="otcmodal" aria-hidden="true">
	
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
		 
        <h5 class="modal-title" id="otcmodal">OTC</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="close1">&times;</span>
        </button>
      </div>
		<div class="modal-body">

<div class="col">
<h2>View OTC Products</h2>
<table class="table table-striped" style="color:black;">
	<thead>
	<tr>
		<th>#</th>
		<th>Product Name</th>
		<th>Manufacturer</th>
		<th>Price</th>
	</tr>
	</thead>
	<tbody>
<?php


$proobj = new Product;

$prod = $proobj->getProduct();



		$kounter = 1;
		foreach($prod as $item) {
			?>
		<tr>
			<td><?php echo $kounter; ?></td>
			<td><?php echo $item['p_name']; ?></td>
			<td><?php echo $item['manufacturer']; ?></td>
			<td><?php echo $item['price']; ?></td>
			<td>
				<a href="editproduct.php?product_id=<?php echo $item['product_id'];?>&p_name=<?php echo $item['p_name'];?>&manufacturer=<?php echo $item['manufacturer'];?>">Edit</a><br>
				
				<a href="deleteproduct.php?product_id=<?php echo $item['product_id'];?>&p_name=<?php echo $item['p_name'];?>&manufacturer=<?php echo $item['manufacturer'];?>">Delete</a>
				
			</td>
		</tr>
		<?php
			$kounter++;
		}
		?>
	</tbody>
</table>
</div>	
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
	
</div>
<!--------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------->
<!--------------------------------------------------------------------------------->
</html>