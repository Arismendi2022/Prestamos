<?php
	headerAdmin($data);
	getModal('modalPagos', $data);
?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<div class="input-group">
							<h1><i class="fas fa-hand-holding-usd"></i> <?= $data['page_title'] ?>
								<?php if ($_SESSION['permisosMod']['w']) { ?>
									<button class="btn btn-primary ml-2" type="button" onclick="openModal();"><i class="fa-solid fa-circle-plus"></i> Nuevo</button>
								<?php } ?>
							</h1>
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
							<li class="breadcrumb-item active">Pagos</li>
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
						<div class="card card-success card-outline">
							<div class="card-header">
								<h3 class="card-title">Listado de Pagos</h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form>
								<div class="card-body">
									<table id="tablePagos" class="table table table-striped table-hover table-bordered" style="width:100%">
										<thead>
										<tr>
											<th>ID</th>
											<th style="width: 250px">Clientes</th>
											<th>Nro. Prestamo</th>
											<th>Fecha Pago</th>
											<th class="text-right">Vr. Cancelado</th>
											<th>Nro. Cuota</th>
											<th class="text-center">Imp. Pago</th>
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