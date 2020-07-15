<div class="container-fluid">
    <!-- Main content -->
    <?php
    if (isset($Santri)) {
        foreach ($Santri as $data) {
    ?>
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
           <div class="col-lg-9">
                        <div class="box">
            <ul class="nav nav-tabs">
              <li class="active" style="width: 30%; text-align: center;">
                <a href="#santri" data-toggle="tab">
                    <b>Santri</b>
                </a>
            </li>
            <li style="width: 25%; text-align: center;">
                <a href="#ayah" data-toggle="tab">
                    <b>Ayah</b>
                </a>
            </li>
            <li style="width: 25%; text-align: center;">
                <a href="#ibu" data-toggle="tab">
                <b>Ibu</b>
                </a>
            </li>
            <li style="width: 20%; text-align: center;">

                            <div class="box-header">
                                <button class="btn btn-sm btn-default" style="float: right" title="Kembali" onclick="current_page()">
                                    <i class="fa fa-chevron-circle-left "></i> &nbsp; Kembali
                                </button>
                            </div>
            </li>
            </ul>
            <div class="tab-content">
                            <!-- /.card-header santri -->
                            <div class="active tab-pane" id="santri">
                        <div class="box-body">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="nis_siswa" class="col-sm-3 col-form-label">Kode Santri</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nis; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nama_santri; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nis_siswa" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                            <label class="col-sm-9 col-form-label"> :  
                                             <?php
                                                if ($data->jkel_santri == 'P' || $data->jkel_santri == 'p') {
                                                    echo "Perempuan";
                                                }else{
                                                    echo "Laki-laki" ;
                                                }
                                             ?>
                                             </label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->tmplahir_santri; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->tgllahir_santri; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Tingkat</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nama_tingkat ; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Kelas</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nama_kelas ; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Alamat</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->alamat_santri; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nis_siswa" class="col-sm-3 col-form-label">Keterangan Santri</label>
                                            <label class="col-sm-9 col-form-label"> : 
                                                <?php echo $data->keterangan_santri;?>
                                                
                                            </label>
                                    </div>
                                </form>
                            </div>
                        </div>
                            <!-- /.end box-body santri -->

                            <!-- /.card-header santri -->
                    <div class="tab-pane" id="ayah">
                        <div class="box-body">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="nis_siswa" class="col-sm-3 col-form-label">NIK</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nik_ayah; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Nama Ayah</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nama_ayah; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nohp_ayah; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Pekerjaan</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->pekerjaan_ayah; ?></label>
                                    </div>
                                </form>
                            </div>
                        </div>
                            <!-- /.end box-body ayah-->

                            <!-- /.card-header ibu -->
                        <div class="tab-pane" id="ibu">
                            <div class="box-body">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="nis_siswa" class="col-sm-3 col-form-label">NIK</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nik_ibu; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Nama Ibu</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nama_ibu; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Nomor Telepon</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->nohp_ibu; ?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Pekerjaan</label>
                                        <label class="col-sm-9 col-form-label"> : <?php echo $data->pekerjaan_ibu; ?></label>
                                    </div>
                                </form>
                            </div>
                        </div>
                            <!-- /.end box-body ibu-->
                        </div>
                    </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-3">
                        <div class="box">
                            <div class="box-header">
                                <center>
                                <h4>Foto Santri</h4>
                            </center>
                                <hr>
                            </div>
                            <!-- /.card-header -->
                            <div class="box-body">
                                 <?php
                                      if (isset($data->foto_santri)) {
                                      echo '<img class="img-responsive col-md-12" src=" ' . base_url('assets/be/image/santri/' . $data->foto_santri . ''). '" style="padding: 5px; border:1px solid; border-color: rgba(0,0,0,.125); height:250px;">';

                                  }else{
                                    echo '<img src="' . base_url('assets/be/image/santri/conan.jpg') . '" class="" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%;" alt="User Image">';
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
        window.location.href = "<?php echo site_url('be/santri/SantriCTRL/') ?>";
    }
</script>