<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<label style="padding:2px">
						Kelas : <?php if (isset($santri)) {
									for ($i = 0; $i < 1; $i++)
										echo $santri[$i]['nama_kelas'];
								}
								?>
					</label>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="tb_data" class="table table-bordered table-striped" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>Santri</th>
								<th>Prestasi</th>
							</tr>
						</thead>
						<tbody>
							<form id="form">
								<?php
								$no = 1;
								if (isset($santri)) {
									foreach ($santri as $data) {
										?>
										<tr>
											<td style="text-align: center"><?php echo $no; ?></td>
											<td><?php echo $data['nis']; ?></td>
											<td><?php echo $data['nama_santri']; ?></td>
											<td>
												<textarea name="prestasi[]" id="prestasi<?php echo $no ?>" style="width:100%"></textarea>
												<input type="hidden" name="santri[]" id="santri<?php echo $no ?>" value="<?php echo $data['santri_id'] ?>">
											</td>
										</tr>
										<?php
										$no++;
									}
								}
								?>
								<input type="hidden" id="jadwal" name="jadwal" value="<?php if (isset($jadwal)) {
																							foreach ($jadwal as $data) {
																								echo $data['jadwal_id'];
																							}
																						} ?>">
						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>Santri</th>
								<th>Prestasi</th>
							</tr>
						</tfoot>
					</table>
					<button class="btn btn-info" style="margin-top: 7px"><i class="fa fa-download"></i> Submit</button>
					</form>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
<!-- /.modal -->
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script type="text/javascript">
	$(document).ready(function() {

		$('#form').submit(function(e) {
			var form = $(this).serialize();
			//var jadwal = $('#jadwal').val();
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('be/prestasi/PrestasiCTRL/ajax_prestasi'); ?>",
				data: form,
				dataType: "JSON",
				success: function(data) {
					if (data.status) {
						window.location.href = "<?php echo site_url('be/prestasi/PrestasiCTRL'); ?>"
					}
				},
				error: function() {
					alert("Gagal !");
				}
			});
		});

	});
</script>
