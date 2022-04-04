<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">My Tickets</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>newticket.php" class="btn text-white btn-success btn-sm">New Ticket</a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped" aria-describedby="All Tickets Table">
				<thead>
					<th width="5%">ID</th>
					<th width="80%">Subject</th>
					<th width="5%">Department</th>
					<th width="5%">Status</th>
					<th width="5%">Action</th>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_tickets` WHERE `ticket_for`='".$ClientInfo['hosting_client_key']."' ORDER BY `ticket_id` DESC");
					$Rows = mysqli_num_rows($sql);
						if($Rows > 0){
							while($TicketInfo = mysqli_fetch_assoc($sql)){
				?>
					<tr>
						<td>#<?php echo $TicketInfo['ticket_unique_id'];?></td>
						<td><?php echo str_rot13($TicketInfo['ticket_subject']);?></td>
						<td><?php 
							if($TicketInfo['ticket_department']=='hosting'){
								echo 'Hosting Issue';
							} elseif($TicketInfo['ticket_department']=='ssl'){
								echo 'SSL Issue';
							} elseif($TicketInfo['ticket_department']=='tech'){
								echo 'Technical Issue';
							} elseif($TicketInfo['ticket_department']=='client'){
								echo 'Customer Issue';
							}
						?></td>
						<td><?php 
							if($TicketInfo['ticket_status']=='0'){
								$btn = ['secondary','clock'];
								echo '<span class="badge bg-secondary badge-pill">Open</span>';
							} elseif($TicketInfo['ticket_status']=='1'){
								$btn = ['success','comment'];
								echo '<span class="badge bg-success badge-pill">Support Reply</span>';
							} elseif($TicketInfo['ticket_status']=='2'){
								$btn = ['primary','comment'];
								echo '<span class="badge bg-primary badge-pill">Customer Reply</span>';
							} elseif($TicketInfo['ticket_status']=='3'){
								$btn = ['danger','lock'];
								echo '<span class="badge bg-danger badge-pill">Closed</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>viewticket.php?ticket_id=<?php echo $TicketInfo['ticket_unique_id'];?>#reply" class="btn btn-sm btn-<?php echo $btn[0] ?> btn-rounded"><em class="fa fa-<?php echo $btn[1] ?>"></em> Manage</a></td>
					</tr>
					<?php
							}
						} else {
					?>
					<tr>
						<td colspan="5" class="text-center">Nothing found</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<p class="pb-10"><?php echo $Rows;?> Support Tickets</p>
	</div>
</div>
