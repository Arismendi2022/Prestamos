<?php
	headerAdmin($data);
?>
<!-- Content Wrapper. Contains page content -->
<div id="contentAjax"></div>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<div class="input-group">
						<h1><i class="fa-solid fa-landmark"></i> <?= $data['page_title'] ?>
						</h1>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
						<li class="breadcrumb-item active">Préstamos</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	
	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title w-100 text-center font-size-20"><b>LISTADO DE PRESTAMOS</b></h3>
						</div> <!-- /.card-header -->
									 <!-- form start -->
						<form>
							<div class="card-body">
								<table id="tablePrestamos" class="table table table-striped table-hover table-bordered" style="width:100%">
									<thead>
									<tr>
										<th>iD</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Email</th>
										<th>Teléfono</th>
										<th>Rol</th>
										<th>Estado</th>
										<th class="text-center">Acciones</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<td>1</td>
										<td>Carlos</td>
										<td>Hernandez</td>
										<td>carlos@info.com</td>
										<td>3134502036</td>
										<td>Administrador</td>
										<td>Activo</td>
										<td>X</td>
									</tr>
									</tbody>
								</table>
								<!-- /.Table -->
							</div>
							<!-- /.card-body -->
						</form>
					</div>
					<!-- /.card -->
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php footerAdmin($data); ?>


