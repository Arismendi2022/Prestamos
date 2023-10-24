<?php
	headerAdmin ($data);
	getModal ('modalCapital', $data);
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
					<div class="card card-primary card-outline">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							
							<p class="card-text">
								Some quick example text to build on the card title and make up the bulk of the card's
								content.
							</p>
							<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div><!-- /.card -->
				</div>
				<!-- /.col -->
				<div class="col-md-8">
					<div class="card card-primary card-outline">
						<div class="card-header p-2">
							<ul class="nav nav-pills" id="myTab">
								<li class="nav-item"><a class="nav-link active" href="#datosEmpresa" data-toggle="tab">Datos Empresa</a></li>
								<li class="nav-item"><a class="nav-link" href="#patrimonio" data-toggle="tab" role="tab">Patrimonio</a></li>
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
										<h5>Capital de trabajo
											<button class="btn btn-success btn-sm ml-2" type="button" onclick="openModal();"><i class="fa-solid fa-circle-plus"></i> Agregar Capital
											</button>
										</h5>
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
															<th class="text-center" >Acciones</th>
														</tr>
														</thead>
														<tbody>
														</tbody>
														<!--	<tr class="bg-gray-light">
																<td><b>Total</b></td>
																<td class="text-right"><b>$700.000,00</b></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>-->
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

<?php footerAdmin ($data); ?>
