<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center px-5 pt-15">
			<h5 class="m-0">Extensions</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/index.php" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		  <form action="function/NewExtension.php" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="mb-5 px-10">
						<label class="form-label required">New Domain Extension</label>
							<div class="input-group">
							  <input type="text" name="domain" id="cudomain" class="form-control" placeholder="eg .example.com">
							  <div class="input-group-append">
							  	<button name="submit" class="btn btn-primary">Register</button>
							  </div>
							</div>		        
						</div>
					</div>
				</div>
			</form>
			<h6 class="mb-5 px-10">Registered Extensions</h6>
			<div class="mb-10 px-10 pt-5 pb-10">
						<?php 
							$sql = mysqli_query($connect,"SELECT * FROM `hosting_domain_extensions` ORDER BY `extension_id` ASC");
							if(mysqli_num_rows($sql)>0){
								while($Extensions = mysqli_fetch_assoc($sql)){
						?>
								<div class="d-flex justify-content-between align-items-center mb-5">
									<span><?php echo $Extensions['extension_value']?></span>
									<span><a href="function/DeleteExtension.php?extension=<?php echo $Extensions['extension_value'];?>" class="btn btn-sm btn-secondary btn-rounded"><i class="fa fa-trash"></i></a></span>
								</div>
						<?php
								}
							}
							else{
						?>
							<tr>
								<td colspan="3" class="text-center">No extensions found</td>
							</tr>
						<?php
							}
						?>
			</div>
		</div>
	</div>
</div>