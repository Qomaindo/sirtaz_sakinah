
    <section id="content">
      <div class="container">
        <div class="row">
        <!-- end divider -->

        <div class="row team">
          <div class="span12">
            <h4>Data Seluruh Pengajar</h4>
          </div>

          <?php if(isset($DataPengajar)){
                foreach ($DataPengajar as $pengajar) { ?>
          <div class="span3">
            <div class="team-box">
              <a href="javascript:void(0)" class="thumbnail">
                <!-- <img src="img/dummies/team1.jpg" alt="" /> -->

                                 <?php
                                      if (isset($pengajar->foto_guru)) {
                                      echo '<img class="img-responsive col-md-12" src=" ' . base_url('assets/be/image/employee/' . $pengajar->foto_guru . ''). '">';

                                  }else{
                                    echo '<img src="' . base_url('assets/be/image/employee/default_employee.png') . '" class="" alt="User Image">';
                                  }
                                  ?>
              </a>
              <div class="roles aligncenter">
                <p class="lead"><strong><?php echo $pengajar->nama_guru; ?></strong></p>
                <p>
                  <?php echo $pengajar->email_guru; ?>
                </p>
              </div>
            </div>
          </div>

          <?php } }else{
            echo "Kelas Kosong";
          }?>

        </div>

      </div>
    </section>
