<div class="container-fluid">
    <!-- Main content -->
    <?php
    if (isset($guru)) {
        foreach ($guru as $data) {
?>
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
                    <div class="col-lg-9">
                        <div class="box">
                            <div class="box-header">
                                <button class="btn btn-sm btn-default" style="float: right" title="Kembali" onclick="current_page()">
                                    <i class="fa fa-chevron-circle-left "></i> &nbsp; Kembali
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="box-body">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="nis_siswa" class="col-sm-3 col-form-label">Kode Guru</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nip; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <label class="col-sm-9 col-form-label"> :  <?php echo $data->nama_guru; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nis_siswa" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <label class="col-sm-9 col-form-label"> :  
                                             <?php
                                                if ($data->jkel_guru == 'P' || $data->jkel_guru == 'p') {
                                                    echo "Perempuan";
                                                }else{
                                                    echo "Laki-laki" ;
                                                }
                                             ?>
                                             </label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->tmplahir_guru; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->tgllahir_guru; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nohp_guru; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Email</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->email_guru; ?></label>
									</div>
									 <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">NIK</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nik; ?></label>
									</div>
									 <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">No. Rekening</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->no_rek; ?></label>
									</div>
									 <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Lama Mengajar</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->lama_mengajar; ?> Tahun</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->pddknterakhir_guru; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Alamat Rumah</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->alamat_rumah; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Alamat Lembaga</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->alamat_lembaga; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Terhitung Mulai Tanggal</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->tmt; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Penerima Hibah</label>
                                        <label class="col-sm-9 col-form-label"> : 
                                             <?php
                                                if ($data->penerima_hibah == 1) {
                                                    echo "Ya";
                                                }else{
                                                 echo "Tidak";
                                                }
                                                ?>
                                        </label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nis_siswa" class="col-sm-3 col-form-label">Status</label>
                                            <label class="col-sm-9 col-form-label"> : 
                                                <?php
                                                if ($data->status_guru == 1) {
                                                    echo "Aktif";
                                                }else{
                                                 echo "Tidak Aktif";
                                                }
                                                ?>
                                                
                                            </label>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-3">
                        <div class="box">
                            <div class="box-header">
                                <center>
                                <h4>Foto Guru</h4>
                            </center>
                                <hr>
                            </div>
                            <!-- /.card-header -->
                            <div class="box-body">
                                 <?php
                                      if (isset($data->foto_guru)) {
                                      echo '<img class="img-responsive col-md-12" src=" ' . base_url('assets/be/image/employee/' . $data->foto_guru . ''). '" style="padding: 5px; border:1px solid; border-color: rgba(0,0,0,.125); height:250px;">';

                                  }else{
                                    echo '<img src="' . base_url('assets/be/image/employee/default_employee.png') . '" class="" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%;" alt="User Image">';
                                  }
                                  ?>
                            </div>
                            <!-- /.card-body -->
                            </img>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
    </section>
<?php
        }
    }
?>

</div>

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery/dist/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script type="text/javascript">
    function current_page() {
        window.location.href = "<?php echo site_url('be/guru/GuruCTRL/') ?>";
    }
</script>