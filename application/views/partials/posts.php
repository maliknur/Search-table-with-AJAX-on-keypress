
		<div class="text-right">
	
		<p><?php echo $links; ?></p>
		</div >
			

		<table class="table table-hovered">
			<thead>
				<tr>
					<th>Leads ID</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Registered Datetime</th>
				</tr>
			</thead>
			<tbody >


<?php 	

	if(!empty($results)){
	foreach($results as $value)
			{ ?>
	

				<tr>
					<td><?= $value->leads_id ?></td>
					<td><?= $value->first_name ?></td>
					<td><?= $value->last_name ?></td>
					<td><?= $value->email ?></td>
					<td><?= date('M d, Y', strtotime($value->registered_datetime)); ?></td>
				</tr>



<?php 		}

}

else{ ?>
				<tr>
					<td colspan="5">Sorry, no results found!</td>
					
				</tr>

<?php } 

?>
			</tbody>
		</table>