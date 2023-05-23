<script>
	const base_url = "<?= ROOT ?>";
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
<script src="<?=ROOT?>/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Toggle JS -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?=ROOT?>/admin/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=ROOT?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?=ROOT?>/admin/plugins/select2/js/bootstrap-select.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="<?=ROOT?>/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- InputMask -->
<script src="<?=ROOT?>/admin/plugins/moment/moment.min.js"></script>
<script src="<?=ROOT?>/admin/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Datatable js -->
<script src="<?=ROOT?>/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=ROOT?>/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=ROOT?>/admin/dist/js/adminlte.min.js"></script>

<!-- Funciones propias -->
<script src="<?= media(); ?>/assets/js/script.js"></script>
<script src="<?= media(); ?>/assets/js/functions_admin.js"></script>

<?php if($data['page_name'] == "rol_usuario"){ ?>
<script src="<?= media(); ?>/assets/js/functions_roles.js"></script>
<?php } ?>
<?php if($data['page_name'] == "usuarios"){ ?>
<script src="<?= media(); ?>/assets/js/functions_usuarios.js"></script>
<?php } ?>

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
