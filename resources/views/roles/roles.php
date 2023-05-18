<?php
	headerAdmin($data);
	getModal('modalRoles', $data);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<div class="input-group">
						<h1><i class="fa-solid fa-users"></i> <?= $data['page_title'] ?>
							<button class="btn btn-primary ml-2" type="button" onclick="openModal();"><i class="fa-solid fa-circle-plus"></i> Nuevo</button>
						</h1>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=ROOT?>/dashboard">Inicio</a></li>
						<li class="breadcrumb-item active">Roles</li>
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
					<div class="card card-success card-outline ">
						<div class="card-header">
							<h3 class="card-title">Listado de Roles</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form>
							<div class="card-body">
								<table id="tableRoles" class="table table table-striped table-hover table-bordered" style="width:100%">
									<thead>
									<tr>
										<th>iD</th>
										<th>Nombre</th>
										<th>Descripción</th>
										<th>Estado</th>
										<th class="text-center">Acciones</th>
									</tr>
									</thead>
									<tbody>
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
