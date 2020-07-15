
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <h4>Formulir Pendaftaran Santri Baru</h4>



            <form id="contactform" action="<?php echo base_url('fe/pendaftaran/PendaftaranCTRL/DaftarSantriBaru') ?>" method="post" role="form" class="contactForm">

              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>

              <div class="row">
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="nodaftar" placeholder="Nomor Pendaftaran" value="<?php echo $NoDaftar ?>" readonly="" />
                  <div class="validation"></div>
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="nisn" placeholder="*NISN"  data-rule="minlen:10" data-msg="Harap mengisi NISN dengan sesuai data" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="nama" placeholder="* Nama Lengkap" data-rule="minlen:3" data-msg="Isikan nama dengan benar" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="tempat" placeholder="* Tempat Lahir" data-rule="minlen:3" data-msg="Isikan Tempat Lahir dengan benar" />
                  <div class="validation"></div>
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" data-rule="minlen:10" data-msg="Mohon untuk mengisi tanggal lahir" readonly="" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" id="usia" name="usia" placeholder="Usi" readonly="" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <select id="jkel" name="jkel">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                  </select>
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="nik_ayah" placeholder="* NIK Ayah" data-rule="minlen:3" data-msg="Isikan NIK sesuai KTP" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="nama_ayah" placeholder="* Nama Ayah" data-rule="minlen:3" data-msg="Isikan Nama sesuai KTP" />
                  <div class="validation"></div>
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" data-rule="minlen:3" data-msg="Isikan data dengan benar" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="nik_ibu" placeholder="* NIK Ibu" data-rule="minlen:3" data-msg="Isikan NIK sesuai KTP" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="nama_ibu" placeholder="* Nama Ibu" data-rule="minlen:3" data-msg="Isikan Nama sesuai KTP" />
                  <div class="validation"></div>
                </div>
                <div class="span8 margintop10 field form-group">
                  <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" data-rule="minlen:3" data-msg="Isikan data dengan benar" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="nama_wali" placeholder="* Nama Wali" data-rule="minlen:3" data-msg="Isikan Nama sesuai KTP" />
                  <div class="validation"></div>
                </div>
                <div class="span4 field form-group">
                  <input type="text" name="no_hp" placeholder="* Nomor HP" data-rule="minlen:3" data-msg="Isikan Nomor HP dengan benar" />
                  <div class="validation"></div>
                </div>
                <div class="span8 margintop10 field form-group">
                  <br>
                    <button class="btn btn-inverse margintop10" type="submit"><i class="icon-ok icon-white"></i> Daftar</button>
                    <button class="btn btn-warning margintop10" type="Reset"><i class="icon-undo icon-white"></i> Reset Formulir</button>

                  <!-- </p> -->
                </div>
              </div>
            </form>
          </div>
          <div class="span4">
            <div class="clearfix"></div>
            <aside class="right-sidebar">

              <div class="widget">
                <h5 class="widgetheading">
                  <font color="blue">
                  <i style="color: blue;" class="icon-info-sign"></i>
                 Informasi
                 <span></span>
                 </font>
               </h5>

                <ul class="contact-info">
                  <li><label>Peraturan Mendaftar :</label> Isikan data dengan benar, jangan sampai ada yang terlewatkan atau ada data yang salah.</li>
                  <li><label>Usename :</label>Nomor Pendaftaran</li>
                  <li><label>Password : </label><i>Tanggal Lahir Peserta</i></li>
                </ul>

              </div>
            </aside>
          </div>
        </div>
      </div>
    </section>

  <script src="<?php echo base_url('assets/fe/js/jquery.js');?>"></script>
<script>
  
window.onload=function(){
    $('#tgl_lahir').on('change', function() {
        var dob = new Date(this.value);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#usia').val(age);
    });
}


$(document).ready(function() {

        $('#tgl_lahir').datepicker({
            autoclose: true,
            // format: "dd-mm-yyyy",
            format: "yyyy-mm-dd",
            todayHighlight: true,
            //orientation: "top auto",
            //todayBtn: true,
            todayHighlight: true,
        });
})

</script>