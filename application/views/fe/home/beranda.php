
    <section id="content">
      <div class="container">


        <div class="row">

            <div class="row">
              <div class="span12">
                <div class="aligncenter">
                  <h3><i class="icon-bullhorn"></i> Informasi</h3>
                  <blockquote>
                    Berikut adalah informasi yang diajarkan di jenjang usia di masing- masing tingkat pendidikan, antara lain :
                  </blockquote>
                </div>
              </div>
            </div>
          <div class="span12">
            <div class="row">
          <?php if(isset($Informasi)){
                foreach ($Informasi as $info) { 

                  $kalimat= $info->isi_info;
                  $jumlahkarakter=0;
                  $cetak = substr($kalimat,$jumlahkarakter,100)."...";

                  ?>
              <div class="span3">
                <div class="pricing-box-plain">
                  <div class="heading">
                    <h5><?php echo $info->judul_info;?></h5>
                    <?php echo $info->sub_judul;?> :
                  </div>
                  <div class="desc">
                      <p align="justify"><?php echo $cetak; ?></p>
                  </div>
                  <div class="action">
                    <a href="#" class="btn btn-inverse">Lihat Selengkapnya <i class="icon-circle-arrow-right icon-white"></i></a>
                  </div>
                </div>
              </div>
          <?php } }else{
            echo "Kelas Kosong";
          }?>
          <br>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="offer">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="row">
              <div class="span12">
                <div class="aligncenter">
                  <h3>Tingkat Pendidikan</h3>
                  <blockquote>
                    Berikut adalah informasi yang diajarkan di jenjang usia di masing- masing tingkat pendidikan, antara lain :
                  </blockquote>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="span4">
                <div class="pricing-box-plain">
                  <div class="heading">
                    <h4>TKQ</h4>
                    <span>Berikut Daftar Kelas di tingkat TKQ :</span>
                  </div>
                  <div class="desc">
                    <ul>
                    <?php if(isset($KelasTKQ)){
                    foreach ($KelasTKQ as $tkq) { ?>
                      <li><?php echo $tkq->nama_kelas; ?></li>
                    <?php } }else{
                      echo "Kelas Kosong";
                    }?>
                    </ul>
                  </div>
                  <!-- <div class="action"> --><hr>
                    <a href="#" class="btn btn-inverse">Mendaftar</a>
                  <!-- </div> -->
                </div>
              </div>

            
              <div class="span4">
                <div class="pricing-box-plain">
                  <div class="heading">
                    <h4>TPQ</h4>
                    <span>Berikut Daftar Kelas di tingkat TPQ :</span>
                  </div>
                  <div class="desc">
                    <ul>
                    <?php
                    if(isset($KelasTPQ)){
                     foreach ($KelasTPQ as $tpq) { ?>
                      <li><?php echo $tpq->nama_kelas; ?></li>
                    <?php } }else{
                      echo "Data Kosong";
                     }?>
                    </ul>
                  </div>
                  <!-- <div class="action"> --><hr>
                    <a href="#" class="btn btn-inverse">Mendaftar</a>
                  <!-- </div> -->
                </div>
              </div>
            

            
              <div class="span4">
                <div class="pricing-box-plain">
                  <div class="heading">
                    <h4>Tahfidz</h4>
                    <span>Berikut Daftar Kelas di tingkat Tahfidz :</span>
                  </div>
                  <div class="desc">
                    <ul>
                    <?php if(isset($KelasTahfidz)){
                    foreach ($KelasTahfidz as $tahfidz) { ?>
                      <li><?php echo $tahfidz->nama_kelas; ?></li>
                    <?php } }else{
                      echo "Kelas Kosong";
                    } ?>
                    </ul>
                  </div>
                  <!-- <div class="action"> --><hr>
                    <a href="#" class="btn btn-inverse">Mendaftar</a>
                  <!-- </div> -->
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section>

    <section id="works">
      <div class="container">
        <div class="row">
          <div class="span12">
            <h3><i class="icon-info-sign"></i> Berita</h3>
            <!-- BEBERAPA FOTO SUASANA BELAJAR DI RUANG KELAS -->
            <div class="row">

              <div class="grid cs-style-3">

        <?php if(isset($Berita)){
              foreach ($Berita as $berita) { 
                $kalimat= $berita->isi_berita;
                  $jumlahkarakter=0;
                  $cetak = substr($kalimat,$jumlahkarakter,250)."...";
                ?>

                <div class="span3">
                  <div class="item">
                    <figure>
                      <div>
               <?php
                  if (isset($berita->foto_berita)) {
                    echo '<img src="'.base_url('assets/be/image/info_berita/'.$berita->foto_berita.'').'" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%; width:100%; max-width:210px; max-height:120px;" alt="Foto Kosong">';
                  } else {
                    echo '<img src="'.base_url('assets/be/image/info_berita/employee_default.jpg').'" alt="Foto Default">';
                  }
                ?>
                        <!-- <img src="img/dummies/works/1.jpg" alt=""> -->
                      </div>
                      <figcaption>
                        <h3><?php echo $berita->judul_berita; ?></h3>
                        <p>
                          <!-- <a href="img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"> -->
<?php
                  if (isset($berita->foto_berita)) {
                         echo '<a href="'.base_url('assets/be/image/info_berita/'.$berita->foto_berita.'').'" data-pretty="prettyPhoto[gallery1]" title="'.$cetak.'"><i class="icon-zoom-in icon-circled icon-bglight icon-2x active"></i></a>';
                           } else {
                    echo 'Data Kosong';
                  }
                ?>
                        </p>
                      </figcaption>
                    </figure>
                  </div>
                </div>

          <?php } }else{
            echo "Data Kosong";
           }?>

              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
