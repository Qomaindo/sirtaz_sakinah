<section class="content">

	<div class="row">
		<div class="col-md-3">
			<?php foreach ($ProfileSK as $dtyayasan) { ?>
				<!-- Profile Image -->
				<div class="box box-primary">
					<div class="box-body box-profile">
						<li class="list-group-item">
							<center>
								<font size="5%" face="algerian"><i class="fa fa-camera"></i> LOGO</font>
							</center>
						</li>
						<font face="algerian">
							<ul class="nav nav-tabs">
								<li class="active" style="width: 50%; text-align: center;"><a href="#tabyayasan" data-toggle="tab">YAYASAN</a></li>
								<li style="width: 50%; text-align: center;"><a href="#Sekolah" data-toggle="tab">SEKOLAH</a></li>
							</ul>
						</font>
						<div class="tab-content">
							<div class="active tab-pane" id="tabyayasan">
								<br>
								<?php
								if (isset($dtyayasan->logo_yayasan)) {
									echo '<img width="100%" height="100%" src="' . base_url('assets/be/image/yayasan/' . $dtyayasan->logo_yayasan . '') . '" alt="Foto Kosong">';
								} else {
									echo '<img src="' . base_url('assets/be/image/yayasan/employee_default.jpg') . '" alt="Foto Default">';
								}
								?>
							</div>
							<div class="tab-pane" id="Sekolah">
								<br>
								<?php
								if (isset($dtyayasan->logo_sekolah)) {
									echo '<img width="100%" height="100%" src="' . base_url('assets/be/image/yayasan/' . $dtyayasan->logo_sekolah . '') . '" alt="Foto Kosong">';
								} else {
									echo '<img src="' . base_url('assets/be/image/yayasan/employee_default.jpg') . '" alt="Foto Default">';
								}
								?>
							</div>
						</div>
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<h3 class="profile-username text-center"><?php echo $dtyayasan->nama_yayasan; ?></h3>
							</li>
							<li class="list-group-item">
								<b><i class="fa fa-envelope-o"></i> SK</b> <a class="pull-right"><?php echo $dtyayasan->no_sk; ?></a>
							</li>
							<li class="list-group-item">
								<b><i class="fa fa-calendar"></i> Tahun SK</b> <a class="pull-right"><?php echo $dtyayasan->tahun_sk; ?></a>
							</li>
							<li class="list-group-item">
								<b><i class="fa fa-phone"></i> No Telfon</b> <a class="pull-right"><?php echo $dtyayasan->telfon_yayasan; ?></a>
							</li>
						</ul>


					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

				<!-- /.box -->
			</div>
			<!-- /.col -->
			<div class="col-md-9">
				<div class="nav-tabs-custom">
					<font face="algerian">
						<ul class="nav nav-tabs">
							<li style="width: 30%; text-align: center;" class="active">
								<a href="#yayasan" data-toggle="tab"><i class="fa fa-caret-right"></i>&nbsp; YAYASAN</a>
							</li>
							<li style="width: 25%; text-align: center;">
								<a href="#sekolah" data-toggle="tab"><i class="fa fa-caret-right"></i>&nbsp; Sekolah</a>
							</li>
							<!-- <li style="width: 23%; text-align: center;">
                										<a href="#tpq" data-toggle="tab"><i class="fa fa-caret-right"></i>&nbsp; TPQ</a>
              										</li>
              										<li style="width: 22%; text-align: center;">
                										<a href="#tahfidz" data-toggle="tab"><i class="fa fa-caret-right"></i>&nbsp; Tahfidz</a> -->
							</li>
						</ul>
					</font>
					<div class="tab-content">
						<!-- DATA YAYASAN -->
						<div class="active tab-pane" id="yayasan">
							<!-- <form class="form-horizontal" action="<?php echo base_url('be/profile/ProfileSekolahCTRL/UbahDataYayasan') ?>" method="post"> -->
							<?php
							$attribut = array(
								'class' => 'form-horizontal',
								'id'  => 'form_profile',
								'method' => 'post'
							);
							echo form_open_multipart('be/profile/ProfileSekolahCTRL/UbahDataYayasan', $attribut); ?>
							<div class="form-group">
								<label for="inputName" class="col-sm-3 control-label">No SK KEMENKUMHAM</label>

								<div class="col-sm-9">
									<input type="hidden" class="form-control" id="yayasan_id" name="yayasan_id" readonly value="<?php echo $dtyayasan->yayasan_id; ?>">
									<input type="text" class="form-control" id="nosk" name="nosk" disabled="" value="<?php echo $dtyayasan->no_sk; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputName" class="col-sm-3 control-label">Tahun SK</label>

								<div class="col-sm-9">
									<input type="text" class="form-control" id="thnsk" name="thnsk" disabled="" value="<?php echo $dtyayasan->tahun_sk; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputSkills" class="col-sm-3 control-label">Akta Notaris No</label>

								<div class="col-sm-9">
									<input type="text" class="form-control" id="aktanotaris" name="aktanotaris" disabled="" value="<?php echo $dtyayasan->akta_notaris; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputName" class="col-sm-3 control-label">Nama Yayasan</label>

								<div class="col-sm-9">
									<input type="text" class="form-control" id="yayasanname" name="yayasanname" disabled="" value="<?php echo $dtyayasan->nama_yayasan; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputName" class="col-sm-3 control-label">Nomor Telfon</label>

								<div class="col-sm-9">
									<input type="text" class="form-control" id="notelfonyayasan" name="notelfonyayasan" disabled="" value="<?php echo $dtyayasan->telfon_yayasan; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail" class="col-sm-3 control-label">Email</label>

								<div class="col-sm-9">
									<input type="email" class="form-control" id="emailyayasan" name="emailyayasan" disabled="" value="<?php echo $dtyayasan->email_yayasan; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="inputExperience" class="col-sm-3 control-label">Alamat</label>

								<div class="col-sm-9">
									<textarea class="form-control" id="alamatyayasan" name="alamatyayasan" disabled=""><?php echo $dtyayasan->alamat_yayasan; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="inputSkills" class="col-sm-3 control-label">Logo Yayasan</label>

								<div class="col-sm-9">
									<input type="file" class="form-control" id="logoyayasan" name="logoyayasan" placeholder="Skills" disabled="">
								</div>
							</div>
							<div class="form-group">
								<label for="inputSkills" class="col-sm-3 control-label">Background Website</label>

								<div class="col-sm-9">
									<input type="file" class="form-control" id="bgweb" name="bgweb" placeholder="Skills" disabled="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<button type="submit" class="btn btn-success" id="saveyayasan" disabled="">&nbsp;<i class="fa fa-check"></i> Simpan</button>
									<!-- <input type="submit" name="submit" value="upload"> -->
									&nbsp;
									<a href="javascript:void(0)" class="btn btn-primary" onclick="ubahDataYayasan();"><b>Ubah Data</b> &nbsp; <i class="fa fa-pencil"></i></a>
								</div>
							</div>
							<!-- </form> -->
							<?php echo form_close(); ?>
						</div>
					<?php } ?>
					<!-- END DATA YAYASAN -->
					<!-- /.tab-sekolah -->
					<div class="tab-pane" id="sekolah">
						<?php if ($ProfileSK == 0) { ?>
							<center>
								<h2>DATA KOSONG</h2>
							</center>
						<?php } else if (isset($ProfileSK)) {
						foreach ($ProfileSK as $pd) { ?>
								<!-- DATA sekolah -->
								<?php
								$attribut = array(
									'class' => 'form-horizontal',
									'id'  => 'form_profile',
									'method' => 'post'
								);
								echo form_open_multipart('be/profile/ProfileSekolahCTRL/ubahDatasekolah', $attribut); ?>
								<div class="form-group">
									<input type="hidden" id="idsekolah" name="idsekolah" value="<?php echo $pd->sekolah_id; ?>">
									<label for="inputName" class="col-sm-3 control-label">Nama</label>

									<div class="col-sm-9">
										<input type="hidden" class="form-control" id="sekolah_id" name="sekolah_id" value="<?php echo $pd->sekolah_id; ?>" readonly="">
										<input type="text" class="form-control" id="namesekolah" name="namesekolah" value="<?php echo $pd->nama_sekolah; ?>" disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-3 control-label">Tahun Pendirian</label>

									<div class="col-sm-9">
										<input type="text" class="form-control" id="thnberidiri" name="thnberidiri" value="<?php echo $pd->thn_pendirian; ?>" disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-3 control-label">Tahun Perizinan</label>

									<div class="col-sm-9">
										<input type="text" class="form-control" id="thnperizinan" name="thnperizinan" value="<?php echo $pd->thn_perizinan; ?>" disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-3 control-label">Nama Pendiri</label>

									<div class="col-sm-9">
										<input type="text" class="form-control" id="nm_pendiri" name="nm_pendiri" value="<?php echo $pd->nama_pendiri; ?>" disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-3 control-label">Metode Pembelajaran</label>

									<div class="col-sm-9">
										<input type="text" class="form-control" id="metodebelajar" name="metodebelajar" value="<?php echo $pd->metode_pembelajaran; ?>" disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputExperience" class="col-sm-3 control-label">Waktu Pembelajaran</label>

									<div class="col-sm-9">
										<textarea class="form-control" id="wktpembelajaran" name="wktpembelajaran"><?php echo $pd->waktu_pembelajaran; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-3 control-label">Link Facebook</label>

									<div class="col-sm-9">
										<input type="text" class="form-control" id="fbsekolah" name="fbsekolah" value="<?php echo $pd->link_fb; ?>" disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputSkills" class="col-sm-3 control-label">Link Instagram</label>

									<div class="col-sm-9">
										<input type="text" class="form-control" id="igsekolah" name="igsekolah" value="<?php echo $pd->link_ig; ?>" disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputExperience" class="col-sm-3 control-label">Link Google Maps</label>

									<div class="col-sm-9">
										<textarea class="form-control" id="mapsyayasan" name="mapsyayasan" disabled=""><?php echo $pd->link_maps; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="inputExperience" class="col-sm-3 control-label">Alamat</label>

									<div class="col-sm-9">
										<textarea class="form-control" id="alamatsekolah" name="alamatsekolah" disabled=""><?php echo $pd->alamat_sekolah; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="inputSkills" class="col-sm-3 control-label">Logo Sekolah</label>

									<div class="col-sm-9">
										<input type="file" class="form-control" id="fotosekolah" name="fotosekolah" placeholder="Skills" disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputSkills" class="col-sm-3 control-label">Struktur Organisasi Sekolah</label>

									<div class="col-sm-9">
										<input type="file" class="form-control" id="strukturorganisasi" name="strukturorganisasi" placeholder="Skills" disabled="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-3 control-label">Visi</label>

									<div class="col-sm-9">

										<textarea id="visisekolah" name="visisekolah"><?php echo $pd->visi_sekolah; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-3 control-label">Misi</label>

									<div class="col-sm-9">

										<textarea class="form-control" id="misisekolah" name="misisekolah"><?php echo $pd->misi_sekolah; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="inputName" class="col-sm-3 control-label">Sejarah</label>

									<div class="col-sm-9">

										<textarea class="form-control" id="sejarahsekolah" name="sejarahsekolah"><?php echo $pd->sejarah_sekolah; ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-9">
										<button type="submit" class="btn btn-success" id="savesekolah" disabled="">&nbsp;<i class="fa fa-check"></i> Simpan</button>
										&nbsp;
										<a href="javascript:void(0)" class="btn btn-primary" onclick="ubahDatasekolah();"><b>Ubah Data</b> &nbsp; <i class="fa fa-pencil"></i></a>
									</div>
								</div>
								<?php echo form_close(); ?>
							<?php
						}
					} ?>

					</div>
					<!-- /.tab-sekolah -->

					<!-- /.tab-SD -->
				</div>
				<!-- /.tab-content -->
			</div>
			<!-- /.nav-tabs-custom -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

