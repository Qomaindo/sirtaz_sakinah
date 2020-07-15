<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<center>
					<h3>
						<font face="comicsan"> INFORMASI</font>
					</h3>
				</center>
				<div class="box-header">
					<button class="btn btn-success" onclick="add_informasi()"><i class="glyphicon glyphicon-plus"></i> Add</button>
					<button class="btn btn-default" onclick="reload_table_informasi()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
					<br />
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table width="100%" id="tb_informasi" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="3%">No</th>
								<th width="30%">
									<center>Judul</center>
								</th>
								<th width="15%">
									<center>Sub Judul</center>
								</th>
								<th width="15%">
									<center>Isi</center>
								</th>
								<th width="10%">
									<center>Tanggal Berlaku</center>
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
								<th width="30%">
									<center>Judul</center>
								</th>
								<th width="15%">
									<center>Sub Judul</center>
								</th>
								<th width="15%">
									<center>Isi</center>
								</th>
								<th width="10%">
									<center>Tanggal Berlaku</center>
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

	<div class="modal fade" id="modal_informasi" data-backdrop="static" tabindex="-1">
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
					<form action="#" id="form_informasi">
						<input type="hidden" class="form-control" id="id_informasi" name="id_info">
						<div class="form-group">
							<label for="judul_info">Judul</label>
							<input type="text" class="form-control" id="judul_info" name="judul_info">
						</div>
						<div class="form-group">
							<label for="sub_judul_info">Sub Judul</label>
							<input type="text" class="form-control" id="sub_judul_info" name="sub_judul_info">
						</div>
						<div class="form-group">
							<label for="isi_info">Isi Informasi</label>
							<textarea type="text" class="form-control" id="isi_info" name="isi_info"></textarea>
						</div>
						<div class="form-group">
							<label for="tgl_info">Tanggal Berlaku Informasi</label>
							<input type="text" class="form-control" id="tgl_info" name="tgl_info" placeholder="format  : thn-bln-tgl">
						</div>
						<div class="form-group" id="photo-preview-informasi">
							<label class="control-label col-md-3">Foto</label>
							<div class="col-md-9">
								(No photo)
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12" id="label-photo">Upload Foto </label>
							<div class="col-md-9">
								<input name="foto_info" type="file">
								<span class="help-block"></span>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-primary" id="btn_informasi" onclick="save_informasi()">
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

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<center>
					<h3>
						<font face="comicsan"> BERITA</font>
					</h3>
				</center>
				<div class="box-header">
					<button class="btn btn-success" onclick="add_berita()"><i class="glyphicon glyphicon-plus"></i> Add</button>
					<button class="btn btn-default" onclick="reload_table_berita()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
					<br />
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table width="100%" id="tb_berita" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th width="3%">No</th>
								<th width="30%">
									<center>Judul</center>
								</th>
								<th width="15%">
									<center>Sub Judul</center>
								</th>
								<th width="15%">
									<center>Isi</center>
								</th>
								<th width="10%">
									<center>Tanggal Berlaku</center>
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
								<th width="30%">
									<center>Judul</center>
								</th>
								<th width="15%">
									<center>Sub Judul</center>
								</th>
								<th width="15%">
									<center>Isi</center>
								</th>
								<th width="10%">
									<center>Tanggal Berlaku</center>
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

	<div class="modal fade" id="modal_berita" data-backdrop="static" tabindex="-1">
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
					<form action="#" id="form_berita">
						<input type="hidden" class="form-control" id="id_berita" name="id_berita">
						<div class="form-group">
							<label for="judul_berita">Judul</label>
							<input type="text" class="form-control" id="judul_berita" name="judul_berita">
						</div>
						<div class="form-group">
							<label for="sub_judul_berita">Sub Judul</label>
							<input type="text" class="form-control" id="sub_judul_berita" name="sub_judul_berita">
						</div>
						<div class="form-group">
							<label for="isi_berita">Isi Berita</label>
							<textarea type="text" class="form-control" id="isi_berita" name="isi_berita"></textarea>
						</div>
						<div class="form-group">
							<label for="tgl_berita">Tanggal Berlaku Berita</label>
							<input type="text" class="form-control" id="tgl_berita" name="tgl_berita" placeholder="format  : thn-bln-tgl">
						</div>
						<div class="form-group" id="photo-preview-berita">
							<label class="control-label col-md-3">Foto</label>
							<div class="col-md-9">
								(No photo)
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-12" id="label-photo">Upload Foto </label>
							<div class="col-md-9">
								<input name="foto_berita" type="file">
								<span class="help-block"></span>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-primary" id="btn_berita" onclick="save_berita()">
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

