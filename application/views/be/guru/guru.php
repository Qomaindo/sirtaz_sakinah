<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i> Add</button>
					<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
					<br />
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table width="100%" id="tb_data" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="3%">No</th>
								<th width="10%">
									<center>NIP</center>
								</th>
								<th width="30%">
									<center>Nama Guru</center>
								</th>
								<th width="15%">
									<center>Jenis Kelamin</center>
								</th>
								<th width="15%">
									<center>No HP</center>
								</th>
								<th width="10%">
									<center>Foto</center>
								</th>
								<th width="17%">
									<center>Aksi</center>
								</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
						<tfoot>
							<tr>
								<th width="3%">No</th>
								<th width="10%">
									<center>NIP</center>
								</th>
								<th width="30%">
									<center>Nama Guru</center>
								</th>
								<th width="15%">
									<center>Jenis Kelamin</center>
								</th>
								<th width="15%">
									<center>No HP</center>
								</th>
								<th width="10%">
									<center>Foto</center>
								</th>
								<th width="17%">
									<center>Aksi</center>
								</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>


	<div class="modal fade" id="modal_form" data-backdrop="static" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<center>
						<h4 class="modal-title"></h4>
					</center>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" id="form" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="hidden" class="form-control" id="id" name="id">
								<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $KDGuru; ?>" readonly>
							</div>
							<div class="form-group">
								<label for="nama_guru">Nama</label>
								<input type="text" class="form-control" id="nama_guru" name="nama_guru">
							</div>
							<div class="form-group">
								<label for="jenis_kelamin_guru">Jenis Kelamin</label>
								<select class="form-control" id="jenis_kelamin_guru" name="jenis_kelamin_guru">
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="nohp_guru">Nomor Telepon</label>
								<input type="text" class="form-control" id="nohp_guru" name="nohp_guru" data-inputmask="'mask': ['9999-9999-99999']" data-mask>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email">
							</div>
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="nik" class="form-control" id="nik" name="nik" maxlength="16">
							</div>
							<div class="form-group">
								<label for="no_rek">No. Rekening</label>
								<input type="no_rek" class="form-control" id="no_rek" name="no_rek">
							</div>
							<div class="form-group">
								<label for="lama_mengajar">Lama Mengajar</label>
								<input type="lama_mengajar" class="form-control" id="lama_mengajar" name="lama_mengajar">
							</div>
							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir">
							</div>
							<div class="form-group">
								<label for="tgl_lahir">Tanggal Lahir</label>
								<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="format  : thn-bln-tgl">
							</div>
							<div class="form-group">
								<label for="tmt">Terhitung Mulai Tanggal</label>
								<input type="text" class="form-control" id="tmt" name="tmt" placeholder="format  : thn-bln-tgl">
							</div>
							<div class="form-group">
								<label for="pendidikan_terakhir">Pendidikan Terakhir</label>
								<select class="form-control" id="pend_terakhir" name="pend_terakhir">
									<option value="SMA Sederajat">SMA Sederajat</option>
									<option value="D3">Diprloma 3</option>
									<option value="S1">Sarjana 1</option>
									<option value="S2">Sarjana 2</option>
									<option value="S3">Sarjana 3</option>
								</select>
							</div>
							<div class="form-group">
								<label for="alamat_rumah">Alamat Rumah</label>
								<textarea type="text" class="form-control" id="alamat_rumah" name="alamat_rumah"></textarea>
							</div>
							<div class="form-group">
								<label for="alamat_lembaga">Alamat Lembaga</label>
								<textarea type="text" class="form-control" id="alamat_lembaga" name="alamat_lembaga"></textarea>
							</div>
							<div class="form-group">
								<label for="pendidikan_terakhir">Penerima Hibah</label>
								<select class="form-control" id="pnrm_hibah" name="pnrm_hibah">
									<option value="0">Tidak</option>
									<option value="1">Ya</option>
								</select>
							</div>
							<div id="tampil-hibah" style="display: none">
							<div class="col-sm-6">
								<hr>
								<!-- npwp -->
								<div class="form-group" id="preview_npwp">
									<label class="control-label col-md-3">Foto</label>
									<div class="col-md-9">
										(No photo)
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-12" id="label-npwp">Upload NPWP </label>
									<div class="col-md-9">
										<input name="foto_npwp" type="file">
										<span class="help-block"></span>
									</div>
								</div>
								<hr>
								<!-- ktp -->
								<div class="form-group" id="preview_ktp">
									<label class="control-label col-md-3">Foto</label>
									<div class="col-md-9">
										(No photo)
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-12" id="label-ktp">Upload KTP </label>
									<div class="col-md-9">
										<input name="foto_ktp" type="file">
										<span class="help-block"></span>
									</div>
								</div>
								
								<hr>
								</div>
								
							<div class="col-sm-6">
								<hr>
								<!-- tabungan -->
								<div class="form-group" id="preview_tabungan">
									<label class="control-label col-md-3">Foto</label>
									<div class="col-md-9">
										(No photo)
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-12" id="label-tabungan">Upload Buku Tabungan </label>
									<div class="col-md-9">
										<input name="foto_tabungan" type="file">
										<span class="help-block"></span>
									</div>
								</div>
								<hr>
								<!-- ijazah -->
								<div class="form-group" id="preview_ijazah">
									<label class="control-label col-md-3">Foto</label>
									<div class="col-md-9">
										(No photo)
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-12" id="label-ijazah">Upload Ijazah </label>
									<div class="col-md-9">
										<input name="foto_ijazah" type="file">
										<span class="help-block"></span>
									</div>
								</div>
								<hr>
							</div>
							</div>
							<div class="form-group">
								<label for="jabatan">Jabatan</label>
								<select class="form-control" id="jabatan" name="jabatan">
									<?php if (isset($dataBagian)) {
										foreach ($dataBagian as $bagian) {
											echo "<option value='$bagian[role_id]'>$bagian[role_name]</option>";
										}
									}
									?>

								</select>
							</div>
							<div class="form-group" id="photo-preview">
								<label class="control-label col-md-3">Foto</label>
								<div class="col-md-9">
									(No photo)
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12" id="label-photo">Upload Foto </label>
								<div class="col-md-9">
									<input name="foto" type="file">
									<span class="help-block"></span>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-primary" id="btnSave" onclick="save()">
						Save
					</button>
				</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<!-- jQuery 3 -->
	<script src="<?php echo base_url('assets/be/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets/be/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->



	<script type="text/javascript">
		var save_method;
		var table;
		var base_url = '<?php echo base_url(); ?>';

		$(document).ready(function() {
			// $("#nohp_guru").mask("9999-9999-999");
			$('[data-mask]').inputmask()
			table = $('#tb_data').DataTable({

				retrieve: true,
				paging: true,
				"bInfo": false,
				"processing": false,
				"serverSide": true,
				"order": [],

				"ajax": {
					"url": "<?php echo site_url('be/guru/GuruCTRL/ajax_list') ?>",
					"dataType": "JSON",
					"type": "POST"
				},

				"columnDefs": [{
					"targets": [-1],
					"orderable": false,
				}, ],

				"language": {
					"sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
					"sProcessing": "Sedang memproses...",
					"sLengthMenu": "Tampilkan _MENU_ entri",
					"sZeroRecords": "Tidak ditemukan data yang sesuai",
					"sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
					"sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
					"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
					"sInfoPostFix": "",
					"sSearch": "Cari:",
					"sUrl": "",

					"oPaginate": {
						"sFirst": "Pertama",
						"sPrevious": "Sebelumnya",
						"sNext": "Selanjutnya",
						"sLast": "Terakhir"
					}
				}

			});

			$('#tgl_lahir').datepicker({
				autoclose: true,
				format: "yyyy-mm-dd",
				todayHighlight: true,
				todayHighlight: true,
			});

			$('#tmt').datepicker({
				autoclose: true,
				format: "yyyy-mm-dd",
				todayHighlight: true,
				todayHighlight: true,
			});

			$("input").change(function() {
				$(this).parent().parent().removeClass('has-error');
				$(this).next().empty();
			});
			$("textarea").change(function() {
				$(this).parent().parent().removeClass('has-error');
				$(this).next().empty();
			});
			$("number").change(function() {
				$(this).parent().parent().removeClass('has-error');
				$(this).next().empty();
			});
			$("select").change(function() {
				$(this).parent().parent().removeClass('has-error');
				$(this).next().empty();
			});

			$('#pnrm_hibah').on("change", function() {
				var hibah = $(this).val();

				if (hibah == "1") {
					$('#tampil-hibah').show();
				} else {
					$('#tampil-hibah').hide();
				}
			});
		});

		function info(id) {
			window.location.href = "<?php echo site_url('be/guru/GuruCTRL/guruDetail/') ?>" + id;
		}

		function add() {
			save_method = 'add';
			$('#form')[0].reset();
			$('.form-group').removeClass('has-error');
			$('.help-block').empty();
			$('#modal_form').modal("show");
			$('.modal-title').text('Formulir Tambah Data Guru');

			$('#photo-preview').hide();
			$('#preview_npwp').hide();
			$('#preview_ktp').hide();
			$('#preview_tabungan').hide();
			$('#preview_ijazah').hide();

			$('#tampil-hibah').hide();

			$("#modal_form").on('shown.bs.modal', function() {
				$(this).find('#nip').focus();
			});
		}

		function edit(id) {
			save_method = 'update';
			$('#form')[0].reset();
			$('.form-group').removeClass('has-error');
			$('.help-block').empty();

			$.ajax({
				url: "<?php echo site_url('be/guru/GuruCTRL/ajax_edit/') ?>" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {

					$('[name="id"]').val(data.guru_id);
					$('[name="nip"]').val(data.nip);
					$('[name="nama_guru"]').val(data.nama_guru);
					$('[name="jenis_kelamin_guru"]').val(data.jkel_guru);
					$('[name="nohp_guru"]').val(data.nohp_guru);
					$('[name="email"]').val(data.email_guru);
					$('[name="nik"]').val(data.nik);
					$('[name="no_rek"]').val(data.no_rek);
					$('[name="lama_mengajar"]').val(data.lama_mengajar);
					$('[name="tmpt_lahir"]').val(data.tmplahir_guru);
					$('[name="tgl_lahir"]').val(data.tgllahir_guru);
					$('[name="alamat_rumah"]').val(data.alamat_rumah);
					$('[name="alamat_lembaga"]').val(data.alamat_lembaga);
					$('[name="jabatan"]').val(data.role_id);
					$('[name="tmt"]').val(data.tmt);
					$('[name="pend_terakhir"]').val(data.pddknterakhir_guru);
					$('[name="pnrm_hibah"]').val(data.penerima_hibah);

					$('#modal_form').modal('show');

					$("#modal_form").on('shown.bs.modal', function() {
						$(this).find('#nip').focus();
					});
					$('.modal-title').text('Formulir Ubah Data Guru');

					$('#photo-preview').show();
					$('#preview_npwp').show();
					$('#preview_ktp').show();
					$('#preview_tabungan').show();
					$('#preview_ijazah').show();

					if (data.penerima_hibah == "1") {
						$('#tampil-hibah').show();
					} else {
						$('#tampil-hibah').hide();
					}

					if (data.foto_guru) {
						$('#label-photo').text('Ubah Foto');
						$('#photo-preview div').html('<img src="' + base_url + 'assets/be/image/employee/' + data.foto_guru + '" class="img-responsive" width="250px" height="250px">');
						$('#photo-preview div').append('<br><input type="checkbox" name="remove_photo" value="' + data.foto_guru + '"/> Hapus foto ketika merubah data');
					} else {
						$('#label-photo').text('Upload Foto');
						$('#photo-preview div').text('(No photo)');
					}

					if (data.foto_npwp) {
						$('#label-npwp').text('Ubah Foto NPWP');
						$('#preview_npwp div').html('<img src="' + base_url + 'assets/be/image/employee/' + data.foto_npwp + '" class="img-responsive" width="250px" height="250px">');
						$('#preview_npwp div').append('<br><input type="checkbox" name="remove_photo_npwp" value="' + data.foto_npwp + '"/> Hapus foto ketika merubah data');
					} else {
						$('#label-npwp').text('Upload Foto NPWP');
						$('#preview_npwp div').text('(No photo)');
					}

					if (data.foto_ktp) {
						$('#label-ktp').text('Ubah Foto KTP');
						$('#preview_ktp div').html('<img src="' + base_url + 'assets/be/image/employee/' + data.foto_ktp + '" class="img-responsive" width="250px" height="250px">');
						$('#preview_ktp div').append('<br><input type="checkbox" name="remove_photo_ktp" value="' + data.foto_ktp + '"/> Hapus foto ketika merubah data');
					} else {
						$('#label-ktp').text('Upload Foto KTP');
						$('#preview_ktp div').text('(No photo)');
					}

					if (data.foto_bukutabungan) {
						$('#label-tabungan').text('Ubah Foto Bukutabungan');
						$('#preview_tabungan div').html('<img src="' + base_url + 'assets/be/image/employee/' + data.foto_bukutabungan + '" class="img-responsive" width="250px" height="250px">');
						$('#preview_tabungan div').append('<br><input type="checkbox" name="remove_photo_tabungan" value="' + data.foto_bukutabungan + '"/> Hapus foto ketika merubah data');
					} else {
						$('#label-tabungan').text('Upload Foto Bukutabungan');
						$('#preview_tabungan div').text('(No photo)');
					}

					if (data.foto_ijazah) {
						$('#label-ijazah').text('Ubah Foto Ijazah');
						$('#preview_ijazah div').html('<img src="' + base_url + 'assets/be/image/employee/' + data.foto_ijazah + '" class="img-responsive" width="250px" height="250px">');
						$('#preview_ijazah div').append('<br><input type="checkbox" name="remove_photo_ijazah" value="' + data.foto_ijazah + '"/> Hapus foto ketika merubah data');
					} else {
						$('#label-ijazah').text('Upload Foto Ijazah');
						$('#preview_ijazah div').text('(No photo)');
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					alert('Error get data from ajax');
				}
			});
		}

		function reload_table() {
			table.ajax.reload(null, false);
		}

		function save() {
			$('#btnSave').text('saving...');
			$('#btnSave').attr('disabled', true);
			var url;

			if (save_method == 'add') {
				url = "<?php echo site_url('be/guru/GuruCTRL/ajax_add') ?>";
			} else if (save_method == 'delete') {
				url = "<?php echo site_url('be/guru/GuruCTRL/ajax_delete') ?>";
			} else {
				url = "<?php echo site_url('be/guru/GuruCTRL/ajax_update') ?>";
			}

			var formData = new FormData($('#form')[0]);
			$.ajax({
				url: url,
				type: "POST",
				data: formData,
				contentType: false,
				processData: false,
				dataType: "JSON",

				success: function(data) {
					const Toast = Swal.mixin({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 3000,
					});

					if (data.status) {
						Toast.fire({
							icon: "success",
							title: "berhasil menambah atau merubah data."
						});
						$('#modal_form').modal('hide');
						reload_table();
					} else {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
						}
					}
					$('#btnSave').text('Save');
					$('#btnSave').attr('disabled', false);

				},
				error: function(jqXHR, textStatus, errorThrown) {
					Toast.fire({
						icon: "error",
						title: "gagal menambah atau merubah data."
					});
					$('#btnSave').text('Save');
					$('#btnSave').attr('disabled', false);
				}
			});
		}

		function deleted(id) {
			const Toast = Swal.mixin({
				toast: true,
				position: "top-end",
				showConfirmButton: false,
				timer: 3000,
			});

			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Anda tidak dapat menemukan data ini lagi!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: ' <i class="fa fa-check"></i> Ya, hapus !',
				cancelButtonText: ' <i class="fa fa-close"></i> Batal',
			}).then((result) => {
				if (result.value) {
					$('.help-block').empty();

					$.ajax({
						url: "<?php echo site_url('be/guru/GuruCTRL/ajax_delete/') ?>" + id,
						type: "GET",
						dataType: "JSON",
						success: function(data) {
							Toast.fire({
								icon: "success",
								title: "data berhasil dihapus."
							});
							reload_table();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							Toast.fire({
								icon: "error",
								title: "data gagal dihapus."
							});
						}
					});
				}
			})
		}
	</script>
