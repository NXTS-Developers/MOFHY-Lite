<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15 px-5">
			<h5 class="m-0">My SSL</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>newssl.php" class="btn text-white btn-success btn-sm">New SSL</a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped" aria-describedby="All SSLs Table">
				<thead>
					<th width="5%">ID</th>
					<th width="5%">Order ID</th>
					<th width="75%">Domain Name</th>
					<th width="5%">Method</th>
					<th width="5%">Status</th>
					<th width="5%">Action</th>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl` WHERE `ssl_for`='".$ClientInfo['hosting_client_key']."' ORDER BY `ssl_id` DESC");
					$Rows = mysqli_num_rows($sql);
						if($Rows > 0){
							while($SSLToken = mysqli_fetch_assoc($sql)){
								    $apiClient = new GoGetSSLApi();
								    $token = $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
								    $SSLInfo = $apiClient->getOrderStatus($SSLToken['ssl_key']);

				?>
					<tr>
						<td>#<?php $Count = $Count ?? 1;echo $Count;$Count += 1;?></td>
						<td><?php echo $SSLInfo['order_id'];?></td>
						<td><?php echo $SSLInfo['domain'];?></td>
						<td>DNS</td>
						<td><?php 
							if($SSLInfo['status']=='processing'){
								$btn = ['primary', 'cog'];
								echo '<span class="badge bg-primary badge-pill">Processing</span>';
							} elseif($SSLInfo['status']=='active'){
								$btn = ['success', 'globe'];
								echo '<span class="badge bg-success badge-pill">Active</span>';
							} elseif($SSLInfo['status']=='cancelled'){
								$btn = ['danger', 'lock'];
								echo '<span class="badge bg-danger badge-pill">Cancelled</span>';
							} elseif($SSLInfo['status']=='expired'){
								$btn = ['danger', 'lock'];
								echo '<span class="badge bg-danger badge-pill">Expired</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>viewssl.php?ssl_id=<?php echo $SSLInfo['order_id'];?>" class="btn btn-rounded btn-sm btn-<?php echo $btn[0]?>"><em class="fa fa-<?php echo $btn[1]?>"></em>Manage</a></td>
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
		<p class="pb-10"><?php echo $Rows;?> SSL Certificates</p>
	</div>
</div>
