<?php 
require 'config.php';
?>
<!doctype html>
<html>
	<head>
	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">  
	<!-- jQuery -->
	<script type="text/javascript" charset="utf8" src="js/jquery.js"></script>
	<!-- DataTables -->
	<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="js/dataTables.jqueryui.min.js"></script>
	<script type="text/javascript">
	$(document).ready( function () {
    	var dataTableInstance = $('#table_id').DataTable({

    	});
    	$('#table_id tfoot th').each(function(){
    		var title = $("#table_id thead th").eq($(this).index()).text();
    		$(this).html('<input type="text" name="search" placeholder="search"/>');
    	});
	});
	</script>
	<style type="text/css">
	.container{
		width: 900px;
		margin: 0 auto;
		border: 1px solid black;
		padding: 10px;
	}
	</style>
	</head>
	<body>	
	<div class="container">
		<table id="table_id">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Message</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$select = $conn->query("select * from products");
		if($select->num_rows>0){
			$data = array();
			while($row = $select->fetch_assoc()){
				$data[] = $row;
			}
		}
		if(count($data)){
			foreach($data as $pro){
		?>
			<tr>
				<td><?php echo $pro['product_id'];?></td>
				<td><?php echo $pro['product_title'];?></td>
				<td><?php echo $pro['product_desc'];?></td>
			</tr>
		<?php
			}
		}
		?>
		</tbody>
		<tfoot>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Message</th>
			</tr>
		</tfoot>
		</table>
	</body>
</html>