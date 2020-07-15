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
            <!-- Manage Absen Berita Acara Kehadiran Santri -->
            <i class="fa fa-line-chart"></i> <span>Laporan Perkembangan</span>
           </a>
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
        Halaman
        <small>
         <i class="fa fa-angle-double-right"></i> 
        <?php echo $judul ;?>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-bars"></i> Home</li>
        <li class="active"><?php echo $nav_menu; ?></li>
      </ol>
    </section>
