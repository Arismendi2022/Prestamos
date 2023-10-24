<?php
	headerAdmin ($data);
	getModal ('modalPerfil', $data);
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
						</h1>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
						<li class="breadcrumb-item active">Perfil del usuario</li>
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
				<div class="col-md-4">
					<!-- Widget: user widget style 1 -->
					<div class="card card-widget widget-user shadow">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header bg-info">
							<h3 class="profile-username text-center"><?= $_SESSION['userData']['nombres'] . ' ' . $_SESSION['userData']['apellidos']; ?></h3>
							<h5 class="widget-user-desc"><?= $_SESSION['userData']['nombrerol']; ?></h5>
						</div>
						<div class="widget-user-image">
							<img class="profile-user-img img-fluid img-circle" src="<?= ROOT ?>/admin/dist/img/avatar.jpg" alt="User profile picture">
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-4 border-right">
									<div class="description-block">
										<h5 class="description-header">3,200</h5>
										<span class="description-text">VENTAS</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4 border-right">
									<div class="description-block">
										<h5 class="description-header">13,000</h5>
										<span class="description-text">SEGUIDORES</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									<div class="description-block">
										<h5 class="description-header">35</h5>
										<span class="description-text">PRODUCTOS</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
					</div>
					<!-- /.widget-user -->
					
					<!-- About Me Box -->
					<div class="card card-primary shadow">
						<div class="card-header">
							<h3 class="card-title">Acerca de mi</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<strong><i class="fas fa-book mr-1"></i> Educacíon</strong>
							<p class="text-muted">
								BS en Ciencias de la Computación de la Universidad de Tennessee en Knoxville
							</p>
							<hr>
							<strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación</strong>
							<p class="text-muted">Bogotá, Colombia</p>
							<hr>
							<strong><i class="far fa-file-alt mr-1"></i> Notas</strong>
							<p class="text-muted">El mejor apoyo para el
								crecimiento y progreso. Únete en esta plataforma.</p>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
				<div class="col-md-8">
					<div class="card card-primary card-outline">
						<div class="card-header p-2">
							<ul class="nav nav-pills" id="myTab">
								<li class="nav-item"><a class="nav-link active" href="#datosPersonales" data-toggle="tab">Datos personales</a></li>
								<li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab" role="tab">Datos fiscales</a></li>
							</ul>
						
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<!-- /.tab-pane -->
								<div class="active tab-pane" id="datosPersonales">
									<div class="content">
										<h5>DATOS PERSONALES
											<button class="btn btn-sm btn-primary ml-2" type="button" onclick="openModalPerfil();"><i class="fas fa-pencil-alt"
																																																								aria-hidden="true"></i></button>
										</h5>
									</div>
									<table class="table table-bordered">
										<tbody>
										<tr>
											<td style="width:150px;"><b>Identificación:</b></td>
											<td><?= $_SESSION['userData']['identificacion']; ?></td>
										</tr>
										<tr>
											<td><b>Nombres:</b></td>
											<td><?= $_SESSION['userData']['nombres']; ?></td>
										</tr>
										<tr>
											<td><b>Apellidos:</b></td>
											<td><?= $_SESSION['userData']['apellidos']; ?></td>
										</tr>
										<tr>
											<td><b>Teléfono:</b></td>
											<td><?= $_SESSION['userData']['telefono']; ?></td>
										</tr>
										<tr>
											<td><b>Email (Usuario):</b></td>
											<td><?= $_SESSION['userData']['email_user']; ?></td>
										</tr>
										</tbody>
									</table>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane fade" id="user-settings">
									<div class="tile user-settings">
										<h4 class="line-head">Datos fiscales</h4>
										<form id="formDataFiscal" name="formDataFiscal">
											<div class="row mb-4">
												<div class="col-md-6">
													<label>Identificación Tributaria</label>
													<input class="form-control valid validNumber" type="text" id="txtNit" name="txtNit" value=""
																 onkeypress="return controlTag(event);" readonly>
												</div>
												<div class="col-md-6">
													<label>Nombre fiscal</label>
													<input class="form-control" type="text" id="txtNombreFiscal" name="txtNombreFiscal" value="" readonly>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 mb-4">
													<label>Dirección fiscal</label>
													<input class="form-control" type="text" id="txtDirFiscal" name="txtDirFiscal" value="" readonly>
												</div>
											</div>
											<div class="row mb-10">
												<div class="col-md-12">
													<button class="btn btn-danger" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php footerAdmin ($data); ?>


