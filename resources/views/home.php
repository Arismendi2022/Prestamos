<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $data['page_tag'] ?></title>
	
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= media(); ?>admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
	<?php
		@include("modulos/header.php");
		@include("modulos/sidebar.php");
		@include("dashboard/dashboard.php");
	?>
	
	
	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
		<div class="p-3">
			<h5>Title</h5>
			<p>Sidebar content</p>
		</div>
	</aside>
	<!-- /.control-sidebar -->
	
	<?php
		@include("modulos/footer.php");
	?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= media(); ?>admin/plugins/jquery/jquery.min.js"></script>
<!-- FontAwesome Icons js -->
<script src="<?= media(); ?>admin/plugins/fontawesome-free/js/fontawesome.js" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="<?= media(); ?>admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= media(); ?>admin/dist/js/adminlte.min.js"></script>

<script>
	function CargarContenido(pagina_php, contenedor) {
		$("." + contenedor).load(pagina_php);
	}
</script>
</body>
</html>
