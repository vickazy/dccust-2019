<br>
<div class="container-fluid">
	<div class="col-sm-12">
		<form method='POST' enctype='multipart/form-data'  action="<?php echo "?module={$this->module}&act=store_penempatan"; ?>">
	        <div class="panel panel-default">
				<div class="panel-heading">
					<h3><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Penempatan</b></h3>
				</div>
	            <div class="panel-body">
					<div class="form-group">
						<label>Description :</label>
						<input value="<?php echo $row->propinsi_name ?>" class="form-control" name="propinsi_name" type="text" required="">
					</div>
	            </div>

	            <div class="panel-footer">
					<input type="hidden" name="propinsi_id" value="<?php echo $row->propinsi_id ?>">
					<input type="hidden" name="operation" value="update">
	            	<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Publish</button>
					<button type="button" onclick="self.history.back()" class="btn btn-info"><i class="fa fa-backward" aria-hidden="true"></i> Back</button>
	            </div>
	            
	        </div>
		</form>
	</div>
</div>