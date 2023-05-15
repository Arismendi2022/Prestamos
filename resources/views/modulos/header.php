<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?= media(); ?>dist/img/favicon.png">
	<title><?= $data['page_tag'] ?></title>
	
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="<?= media(); ?>plugins/fontawesome-free/css/all.min.css">
	<!-- SweetAlert2 CSS -->
	<link rel="stylesheet" href="<?= media(); ?>plugins/sweetalert2/sweetalert2.min.css">
	<!-- CSS PARA DATATABLES -->
	<link rel="stylesheet" href="<?= media(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= media(); ?>dist/css/adminlte.min.css">
	<!-- style -->
<!--	<link rel="stylesheet" href="--><?php //= data(); ?><!--css/style.css">-->

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
					<li><a class="dropdown-item" href="#"><i class="fa fa-cog mr-2"></i>Opciones</a></li>
					<li><a class="dropdown-item" href="<?= media(); ?>perfil/"><i class="fa fa-user mr-2"></i>Perfil</a></li>
					<li><a class="dropdown-item" href="<?= media(); ?>Logout/"><i class="fa fa-sign-out mr-2"></i>Cerrar Sesión</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->
	<?php require_once("sidebar.php"); ?>
