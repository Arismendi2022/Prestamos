<script>
	const base_url = "<?= media(); ?>";
</script>
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
<script src="<?= media(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= media(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="<?= media(); ?>plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Datatable js -->
<script src="<?= media(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= media(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= media(); ?>dist/js/adminlte.min.js"></script>
<!-- Funciones propias -->
<!--<script src="--><?php //= data(); ?><!--js/script.js"></script>-->
<!--<script src="--><?php //= data(); ?><!--js/functions_admin.js"></script>-->
<!--<script src="--><?php //= data(); ?><!--js/functions_roles.js"></script>-->

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

