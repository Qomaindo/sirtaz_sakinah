<header>
      <div class="top">
        <div class="container">
          <div class="row">
            <div class="span6">
              <ul class="topmenu">
                <li><a href="#">Sistem Informasi Sekolah</a> &#47;</li>
                <li><a href="#">halaman</a> &#47;</li>
                <li><a href="#"> <?php echo $nav_menu; ?> </a></li>
              </ul>
            </div>
            <div class="span6">

            <?php if(isset($ProfileSK)){
                foreach ($ProfileSK as $sekolah) {
                  ?>
              <ul class="social-network">
                <li><a href="<?php echo $sekolah->link_fb;?>" data-placement="bottom" title="Facebook"><i class="icon-circled icon-bglight icon-facebook"></i></a></li>
                <li><a href="<?php echo $sekolah->link_ig;?>" target='_blank' data-placement="bottom" title="instagram"><i class="icon-circled icon-bglight icon-instagram"></i></a></li>
              </ul>
          <?php } }else{
            echo "Data Kosong";
          }?>
            </div>
          </div>
        </div>
      </div>
      <div class="container">


        <div class="row nomargin">
          <div class="span4">
            <div class="logo">
              <!-- <h1><a href="index.html"><i class="icon-tint"></i> Rumah Santri</a></h1> -->
              <h4>
                <a href="<?php echo base_url();?>"> 
                <font color="white">
                  Rumah Tahfidz Sakinah
              </font>
            </a>
              </h4>
            </div>
          </div>
          <div class="span8">
            <div class="navbar navbar-static-top">
              <div class="navigation">
                <nav>
                  <ul class="nav topnav">
                    <?php if ($nav_menu=='Beranda') {
                      $class = 'active';
                    }else{
                      $class = '';
                    } ?>
                    <li class="<?php echo $class;?>">
                      <a href="<?php echo base_url() ?>">Beranda</a>
                    </li>
                    <?php if ($nav_menu=='Sejarah' || $nav_menu=='VisiMisi' || $nav_menu=='StrukturOrganisasi' || $nav_menu=='Perizinan') {
                      $class = 'active';
                    }else{
                      $class = '';
                    } ?>
                    <li class="dropdown <?php echo $class;?>">
                      <a href="javascript:void(0)">Tentang Kami <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('FE/about/SejarahController') ?>">Sejarah</a></li>
                        <li><a href="<?php echo base_url('fe/visimisi/VisiMisiController');?>">Visi & Misi</a></li>
                        <li><a href="<?php echo base_url('SakinahCTRL/StrukturOrganisasi');?>">Struktur Organisasi</a></li>
                        <li><a href="<?php echo base_url();?>">Perizinan</a></li>

                      </ul>
                    </li>

                    <?php if ($nav_menu=='Pengajar' || $nav_menu=='Fasilitas' || $nav_menu=='Kurikulum') {
                      $class = 'active';
                    }else{
                      $class = '';
                    } ?>
                    <li class="dropdown <?php echo $class;?>">
                      <a href="javascript:void(0)">Akademik <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('') ?>">Kurikulum</a></li>
                        <li><a href="<?php echo base_url('fe/pengajar/PengajarCTRL');?>">Pengajar</a></li>
                        <li><a href="<?php echo base_url();?>">Fasilitas</a></li>
                        <li><a href="<?php echo base_url();?>">Perizinan</a></li>

                      </ul>
                    </li>

                    <!-- <?php if ($nav_menu=='Pengajar' || $nav_menu=='Fasilitas' || $nav_menu=='Kurikulum') {
                      $class = 'active';
                    }else{
                      $class = '';
                    } ?>
                    <li class="dropdown <?php echo $class;?>">
                      <a href="#">Bantuan <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('FE/about/Kurikulum') ?>">Kontak</a></li>
                        <li><a href="components.html">Pengajar</a></li>
                        <li><a href="icons.html">Fasilitas</a></li>
                        <li><a href="icon-variations.html">Perizinan</a></li>

                      </ul>
                    </li> -->

                    <?php if ($nav_menu=='InfoBerita') {
                      $class = 'active';
                    }else{
                      $class = '';
                    } ?>
                    <li class="<?php echo $class;?>">
                      <a href="<?php echo base_url('fe/infoberita/InfoBeritaController');?>">Info & Berita </a>
                    </li>

                    <?php if ($nav_menu=='Pendaftaran') {
                      $class = 'active';
                    }else{
                      $class = '';
                    } ?>
                    <li class="<?php echo $class;?>">
                      <a href="<?php echo base_url('fe/pendaftaran/PendaftaranCTRL') ?>">Pendaftaran </a>
                    </li>

                    <?php if ($nav_menu=='Kontak') {
                      $class = 'active';
                    }else{
                      $class = '';
                    } ?>
                    <li class="<?php echo $class;?>">
                      <a href="<?php echo base_url('SakinahCTRL/KontakKami');?>">Kontak </a>
                    </li>

                    <?php if ($nav_menu=='Login') {
                      $class = 'active';
                    }else{
                      $class = '';
                    } ?>
                    <li class="dropdown <?php echo $class;?>">
                    <a href="javascript:void(0)">Login <i class="icon-angle-down"></i></a>
                      <ul class="dropdown-menu">
                    <li>
                      <a href="<?php echo base_url('login/ppdb');?>">Login PPDB</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url('login/santri');?>">Login Santri</a>
                    </li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
              <!-- end navigation -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->
<!-- END MENUBAR -->


    <!-- section intro -->
    <section style="position: relative; width: 100%; height: 80vh;"><?php if(isset($ProfileSK)){
                foreach ($ProfileSK as $sekolah) {
                  ?>

               <?php
                  if (isset($sekolah->background_web)) {
                    echo '<img src="'.base_url('assets/be/image/yayasan/'.$sekolah->background_web.'').'" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%; max-width:99%; max-height:524px;" alt="Foto Kosong">';
                  } else {
                    echo '<img src="'.base_url('assets/be/image/yayasan/employee_default.jpg').'" alt="Foto Default">';
                  }
                ?>

      <?php } }else{
            echo "Data Kosong";
          }?>
      <div class="intro-content">
        <h2>Selamat Datang di Website Kami</h2>
        <h3>Rumah Tahfidz Munjul - Cipayung - Jakarta Timur</h3>
        <div>
          <a href="<?php echo base_url('fe/pendaftaran/PendaftaranCTRL')?>" class="btn-get-started">Daftarkan Anak Anda Disini !</a>
        </div>
      </div>
    </section>
    <!-- /section intro -->
