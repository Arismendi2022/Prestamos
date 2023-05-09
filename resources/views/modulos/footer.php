<!-- Main Footer -->
<footer class="main-footer">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
		<b>Versión</b> 1.3.0
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; <?= date("Y") ?> <a href="https://banco.co">Sistema de Crédito</a>.</strong> Reservados todos los derechos.
</footer>
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
	$(document).ready(function () {
		$('.nav-link').click(function(e) {
			$('.nav-link').removeClass('active');
			$(this).addClass("active");
		});
	});
</script>

</body>
</html>
