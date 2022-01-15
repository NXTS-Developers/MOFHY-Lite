<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">Viewing Account (<?php echo htmlspecialchars($_GET['account_id']) ?>)</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>myaccounts.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		<?php $AccountInfo = mysqli_fetch_assoc($sql);
			if($AccountInfo['account_status']==1){
		?>
			<div class="row pb-10">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4 px-5 text-center py-15">
						<i class="fa fa-laptop fa-10x"></i>
					</div>
					<div class="col-md-4 offset-md-4 px-20 py-5 text-center text-md-right">
						<a href="cplogin.php?account_id=<?php echo $AccountInfo['account_username']?>" target="_blank" class="btn btn-success text-white btn-block my-5 btn-rounded">Control Panel</a>
						<a href="https://filemanager.ai/new/#/c/<?php echo str_replace('cpanel', 'ftp', $HostingApi['api_cpanel_url']). '/'. $AccountInfo['account_username'].'/'.base64_encode(json_encode(['t'=>'ftp','c'=>['v'=>1,'p'=>$AccountInfo['account_password']]]));?>" target="_blank" class="btn btn-primary text-white btn-block my-5 btn-rounded"></pre>File Manager</a>
						<a href="settings.php?account_id=<?php echo $AccountInfo['account_username']?>" target="_blank" class="btn btn-secondary btn-block my-5 btn-rounded">Edit Settings</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Username:</b>
					<span><?php echo $AccountInfo['account_username']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Password:</b>
					<span><kbd><?php echo $AccountInfo['account_password']?></kbd></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Domain:</b>
					<span><?php echo $AccountInfo['account_domain']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>cPanel Domain:</b>
					<span><?php echo $HostingApi['api_cpanel_url']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Status:</b>
					<span>
						<?php if($AccountInfo['account_status']=='0'){
								echo '<span class="badge bg-secondary">Inactive</span>';
							} elseif($AccountInfo['account_status']=='1'){
								echo '<span class="badge bg-success">Active</span>';
							} elseif($AccountInfo['account_status']=='2'){
								echo '<span class="badge bg-danger">Suspened</span>';
							}?>
					</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Creation Date:</b>
					<span><?php echo $AccountInfo['account_date']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Server IP:</b>
					<span><?php echo $HostingApi['api_server_ip']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Your IP:</b>
					<span><?php echo UserInfo::get_ip()?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>FTP Hostname:</b>
					<span><?php echo str_replace('cpanel', 'ftp', $HostingApi['api_cpanel_url'])?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>FTP Port:</b>
					<span>21</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>MySQL Hostname:</b>
					<span><?php echo str_replace('cpanel', 'sqlxxx', $HostingApi['api_cpanel_url'])?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>MySQL Port:</b>
					<span>3306</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Nameserver 1:</b>
					<span><?php echo $HostingApi['api_ns_1']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Nameserver 2:</b>
					<span><?php echo $HostingApi['api_ns_2']?></span>
				</div>
			</div>
		</div>
		<?php } else {?>
		<div class="row pb-10">
			<div class="col-md-12">
				<div class="row">
					<?php
					if($AccountInfo['account_status']=='0'){
							echo '<div class="alert alert-secondary col-md-12">Your account is now inactive and you need to create a new ticket inorder to delete this record!</div>';
						} elseif($AccountInfo['account_status']=='2'){
							echo '<div class="alert alert-secondary col-md-12">Your account is now suspended and you need to create a new ticket inorder to delete this record!</div>';
						}
					?>
					<div class="col-md-4 px-5 text-center py-15">
						<i class="fa fa-laptop fa-10x"></i>
					</div>
					<div class="col-md-4 offset-md-4 px-20 py-5 text-center text-md-right">
						<a href="#" target="_blank" class="btn btn-success text-white btn-block my-5 btn-rounded disabled">Control Panel</a>
						<a href="#" target="_blank" class="btn btn-primary text-white btn-block my-5 btn-rounded disabled"></pre>File Manager</a>
						<a href="newticket.php" target="_blank" class="btn btn-secondary btn-block my-5 btn-rounded">Open Ticket</a>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Username:</b>
					<span>NULL</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Password:</b>
					<span><kbd>NULL</kbd></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Domain:</b>
					<span>NULL</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>cPanel Domain:</b>
					<span>NULL</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Status:</b>
					<span>
						<?php if($AccountInfo['account_status']=='0'){
								echo '<span class="badge bg-secondary">Inactive</span>';
							} elseif($AccountInfo['account_status']=='1'){
								echo '<span class="badge bg-success">Active</span>';
							} elseif($AccountInfo['account_status']=='2'){
								echo '<span class="badge bg-danger">Suspened</span>';;
							}?>
					</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Creation Date:</b>
					<span><?php echo $AccountInfo['account_date']?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Server IP:</b>
					<span>NULL</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Your IP:</b>
					<span><?php echo UserInfo::get_ip()?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>FTP Hostname:</b>
					<span>NULL</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>FTP Port:</b>
					<span>NULL</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>MySQL Hostname:</b>
					<span>NULL</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Mysql Port:</b>
					<span>NULL</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Nameserver 1:</b>
					<span>NULL</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center m-5">
					<b>Nameserver 2:</b>
					<span>NULL</span>
				</div>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">Account Domains</h5>
		</div>
		<hr>
		<div class="mb-10">
			<?php 
			use \InfinityFree\MofhClient\Client;
			if($AccountInfo['account_status']==1){
				$client = Client::create();
				$request = $client->getUserDomains(['username' => $AccountInfo['account_username']]);
				$response = $request->send();
				$res = $response->getDomains();
				foreach($res as $domain){
					$key = str_replace('\/','/', json_encode(['t'=>'ftp','c'=>['v'=>1,'p'=>$AccountInfo['account_password'],'i' => "/".$domain."/htdocs/"]]));
					$link = "https://filemanager.ai/new/#/c/". str_replace('cpanel', 'ftp', $HostingApi['api_cpanel_url']). '/'. $AccountInfo['account_username'].'/'.base64_encode($key);
					echo "<div class='d-flex justify-content-between align-items-center m-5'>
						<span>".$domain."</span>
						<span><a href='".$link."' class='btn btn-sm btn-square btn-secondary' target='_blank'><i class='fa fa-file-import'></i></a></span>
					</div>";
				}
			}
			else{
				echo "<p class='text-center'>No Domain Found</p>";
			}
			?>
		</div>
	</div>
</div>
