<?php
	headerAdmin($data);
	getModal('modalUsuarios', $data);
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
						<h1><i class="fa-solid fa-user-group"></i> <?= $data['page_title'] ?>
							<button class="btn btn-primary ml-2" type="button" onclick="openModal();"><i class="fa-solid fa-circle-plus"></i> Nuevo</button>
						</h1>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
						<li class="breadcrumb-item active">Usuarios</li>
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
					<div class="card card-warning card-outline">
						<div class="card-header">
							<h3 class="card-title">Listado de Usuarios</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form>
							<div class="card-body">
								<table id="tableUsuarios" class="table table table-striped table-hover table-bordered" style="width:100%">
									<thead>
									<tr>
										<th>iD</th>
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>Email</th>
										<th>Telefono</th>
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
										<td></td>
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


