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
	<strong>Copyright &copy; <?= date ("Y") ?> <a href="#">Sistema de Crédito</a>.</strong> Reservados todos los derechos.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= ROOT ?>/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Toggle JS -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= ROOT ?>/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--Highcharts-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/dashboards/dashboards.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js">
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- Select2 -->
<script src="<?= ROOT ?>/admin/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="<?= ROOT ?>/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- InputMask -->
<script src="<?= ROOT ?>/admin/plugins/moment/moment.min.js"></script>
<script src="<?= ROOT ?>/admin/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= ROOT ?>/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= ROOT ?>/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= ROOT ?>/admin/dist/js/adminlte.min.js"></script>
<!-- Datatable js -->
<script src="<?= ROOT ?>/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= ROOT ?>/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Dayjs -->
<script src="<?= ROOT ?>/admin/plugins/dayjs/dayjs.min.js"></script>
<!-- Numeraljs-->
<script src="<?= ROOT ?>/admin/plugins/numeral/numeral.min.js"></script>
<!-- Files input-->
<script src="<?= ROOT ?>/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- Buttons js -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>

<!-- Funciones propias -->
<script src="<?= media (); ?>/assets/js/functions_admin.js"></script>
<script src="<?= media (); ?>/assets/js/<?= $data['page_functions_js']; ?>"></script>

<script>
	/** agregar clase activa y permanecer abierto cuando se selecciona */
	var url = window.location;
	
	/** para el menú de la barra lateral por completo, pero no cubre la vista de árbol */
	$('ul.nav-sidebar a').filter(function () {
		return this.href == url;
	}).addClass('active');
	
	/** para vista de árbol */
	$('ul.nav-treeview a').filter(function () {
		return this.href == url;
	}).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>

<script>
	$(function () {
		bsCustomFileInput.init();
	});
</script>

</body>
</html>
