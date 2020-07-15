
    <!-- Main content -->
    <section class="content">
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Santri </h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <form action="<?php echo base_url('be/absen/AbsenCTRL/Simpan');?>" method="post">
              <table class="table table-hover">
                <tr>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Hadir</th>
                  <th>Sakit</th>
                  <th>Izin</th>
                  <th>Alfa</th>
                  <th>Keterangan</th>
                </tr>
                <?php
                    $no = 1; foreach($Santri as $str){ 
                    ?>
                <tr>
                  <td>
                  <input type="hidden" name="id[]" value="<?php echo $str->santri_id;?>" readonly>
                  <input type="hidden" name="no[]" value="<?php echo $no;?>" readonly>
                  <input type="text" name="nis" class="form-control" value="<?php echo $str->nis;?>" readonly>
                    </td>
                  <td><input type="text" name="nis" class="form-control" value="<?php echo $str->nama_santri;?>" readonly></td>
                  <td><input type="radio" name="absen<?php echo $no;?>[]" id="absen<?php echo $no;?>" value="hadir"></td>
                  <td><input type="radio" name="absen<?php echo $no;?>[]" id="absen<?php echo $no;?>" value="sakit"></td>
                  <td><input type="radio" name="absen<?php echo $no;?>[]" id="absen<?php echo $no;?>" value="izin"></td>
                  <td><input type="radio" name="absen<?php echo $no;?>[]" id="absen<?php echo $no;?>" value="alfa"></td>
                  <td><textarea class="form-control" name="descript[]" rows="3" placeholder="Keterangan ..."></textarea></td>
                </tr>
                <?php $no++; }?>
                <tr>
                <td collspan="7"><button type="submit" class="btn btn-primary"><i class="fa fa-check"> Simpan</i></td>
                </button>
                </tr>
              </table>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>