
    <section id="content">
      <div class="container">
        <div class="row">

          <div class="span4">

            <aside class="left-sidebar">

              <div class="widget">

                <h5 class="widgetheading">Ketegori</h5>

                <ul class="cat">
                  <li>
                    <i class="icon-circle-arrow-right"></i> <a href="#info" data-toggle="tab">Informasi</a>
                    <span> (<?php echo $jmlInfo; ?>)</span>
                  </li>
                  <li>
                    <i class="icon-circle-arrow-right"></i> <a href="#berita" data-toggle="tab">Berita</a>
                    <span> (<?php echo $jmlBerita; ?>)</span>
                  </li>
                </ul>
              </div>
              
            </aside>
          </div>

      <div class="tab-content">

        <div class="active tab-pane" id="info">
          <div class="span8">

          <?php if(isset($Informasi)){
                foreach ($Informasi as $info) { 
                  $kalimat= $info->isi_info;
                  $jumlahkarakter=0;
                  $cetak = substr($kalimat,$jumlahkarakter,250)."...";
                  ?>

            <article>
              <div class="row">

                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="javascript:void(0)"><?php echo $info->judul_info; ?></a></h3>
                    </div>
               <?php
                  if (isset($info->foto_info)) {
                    echo '<img src="'.base_url('assets/be/image/info_berita/'.$info->foto_info.'').'" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%; max-width:99%; max-height:250px;" alt="Foto Kosong">';
                  } else {
                    echo '<img src="'.base_url('assets/be/image/info_berita/employee_default.jpg').'" alt="Foto Default">';
                  }
                ?>

                  </div>
                  <div class="meta-post">
                    <a href="javascript:void(0)" class="author">By :<br /> Admin</a>
                    <a href="javascript:void(0)" class="date">At :<br /> <?php $tgl = $info->tgl_unggah; echo date("d-m-Y", strtotime($tgl)); ?></a>
                  </div>
                  <div class="post-entry">
                    <p>
                      <b><h5>
                      <?php echo $info->sub_judul; ?>
                      </h5></b>
                    <hr>
                      <?php echo $cetak; ?>
                    </p>
                    <a href="<?php echo base_url('fe/infoberita/InfoBeritaController/detailInformasi/').$info->informasi_id; ?>" class="btn btn-inverse">Selengkapnya <i class="icon-circle-arrow-right icon-white"></i></a>
                  </div>
                </div>
              </div>
            </article>

          <?php } }else{
            echo "Kelas Kosong";
          }?>

          </div>
        </div>


        <div class="tab-pane" id="berita">
          <div class="span8">

          <?php if(isset($Berita)){
                foreach ($Berita as $berita) { 
                  $kalimat= $berita->isi_berita;
                  $jumlahkarakter=0;
                  $cetak = substr($kalimat,$jumlahkarakter,250)."...";
                  ?>

            <article>
              <div class="row">

                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="javascript:void(0)"><?php echo $berita->judul_berita; ?></a></h3>
                    </div>

               <?php
                  if (isset($berita->foto_berita)) {
                    echo '<img src="'.base_url('assets/be/image/info_berita/'.$berita->foto_berita.'').'" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%; max-width:99%; max-height:250px;" alt="Foto Kosong">';
                  } else {
                    echo '<img src="'.base_url('assets/be/image/info_berita/employee_default.jpg').'" alt="Foto Default">';
                  }
                ?>

                  </div>
                  <div class="meta-post">
                    <a href="javascript:void(0)" class="author">By<br /> Admin</a>
                    <a href="javascript:void(0)" class="date">At :<br /> <?php $tgl = $berita->tgl_diunggah; echo date("d-m-Y", strtotime($tgl)); ?></a>
                  </div>
                  <div class="post-entry">
                    <p>
                      <b><h5>
                      <?php echo $berita->sub_judul_berita; ?>
                      </h5></b>
                    <hr>
                      <?php echo $cetak; ?>
                    </p>
                    <a href="<?php echo base_url('fe/infoberita/InfoBeritaController/detailBerita/').$berita->berita_id; ?>" class="btn btn-inverse">Selengkapnya <i class="icon-circle-arrow-right icon-white"></i>
                    </a>
                  </div>
                </div>
              </div>
            </article>

          <?php } }else{
            echo "Kelas Kosong";
          }?>

          </div>
        </div>

      </div>

        </div>
      </div>
    </section>
