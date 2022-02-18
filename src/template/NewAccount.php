<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15 px-5">
			<h5 class="m-0">New Account</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>myaccounts.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> Return</a>
		</div>
		<hr>
		<div class="row mb-10">
			<div class="col-md-6">
				<div class="mb-10 px-10">
					<label class="form-label required">Your Name</label>
					<input type="text" name="name" value="<?php echo $ClientInfo['hosting_client_fname'].' '.$ClientInfo['hosting_client_lname'];?>" class="form-control disabled" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-10 px-10">
					<label class="form-label required">Your Email</label>
					<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_email'];?>" class="form-control disabled" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-10 px-10">
					<label class="form-label required">Phone Number</label>
					<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_phone'];?>" class="form-control disabled" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-10 px-10">
					<label class="form-label required">Billing Address</label>
					<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_address'];?>" class="form-control disabled" readonly>
				</div>
			</div>
		</div>
		<hr>
		<div class="col-md-12 mb-10">
			<div class="mb-10 px-10">
				<div class="tabs">
			        <button class="tab-item btn btn-sm" data-tab="SubDomain" id="DefaultClicked">Subdomain</button>
			        <button class="tab-item btn btn-sm" data-tab="CustomDomain">Custom Domain</button>
		        </div>
		        <div id="CustomDomain" class="tab-content">
						<div class="alert alert-secondary my-5">You need to set these nameservers inorder to host your domain with us<br>
							<ul class="mb-0">
								<li class="mb-0"><?php echo $HostingApi['api_ns_1']?></li>
								<li class="mb-0"><?php echo $HostingApi['api_ns_2']?></li>
							</ul>
						</div>
		        <label class="form-label required">Custom Domain Name</label>
					<div class="input-group">
					  <input type="text" id="cudomain" class="form-control" placeholder="Search domain name here...">
					  <div class="input-group-append">
					  	<button name="submit" id="validate2" class="btn btn-primary">Validate</button>
					  </div>
					</div>		        
				</div>
			      <div id="SubDomain" class="tab-content">
					<label class="form-label required">Subdomain Name</label>
					<div class="input-group">
					  <input type="text" id="sudomain" class="form-control" placeholder="Search domain name here...">
					  <div class="input-group-append">
					    <select class="form-control" style="border-radius: 0" id="extension" name="extension">
					    	<?php
					    		$sql = mysqli_query($connect,"SELECT * FROM `hosting_domain_extensions` ORDER BY 'extension_id'");
								if(mysqli_num_rows($sql)>0){
									while($Extension = mysqli_fetch_Assoc($sql)){
										echo "<option>".$Extension['extension_value']."</option>";
									}
								}
								else{
									echo('<option>.html-5.me</option>');
								}
					    	?>
					    </select>
					  </div>
					  <div class="input-group-append">
					  	<button name="submit" id="validate1" class="btn btn-primary">Validate</button>
					  </div>
					</div>
	      		  </div>
			</div>
		</div>
		<hr>
		<div class="col-md-12 mb-15">
			<form action="function/NewAccount.php" method="post">
				<div class="row">
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<label class="form-label required">Hosting Package</label>
							<input type="text" name="package" value="<?php echo $HostingApi['api_package'];?>" class="form-control disabled" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<label class="form-label required">Domain Name</label>
							<input type="text" name="domain" id="validomain" placeholder="Domain will show here..." class="form-control disabled" readonly required="true">
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<label class="form-label required">Username</label>
							<input type="text" name="username" placeholder="(generated automatically)" class="form-control disabled" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<label class="form-label">Password</label>
							<input type="password" name="password" placeholder="Something unique, leave empty to generate random" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
						<div class="mb-10 px-10">
							<button class="btn btn-primary btn-sm" name="submit">Request Account</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#validate1').click(function(){
			var domain = $('#sudomain').val();
			var extensions = $('#extension').val();
			var validomain = domain + extensions;
			$.post('function/ValidateDomain.php', {domain : validomain, submit: ""}, function(data){
				if(validomain != data){
					$('#hidden-area').html('<div class="alert alert-danger" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data+'</div>');
				}
				else{
					$('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>Domain is available and selected  <b>successfully!</b></div>');
					$('#validomain').val(data);
				}
			});
		});
		$('#validate2').click(function(){
			var domain = $('#cudomain').val();
			$.post('function/ValidateDomain.php', {domain : domain, submit: ""}, function(data){
				if(domain != data){
					$('#hidden-area').html('<div class="alert alert-danger" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+data+'</div>');
				}
				else{
					$('#hidden-area').html('<div class="alert alert-success" role="alert"><button class="close" data-dismiss="alert" type="button" aria-label="Close"><span aria-hidden="true">&times;</span></button>Domain is available and selected  <b>successfully!</b></div>');
					$('#validomain').val(data);
				}
			});
		});
	});
</script>
