<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-lg-3">
				<a href="myaccounts.php" class="d-block nolink">
				<div class="text-center rounded card m-20 bg-matrix-1 text-white">
					<h1 class="mb-0"><i class="fa fa-shopping-cart"></i></h1>
					<?php 
						$sql = mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_for`='".$ClientInfo['hosting_client_key']."' AND `account_status`=1");
					?>
					<h5 class="mt-0"><?php echo mysqli_num_rows($sql);?> Accounts</h5>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
				<a href="myssl.php" class="d-block nolink">
				<div class="text-center rounded card m-20 bg-matrix-2 text-white">
					<h1 class="mb-0"><i class="fa fa-shield-alt"></i></h1>
					<?php 
						$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl` WHERE `ssl_for`='".$ClientInfo['hosting_client_key']."'");
					?>
					<h5 class="mt-0"><?php echo mysqli_num_rows($sql);?> SSL</h5>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
				<a href="mytickets.php" class="d-block nolink">
				<div class="text-center rounded card m-20 bg-matrix-3 text-white">
					<h1 class="mb-0"><i class="fa fa-bullhorn"></i></h1>
					<?php 
						$sql = mysqli_query($connect,"SELECT * FROM `hosting_tickets` WHERE `ticket_for`='".$ClientInfo['hosting_client_key']."' AND `ticket_status`=0 OR `ticket_for`='".$ClientInfo['hosting_client_key']."' AND `ticket_status`=1");
					?>
					<h5 class="mt-0"><?php echo mysqli_num_rows($sql);?> Tickets</h5>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
			<div class="text-center rounded card m-20 bg-matrix-4 text-white">
				<h1 class="mb-0"><i class="fa fa-server"></i></h1>
				<h5 class="mt-0">2 Servers</h5>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card m-20">
			  <h2 class="card-title">
			    Welcome to Free Hosting!
			  </h2>
			  <p>
			    Here you can create free web hosting accounts and create unlimited free websites on the fastest web servers in the world.
			  </p>
			  <div class="text-right">
			    <a href="myaccounts.php" class="btn btn-sm">Getting Started</a>
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="card m-20">
			  <h2 class="card-title">
			    Free SSL Available!
			  </h2>
			  <p>
			    Now free SSL generation has been provided inorder to provide fast website access and increase the security and protection of your website.
			  </p>
			  <div class="text-right">
			    <a href="myssl.php" class="btn btn-sm">Check Now</a>
			  </div>
			</div>
		</div>
	</div>
</div>