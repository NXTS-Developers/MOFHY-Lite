<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">My SSL</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/" class="btn text-white btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div>
		<hr>
		<div class="table-responsive pb-20">
			<table class="table table-stripped">
				<thead>
					<th>ID</th>
					<th>Order ID</th>
					<th>Domain Name</th>
					<th>Method</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl` ORDER BY `ssl_id` DESC");
						if(mysqli_num_rows($sql)>0){
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
								echo '<span class="badge bg-primary badge-pill">Processing</span>';
							} elseif($SSLInfo['status']=='active'){
								echo '<span class="badge bg-success badge-pill">Active</span>';
							} elseif($SSLInfo['status']=='cancelled'){
								echo '<span class="badge bg-danger badge-pill">Cancelled</span>';
							} elseif($SSLInfo['status']=='expired'){
								echo '<span class="badge bg-danger badge-pill">Expired</span>';
							}
						?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>admin/viewssl.php?ssl_id=<?php echo $SSLInfo['order_id'];?>" class="btn btn-rounded btn-sm btn-secondary">Manage</a></td>
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
	</div>
</div>