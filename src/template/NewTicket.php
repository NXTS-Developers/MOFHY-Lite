<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15 px-5">
			<h5 class="m-0">New Ticket</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>mytickets.php" class="btn btn-sm btn-danger"><em class="fa fa-backward"></em> Return</a>
		</div>
		<hr>
		<form action="function/NewTicket.php" method="post">
			<div class="row pb-20">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Your Name</label>
						<input type="text" name="name" value="<?php echo $ClientInfo['hosting_client_fname'].' '.$ClientInfo['hosting_client_lname'];?>" class="form-control disabled" required readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Email Address</label>
						<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_email'];?>" class="form-control disabled" required readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Ticket Subject</label>
						<input type="text" name="subject" class="form-control" placeholder="Enter ticket subject..." required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Ticket Department</label>
						<select name="department" class="form-control" required>
					      <option value="" selected="selected" disabled="disabled">Select Department</option>
					      <option value="hosting">Hosting Issue</option>
					      <option value="ssl">SSL Issue</option>
					      <option value="tech">Technical Issue</option>
					      <option value="client">Customer Issue</option>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<script src="modules/Editor/nicEdit.js"></script>
						<script type="text/javascript">
						    bkLib.onDomLoaded(function(){
						        new nicEditor({iconsPath : 'modules/Editor/nicEditorIcons.gif'}).panelInstance('editor');
						    });
						</script>
						<label class="form-label required">Ticket Content</label>
						<textarea name="editor" id="editor" placeholder="Enter ticket content..." class="form-control" style="height: 200px;"></textarea> 
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<button name="submit" class="btn btn-sm btn-primary">Create Ticket</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
