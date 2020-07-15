
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <h4>Formulir Pesan</h4>



            <form id="contactform" action="<?php echo base_url('SakinahCTRL/SendKontakKami') ?>" method="post" role="form" class="contactForm">

              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>

              <div class="row">
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="judul" placeholder="Judul Pesan" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="nama" placeholder="* Nama Anda" data-rule="minlen:3" data-msg="isikan nama dengan benar" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="email" placeholder="* Email" data-rule="email" data-msg="Isi Email dengan valid dan benar" />
                  <div class="validation"></div>
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="nohp" placeholder="Nomor Handphone" data-rule="minlen:11" data-msg="Isikan Nomor Handphone dengan benar" />
                  <div class="validation"></div>
                </div>
                <div class="span8 margintop10 field form-group">
                  <textarea rows="12" name="pesan" class="input-block-level" placeholder="* Tulis pesan Anda disini..." data-rule="required" data-msg="Ketikan pesan anda"></textarea>
                  <div class="validation"></div>

                  <p>
                    <button class="btn btn-success margintop10" type="submit"><i class="icon-ok icon-white"></i> Kirim</button>

                    <button class="btn btn-warning margintop10" type="Reset"><i class="icon-undo icon-white"></i> Reset Formulir</button>
                  </p>
                </div>
              </div>
            </form>
          </div>
          <div class="span4">
            <div class="clearfix"></div>
            <aside class="right-sidebar">

              <div class="widget">
                <h5 class="widgetheading">Informasi Kontak<span></span></h5>

                <ul class="contact-info">

          <?php if(isset($ProfileSK)){
                foreach ($ProfileSK as $info) { ?>
                  <li><label>Alamat :</label> <?php echo $info->alamat_sekolah; ?></li>
                  <li><label>Telfon :</label><?php echo $info->telfon_yayasan; ?></li>
                  <li><label>Email : </label> <?php echo $info->email_yayasan; ?></li>

          <?php } }else{
            echo "Data Kosong";
          }?>
                </ul>

              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>
