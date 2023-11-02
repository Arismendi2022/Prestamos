<?php
	headerAdmin($data);
	getModal('modalCapital', $data);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<div class="input-group">
						<h1><i class="fa-solid fa-building mr-2"></i> <?= $data['page_title'] ?>
						</h1>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
						<li class="breadcrumb-item active">Empresa</li>
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
					<div class="card card-widget widget-user shadow-lg">
						<!-- Add the bg color to the header using any of the bg-* classes -->
						<div class="widget-user-header text-white"
								 style="background: url('<?= ROOT ?>/admin/dist/img/photo1.png') center center;">
							<li class="widget-user-desc text-right" style="font-size:40px; color:#FFF"><strong>iBANKING</strong></li>
							<li class="widget-user-desc text-right" style="font-size:13px; color:#FFF"><b>SISTEMA DE CREDITO EN LINEA</b></li>
						</div>
						<div class="widget-user-image">
							<img class="img-circle" src="<?= ROOT ?>/admin/dist/img/logo_empresa.jpg" alt="User Image">
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-4 border-right">
									<div class="description-block">
										<h5 class="description-header">3,200</h5>
										<span class="description-text">SALES</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4 border-right">
									<div class="description-block">
										<h5 class="description-header">13,000</h5>
										<span class="description-text">FOLLOWERS</span>
									</div>
									<!-- /.description-block -->
								</div>
								<!-- /.col -->
								<div class="col-sm-4">
									<div class="description-block">
										<h5 class="description-header">35</h5>
										<span class="description-text">PRODUCTS</span>
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
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">About Me</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<strong><i class="fas fa-book mr-1"></i> Education</strong>
							
							<p class="text-muted">
								B.S. in Computer Science from the University of Tennessee at Knoxville
							</p>
							
							<hr>
							
							<strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
							
							<p class="text-muted">Malibu, California</p>
							
							<hr>
							
							<strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
							
							<p class="text-muted">
								<span class="tag tag-danger">UI Design</span>
								<span class="tag tag-success">Coding</span>
								<span class="tag tag-info">Javascript</span>
								<span class="tag tag-warning">PHP</span>
								<span class="tag tag-primary">Node.js</span>
							</p>
							
							<hr>
							
							<strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
							
							<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
				<div class="col-md-8">
					<div class="card card-primary card-outline card-tabs">
						<div class="card-header p-2">
							<ul class="nav nav-tabs" id="myTab">
								<li class="nav-item"><a class="nav-link active" href="#datosEmpresa" data-toggle="pill" role="tab">Datos Empresa</a></li>
								<li class="nav-item"><a class="nav-link" href="#patrimonio" data-toggle="pill" role="tab">Patrimonio</a></li>
							</ul>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<div class="active tab-pane" id="datosEmpresa">
									<form class="form-horizontal">
										<div class="form-group row">
											<label for="inputName" class="col-sm-2 col-form-label">Name</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputName" placeholder="Name">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" id="inputEmail" placeholder="Email">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputName2" class="col-sm-2 col-form-label">Name</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputName2" placeholder="Name">
											</div>
										</div>
										<div class="form-group row">
											<label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
											<div class="col-sm-10">
												<textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
											</div>
										</div>
										<div class="form-group row">
											<label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" id="inputSkills" placeholder="Skills">
											</div>
										</div>
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<div class="checkbox">
													<label>
														<input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
													</label>
												</div>
											</div>
										</div>
										<div class="form-group row">
											<div class="offset-sm-2 col-sm-10">
												<button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-check-circle"></i>Guardar</button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane fade" id="patrimonio">
									<div class="content">
										<div class="row">
											<h5>Capital de trabajo
												<button class="btn btn-primary btn-sm ml-2" type="button" onclick="openModal();"><i class="fa-solid fa-circle-plus"></i> Agregar</button>
											</h5>
											<h5 class="mx-5">Total Capital: <span id="totalCapital"> $0,00</span></h5>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12">
												<div class="table-responsive">
													<table id="tableCapital" class="table table-striped table-hover table-bordered" style="width:100%">
														<thead>
														<tr>
															<th>ID</th>
															<th>Fecha</th>
															<th class="text-right">Capital($)</th>
															<th class="text-center">Efectivo/Banco</th>
															<th>Descripción</th>
															<th class="text-center">Acciones</th>
														</tr>
														</thead>
														<tbody>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
									<!-- /.tab-pane -->
								</div>
							</div>
						</div><!-- /.card -->
					
					</div>
					<!-- /.col -->
				</div>
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php footerAdmin($data); ?>
