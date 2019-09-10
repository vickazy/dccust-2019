<div class="cs-content">
<div class="bawah" style="margin-top:20px; border-top: 1px solid #ddd;">
	<h3 style="padding-bottom: 20px; color: #009a54; border-bottom: 1px solid #ddd"><i class="fa fa-bars" aria-hidden="true"></i> Semua Lowongan <?php echo (empty($caption) ? NULL : $caption ) ?> ( <?php echo count($karir['data']) ?> )</h3>
	<p class="clear-fix"></p>
	<?php
		foreach ($karir['data'] as $key => $value) {
			?>
				<div class="col-lg-12" style="border: 1px solid #ddd">
				<a href="detailkarir-<?php echo $value->id_karir.'-'.$value->seo_ina ?>.html">
					<h3 style="color: #009a54"><i class="fa fa-location-arrow" aria-hidden="true"></i> <?php echo $value->judul_karir ?></h3>
				</a>
					<div class="col-lg-2">
						<img class="img-responsive" src="joimg/karir/<?php echo $value->gambar ?>">
					</div>
					<div class="col-lg-10">
						<?php echo substr(strip_tags($value->isi_karir), 0,400) ?>
						<a class="data-page" data-page="<?php echo $value->id_karir ?>" href="detailkarir-<?php echo $value->id_karir.'-'.$value->seo_ina ?>.html">... Read More</a>
						<div class="alert alert-info">
							<strong>Deadline :</strong> <?php echo $value->deadline_mod ?>
						</div>
					</div>
				</div>
				<p class="clear-fix"></p>
			<?php
		}
	?>					
</div>
</div>