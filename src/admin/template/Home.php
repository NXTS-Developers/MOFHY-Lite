<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-lg-3">
			<div class="card text-center bg-matrix-1 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$cli =  mysqli_query($connect,"SELECT * FROM `hosting_clients`");
					?>
					<h3 class="my-0 pt-0 text-white"><?php echo mysqli_num_rows($cli);?></h3>
					<i class="fa fa-users fa-3x pt-10 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05); border-radius: 0px 0px 10px 10px;">
					<a href="myclients.php" class="text-white">View Client <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3">
			<div class="card text-center bg-matrix-2 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$cli =  mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_status`=1");
					?>
					<h3 class="my-0 pt-0 text-white"><?php echo mysqli_num_rows($cli);?></h3>
					<i class="fa fa-shopping-cart fa-3x pt-10 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05); border-radius: 0px 0px 10px 10px;">
					<a href="myaccounts.php" class="text-white">View Account <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3">
			<div class="card text-center bg-matrix-3 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$cli =  mysqli_query($connect,"SELECT * FROM `hosting_ssl`");
					?>
					<h3 class="my-0 pt-0 text-white"><?php echo mysqli_num_rows($cli);?></h3>
					<i class="fa fa-shield-alt fa-3x pt-10 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05); border-radius: 0px 0px 10px 10px;">
					<a href="myssl.php" class="text-white">View SSL <i class="fa fa-forward"></i></a>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3">
			<div class="card text-center bg-matrix-4 m-20 p-0 border-0">
				<div class="mx-20 my-15 d-flex justify-content-between align-items-center">
					<?php 
						$cli =  mysqli_query($connect,"SELECT * FROM `hosting_tickets` WHERE `ticket_status`=0 OR `ticket_status`=2");
					?>
					<h3 class="my-0 pt-0 text-white"><?php echo mysqli_num_rows($cli);?></h3>
					<i class="fa fa-bullhorn fa-3x pt-10 text-white"></i>
				</div>
				<div class="py-5" style="background: rgba(0,0,0,0.05); border-radius: 0px 0px 10px 10px;">
					<a href="mytickets.php" class="text-white">View Ticket <i class="fa fa-forward"></i></a>
				</div>
			</div>
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