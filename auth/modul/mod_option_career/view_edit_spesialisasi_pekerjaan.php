<br>
<div class="container-fluid">
	<div class="col-sm-12">
		<form method='POST' enctype='multipart/form-data'  action="<?php echo "?module={$this->module}&act=store_spesialisasi_pekerjaan"; ?>">
	        <div class="panel panel-default">
				<div class="panel-heading">
					<h3><b><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Spesialisasi Pekerjaan</b></h3>
				</div>
	            <div class="panel-body">
					<div class="form-group">
						<label>Description :</label>
						<input value="<?php echo $row->nama_spes ?>" class="form-control" name="nama_spes" type="text" required="">
					</div>
	            </div>

	            <div class="panel-footer">
					<input type="hidden" name="id_spes" value="<?php echo $row->id_spes ?>">
					<input type="hidden" name="operation" value="update">
	            	<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Publish</button>
					<button type="button" onclick="self.history.back()" class="btn btn-info"><i class="fa fa-backward" aria-hidden="true"></i> Back</button>
	            </div>
	            
	        </div>
		</form>
	</div>
</div>