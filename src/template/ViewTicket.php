<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">Viewing Ticket #<?php echo $_GET['ticket_id']?></h5>
			<a href="<?php echo $AreaInfo['area_url'];?>mytickets.php" class="btn btn-sm btn-danger"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		<?php $TicketInfo = mysqli_fetch_assoc($sql);?>
		<div class="mb-20">
			<div class="row">
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b>Subject:</b>
						<span><?php echo str_rot13($TicketInfo['ticket_subject']);?></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b>Status:</b>
						<span><?php 
							if($TicketInfo['ticket_status']=='0'){
								echo '<span class="badge bg-success">Open</span>';
							} elseif($TicketInfo['ticket_status']=='1'){
								echo '<span class="badge bg-success text-white">Support Reply</span>';
							} elseif($TicketInfo['ticket_status']=='2'){
								echo '<span class="badge bg-success">Customer Reply</span>';
							} elseif($TicketInfo['ticket_status']=='3'){
								echo '<span class="badge bg-danger">Closed</span>';
							}
						?></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b>Department:</b>
						<span><?php 
							if($TicketInfo['ticket_department']=='hosting'){
								echo 'Hosting Issue';
							} elseif($TicketInfo['ticket_department']=='ssl'){
								echo 'SSL Issue';
							} elseif($TicketInfo['ticket_department']=='tech'){
								echo 'Technical Issue';
							} elseif($TicketInfo['ticket_department']=='client'){
								echo 'Customer Issue';
							}
						?></span>
					</div>
				</div>
				<div class="col-md-6">
					<div class="d-flex justify-content-between align-items-center mx-10 my-5">
						<b>Date:</b>
						<span><?php echo $TicketInfo['ticket_date'];?></span>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mx-10 my-5">
						<b>Content:</b>
						<span><?php echo str_rot13($TicketInfo['ticket_content']);?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		$sql = mysqli_query($connect,"SELECT * FROM `hosting_ticket_replies`WHERE `reply_for`='".$TicketInfo['ticket_unique_id']."'");
		if(mysqli_num_rows($sql)>0){
			while($ReplyInfo = mysqli_fetch_assoc($sql)){
				if($ReplyInfo['reply_from'] == $ClientInfo['hosting_client_key']){
					$From = $ClientInfo['hosting_client_fname']." ".$ClientInfo['hosting_client_lname'];
				}
				else{
					$From = 'Staff Member';
				}
	?>
		<div class="card p-5">
			<div class="d-flex justify-content-between align-items-center px-5">
				<b class="py-5"><?php echo $From;?></b>
				<span><?php echo $ReplyInfo['reply_date'];?></span>
			</div><hr>
			<div class="px-10 m-5">
				<?php echo str_rot13($ReplyInfo['reply_content']);?>
			</div>
		</div>
	<?php 
			}
		} else { 
	?>
		<div class="card p-5">
			<div class="text-center">
				<p>No replies to this ticket yet</p>
			</div>
		</div>
	<?php } ?>
	<div class="card p-5" id="reply">
		<?php if($TicketInfo['ticket_status']=='3'){ ?>
			<div class="text-center">
				<p>You can't reply to this ticket anymore open new ticket for any further questions.</p>
			</div>
		<?php } else { ?>
				<form action="function/ReplyTicket.php" method="post" class="p-10">
					<div class="form-group">
						<script src="modules/Editor/nicEdit.js"></script>
						<script type="text/javascript">
						    bkLib.onDomLoaded(function(){
						        new nicEditor({iconsPath : 'modules/Editor/nicEditorIcons.gif'}).panelInstance('editor');
						    });
						</script>
						<label class="form-label required">Reply content</label>
						<textarea class="form-control" name="editor" id="editor" style="height: 200px"></textarea>
						<input type="hidden" name="ticket_id" value="<?php echo $TicketInfo['ticket_unique_id'];?>">
					</div>
					<div class="form-group my-0">
						<button class="btn btn-sm btn-primary" name="submit">Add Reply</button>
					</div>
				</form>
		<?php } ?>
	</div>
</div>