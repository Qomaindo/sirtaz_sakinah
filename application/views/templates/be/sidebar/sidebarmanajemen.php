<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->

		<?php
		if (isset($pengajar)) {
			foreach ($pengajar as $gru) { ?>

				<div class="user-panel">
					<div class="pull-left image">
						<?php
						if (isset($gru->foto_guru)) {
							echo '<img src="' . base_url('assets/be/image/employee/' . $gru->foto_guru . '') . '" class="" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 100%; max-width:60px;" alt="User Image">';
						} else if ($gru->foto_guru == '') {
							echo '<img src="' . base_url('assets/be/image/employee/default_employee.png') . '" class="img-circle" alt="User Image">';
						} else {
							echo '<img src="' . base_url('assets/be/image/employee/default_employee.png') . '" class="img-circle" alt="User Image">';
						}
						?>
					</div>
					<div class="pull-left info">
						<p>
							<?php
							$potong = 10;
							$namaguru = $gru->nama_guru;
							$jmlkt = strlen($namaguru);
							$jmlkal = str_word_count($namaguru);

							if ($jmlkt <= 3) {
								echo substr($namaguru, 0, 3);
							} else {
								// if ($namaguru{$potong - 1} != ' ') {
								//   $pntg = strpos($namaguru,' ', $potong);
								// }
								echo substr($namaguru, 0, $jmlkt);
							}

							?>

						</p>
						<!-- JIKA USER STATUS LOGIN = 1 MAKA : Online -->
						<i class="fa fa-circle text-success"></i> Online
						<br>
						<!-- JIKA USER STATUS LOGIN = 0 MAKA : Offline -->
						<a href="#" hidden=""><i class="fa fa-circle text-danger"></i> Offline</a>
					</div>
				</div>
			<?php
		}
	}
	?>
		<!-- search form -->
		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<center>
					<font color="white" size="5%" face="algerian"> &nbsp; &nbsp; &nbsp;
						<i id="jamJalan"></i>
					</font>
				</center>
			</div>
		</form>
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li class="header">NAVIGATION</li>
			<li class="active">
				<a href="<?php echo base_url('be/beranda/BerandaController') ?>">
					<i class="fa fa-home"></i> <span>Beranda</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('be/profile/ProfileSekolahCTRL') ?>">
					<i class="fa fa-bank"></i> <span>Profile Sekolah</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('be/infoberita/InfoBeritaCTRL') ?>">
					<i class="fa fa-newspaper-o"></i> <span>Informasi Berita</span>
				</a>
			</li>
			<li>
				<a href="<?php echo base_url('be/pendaftaran/PendaftaranOnlieCTRL') ?>">
					<i class="fa fa-user-plus"></i> <span>Pendaftaran Online</span>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-database"></i>
					<span>Manajement Data</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li>
						<a href="<?php echo base_url('be/profile/ProfileUserCTRL') ?>"><i class="fa fa-unlock"></i> Data Manajemen</a>
					</li>
					<li>
						<a href="<?php echo base_url('be/guru/GuruCTRL') ?>"><i class="fa fa-users"></i> Data Pengajar</a>
					</li>
					<li>
						<a href="<?php echo base_url('be/kelas/KelasCTRL') ?>"><i class="fa fa-university"></i> Data Kelas</a>
					</li>
					<li>
						<a href="<?php echo base_url('be/mapel/MapelCTRL') ?>"><i class="fa fa-book"></i> Data Mata Pelajaran</a>
					</li>
					<li>
						<a href="<?php echo base_url('be/jadwal/JadwalCTRL') ?>"><i class="fa fa-calendar"></i> Jadwal Pengajar</a>
					</li>
					<li>
						<a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-folder-open"></i> RPH / Kurikulum</a>
					</li>
					<li>
						<a href="<?php echo base_url('be/santri/SantriCTRL') ?>"><i class="fa fa-user-plus"></i> Data Santri</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-file-excel-o"></i> <span>Laporan</span>
					<span class="pull-right-container">
						<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-user-plus"></i> Santri Baru</a></li>
					<li class="treeview">
						<a href="#"><i class="fa fa-folder-open-o"></i> Data Santri
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="#"><i class="fa fa-users"></i> Keseluruhan Santri</a></li>
							<li><a href="#"><i class="fa fa-file-word-o"></i> Biodata Santri</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#"><i class="fa fa-line-chart"></i> Perkembangan Santri
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="#"><i class="fa fa-book"></i> Hasil Belajar</a></li>
							<li><a href="#"><i class="fa fa-file-image-o"></i> Hafalan Juz</a></li>
						</ul>
					</li>
				</ul>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small><?php echo $judul; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li><i class="fa fa-bars"></i> Home</li>
			<li class="active"><?php echo $nav_menu; ?></li>
		</ol>
	</section>

	<script type="text/javascript">
		<!--
		function showTime() {
			var wib = "WIB";
			var today = new Date();
			var curr_hour = today.getHours();
			var curr_minute = today.getMinutes();
			var curr_second = today.getSeconds();
			// if (curr_hour < 12) {
			//     a_p = "AM";
			// } else {
			//     a_p = "PM";
			// }
			// if (curr_hour == 0) {
			//     curr_hour = 12;
			// }
			// if (curr_hour > 12) {
			//     curr_hour = curr_hour - 12;
			// }
			curr_hour = checkTime(curr_hour);
			curr_minute = checkTime(curr_minute);
			curr_second = checkTime(curr_second);
			document.getElementById('jamJalan').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + wib;
		}

		function checkTime(i) {
			if (i < 10) {
				i = "0" + i;
			}
			return i;
		}
		setInterval(showTime, 500);
		//-->
	</script>
