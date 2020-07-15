<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<label style="font-size:16pt">Cari Data Santri</label>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form id="form">
						<div class="form-group">
							<div class="col-md-6">
								<label>Kelas</label>
								<select class="form-control" class="kelas" id="kelas" onclick="getMapel(this.value)">
									<option value="#">--Pilih Satu--</option>
									<?php
									if (isset($kelas)) {
										foreach ($kelas as $data) {
											echo "<option value='$data[kelas_id]'>$data[nama_kelas]</option>";
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<label>Mata Pelajaran</label>
								<select class="form-control" class="mapel" id="mapel">
									<option value="#">--Pilih Satu--</option>
								</select>
							</div>
						</div>
						<div class="col-md-12" style="margin-top:7px; align: right">
							<button class="btn btn-info"><i class="fa fa-download"></i> Submit</button>
							<button class="btn btn-danger" type="reset"><i class="fa fa-close"></i> Cancel</button>
						</div>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script type="text/javascript">
	var save_method;
	var table;
	var base_url = '<?php echo base_url(); ?>';

	function getMapel(i) {
		var url_p = '<?php echo base_url(); ?>be/prestasi/PrestasiCTRL/GetMapel';
		var formData = {
			recid: i
		};
		$.ajax({
			type: "POST",
			url: url_p,
			data: formData,
			success: function(result) {
				$('#mapel').html(result);
			}
		})
	}

	$(document).ready(function() {
		$('#form').submit(function(e) {
			//var form = $(this);
			var kelas = $('#kelas').val();
			var mapel = $('#mapel').val();
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('be/prestasi/PrestasiCTRL/ajax_search'); ?>",
				data: {
					kelas: kelas
				},
				dataType: "JSON",
				success: function(data) {
					window.location.href = "<?php echo site_url('be/prestasi/PrestasiCTRL/ajax_link/'); ?>" + kelas + '/' + mapel
				},
				error: function() {
					alert("Gagal !");
				}
			});


		});
	});
</script>
