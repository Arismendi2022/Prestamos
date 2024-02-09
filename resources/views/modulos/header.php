<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?= ROOT ?>/admin/dist/img/favicon.png">
	<title><?= $data['page_tag'] ?></title>
	
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/fontawesome-free/css/all.min.css">
	<!-- daterange picker -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/daterangepicker/daterangepicker.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Bootstrap Toggle CSS -->
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
	<!-- CSS PARA DATATABLES -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<!-- SweetAlert2 CSS -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/sweetalert2/sweetalert2.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/dist/css/adminlte.min.css">
	<!-- style -->
	<link rel="stylesheet" href="<?= media(); ?>/assets/css/style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-primary navbar-dark">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
		</ul>
		
		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- User Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
					<i class="fa fa-user fa-lg mr-2"></i>
				</a>
				<ul class="dropdown-menu settings-menu dropdown-menu-right">
					<li><a class="dropdown-item" href="#"><i class="fa fa-cog mr-2"></i>Ajustes</a></li>
					<li><a class="dropdown-item" href="<?= ROOT ?>/usuarios/perfil/"><i class="fa fa-user mr-2"></i>Perfil</a></li>
					<li><a class="dropdown-item" href="<?= ROOT ?>/empresa/"><i class="fa-solid fa-building mr-2"></i>Empresa</a></li>
					<li><a class="dropdown-item" href="<?= ROOT ?>/logout/"><i class="fa fa-sign-out mr-2"></i>Cerrar Sesión</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->
<?php require_once("sidebar.php"); ?>