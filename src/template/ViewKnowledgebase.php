<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">Viewing Knowledgebase #<?php echo htmlspecialchars($_GET['knowledgebase_id']) ?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>knowledgebase.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		<?php $Knowledgebase = mysqli_fetch_assoc($sql);?>
		<div class="mb-20">
			<div class="row">
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b>Subject:</b>
						<span><?php echo $Knowledgebase['knowledgebase_subject'];?></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b>Date:</b>
						<span><?php echo $Knowledgebase['knowledgebase_date'];?></span>
					</div>
				</div>
				<div class="col-md-12">
					<hr>
					<div class="mx-10 my-5">
						<b>Content:</b><br>
						<span><?php echo ucwords($Knowledgebase['knowledgebase_content']);?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>