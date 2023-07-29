<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?=ROOT?>/admin/dist/img/favicon.png">
	<title><?= $data['page_tag'] ?></title>
	
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/fontawesome-free/css/all.min.css">
	<!-- SweetAlert2 CSS -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/sweetalert2/sweetalert2.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= ROOT ?>/admin/dist/css/adminlte.min.css">
	<!-- style -->
	<link rel="stylesheet" href="<?=media(); ?>/assets/css/style.css">
	
</head>
<body>
<div class="center-form">
<div class="login-box">
	<!-- /.login-logo -->
	<div class="card card-outline card-secondary">
		<div class="card-header text-center">
			<a class="h1"><?= $data['page_title']; ?><a>
		</div>
		<div class="card-body">
			<p class="login-box-msg">Ingresa para iniciar sesión</p>
			
			<form class="login-form" name="formLogin" id="formLogin" action="">
				<div class="input-group mb-3">
					<input id="txtEmail" name="txtEmail" type="email" class="form-control" placeholder="Email" autofocus>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input id="txtPassword" name="txtPassword" type="password" class="form-control" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<p class="mb-1"><a href="#">¿Olvidaste tu contraseña?</a></p>
				</div>
				
				<div class="row">
					<!-- /.col -->
					<div class="col-md-12">
						<div class="form-group btn-container mt-2">
							<button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt fa-lg mr-2"></i>INGRESAR</button>
						</div>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>
<!-- /.login-box -->
</div>

<script>
	const base_url = "<?= base_url(); ?>";
</script>

<!-- jQuery -->
<script src="<?= ROOT ?>/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= ROOT ?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= ROOT ?>/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=ROOT?>/admin/plugins/moment/moment.min.js"></script>
<script src="<?=ROOT?>/admin/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= ROOT ?>/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= ROOT ?>/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="<?= ROOT ?>/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= ROOT ?>/admin/dist/js/adminlte.min.js"></script>
<!-- functions_login -->
<script src="<?= media(); ?>/assets/js/functions_admin.js"></script>
<script src="<?= media(); ?>/assets/js/<?= $data['page_functions_js']; ?>"></script>

</body>
</html>
