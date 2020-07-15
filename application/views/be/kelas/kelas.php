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
              <table id="tb_data" width="100%" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No</th>
                  <th width="30%"><center>Tingkat</center></th>
                  <th width="15%"><center>Nama kelas</center></th>
                  <th width="20%"><center>Wali Kelas</center></th>
                  <th width="20%"><center>Waktu</center></th>
                  <th width="15%"><center>Aksi</center></th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                  <th width="5%">No</th>
                  <th width="30%"><center>Tingkat</center></th>
                  <th width="15%"><center>Nama kelas</center></th>
                  <th width="20%"><center>Wali Kelas</center></th>
                  <th width="20%"><center>Waktu</center></th>
                  <th width="15%"><center>Aksi</center></th>
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
                        <center><h4 class="modal-title"></h4></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="form" class="form-horizontal">
                            <div class="box-body">
                                <hr>
                                <div class="form-group row">
                                    <label for="kode_sekolah" class="col-sm-12 col-form-label">
                                      <font face="algerian" color="blue">
                                        <center><i class="fa fa-info-circle"></i> Tata Cara Menambahkan Kelas.</center>
                                      </font>
                                    </label>
                                    <div class="col-sm-12">
                                      <!-- <center> -->
                                        1. Silahkan tambahkan kelas berdasarkan tingkatan (TPQ, TKQ atau Tahfidz)
                                        <br> 2. Isikan nama kelas beserta walikelas.
                                        <br> 3. Pilih waktu kelas tersebut, dimana terdapat beberapa pilihan, yaitu :
                                        <ul>
                                          <li> Pagi </li>
                                          <li> Siang </li>
                                          <li> Sore </li>
                                          <li> Malam </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <div class="form-group row">
                                    <label for="tingkat" class="col-sm-3 col-form-label">Tingkat</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="tingkat" name="tingkat">
                                          <?php
                                            if (isset($data_tingkat)) {
                                                foreach ($data_tingkat as $data) {
                                                    echo "<option value='$data[tingkat_id]'>$data[nama_tingkat]</option>";
                                                }
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nip" class="col-sm-3 col-form-label">Wali Kelas</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control" id="id" name="id">
                                        
                                        <select class="form-control" id="nip" name="nip">
                                          <?php
                                            if (isset($data_guru)) {
                                                foreach ($data_guru as $guru) {
                                                    echo "<option value='$guru[nip]'>$guru[nama_guru]</option>";
                                                }
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_kelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="waktu" class="col-sm-3 col-form-label">Waktu</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="waktu" name="waktu">
                                            <option value="Pagi">Pagi</option>
                                            <option value="Sore">Sore</option>
                                            <option value="Malam">Malam</option>
                                        </select>
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
<script src="<?php echo base_url('assets/be/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<script type="text/javascript">
    var save_method;
    var table;
    var base_url = '<?php echo base_url(); ?>';

    // $(function() {
    //     const Toast = Swal.mixin({
    //         toast: true,
    //         position: "top-end",
    //         showConfirmButton: false,
    //         timer: 3000,
    //     });
    // });


    $(document).ready(function() {
        table = $('#tb_data').DataTable({

            retrieve: true,
            paging: true,
            "bInfo": false,
            "processing": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('be/kelas/KelasCTRL/ajax_list') ?>",
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

    function add() {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal("show");
        $('.modal-title').text('Formulir Tambah Kelas');

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
            url: "<?php echo site_url('be/kelas/KelasCTRL/ajax_edit/') ?>" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id"]').val(data.kelas_id);
                $('[name="nip"]').val(data.nip);
                $('[name="tingkat"]').val(data.tingkat_id);
                $('[name="nama_kelas"]').val(data.nama_kelas);
                $('[name="waktu"]').val(data.waktu);

                $('#modal_form').modal('show');

                $("#modal_form").on('shown.bs.modal', function() {
                    $(this).find('#nip').focus();
                });
                $('.modal-title').text('Formulir Ubah Kelas');
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
            url = "<?php echo site_url('be/kelas/KelasCTRL/ajax_add') ?>";
        } else if (save_method == 'delete') {
            url = "<?php echo site_url('be/kelas/KelasCTRL/ajax_delete') ?>";
        } else {
            url = "<?php echo site_url('be/kelas/KelasCTRL/ajax_update') ?>";
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
            // width: "50%",
            // height: "50%",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: ' <i class="fa fa-check"></i> Ya, hapus !',
            cancelButtonText: ' <i class="fa fa-close"></i> Batal',
        }).then((result) => {
            if (result.value) {
                $('.help-block').empty();

                $.ajax({
                    url: "<?php echo site_url('be/kelas/KelasCTRL/ajax_delete/') ?>" + id,
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