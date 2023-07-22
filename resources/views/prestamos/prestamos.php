<?php
	headerAdmin($data);
	getModal('modalPrestamos', $data);
?>
<!-- Content Wrapper. Contains page content -->
<div id="contentAjax" xmlns="http://www.w3.org/1999/html"></div>
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
				<div class="col-md-11" style="width: auto; margin: auto auto;">
					<div class="card card-outline card-light shadow">
						<div class="card-header">
							<h3 class="card-title w-100 text-center"><b>FORMULARIO PRESTAMOS</b></h3>
						</div>
						<div class="card-body">
							<form id="formPrestamo" name="formPrestamo" class="form-horizontal">
								<input type="hidden" id="idUsuario" name="idUsuario" value="">
								<div class="row">
									<div class="col-md-9">
										<div class="card card-success">
											<div class="card-header">
												<h3 class="card-title w-100 text-center"><b>INFORMACION DEL CREDITO</b></h3>
											</div>
											<!-- /.card-header -->
											<!-- form start -->
											<div class="card-body">
												<!--Información del Cliente-->
												<div class="form-row">
													<div class="form-group col-md-4">
														<label for="txtIdentificacion">Identificación <span class="required">*</span></label>
														<div class="input-group">
															<input type="text" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" required="" onkeypress="return
													controlTag(event);">
															<div class="input-group-append">
																<button type="button" onclick="openModalClientes();" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button>
															</div>
														</div>
													</div>
												</div>
												<!-- /input-group -->
												<div class="form-row">
													<div class="form-group col-md-12">
														<label for="txtNombre">Nombres y Apellidos </span></label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa-solid fa-user"></i></span>
															</div>
															<input type="text" class="form-control valid validText font-weight-bold font-size" id="txtNombre" name="txtNombre" required=""
															       disabled="">
														</div>
													</div>
												</div>
												<!-- /input-group -->
												<!--Información del préstamo-->
												<div class="form-row">
													<div class="form-group col-md-6">
														<label for="txtMonto">Monto del Préstamo <span class="required">*</span></label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
															</div>
															<input type="text" class="form-control font-weight-bold font-size-20" id="txtMonto" name="txtMonto" oninput="formatearInput
																                                                                               (this)"
															       required="">
														</div>
													</div>
													
													<div class="form-group col-md-3">
														<label for="txtCuota">Nro Cuotas <span class="required">*</span></label>
														<input type="text" class="form-control font-weight-bold font-size valid validNumber" id="txtCuotas" name="txtCuotas" required=""
														       onkeypress="return controlTag(event);">
													</div>
													
													<div class="form-group col-md-3">
														<label for="txtInteres">Interes Anual <span class="required">*</span></label>
														<div class="input-group">
															<input type="text" class="form-control font-weight-bold font-size valid validNumber" id="txtInteres" name="txtInteres" required=""
															       onkeypress="return controlTag(event);">
															<div class="input-group-append">
																<span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
															</div>
														</div>
													</div>
												</div>
												<!-- /.row -->
												<!-- /input-group -->
												<div class="row">
													<div class="col-md-4">
														<label for="listFormPago">Forma de Pago <span class="required">*</span></label>
														<select class="form-control select2" id="listFormPago" name="listFormPago" required="">
															<option value="Diario">Diario</option>
															<option value="Mensual">Mensual</option>
															<option value="Quincenal">Quincenal</option>
															<option value="Semanal">Semanal</option>
														</select>
													</div>
													<div class="col-md-4">
														<label for="listMoneda">T. Moneda <span class="required">*</span></label>
														<select class="form-control select2" id="listMoneda" name="listMoneda" required="">
															<option value="COP">COP</option>
															<option value="USD">USD</option>
															<option value="EUR">EUR</option>
														</select>
													</div>
													<div class="col-md-4">
														<label for="txtFecha">Fecha Emisión <span class="required">*</span></label>
														<div class="input-group date" id="datetimepicker" data-target-input="nearest">
															<input type="text" id="datePicker" class="form-control datetimepicker-input" data-target="#datetimepicker" placeholder="mm/dd/yyyy"
															       required="">
															<div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
																<div class="input-group-text"><i class="fa fa-calendar"></i></div>
															</div>
														</div>
													</div>
												</div> <!-- /.row -->
												<!-- /input-group -->
											</div>
											<!-- /.card-body -->
											<div class="row">
												<div class="col-md-4">
													<div class="card-footer">
														<button type="button" id="btnCalcular" class="btn btn-block btn-danger btn-sm"><i class="fa-solid fa-calculator
														mr-2"></i><b>CALCULAR</b></button>
													</div>
												</div>
											</div> <!-- /.row -->
											<div class="row">
												<div class="col-12">
													<div class="card-footer">
														<div class="tile">
															<h6 class="tile-title"><b>LISTADO DE CUOTAS</b></h6>
															<table id="tableCuotas" class="table table-striped table-bordered table-sm w-100">
																<thead>
																<tr>
																	<th>#</th>
																	<th>Fecha de Pago</th>
																	<th class="right-margin">Monto Cuota</th>
																	<th class="right-margin">Interes</th>
																	<th class="right-margin">Capital</th>
																	<th class="right-margin">Saldo</th>
																</tr>
																</thead>
																<tbody class="text-right">
																</tbody>
															</table>
															<!-- /.Table -->
														</div>
													</div>
													<!-- /.card-footer-->
												</div>
											</div>
											<!-- /.row -->
											<!-- /.form -->
										</div>
										<!-- /.card -->
									</div>
									<div class="col-md-3">
										<div class="card card-primary">
											<div class="card-header">
												<h4 class="card-title w-100 text-center"><b>VALORES CALCULADOS</b></h4>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-md-12 text-center">
														<span>Valor por Cuota</span>
														<h4><span id="valorCuota" class="font-weight-bold">0</span></h4>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 text-center">
														<span>Interes</span>
														<h4><span id="Interes" class="font-weight-bold">0</span></h4>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12 text-center">
														<span>Monto Total</span>
														<h4><span id="montoTotal" class="font-weight-bold">0</span></h4>
													</div>
												</div>
											</div>
											<div class="card-body">
												<button id="btnActionForm" class="btn btn-block btn-success" type="submit"><span id="btnText"><b>GUARDAR PRESTAMO</b></span></button>
											</div>
											<!-- /.card-body -->
										</div>
										<!-- /.card -->
										<div class="card card-warning card-outline">
											<div class="card-header">
												<h3 class="card-title w-100 text-center"><b>ACCIONES</b></h3>
											</div>
											<div class="card-body">
												<button type="button" class="btn btn-block btn-info"><b>IMP. PRESTAMO</b></button>
												<button type="button" onclick="btnLimpiarForm();" class="btn btn-block btn-danger"><b>LIMPIAR CAMPOS</b></button>
											</div>
										</div>
										<!-- /.card -->
									</div>
								</div>
							</form>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
						
						</div>
						<!-- /.card-footer-->
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


