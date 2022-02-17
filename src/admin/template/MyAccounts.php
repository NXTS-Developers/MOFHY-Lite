<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">My Accounts</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<th width="5%">ID</th>
					<th width="40%">Username</th>
					<th width="30%">Domain</th>
					<th width="5%">Deploy Date</th>
					<th width="5%">Status</th>
					<th width="5%">Action</th>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_status`!=0 OR `account_status`!=2 ORDER BY `account_id` DESC");
							$Rows = mysqli_num_rows($sql);
						if($Rows>0){
							while($AccountInfo = mysqli_fetch_assoc($sql)){
				?>
					<tr>
						<td>#<?php $Count = $Count ?? 1;echo $Count;$Count += 1;?></td>
						<td><?php echo $AccountInfo['account_username'];?></td>
						<td><?php echo $AccountInfo['account_domain'];?></td>
						<td><?php echo $AccountInfo['account_date'];?></td>
						<td><?php 
							if($AccountInfo['account_status']=='0'){
								$btn = ['danger','lock'];
								echo '<span class="badge bg-danger text-white border-0">Inactive</span>';
							} elseif($AccountInfo['account_status']=='1'){
								$btn = ['success','globe'];
								echo '<span class="badge bg-success border-0 text-white">Active</span>';
							} elseif($AccountInfo['account_status']=='2'){
								$btn = ['danger','lock'];
								echo '<span class="badge bg-danger text-white border-0">Suspended</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>admin/viewaccount.php?account_id=<?php echo $AccountInfo['account_username'];?>" class="btn btn-sm btn-<?php echo $btn[0] ?> btn-rounded"><i class="fa fa-<?php echo $btn[1] ?>"></i> Manage</a></td>
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
