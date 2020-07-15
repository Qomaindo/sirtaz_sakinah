<section id="content">
      <div class="container">

    <?php if(isset($ProfileSK)){
          foreach ($ProfileSK as $info) { ?>

        <div class="row">
          <div class="span6">
            <article class="noborder">
              <div class="top-wrapper">
                <div class="post-heading">
                  <h4><a href="javascript:void(0)">Visi</a></h4>
                </div>
              </div>
              <p>
                <?php echo $info->visi_sekolah; ?>
              </p>

            </article>

          </div>

          <div class="span6">
            <aside class="right-sidebar">
              <div class="widget">
                <h5 class="widgetheading">Misi</h5>
                <p>
                  <?php echo $info->misi_sekolah; ?>
                </p>

              </div>
            </aside>
          </div>

        </div>
  <?php } }else{
    echo "Data Masih Kosong";
  }?>
      </div>
    </section>

