
    <section id="content">
      <div class="container">
        <div class="row">

          <div class="span12">

          <?php if(isset($DetailInfo)){
                foreach ($DetailInfo as $info) {
                  ?>

            <article>
              <div class="row">

                <div class="span12">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><center>
                        <a href="javascript:void(0)"><?php echo $info->judul_info; ?></a>
                      </center></h3>
                      <font size="2%">
                      <?php $tgl = $info->tgl_unggah; echo date("l, d F Y", strtotime($tgl)); ?>
                      </font>

                                <button class="btn btn-inverse" style="float: right" title="Kembali" onclick="current_page()">
                                    <i class="icon-circle-arrow-left icon-white"></i> &nbsp; Kembali
                                </button>
                    <hr>
                    </div>
               <?php
                  if (isset($info->foto_info)) {
                    echo '<img src="'.base_url('assets/be/image/info_berita/'.$info->foto_info.'').'" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%; max-width:100%; max-height:350px;" alt="Foto Kosong">';
                  } else {
                    echo '<img src="'.base_url('assets/be/image/info_berita/employee_default.jpg').'" alt="Foto Default">';
                  }
                ?>

                  </div>
                  <div class="meta-post">
                    <p>
                      <?php echo $info->isi_info; ?>
                    </p>
                  </div>
                </div>
              </div>
            </article>

          <?php } }else{
            echo "Data Kosong";
          }?>

          </div>

        </div>
      </div>
    </section>

<script type="text/javascript">
    function current_page() {
        window.location.href = "<?php echo site_url('fe/infoberita/InfoBeritaController/') ?>";
    }
</script>