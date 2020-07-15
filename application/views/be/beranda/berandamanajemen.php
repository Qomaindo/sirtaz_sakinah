
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jmlKelas; ?></h3>

              <p>Jumlah Kelas</p>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
            <a href="<?php echo base_url('be/kelas/KelasCTRL');?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jmlPengajar; ?></h3>

              <p>Jumlah Guru</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?php echo base_url('be/guru/GuruCTRL');?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $jmlSantriBaru; ?></h3>

              <p>Jumlah Santri Baru</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url();?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jmlSantri; ?></h3>

              <p>Jumlah Santri</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="<?php echo base_url('be/santri/SantriCTRL');?>" class="small-box-footer">Lihat Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <br><br>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->

          <!-- Chat box -->
          
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header bg-light-blue-gradient">
              <i class="fa fa-newspaper-o"></i>

              <?php 
                $kelas = $jmlKelas;
                $guru = $jmlPengajar;
                $santri = $jmlSantri;

                $total = $kelas + $guru + $santri;
               ?>

              <h3 class="box-title">Informasi Terbaru</h3>
              <!-- Jumlah Total : <?php echo $total; ?> -->
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button> -->
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
             <table class="table table-striped">
                <tr>
                  <th style="width: 10px">No</th>
                  <th>Judul Informasi</th>
                  <th>Tanggal dibuat</th>
                  <th>Sekilah Isi</th>
                </tr>

          <?php if(isset($DataInformasi)){
            $no=1;
                foreach ($DataInformasi as $info) { ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $info->judul_info; ?></td>
                  <td>
                   <?php echo $info->tgl_unggah; ?>
                  </td>
                  <td>
                    <?php echo $info->sub_judul; ?>
                  </td>
                </tr>
          <?php $no++; } }else{
            echo "Data Kosong";
          }?>
              </table>
            </div>
            <div class="box-footer clearfix">
              <a href="<?php echo base_url('be/infoberita/InfoBeritaCTRL');?>" type="button" class="pull-right btn btn-info" id="sendEmail">Selengkapnya
                <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
             <font color="black"> 
            
                <div id="calendar"></div>

             </font>
            </div>
          </div>
          <!-- /.box -->

          <!-- solid sales graph -->
          
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
