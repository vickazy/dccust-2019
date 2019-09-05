<style type="text/css" title="currentStyle">
    @import "media/css/demo_table_jui.css";
    @import "media/css/smoothness/jquery-ui-1.8.4.custom.css";
</style>

<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js">
</script>

<script>
$(document).ready( function () {
     var oTable = $('#example').dataTable( {
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
				} );		
} );
</script>
<style>.ui-widget-header{background:none;border:none;}</style>

	
<?php
	$aksi="modul/mod_beasiswa/aksi_beasiswa.php";
	$module="beasiswa";
	$db = new dbHelper();
	isset($_GET['act'])? $act=$_GET['act'] : $act='';

	switch($act){
	default:
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
				  <a class="navbar-brand" href="#">Beasiswa</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#" onclick="location.href='?module=<?php echo $module;?>&act=update_header'">
							<button type="button" class="btn btn-primary">Update Header</button>
						</a>
					</li>
					<li>
						<a href="#" onclick="location.href='?module=<?php echo $module;?>&act=insertnew'">
							<button type="button" class="btn btn-primary">Insert New</button>
						</a>	
					</li>
				</ul>
			</div>
		</nav>
		<div class="panel-body">
			<table class='display' id='example'> 
			<thead> 
				<tr>  
    				<th width="4%">No</th> 
    				<th width="16%">Thumbnail</th> 
    				<th width="40%">Tittle</th> 
    				<th width="20%">Date</th> 
    				<th width="20%">Action</th> 
				</tr> 
			</thead> 
			
			<tbody> 
			<?php 	
				$no=1;
				$beasiswa = $db->get_select("SELECT * FROM beasiswa ORDER BY id_beasiswa DESC");
				foreach ($beasiswa['data'] as $key => $b){
				$tanggal = tanggal_indo($tanggal=date('Y-m-d',strtotime($b->tanggal)), $cetak_hari = true);
				
				
				?>
				<tr>  
    				<td align="center"><?php echo"$no" ?></td> 
    				<td align="center"><img height="70px" src="../joimg/beasiswa/<?php echo"$b->gambar" ?>"></td> 
    				<td><?php echo"$b->nama_beasiswa" ?></td> 
    				<td><?php echo $tanggal; ?></td> 
    				<td align="center"><a href="<?php echo"?module=$module&act=edit&id=$b->id_beasiswa";?>"><input type="image" src="images/icn_edit.png" title="Edit"></a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo"$aksi?module=$module&act=hapus&id=$b->id_beasiswa";?>" onclick="return confirm('Apakah anda yakin menghapus data ini?');"><input type="image" src="images/icn_trash.png" title="Trash"></a>
					</td> 
				</tr> 
			<?php $no++; } ?>
				
				
			</tbody> 
			</table>
		</div>
	</div>
</div>
	
<?php
	break; 
	case"insertnew":
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4>Add Beasiswa</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=insertnew'>
				<div class="container-fluid">
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input class="form-control" name="nama_beasiswa" type="text" >
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi :</label>
						<textarea name="isi_beasiswa" id="jogmce"></textarea>
					</div>
					<div class="form-group">
						<label for="thumbnail">Thumbnail :</label>
						<input type="file" name="fupload">
					</div>
					<div class="form-group">
						<div class="alert alert-info">
							<strong>Info! </strong>File Type: *.jpg File Size: max-width: 1024px.
						</div>
					</div>
				</div>
				<footer>
					<div class="submit_link">
						<input type="submit" value="Publish" class="alt_btn">
						<input type="button" onclick='self.history.back()' value="Back">
					</div>
				</footer>
			</form>
		</div>
	</div>
</div>

<?php
	break; 
	case"edit":
	$beasiswa = $db->get_select("SELECT * FROM beasiswa WHERE id_beasiswa='$_GET[id]'");
	$r=  $beasiswa['data'][0];
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Beasiswa</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=<?php echo $module;?>&act=update'>
				<div class="container-fluid">
					<input type='hidden' name='id' value='<?php echo"$r->id_beasiswa" ?>'>
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input class="form-control" name="nama_beasiswa" type="text" value="<?php echo"$r->nama_beasiswa" ?>" >
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi :</label>
						<textarea name="isi_beasiswa" id="jogmce"><?php echo"$r->isi_beasiswa" ?></textarea>
					</div>
					<div class="form-group">
						<label for="thumbnail">Thumbnail :</label>
						<img class="img-responsive" src="../joimg/beasiswa/<?php echo"$r->gambar" ?>">
					</div>
					<div class="form-group">
						<label for="change_thumbnail">Change Thumbnail :</label>
						<input type="file" name="fupload">
					</div>
					<div class="form-group">
						<div class="alert alert-info">
							<strong>Info! </strong>File Type: *.jpg File Size: max-width: 1024px.
						</div>
					</div>
				</div>
				<footer>
					<div class="submit_link">
						<input type="submit" value="Update" class="alt_btn">
						<input type="button" onclick='self.history.back()' value="Back">
					</div>
				</footer>
			</form>
		</div>
	</div>
</div>

<?php
	break; 
	case"update_header":
	$header = $db->get_select("SELECT * FROM header WHERE id_header='15' AND aktif='Y'");
	$h= $header['data'][0];
		
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h4><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Header Beasiswa</h4>
		</div>
		<div class="panel-body">
			<form method='POST' enctype='multipart/form-data' action='<?php echo "$aksi"; ?>?module=beasiswa&act=update_header'>
				<div class="container-fluid">
					<input type='hidden' name='id' value='<?php echo"$h->id_header" ?>'>
					<div class="form-group">
						<label for="judul">Judul :</label>
						<input class="form-control" name="nama_header_ina" type="text" value="<?php echo"$h->nama_header_ina" ?>">
					</div>
					<div class="form-group">
						<label for="deskripsi">Deskripsi :</label>
						<textarea name="isi_header_ina" id="jogmce"><?php echo"$h->isi_header_ina" ?></textarea>
					</div>
					<div class="form-group">
						<label for="thumbnail">Thumbnail :</label>
						<img class="img-responsive" src="../joimg/header_image/<?php echo"$h->gambar" ?>">
					</div>
					<div class="form-group">
						<div class="alert alert-info">
							<strong>Info! </strong>File Type: *.jpg File Size: 1300x481 px.
						</div>
					</div>
				</div>
				<footer>
					<div class="submit_link">
						<input type="submit" value="Update" class="alt_btn">
						<input type="button" onclick='self.history.back()' value="Back">
					</div>
				</footer>
			</form>
			
		</div>
	</div>
</div>
	
<?php	
	break;
	}
?>