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
                  <th width="15%"><center>Kode Daftar</center></th>
                  <th width="38%"><center>Nama Peserta</center></th>
                  <th width="15%"><center>Tempat Lahir</center></th>
                  <th width="15%"><center>Tanggal Lahir</center></th>
                  <th width="20%"><center>Aksi</center></th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                  <th width="2%">No</th>
                  <th width="15%"><center>Kode Daftar</center></th>
                  <th width="38%"><center>Nama Peserta</center></th>
                  <th width="15%"><center>Tempat Lahir</center></th>
                  <th width="15%"><center>Tanggal Lahir</center></th>
                  <th width="20%"><center>Aksi</center></th>
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
                        <center><h4 class="modal-title"></h4></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="form" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="kode">Nomor Pendaftaran</label>
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    <input type="text" class="form-control" id="kddaftar" name="kddaftar" value="<?php echo $KDDaftar ?>" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
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
                                    <label for="tempat_lahir">NIK Ayah</label>
                                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Nama Ayah</label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Pekerjaan Ayah</label>
                                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">No HP Ayah</label>
                                    <input type="text" class="form-control" id="nohp_ayah" name="nohp_ayah" data-inputmask="'mask': ['9999-9999-99999']" data-mask>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">NIK Ayah</label>
                                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Nama Ibu</label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Pekerjaan Ibu</label>
                                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">No HP Ibu</label>
                                    <input type="text" class="form-control" id="nohp_ibu" name="nohp_ibu" data-inputmask="'mask': ['9999-9999-99999']" data-mask>
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
<script src="<?php echo base_url('assets/be/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<script type="text/javascript">
    var save_method;
    var table;
    var base_url = '<?php echo base_url(); ?>';

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
                "url": "<?php echo site_url('be/pendaftaran/PendaftaranOnlieCTRL/ajax_list') ?>",
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
        window.location.href = "<?php echo site_url('be/pendaftaran/PendaftaranOnlieCTRL/SantriDetail/') ?>" + id;
    }

    function add() {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal("show");
        $('.modal-title').text('Formulir Tambah Data Santri Baru');

        $('#photo-preview').hide();

        $("#modal_form").on('shown.bs.modal', function() {
            $(this).find('#kddaftar').focus();
        });
    }

    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();

        $.ajax({
            url: "<?php echo site_url('be/pendaftaran/PendaftaranOnlieCTRL/ajax_edit/') ?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id"]').val(data.datappdb_id);
                $('[name="kddaftar"]').val(data.datappdb_id);
                $('[name="nama_lengkap"]').val(data.nama_lengkap);
                $('[name="tmpt_lahir"]').val(data.tempat_lahir);
                $('[name="tgl_lahir"]').val(data.tgl_lahir);
                $('[name="nik_ayah"]').val(data.nik_ayah);
                $('[name="nama_ayah"]').val(data.nama_ayah);
                $('[name="pekerjaan_ayah"]').val(data.pekerjaan_ayah);
                $('[name="nohp_ayah"]').val(data.nohp_ayah);
                $('[name="nik_ibu"]').val(data.nik_ibu);
                $('[name="nama_ibu"]').val(data.nama_ibu);
                $('[name="pekerjaan_ibu"]').val(data.pekerjaan_ibu);
                $('[name="nohp_ibu"]').val(data.nohp_ibu);
                //$('[name="status_Santri"]').val(data.employee_status);

                $('#modal_form').modal('show');

                $("#modal_form").on('shown.bs.modal', function() {
                    $(this).find('#kdsantri').focus();
                });
                $('.modal-title').text('Formulir Ubah Data Santri Baru');

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
            url = "<?php echo site_url('be/pendaftaran/PendaftaranOnlieCTRL/ajax_add') ?>";
        } else if (save_method == 'delete') {
            url = "<?php echo site_url('be/pendaftaran/PendaftaranOnlieCTRL/ajax_delete') ?>";
        } else {
            url = "<?php echo site_url('be/pendaftaran/PendaftaranOnlieCTRL/ajax_update') ?>";
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
                    url: "<?php echo site_url('be/pendaftaran/PendaftaranOnlieCTRL/ajax_delete/') ?>" + id,
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