</section>


<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/be/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>


<script src="<?php echo base_url('assets/be/bower_components/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo base_url('assets/be/bower_components/ckeditor/config.js'); ?>"></script>
<script>
	$(function() {
		CKEDITOR.replace("visisekolah")
		$('.textarea').wysihtml5()
	})

	$(function() {
		CKEDITOR.replace('misisekolah')
		$('.textarea').wysihtml5()
	})

	$(function() {
		CKEDITOR.replace('sejarahsekolah')
		$('.textarea').wysihtml5()
	})

	$(function() {
		CKEDITOR.replace('wktpembelajaran')
		$('.textarea').wysihtml5()
	})

	function ubahDataYayasan() {
		// YAYASAN
		document.getElementById("nosk").disabled = false;
		document.getElementById("thnsk").disabled = false;
		document.getElementById("aktanotaris").disabled = false;
		document.getElementById("yayasanname").disabled = false;
		document.getElementById("notelfonyayasan").disabled = false;
		document.getElementById("emailyayasan").disabled = false;
		document.getElementById("alamatyayasan").disabled = false;
		document.getElementById("logoyayasan").disabled = false;
		document.getElementById("bgweb").disabled = false;
		document.getElementById("saveyayasan").disabled = false;
	}

	function ubahDatasekolah() {
		// sekolah
		document.getElementById("namesekolah").disabled = false;
		document.getElementById("thnberidiri").disabled = false;
		document.getElementById("thnperizinan").disabled = false;
		document.getElementById("nm_pendiri").disabled = false;
		document.getElementById("metodebelajar").disabled = false;
		document.getElementById("wktpembelajaran").disabled = false;
		document.getElementById("visisekolah").disabled = false;
		document.getElementById("misisekolah").disabled = false;
		document.getElementById("sejarahsekolah").disabled = false;
		document.getElementById("fbsekolah").disabled = false;
		document.getElementById("mapsyayasan").disabled = false;
		document.getElementById("igsekolah").disabled = false;
		document.getElementById("alamatsekolah").disabled = false;
		document.getElementById("savesekolah").disabled = false;
		document.getElementById("fotosekolah").disabled = false;
		document.getElementById("strukturorganisasi").disabled = false;
	}
</script>
