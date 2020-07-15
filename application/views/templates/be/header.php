<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $judul; ?></title>

	<?php foreach ($ProfileSK as $dtyayasan) { ?>

		<?php
		if (isset($dtyayasan->logo_sekolah)) {
			echo '<link href="' . base_url('assets/be/image/yayasan/' . $dtyayasan->logo_sekolah . '') . '" alt="Foto Kosong" rel="SHORTCUT ICON" />';
		} else {
			echo '<img src="' . base_url('assets/be/image/yayasan/employee_default.jpg') . '" alt="Foto Default">';
		}
		?>
	<?php } ?>

	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/Ionicons/css/ionicons.min.css'); ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/dist/css/AdminLTE.min.css'); ?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/dist/css/skins/_all-skins.min.css'); ?>">
	<!-- Morris chart -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/morris.js/morris.css'); ?>">
	<!-- jvectormap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/jvectormap/jquery-jvectormap.css'); ?>">
	<!-- Date Picker -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
	<!-- Bootstrap time Picker -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/plugins/timepicker/bootstrap-timepicker.min.css'); ?>">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">

	<!-- fullCalendar -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/fullcalendar/dist/fullcalendar.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/fullcalendar/dist/fullcalendar.print.min.css'); ?>" media="print">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>" />
	<!-- Toastr -->
	<link rel="stylesheet" href="<?php echo base_url('assets/be/plugins/toastr/toastr.min.css'); ?>" />
	<!-- Date Picker -->
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="fixed hold-transition skin-blue sidebar-mini">
