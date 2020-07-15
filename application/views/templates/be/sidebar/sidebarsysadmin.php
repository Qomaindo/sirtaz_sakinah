<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/be/image/employee/default_employee.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Daud Nuryasin</p>
          <!-- JIKA USER STATUS LOGIN = 1 MAKA : Online -->
          <i class="fa fa-circle text-success"></i> Online
          <br>
          <!-- JIKA USER STATUS LOGIN = 0 MAKA : Offline -->
          <a href="#" hidden=""><i class="fa fa-circle text-danger"></i> Offline</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <li class="active">
          <a href="<?php echo base_url();?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-bank"></i> <span>Profile Sekolah</span>
           </a>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-newspaper-o"></i> <span>Informasi Berita</span>
           </a>
        </li>
        <li>
          <a href="pages/widgets.html">
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
              <a href="pages/layout/top-nav.html"><i class="fa fa-unlock"></i> Data Manajemen</a>
            </li>
            <li>
              <a href="pages/layout/boxed.html"><i class="fa fa-users"></i> Data Pengajar</a>
            </li>
            <li>
              <a href="pages/layout/fixed.html"><i class="fa fa-university"></i> Data Kelas</a>
            </li>
            <li>
              <a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-folder-open"></i> RPH / Kurikulum</a>
            </li>
            <li>
              <a href="pages/layout/top-nav.html"><i class="fa fa-users"></i> Data Santri</a>
            </li>
            <li>
              <a href="pages/layout/top-nav.html"><i class="fa fa-user"></i> Data Role</a>
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
        <small>Welcome Admin</small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-bars"></i> Home</li>
        <li class="active"><?php echo $nav_menu; ?></li>
      </ol>
    </section>
