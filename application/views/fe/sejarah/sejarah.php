<?php foreach ($ProfileSK as $sekolah) {
?>
<section id="content">
      <div class="container">
        <div class="row">

          <div class="span6">
            <h4><?php echo $sekolah->nama_sekolah; ?></h4>
            <p>
              <?php echo $sekolah->sejarah_sekolah; ?>
            </p>

          </div>

          <div class="span6">
               <?php
                  if (isset($sekolah->logo_sekolah)) {
                    echo '<img width="100%" height="70%" src="'.base_url('assets/be/image/yayasan/'.$sekolah->logo_sekolah.'').'" alt="Foto Kosong">';
                  } else {
                    echo '<img src="'.base_url('assets/be/image/yayasan/employee_default.jpg').'" alt="Belum Ada Foto">';
                  }
                ?>
          </div>
        </div>
        <!-- divider -->
        <div class="row">
          <div class="span12">
            <div class="solidline"></div>
          </div>
        </div>
        <!-- end divider -->


      </div>
    </section>

    <?php } ?>