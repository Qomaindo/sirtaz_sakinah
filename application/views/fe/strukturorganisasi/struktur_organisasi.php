
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="clearfix"></div>
            <div class="row">
              <section id="projects">
                <ul id="thumbs" class="grid cs-style-3 portfolio">

          <?php if(isset($ProfileSK)){
                foreach ($ProfileSK as $info) { ?>
                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span12 design" data-id="id-0" data-type="web">
                    <div class="item">
                      <figure>
                        <div>
                          <!-- <img src="img/dummies/works/1.jpg" alt=""> -->

               <?php
                  if (isset($info->struktur_organisasi)) {
                    echo '<img width="100%" height="70%" src="'.base_url('assets/be/image/yayasan/'.$info->struktur_organisasi.'').'" alt="Foto Kosong">';
                  } else {
                    echo '<img src="'.base_url('assets/be/image/yayasan/employee_default.jpg').'" alt="Belum Ada Foto">';
                  }
                ?>
                        </div>
                        <figcaption>
                          <h3>Struktur Organisasi</h3>
                          <p>
                            
<?php
                  if (isset($info->struktur_organisasi)) {
                         echo '<a href="'.base_url('assets/be/image/yayasan/'.$info->struktur_organisasi.'').'" data-pretty="prettyPhoto[gallery1]" title="'.$info->nama_sekolah.'"><i class="icon-zoom-in icon-circled icon-bglight icon-2x active"></i></a>';
                           } else {
                    echo 'Data Kosong';
                  }
                ?>
                          </p>
                        </figcaption>
                      </figure>
                    </div>
                  </li>
                  <!-- End Item Project -->

          <?php } }else{
            echo "Data Kosong";
          }?>
                  <!-- End Item Project -->
                </ul>
              </section>

            </div>
          </div>
        </div>
      </div>
    </section>
