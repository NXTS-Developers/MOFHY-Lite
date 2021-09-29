<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">Viewing SSL #<?php echo $_GET['ssl_id']?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/myssl.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		<?php
			$apiClient = new GoGetSSLApi();
			$token = $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
			$SSLInfo = $apiClient->getOrderStatus($_GET['ssl_id']);
			if($SSLInfo['status']=='processing'){
				$Status = '<span class="badge bg-primary">Processing</span>';
			} elseif($SSLInfo['status']=='active'){
				$Status = '<span class="badge bg-success">Active</span>';
			} elseif($SSLInfo['status']=='cancelled'){
				$Status = '<span class="badge bg-danger">Cancelled</span>';
			} elseif($SSLInfo['status']=='expired'){
				$Status = '<span class="badge bg-danger">Expired</span>';
			}
			if(empty($SSLInfo['begin_date'])){
				$Begin = '-- -- ----';
				$End = $Begin;
			}
			else{
				$Begin = $SSLInfo['begin_date'];
				$End = $SSLInfo['end_date'];
			}
		?>
		<div class="row mb-20">
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b>Status:</b>
					<span><?php echo $Status;?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b>Domain Name:</b>
					<span><?php echo $SSLInfo['domain'];?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b>Start Date:</b>
					<span><?php echo $Begin;?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b>End Date:</b>
					<span><?php echo $End;?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="d-flex justify-content-between align-items-center mx-10 my-5">
					<b>Method:</b>
					<span>DNS</span>
				</div>
			</div>
			<?php if($SSLInfo['status']=='processing'){ 
				$Record = explode(' ',$SSLInfo['approver_method']['dns']['record']);
			?>
			<div class="col-md-12">
				<div class="my-5 mx-10">
					<b>CSR Code:</b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['csr_code'];?></textarea></pre>
				</div>
				<div class="my-10 mx-10">
					<b>CNAME Record:</b>
					<pre class="my-0"><input type="text" class="form-control" value="<?php echo $Record['0'];?>" readonly></pre>
				</div>
				<div class="my-10 mx-10">
					<b>Record Content:</b>
					<pre class="my-0"><input type="text" class="form-control" value="<?php echo $Record['2'];?>" readonly></pre>
				</div>
			</div>
			<?php } elseif($SSLInfo['status']=='active'){ ?>
			<div class="col-lg-12">
				<div class="my-5 mx-10">
					<b>Certificate Code:</b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['crt_code'];?></textarea></pre>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="my-5 mx-10">
					<b>CA Bundle:</b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['ca_code'];?></textarea></pre>
				</div>
			</div>
			<?php } elseif($SSLInfo['status']=='cancelled'){ ?>
			<div class="col-lg-12">
				<div class="my-5 mx-10">
					<b>CSR Code:</b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly><?php echo $SSLInfo['csr_code'];?></textarea></pre>
				</div>
			</div>
			<?php } elseif($SSLInfo['status']=='expired'){ ?>
			<div class="col-lg-12">
				<div class="my-5 mx-10">
					<b>Certificate Code:</b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly>-----</textarea></pre>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="my-5 mx-10">
					<b>CA Bundle:</b>
					<pre class="my-0"><textarea class="form-control" style="height: 250px" readonly>-----</textarea></pre>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>