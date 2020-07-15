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
					<table id="tb_data" class="table table-bordered table-striped" width="100%">
						<thead>
							<tr>
								<th width="2%">No</th>
								<th width="15%">
									<center>Kode Santri</center>
								</th>
								<th width="38%">
									<center>Nama Santri</center>
								</th>
								<th width="15%">
									<center>Tingkat</center>
								</th>
								<th width="15%">
									<center>Foto</center>
								</th>
								<th width="20%">
									<center>Aksi</center>
								</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
						<tfoot>
							<tr>
								<th width="2%">No</th>
								<th width="15%">
									<center>Kode Santri</center>
								</th>
								<th width="38%">
									<center>Nama Santri</center>
								</th>
								<th width="15%">
									<center>Tingkat</center>
								</th>
								<th width="15%">
									<center>Foto</center>
								</th>
								<th width="20%">
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
	<!-- FORM MODAL -->
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
								<label for="nama_santri">NIS</label>
								<input type="hidden" class="form-control" id="id" name="id">
								<input type="text" class="form-control" id="kdsantri" name="kdsantri" value="<?php echo $KDSantri ?>" readonly="">
							</div>
							<div class="form-group">
								<label for="nisn">NISN</label>
								<input type="text" class="form-control" id="nisn" name="nisn" maxlength="10">
							</div>
							<div class="form-group">
								<label for="nama_santri">Nama</label>
								<input type="text" class="form-control" id="nama_santri" name="nama_santri">
							</div>
							<div class="form-group">
								<label for="nama_wali">Nama Wali</label>
								<input type="text" class="form-control" id="nama_wali" name="nama_wali">
							</div>
							<div class="form-group">
								<label for="jkelamin_santri">Jenis Kelamin</label>
								<select class="form-control" id="jkelamin_santri" name="jkelamin_santri">
									<option value="L">Laki - Laki</option>
									<option value="P">Perempuan</option>
								</select>
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
								<label for="usia">Usia</label>
								<input type="text" class="form-control" id="usia" name="usia" readonly="">
							</div>
							<div class="form-group">
								<label for="alamat_santri">Alamat Rumah</label>
								<textarea type="text" class="form-control" id="alamat_santri" name="alamat_santri"></textarea>
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
							</div>
							<div class="form-group">
								<label for="tingkat">Tingkat</label>
								<select class="form-control" onclick="getKelas(this.value)" id="tingkat" name="tingkat">
									<option value="">Pilih Tingkat</option>
									<?php if (isset($tingkat)) {
										foreach ($tingkat as $tkt) {
											echo "<option value='$tkt[tingkat_id]'>$tkt[nama_tingkat]</option>";
										}
									}
									?>

								</select>
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select class="form-control" id="kelas" name="kelas">
									<option value="">Pilih Kelas</option>

								</select>
							</div>
							<div class="col-sm-6">
								<hr>
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
								
							<div class="col-sm-6">
								<hr>
							<div class="form-group" id="preview_akta">
								<label class="control-label col-md-3">Foto</label>
								<div class="col-md-9">
									(No photo)
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12" id="label-akta">Upload Akta Kelahiran </label>
								<div class="col-md-9">
									<input name="foto_akta" type="file">
									<span class="help-block"></span>
								</div>
							</div>
							<hr>
							</div>
							
							<div class="col-sm-6">
								<hr>
							<div class="form-group" id="preview_kk">
								<label class="control-label col-md-3">Foto</label>
								<div class="col-md-9">
									(No photo)
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-12" id="label-kk">Upload Kartu Keluarga </label>
								<div class="col-md-9">
									<input name="foto_kk" type="file">
									<span class="help-block"></span>
								</div>
							</div>
							<hr>
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

		function getKelas(i) {
			var url_p = '<?php echo base_url(); ?>be/santri/SantriCTRL/GetKelas';
			var formData = {
				recid: i
			};
			$.ajax({
				type: "POST",
				url: url_p,
				data: formData,
				success: function(result) {
					// var json = eval("(" + result + ")");
					$('#kelas').html(result);
					// ut++;
				}
			})
		}

		window.onload = function() {
			$('#tgl_lahir').on('change', function() {
				var dob = new Date(this.value);
				var today = new Date();
				var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
				$('#usia').val(age);
			});
		}

		$(document).ready(function() {

			$('[data-mask]').inputmask()
			table = $('#tb_data').DataTable({

				retrieve: true,
				paging: true,
				"bInfo": false,
				"processing": false,
				"serverSide": true,
				"order": [],

				"ajax": {
					"url": "<?php echo site_url('be/santri/SantriCTRL/ajax_list') ?>",
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
				// format: "dd-mm-yyyy",
				format: "yyyy-mm-dd",
				todayHighlight: true,
				//orientation: "top auto",
				//todayBtn: true,
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
		});

		function info(id) {
			window.location.href = "<?php echo site_url('be/santri/SantriCTRL/SantriDetail/') ?>" + id;
		}

		function add() {
			save_method = 'add';
			$('#form')[0].reset();
			$('.form-group').removeClass('has-error');
			$('.help-block').empty();
			$('#modal_form').modal("show");
			$('.modal-title').text('Formulir Tambah Data Santri');

			$('#photo-preview').hide();
			$('#preview_akta').hide();
			$('#preview_kk').hide();

			$("#modal_form").on('shown.bs.modal', function() {
				$(this).find('#kdsantri').focus();
			});
		}

		function edit(id) {
			save_method = 'update';
			$('#form')[0].reset();
			$('.form-group').removeClass('has-error');
			$('.help-block').empty();

			$.ajax({
				url: "<?php echo site_url('be/santri/SantriCTRL/ajax_edit/') ?>" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {

					$('[name="id"]').val(data.santri_id);
					$('[name="kdsantri"]').val(data.nis);
					$('[name="nisn"]').val(data.nisn);
					$('[name="nama_santri"]').val(data.nama_santri);
					$('[name="nama_wali"]').val(data.nama_wali);
					$('[name="jkelamin_santri"]').val(data.jkel_santri);
					$('[name="usia"]').val(data.usia_santri);
					$('[name="tmpt_lahir"]').val(data.tmplahir_santri);
					$('[name="tgl_lahir"]').val(data.tgllahir_santri);
					$('[name="alamat_santri"]').val(data.alamat_santri);
					$('[name="tingkat"]').val(data.tingkat_id);
					$('[name="kelas"]').val(data.kelas_id);
					$('[name="keterangan"]').val(data.keterangan_santri);
					//$('[name="status_Santri"]').val(data.employee_status);

					$('#modal_form').modal('show');

					$("#modal_form").on('shown.bs.modal', function() {
						$(this).find('#kdsantri').focus();
					});
					$('.modal-title').text('Formulir Ubah Data Santri');

					$('#photo-preview').show();
					$('#preview_kk').show();
					$('#preview_akta').show();

					if (data.foto_santri) {
						$('#label-photo').text('Ubah Foto');
						$('#photo-preview div').html('<img src="' + base_url + 'assets/be/image/santri/' + data.foto_santri + '" class="img-responsive" width="150px" height="150px">');
						$('#photo-preview div').append('<br><input type="checkbox" name="remove_photo" value="' + data.foto_santri + '"/> Hapus foto ketika merubah data');
					} else {
						$('#label-photo').text('Upload Photo Formal');
						$('#photo-preview div').text('(No photo)');
					}
					//#kk
					if (data.foto_kk) {
						$('#label-kk').text('Ubah Foto KK');
						$('#preview_kk div').html('<img src="' + base_url + 'assets/be/image/santri/' + data.foto_kk + '" class="img-responsive" width="250px" height="250px">');
						$('#preview_kk div').append('<br><input type="checkbox" name="remove_photo_kk" value="' + data.foto_kk + '"/> Hapus foto ketika merubah data');
					} else {
						$('#label-kk').text('Upload Foto KK');
						$('#preview_kk div').text('(No photo)');
					}
					//akta
					if (data.foto_aktakelahiran) {
						$('#label-akta').text('Ubah Foto Aktakelahiran');
						$('#preview_akta div').html('<img src="' + base_url + 'assets/be/image/santri/' + data.foto_aktakelahiran + '" class="img-responsive" width="250px" height="250px">');
						$('#preview_akta div').append('<br><input type="checkbox" name="remove_photo_akta" value="' + data.foto_aktakelahiran + '"/> Hapus foto ketika merubah data');
					} else {
						$('#label-akta').text('Upload Foto Aktakelahiran');
						$('#preview_akta div').text('(No photo)');
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
				url = "<?php echo site_url('be/santri/SantriCTRL/ajax_add') ?>";
			} else if (save_method == 'delete') {
				url = "<?php echo site_url('be/santri/SantriCTRL/ajax_delete') ?>";
			} else {
				url = "<?php echo site_url('be/santri/SantriCTRL/ajax_update') ?>";
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
						url: "<?php echo site_url('be/santri/SantriCTRL/ajax_delete/') ?>" + id,
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
