<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="tb_data" class="table table-bordered table-striped" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Hari</th>
								<th>Kelas</th>
								<th>Mata Pelajaran</th>
								<th>Waktu Pelaksanaan</th>
								<th>
									<center>Absen Santri</center>
								</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
						<tfoot>
							<tr>
								<th>No</th>
								<th>Hari</th>
								<th>Kelas</th>
								<th>Mata Pelajaran</th>
								<th>Waktu Pelaksanaan</th>
								<th>
									<center>Absen Santri</center>
								</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
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

			table = $('#tb_data').DataTable({

				retrieve: true,
				paging: true,
				"bInfo": false,
				"processing": false,
				"serverSide": true,
				"order": [],

				"ajax": {
					"url": "<?php echo site_url('be/absen/AbsenCTRL/ajax_list') ?>",
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

			$('#tgl').datepicker({
				autoclose: true,
				format: "yyyy-mm-dd",
				todayHighlight: true,
				todayHighlight: true,
			});

			//Timepicker
			$('.jam_masuk').timepicker({
				showInputs: false
			})

			$('.jam_keluar').timepicker({
				showInputs: false
			})

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

		function add() {
			save_method = 'add';
			$('#form')[0].reset();
			$('.form-group').removeClass('has-error');
			$('.help-block').empty();
			$('#modal_form').modal("show");
			$('.modal-title').text('Formulir Tambah Jadwal Pengajar');

			$("#modal_form").on('shown.bs.modal', function() {
				$(this).find('#guru').focus();
			});
		}

		function edit(id) {
			save_method = 'update';
			$('#form')[0].reset();
			$('.form-group').removeClass('has-error');
			$('.help-block').empty();

			$.ajax({
				url: "<?php echo site_url('be/absen/AbsenCTRL/ajax_edit/') ?>" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {

					$('[name="id"]').val(data.jadwal_id);
					$('[name="kelas"]').val(data.kelas_id);
					$('[name="mapel"]').val(data.mapel_id);
					$('[name="guru"]').val(data.guru_id);
					$('[name="tgl"]').val(data.tanggal);
					$('[name="jam_masuk"]').val(data.jam_masuk);
					$('[name="jam_keluar"]').val(data.jam_keluar);

					$('#modal_form').modal('show');

					$("#modal_form").on('shown.bs.modal', function() {
						$(this).find('#guru').focus();
					});

					$('.modal-title').text('Formulir Ubah Data Jadwal Pengajar');
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
				url = "<?php echo site_url('be/absen/AbsenCTRL/ajax_add') ?>";
			} else if (save_method == 'delete') {
				url = "<?php echo site_url('be/absen/AbsenCTRL/ajax_delete') ?>";
			} else {
				url = "<?php echo site_url('be/absen/AbsenCTRL/ajax_update') ?>";
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
						url: "<?php echo site_url('be/absen/AbsenCTRL/ajax_delete/') ?>" + id,
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
