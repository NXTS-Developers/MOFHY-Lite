<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">Knowledgebase</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/newknowledgebase.php" class="btn text-white btn-success btn-sm"> New Knowledgebase</a>
		</div>
		<hr>
		<div class="table-responsive">
			<table class="table table-stripped">
				<thead>
					<th>ID</th>
					<th>Subject</th>
					<th>Date</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php
					$sql = mysqli_query($connect,"SELECT * FROM `hosting_knowledgebase` ORDER BY `knowledgebase_id` DESC");
					$Rows = mysqli_num_rows($sql);
						if($Rows>0){
							while($Knowledgebase = mysqli_fetch_assoc($sql)){
				?>
					<tr>
						<td>#<?php $Count = $Count ?? 1;echo $Count;$Count += 1;?></td>
						<td><?php echo $Knowledgebase['knowledgebase_subject'];?></td>
						<td><?php echo $Knowledgebase['knowledgebase_date'];?></td>
						<td><a href="<?php echo $AreaInfo['area_url'];?>admin/viewknowledgebase.php?knowledgebase_id=<?php echo $Knowledgebase['knowledgebase_id'];?>" class="btn btn-sm btn-secondary btn-rounded"> Read</a><a href="<?php echo $AreaInfo['area_url'];?>admin/editknowledgebase.php?knowledgebase_id=<?php echo $Knowledgebase['knowledgebase_id'];?>" class="btn btn-sm btn-danger mx-5 btn-rounded"> Edit</a></td>
					</tr>
					<?php
							}
						} else {
					?>
					<tr>
						<td colspan="5" class="text-center">Nothing found</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
		<p class="pb-10"><?php echo $Rows;?> knowledgebase found</p>
	</div>
</div>