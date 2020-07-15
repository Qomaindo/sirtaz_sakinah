<div class="wrapper">  
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">RT<b>S</b></span>
      <!-- logo for regular state and mobile devices -->
     <font style="font-size: 90%"><span class="logo-lg">Rumah Tahfidz Sakinah</span></font>
    </a>
     <?php
          if (isset($pengajar)) {
            foreach ($pengajar as $gru) { 
							$potong = 10;
							$namaguru = $gru->nama_guru;
							$jmlkt = strlen($namaguru);
							$jmlkal = str_word_count($namaguru);
            
              ?>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <?php
                  if (isset($gru->foto_guru)) {
                  echo '<img src="' . base_url('assets/be/image/employee/' . $gru->foto_guru . '') . '" class="user-image" alt="User Image">';
                }else{
                  echo '<img src="' . base_url('assets/be/image/employee/default_employee.png') . '" class="user-image" alt="User Image">';
              }
              ?>
              <span class="hidden-xs">
                <?php
                  if ($jmlkt <= 3) {
                    echo substr($namaguru, 0, 3);
                  } else {
                    // if ($namaguru{$potong - 1} != ' ') {
                    //   $pntg = strpos($namaguru,' ', $potong);
                    // }
                    echo substr($namaguru, 0, $jmlkt);
                  }
                 ?>
             </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                 <?php
                  if (isset($gru->foto_guru)) {
                    echo '<img src="' . base_url('assets/be/image/employee/' . $gru->foto_guru . '') . '" class="" style="width: 100%; padding: 1px; border: 3px solid #d2d6de; height: 85%;" alt="User Image">';
                  }else{
                    echo '<img src="' . base_url('assets/be/image/employee/default_employee.png') . '" class="img-circle" alt="User Image">';
                  }
                ?>
                <p><font face="algerian"> 
                 </font></p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center">
                   <center> 
                    <a href="#">
                      <b>
                        <table border="1" width="100%">
                          <th width="50%">
                            <center>
                            <?php
                              if ($jmlkt <= 3) {
                                echo substr($namaguru, 0, 3);
                              } else {
                                // if ($namaguru{$potong - 1} != ' ') {
                                //   $pntg = strpos($namaguru,' ', $potong);
                                // }
                                echo substr($namaguru, 0, $jmlkt);
                              }
                             ?></center>
                          </th>
                          <th width="50%">
                            <center>
                            <?php echo $gru->role_name; ?>  
                            </center>
                          </th>
                        </table>
                       </b>
                   </a></center>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <a href="<?php echo base_url('be/profile/ProfileUserCTRL') ?>" class="btn btn-default btn-flat" style="background-color: #367fa9;">
                <font color="white">
                  Profile &nbsp; <i class="fa fa-user-o"></i>
                </font>
                </a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('SirtazSakinahController/LogOut') ?>" class="btn btn-default btn-flat" style="background-color: #dd4b39;">
                  <font color="white">
                    Keluar &nbsp; <i class="fa fa-power-off"></i>
                </font>
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
    <?php
            }
          } ?>
  </header>