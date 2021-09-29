<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-lg-3">
				<a href="myclients.php" class="d-block nolink">
				<div class="text-center rounded card m-20 bg-matrix-1 text-white">
					<h1 class="mb-0"><i class="fa fa-users"></i></h1>
					<?php 
						$sql = mysqli_query($connect,"SELECT * FROM `hosting_clients` WHERE `hosting_client_status`!=0");
					?>
					<h5 class="mt-0"><?php echo mysqli_num_rows($sql);?> Clients</h5>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
				<a href="myaccounts.php" class="d-block nolink">
				<div class="text-center rounded card m-20 bg-matrix-2 text-white">
					<h1 class="mb-0"><i class="fa fa-shopping-cart"></i></h1>
					<?php 
						$sql = mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_status`=1");
					?>
					<h5 class="mt-0"><?php echo mysqli_num_rows($sql);?> Accounts</h5>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
				<a href="myssl.php" class="d-block nolink">
				<div class="text-center rounded card m-20 bg-matrix-3 text-white">
					<h1 class="mb-0"><i class="fa fa-lock"></i></h1>
					<?php 
						$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl`");
					?>
					<h5 class="mt-0"><?php echo mysqli_num_rows($sql);?> SSL</h5>
				</div>
			</a>
		</div>
		<div class="col-md-6 col-lg-3">
				<a href="mytickets.php" class="d-block nolink">
				<div class="text-center rounded card m-20 bg-matrix-4 text-white">
					<h1 class="mb-0"><i class="fa fa-bullhorn"></i></h1>
					<?php 
						$sql = mysqli_query($connect,"SELECT * FROM `hosting_tickets` WHERE `ticket_status`=0 OR `ticket_status`=2");
					?>
					<h5 class="mt-0"><?php echo mysqli_num_rows($sql);?> Tickets</h5>
				</div>
			</a>
		</div>
		<div class="col-lg-6">
			<div class="card m-20">
			  <h2 class="card-title">
			    Welcome to Dear Admin!
			  </h2>
			  <p>
			    Here you can manage your free hosting clients and free ssl with free support system remember that any action in this system cannot be undo. 
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
			    Now generation of free ssl has been allowed inorder to provide fast website access and increase the security and protection of your website.
			  </p>
			  <div class="text-right">
			    <a href="myssl.php" class="btn btn-sm">Check Now</a>
			  </div>
			</div>
		</div>
	</div>
</div>