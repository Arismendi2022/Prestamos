<!-- Extra large modal -->
<div class="modal fade bd-example-modal-xl" id="modalFormPrestamos" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header bg-gradient-primary">
				<h5 class="modal-title w-100 text-center" id="titleModal"><b>Formulario Préstamos</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formPrestamo" name="formPrestamo" class="form-horizontal">
					<input type="hidden" id="idUsuario" name="idUsuario" value="">
					<div class="row">
						<div class="col-md-9">
							<div class="card card-success card-outline">
								<div class="card-header">
									<h3 class="card-title w-100 text-center"><b>INFORMACION DEL CREDITO</b></h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form id="formPrestamo" name="formPrestamo" class="form-horizontal">
									<input type="hidden" id="idUsuario" name="idUsuario" value="">
									<div class="card-body">
										<!--Información del Cliente-->
										<div class="form-row">
											<div class="form-group col-md-4">
												<label for="txtIdentificacion">Identificación <span class="required">*</span></label>
												<div class="input-group">
													<input type="text" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" required="" onkeypress="return
													controlTag(event);">
													<div class="input-group-append">
														<button type="button" onclick="openModalListC();" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button>
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
													<input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="" disabled="">
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
													<input type="text" class="form-control" id="txtMonto" name="txtMonto" oninput="formatearInput(this)" required="">
												</div>
											</div>
											
											<div class="form-group col-md-3">
												<label for="txtCuota">Nro Cuotas <span class="required">*</span></label>
												<input type="text" class="form-control valid validNumber" id="txtCuotas" name="txtCuotas" required="" onkeypress="return controlTag(event);">
											</div>
											
											<div class="form-group col-md-3">
												<label for="txtInteres">Interes Anual <span class="required">*</span></label>
												<div class="input-group">
													<input type="text" class="form-control valid validNumber" id="txtInteres" name="txtInteres" required="" onkeypress="return controlTag(event);">
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
													<option value="1">Diario</option>
													<option value="2">Mensual</option>
													<option value="3">Quincenal</option>
													<option value="4">Semanal</option>
												</select>
											</div>
											<div class="col-md-4">
												<label for="listMoneda">T. Moneda <span class="required">*</span></label>
												<select class="form-control select2" id="listMoneda" name="listMoneda" required="">
													<option value="1">COP</option>
													<option value="2">USD</option>
													<option value="3">EUR</option>
												</select>
											</div>
											<div class="col-md-4">
												<label for="txtFecha">Fecha Emisión <span class="required">*</span></label>
												<div class="input-group date" id="datetimepicker" data-target-input="nearest">
													<input type="text" id="datePicker" class="form-control datetimepicker-input" data-target="#datetimepicker" required="">
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
												<button type="button" onclick="btnCalcular();" class="btn btn-block btn-danger btn-sm"><i class="fa-solid fa-calculator
												mr-2"></i><b>CALCULAR</b></button>
											</div>
										</div>
									</div> <!-- /.row -->
									<div class="row">
										<div class="col-12">
											<div class="card-footer">
												<div class="tile">
													<h6 class="tile-title"><b>LISTADO DE CUOTAS</b></h6>
													<table id="tableCuotas" class="table table-striped table-bordered table-sm">
														<thead align="center">
														<tr>
															<th>#</th>
															<th>Fecha de Pago</th>
															<th>Monto Cuota</th>
															<th>Interes</th>
															<th>Capital</th>
															<th>Saldo</th>
														</tr>
														</thead>
														<tbody>
														</tbody>
													</table>
													<!-- /.Table -->
												</div>
											</div>
											<!-- /.card-footer-->
										</div>
									</div>
									<!-- /.row -->
								</form>
								<!-- /.form -->
							</div>
							<!-- /.card -->
						</div>
						<div class="col-md-3">
							<div class="card card-primary card-outline">
								<div class="card-header">
									<h4 class="card-title w-100 text-center"><b>VALORES CALCULADOS</b></h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 text-center">
											<span>Valor por Cuota</span>
											<h4><span id="valorCuota" class="font-weight-bold"> $ 0.00</span></h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-center">
											<span>Interes</span>
											<h4><span id="Interes" class="font-weight-bold">$ 0.00</span></h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-center">
											<span>Monto Total</span>
											<h4><span id="montoTotal" class="font-weight-bold">$ 0.00</span></h4>
										</div>
									</div>
								</div>
								<div class="card-body">
									<button id="btnActionForm" class="btn btn-block btn-primary" type="submit"><span id="btnText"><b>GUARDAR PRESTAMO</b></span>
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
									<button type="button" onclick="resetFormulario();" class="btn btn-block btn-success"><b>LIMPIAR CAMPOS</b></button>
									<button type="button" data-dismiss="modal" class="btn btn-block btn-danger"><b>CERRAR</b></button>
								</div>
							</div>
							<!-- /.card -->
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- /.modal -->
<div class="modal fade" id="modalListClientes" tabindex="-1" role="dialog" aria-hidden="true">>
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header bg-gradient-info">
				<h5 class="modal-title w-100 text-center" id="titleModal"><b>Listado de Clientes</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="tableListClientes" class="table table table-striped table-bordered" style="width:100%">
					<thead>
					<tr>
						<th>ID</th>
						<th>Identificación</th>
						<th>Nombres</th>
						<th>Telefono</th>
						<th>Estado</th>
						<th class="text-center">Acciones</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				<!-- /.Table -->
			</div>
			<div class="modal-footer justify-content-right">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
