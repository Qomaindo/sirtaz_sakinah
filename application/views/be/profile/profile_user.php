<?php
    if (isset($pengajar)) {
        foreach ($pengajar as $data) {
?>
<section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

<!-- <img src="" style="width: 240px; padding: 1px; border: 3px solid #d2d6de; height: 200px;"> -->
               <?php
                  if (isset($data->foto_guru)) {
                  echo '<img src="' . base_url('assets/be/image/employee/' . $data->foto_guru . '') . '" class="" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%;" alt="User Image">';
                }else{
                  echo '<img src="' . base_url('assets/be/image/employee/default_employee.png') . '" class="" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%;" alt="User Image">';
              }
              ?>

              <!-- <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/be/image/employee/metal.jpg');?>" alt="User profile picture"> -->

              <h3 class="profile-username text-center"><?php echo $data->nama_guru;?></h3>

              <!-- <p class="text-muted text-center">Guru IPA</p> -->

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Kode Guru</b> <a class="pull-right"><?php echo $data->nip;?></a>
                </li>
                <li class="list-group-item">
                  <b>No HP</b> <a class="pull-right"><?php echo $data->nohp_guru;?></a>
                </li>
                <li class="list-group-item">
                  <b>Status Pengajar</b> 
                  <a class="pull-right">
                    <?php  
                      if ($data->status_guru == 1) {
                        echo "Aktive";
                      }else{
                        echo "Tidak Aktive";
                      }
                    ?>  
                    </a>
                </li>
              </ul>

              <a href="javascript:void(0)" class="btn btn-primary btn-block" onclick="edit_employee('<?php echo $data->guru_id?>')"><b>Ubah Profile</b> &nbsp; <i class="fa fa-pencil"></i></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#profile" data-toggle="tab">Profile</a></li>
              <li><a href="#settings" data-toggle="tab">Pengaturan</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="profile">
               <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Name" value="<?php echo $data->nama_guru;?>" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Jenis Kelamin</label>

                    <div class="col-sm-10">
                      <?php 
                          if ($data->jkel_guru == "L") {
                            echo '<input type="text" class="form-control" id="jkel" name="jkel" placeholder="Name" value="Laki-Laki" readonly="">';
                          }else{
                            echo '<input type="text" class="form-control" id="jkel" name="jkel" placeholder="Name" value="Perempuan" readonly="">';
                          }
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $data->email_guru;?>" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">No HP</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Name" value="<?php echo $data->nohp_guru;?>" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tempat Lahir</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Name" value="<?php echo $data->tmplahir_guru;?>" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Tanggal Lahir</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="text" name="text" placeholder="Name" value="<?php echo $data->tgllahir_guru;?>" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Pendidikan</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pddkn_terakhir" name="pddkn_terakhir" placeholder="Skills" value="<?php echo $data->pddknterakhir_guru;?>" readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Alamat Rumah</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="alamat" name="alamat" placeholder="Experience" readonly=""><?php echo $data->alamat_rumah;?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Alamat Lembaga</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="alamat" name="alamat" placeholder="Experience" readonly=""><?php echo $data->alamat_lembaga;?></textarea>
                    </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane" id="settings">
                <form action="#" class="form-horizontal" id="form_password">
                  <div class="form-group">
                    <label for="old_password" class="col-sm-2 control-label">Password Lama</label>

                    <div class="col-sm-10">
                       <input type="hidden" class="form-control" id="id" name="id" placeholder="Name" value="<?php echo $data->user_id;?>">
                      <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Password Lama">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Password Baru</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Password Baru">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Ulang Password Baru</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="confirm_new_password" name="confirm_new_password" placeholder="Confirmasi Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="button" class="btn btn-success" id="btnsavePW" onclick="check_same_password()">&nbsp;<i class="fa fa-check"></i> Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

<?php
        }
    }
?>

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
                                    <label for="nip">Kode Guru</label>
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    <input type="text" class="form-control" id="nip" name="nip" readonly="">
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
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="format  : tgl-bln-thn">
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
                                <!-- <div class="form-group">
                                    <label for="status_guru">Status</label>
                                    <select class="form-control" id="status_guru" name="status_guru">
                                        <option value="1">Aktif</option>
                                        <option value="0">Non Aktif</option>
                                    </select>
                                </div> -->
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

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {
    //set input/textarea/select event when change value, remove class error and remove text help block
        $('#tgl_lahir').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
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

function edit_password(id) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    $('#modal_form_password').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Ubah Password'); // Set title to Bootstrap modal title
}

    function edit_employee(id) {
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
                $('[name="tmpt_lahir"]').val(data.tmplahir_guru);
                $('[name="tgl_lahir"]').val(data.tgllahir_guru);
                $('[name="alamat_rumah"]').val(data.alamat_rumah);
                $('[name="alamat_lembaga"]').val(data.alamat_lembaga);
                $('[name="jabatan"]').val(data.role_id);
                $('[name="pend_terakhir"]').val(data.pddknterakhir_guru);
                //$('[name="status_guru"]').val(data.employee_status);

                $('#modal_form').modal('show');

                $("#modal_form").on('shown.bs.modal', function() {
                    $(this).find('#kode_guru').focus();
                });
                $('.modal-title').text('Formulir Ubah Data Guru');

                $('#photo-preview').show();

                if (data.foto_guru) {
                    $('#label-photo').text('Change Photo');
                    $('#photo-preview div').html('<img src="' + base_url + 'assets/be/image/employee/' + data.foto_guru + '" class="img-responsive" width="250px" height="250px">');
                    $('#photo-preview div').append('<br><input type="checkbox" name="remove_photo" value="' + data.foto_guru + '"/> Hapus foto ketika merubah data');
                } else {
                    $('#label-photo').text('Upload Photo');
                    $('#photo-preview div').text('(No photo)');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

function save() {
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    url = "<?php echo site_url('be/profile/ProfileUserCTRL/ajax_update_employee')?>";

    // ajax adding data to database
    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data) {
            if(data.status)  {
                $('#modal_form').modal('hide');
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        }
    });
}

function edit_password_employee(id) {
    save_method = 'update';
    $('#form_password')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    // $('#modal_form_password').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Ubah Password'); // Set title to Bootstrap modal title
}

function check_same_password() {
    var new_password = $('#new_password').val();
    var confirm_new_password = $('#confirm_new_password').val();
    if (new_password == confirm_new_password) {
        check_old_password_employee();
    } else {
        alert("Maaf Password Baru Anda Tidak Sama !");
        return false;
    }
    return false;
}

function check_old_password_employee() {
    var old_password = $('#old_password').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo site_url('be/profile/ProfileUserCTRL/ajax_check_password_employee')?>',
        data: { old_password: old_password },
        dataType: 'json',
        success:function(data){
          if (data < 1) {
              alert("Maaf Password Lama Anda Salah !");
              return false;
          }else{
              save_password();
          }
        }
    });
    return false;
}

function save_password() {
    $('#btnsavePW').text('saving...'); //change button text
    $('#btnsavePW').attr('disabled',true); //set button disable
    var url;

    url = "<?php echo site_url('be/profile/ProfileUserCTRL/ajax_update_password')?>";

    // ajax adding data to database

    var formData = new FormData($('#form_password')[0]);
    $.ajax({
        url : url,
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

            if(data.status)  {
                Toast.fire({
                        icon: "success",
                        title: "Berhasil merubah password."
                    });
                location.reload();
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnsavePW').text('Save'); //change button text
            $('#btnsavePW').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            $('#btnsavePW').text('Save'); //change button text
            $('#btnsavePW').attr('disabled',false); //set button enable

        }
    });
}

</script>
