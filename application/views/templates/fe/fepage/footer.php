
    <footer>
      <div class="container">
        <div class="row">

          <?php if(isset($ProfileSK)){
                foreach ($ProfileSK as $info) { ?>

          <div class="span4">
            <div class="widget">
              <div class="footer_logo">
                <h3><a href="<?php echo base_url(); ?>"><i class="icon-home"></i> Informasi Sekolah</a></h3>
              </div>
              <address>
                <strong>Alamat Rumah Tahfidz Sakinah</strong><br>
                <?php echo $info->alamat_sekolah; ?>
              </address>
              <p>
                <i class="icon-phone"></i> &nbsp;<?php echo $info->telfon_yayasan; ?> <br>
                <i class="icon-envelope-alt"></i> <?php echo $info->email_yayasan; ?>
              </p>
            </div>
          </div>
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading">Halam Terkini</h5>
              <ul class="link-list">
                <li>
                  <a href="#"><i class="icon-folder-open"></i>&nbsp; Kurikulum</a>
                </li>
                <li>
                  <a href="<?php echo base_url('fe/pengajar/PengajarCTRL');?>"><i class="icon-user"></i>&nbsp; Pengajar</a>
                </li>
                <li>
                  <a href="#"><i class="icon-briefcase"></i>&nbsp; Fasilitas</a>
                </li>
                <li>
                  <a href="#"><i class="icon-envelope"></i>&nbsp; Perizinan</a>
                </li>
                <li>
                  <a href="<?php echo base_url('fe/pendaftaran/PendaftaranCTRL') ?>"><i class="icon-info-sign"></i>&nbsp; PPDB</a>
                </li>
                <li>
                  <a href="<?php echo base_url('SakinahCTRL/KontakKami');?>"><i class="icon-phone"></i>&nbsp; Kontak Kami</a>
                </li>
              </ul>

            </div>
          </div>
          <div class="span4">
            <div class="widget">
              <h5 class="widgetheading"><i class="icon-map-marker"></i>&nbsp; Denah Lokasi</h5>
                <p class="bordermap">
                  <iframe src="<?php echo $info->link_maps; ?>" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
              </p>
              <div class="clear"></div>
            </div>
          </div>
        </div>
          <?php } }else{
            echo "Data Masih Kosong";
          }?>
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="span12">
              <div class="copyright">
                <p><span><center>&copy; 02/02/2020</center></span></p>
              </div>

            </div>

            <!-- <div class="span6">
              <div class="credits"> -->
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Remember
                -->
                <!-- PgRm by : <a href="#"></a> -->
              <!-- </div>
            </div> -->
          </div>
        </div>
      </div>
    </footer>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-rounded icon-bglight icon-2x"></i></a>

  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url('assets/fe/js/jquery.js');?>"></script>
  <script src="<?php echo base_url('assets/fe/js/jquery.easing.1.3.js');?>"></script>
  <script src="<?php echo base_url('assets/fe/js/bootstrap.js');?>"></script>
  <script src="<?php echo base_url('assets/fe/js/modernizr.custom.js');?>"></script>
  <script src="<?php echo base_url('assets/fe/js/toucheffects.js');?>"></script>
  <script src="<?php echo base_url('assets/fe/js/google-code-prettify/prettify.js');?>"></script>
  <script src="<?php echo base_url('assets/fe/js/jquery.prettyPhoto.js');?>"></script>
  <script src="<?php echo base_url('assets/fe/js/portfolio/jquery.quicksand.js');?>"></script>
  <script src="<?php echo base_url('assets/fe/js/portfolio/setting.js');?>"></script>
  <script src="<?php echo base_url('assets/fe/js/animate.js');?>"></script>
  <!-- datepicker -->
<script src="<?php echo base_url('assets/be/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>

  <script src="<?php echo base_url('assets/fe/contactform/contactform.js');?>"></script>

  <!-- Template Custom JavaScript File -->
  <script src="<?php echo base_url('assets/fe/js/custom.js');?>"></script>

</body>

</html>
















































































































































































  <!-- =======================================================
    Theme Name : Remember
    Created by : Qomaindo-dev
    Created at : Bogor, 02-02-2020
  ======================================================= -->