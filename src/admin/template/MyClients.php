<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">My Clients</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<th width = '5%'>ID</th>
					<th width = '10%'>Name</th>
					<th width = '40%'>Email</th>
					<th width = '10%'>Date</th>
					<th width = '10%'>Status</th>
					<th width = '10%'>Action</th>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_clients`");
							$Rows = mysqli_num_rows($sql);
						if($Rows>0){
							while($ClientInfo = mysqli_fetch_assoc($sql)){
				?>
					<tr>
						<td>#<?php $Count = $Count ?? 1;echo $Count;$Count += 1;?></td>
						<td><?php echo $ClientInfo['hosting_client_fname']." ".$ClientInfo['hosting_client_lname'];?></td>
						<td><?php echo $ClientInfo['hosting_client_email'];?></td>
						<td><?php echo $ClientInfo['hosting_client_date'];?></td>
						<td><?php 
							if($ClientInfo['hosting_client_status']=='0'){
								$btn = ['secondary', 'cog'];
								echo '<span class="badge bg-secondary badge-pill">Inactive</span>';
							} elseif($ClientInfo['hosting_client_status']=='1'){
								$btn = ['success', 'globe'];
								echo '<span class="badge bg-success badge-pill">Active</span>';
							} elseif($ClientInfo['hosting_client_status']=='2'){
								$btn = ['danger', 'lock'];
								echo '<span class="badge bg-danger badge-pill">Suspended</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>admin/viewclient.php?client_id=<?php echo $ClientInfo['hosting_client_key'];?>" class="btn btn-sm btn-<?php echo $btn[0]?> btn-rounded"><i class="fa fa-<?php echo $btn[1] ?>"></i> Manage</a></td>
					</tr>
					<?php
							}
						} else {
					?>
					<tr>
						<td colspan="6" class="text-center">Nothing found</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<p class="pb-10"><?php echo $Rows;?> Records Founds</p>
	</div>
</div>