</section>

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/be/bower_components/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo base_url('assets/be/bower_components/ckeditor/config.js'); ?>"></script>

<script type="text/javascript">
	var save_method;
	var table;
	var base_url = '<?php echo base_url(); ?>';

	$(function() {
		CKEDITOR.replace('isi_info')
		$('.textarea').wysihtml5()
	})

	$(function() {
		CKEDITOR.replace('isi_berita')
		$('.textarea').wysihtml5()
	})
	$(document).ready(function() {
		tb_informasi = $('#tb_informasi').DataTable({

			retrieve: true,
			paging: true,
			"bInfo": false,
			"processing": false,
			"serverSide": true,
			"order": [],

			"ajax": {
				"url": "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_list_informasi') ?>",
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

		$('#tgl_info').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd",
			todayHighlight: true,
			todayHighlight: true,
		});

		$('#tgl_berita').datepicker({
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

		tb_berita = $('#tb_berita').DataTable({

			retrieve: true,
			paging: true,
			"bInfo": false,
			"processing": false,
			"serverSide": true,
			"order": [],

			"ajax": {
				"url": "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_list_berita') ?>",
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
	});

	function CKupdate() {
		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
			CKEDITOR.instances[instance].setData('');
		}
	}

	function add_informasi() {
		save_method = 'add_informasi';
		$('#form_informasi')[0].reset();
		CKupdate();
		$('.form-group').removeClass('has-error');
		$('.help-block').empty();
		$('#modal_informasi').modal("show");
		$('.modal-title').text('Formulir Tambah Informasi');

		$('#photo-preview-informasi').hide();

		$("#modal_informasi").on('shown.bs.modal', function() {
			$(this).find('#judul_info').focus();
		});
	}

	function reload_table_informasi() {
		// tb_informasi.ajax.reload(null, false);

		window.location.href = "<?php echo site_url('be/infoberita/InfoBeritaCTRL/') ?>";
	}

	function edit_informasi(id) {
		save_method = 'update_informasi';
		$('#form_informasi')[0].reset();
		$('.form-group').removeClass('has-error');
		$('.help-block').empty();

		$.ajax({
			url: "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_edit_informasi/') ?>" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_info"]').val(data.informasi_id);
				$('[name="judul_info"]').val(data.judul_info);
				$('[name="sub_judul_info"]').val(data.sub_judul);

				// $('[name="isi_info"]').val(data.isi_info);

				CKEDITOR.instances['isi_info'].setData(data.isi_info);

				$('[name="tgl_info"]').val(data.tgl_info);

				$('#modal_informasi').modal('show');

				$("#modal_informasi").on('shown.bs.modal', function() {
					$(this).find('#judul_info').focus();
				});
				$('.modal-title').text('Formulir Ubah Informasi');

				$('#photo-preview-informasi').show();

				if (data.foto_info) {
					$('#label-photo').text('Change Photo');
					$('#photo-preview-informasi div').html('<img src="' + base_url + 'assets/be/image/info_berita/' + data.foto_info + '" class="img-responsive" width="250px" height="250px">');
					$('#photo-preview-informasi div').append('<br><input type="checkbox" name="remove_photo" value="' + data.foto_info + '"/> Hapus foto ketika merubah data');
				} else {
					$('#label-photo').text('Upload Photo');
					$('#photo-preview-informasi div').text('(No photo)');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function save_informasi() {
		$('#btn_informasi').text('saving...');
		$('#btn_informasi').attr('disabled', true);
		var url;

		if (save_method == 'add_informasi') {
			url = "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_add_informasi') ?>";
		} else if (save_method == 'delete_informasi') {
			url = "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_delete_informasi') ?>";
		} else if (save_method == 'update_informasi') {
			url = "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_update_informasi') ?>";
		} else {
			url = "";
		}

		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}

		var formData = new FormData($('#form_informasi')[0]);


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
					$('#modal_informasi').modal('hide');
					reload_table_informasi();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
					}
				}
				$('#btn_informasi').text('Save');
				$('#btn_informasi').attr('disabled', false);

			},
			error: function(jqXHR, textStatus, errorThrown) {
				Toast.fire({
					icon: "error",
					title: "gagal menambah atau merubah data."
				});
				$('#btn_informasi').text('Save');
				$('#btn_informasi').attr('disabled', false);
			}
		});
	}

	function deleted_informasi(id) {
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
					url: "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_delete_informasi/') ?>" + id,
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						Toast.fire({
							icon: "success",
							title: "data berhasil dihapus."
						});
						reload_table_informasi();
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


	function add_berita() {
		save_method = 'add_berita';
		$('#form_berita')[0].reset();
		CKEDITOR.instances['isi_berita'].setData("");
		$('.form-group').removeClass('has-error');
		$('.help-block').empty();
		$('#modal_berita').modal("show");
		$('.modal-title').text('Formulir Tambah Berita');

		$('#photo-preview-berita').hide();

		$("#modal_berita").on('shown.bs.modal', function() {
			$(this).find('#judul_berita').focus();
		});
	}

	function reload_table_berita() {
		// tb_berita.ajax.reload(null, false);

		window.location.href = "<?php echo site_url('be/infoberita/InfoBeritaCTRL/') ?>";
	}

	function edit_berita(id) {
		save_method = 'update_berita';
		$('#form_berita')[0].reset();
		$('.form-group').removeClass('has-error');
		$('.help-block').empty();

		$.ajax({
			url: "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_edit_berita/') ?>" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {

				$('[name="id_berita"]').val(data.berita_id);
				$('[name="judul_berita"]').val(data.judul_berita);
				$('[name="sub_judul_berita"]').val(data.sub_judul_berita);
				// $('[name="isi_berita"]').val(data.isi_berita);

				CKEDITOR.instances['isi_berita'].setData(data.isi_berita);

				$('[name="tgl_berita"]').val(data.tgl_berita);

				$('#modal_berita').modal('show');

				$("#modal_berita").on('shown.bs.modal', function() {
					$(this).find('#judul_berita').focus();
				});
				$('.modal-title').text('Formulir Ubah Berita');

				$('#photo-preview-berita').show();

				if (data.foto_berita) {
					$('#label-photo').text('Change Photo');
					$('#photo-preview-berita div').html('<img src="' + base_url + 'assets/be/image/info_berita/' + data.foto_berita + '" class="img-responsive" width="250px" height="250px">');
					$('#photo-preview-berita div').append('<br><input type="checkbox" name="remove_photo" value="' + data.foto_berita + '"/> Hapus foto ketika merubah data');
				} else {
					$('#label-photo').text('Upload Photo');
					$('#photo-preview-berita div').text('(No photo)');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function save_berita() {
		$('#btn_berita').text('saving...');
		$('#btn_berita').attr('disabled', true);
		var url;

		if (save_method == 'add_berita') {
			url = "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_add_berita') ?>";
		} else if (save_method == 'delete_berita') {
			url = "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_delete_berita') ?>";
		} else if (save_method == 'update_berita') {
			url = "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_update_berita') ?>";
		} else {
			url = "";
		}

		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}

		var formData = new FormData($('#form_berita')[0]);

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
					$('#modal_berita').modal('hide');
					reload_table_berita();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error');
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
					}
				}
				$('#btn_berita').text('Save');
				$('#btn_berita').attr('disabled', false);

			},
			error: function(jqXHR, textStatus, errorThrown) {
				Toast.fire({
					icon: "error",
					title: "gagal menambah atau merubah data."
				});
				$('#btn_berita').text('Save');
				$('#btn_berita').attr('disabled', false);
			}
		});
	}

	function deleted_berita(id) {
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
					url: "<?php echo site_url('be/infoberita/InfoBeritaCTRL/ajax_delete_berita/') ?>" + id,
					type: "GET",
					dataType: "JSON",
					success: function(data) {
						Toast.fire({
							icon: "success",
							title: "data berhasil dihapus."
						});
						reload_table_berita();
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
