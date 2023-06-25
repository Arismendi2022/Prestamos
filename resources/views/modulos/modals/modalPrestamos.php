<!-- Extra large modal -->
<div class="modal fade bd-example-modal-xl" id="modalFormPrestamos" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-gradient-primary">
				<h5 class="modal-title w-100 text-center" id="titleModal"><b>Formulario Préstamos</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<!-- left column -->
					<!--INFORMACION DEL CREDITO-->
					<div class="col-md-9">
						<!-- general form elements -->
						<div class="card card-primary card-outline">
							<div class="card-header">
								<h3 class="card-title"><b>INFORMACION DEL CREDITO</b></h3>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form id="formPrestamo" name="formPrestamo" class="form-horizontal">
								<input type="hidden" id="idUsuario" name="idUsuario" value="">
								<div class="card-body">
									<!--Información del Cliente-->
									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="txtIdentificacion">Identificación</label>
											<div class="input-group">
												<input autofocus="text" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" required="" onkeypress="return
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
											<label for="txtNombre">Nombres y Apellidos</label>
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
												<input type="text" class="form-control valid validNumber" id="txtMonto" name="txtMonto" required=""
												       onkeypress="return controlTag(event);">
											</div>
										</div>
										
										<div class="form-group col-md-3">
											<label for="txtCuota">Nro Cuotas <span class="required">*</span></label>
											<input type="text" class="form-control valid validText" id="txtCuota" name="txtCuota" required="">
										</div>
										
										<div class="form-group col-md-3">
											<label for="txtInteres">Interes Anual <span class="required">*</span></label>
											<div class="input-group">
												<input type="text" class="form-control valid validNumber" id="txtInteres" name="txtInteres" required="">
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
											<div class="input-group date" id="txtFecha" data-target-input="nearest">
												<input type="text" class="form-control datetimepicker-input" data-target="#txtFecha" required="">
												<div class="input-group-append" data-target="#txtFecha" data-toggle="datetimepicker">
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
											<button type="submit" id="btnCalcular" class="btn btn-block btn-danger btn-sm"><i class="fa-solid fa-calculator mr-2"></i><b>CALCULAR</b></button>
										</div>
									</div>
								</div> <!-- /.row -->
								<div class="row">
									<div class="col-md-12">
										<form>
											<div class="card-body">
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
														<tr>
															<td>1</td>
															<td>20/05/2023</td>
															<td>20.000</td>
															<td>2.000</td>
															<td align="right">$ 18.000</td>
															<td align="right">$ 180.000</td>
														</tr>
														<tr>
															<td>2</td>
															<td>20/06/2023</td>
															<td>20.000</td>
															<td>2.000</td>
															<td align="right">$ 18.000</td>
															<td align="right">$ 160.000</td>
														</tr>
														<tr>
															<td>3</td>
															<td>20/07/2023</td>
															<td>20.000</td>
															<td>2.000</td>
															<td align="right">$ 18.000</td>
															<td align="right">$ 140.000</td>
														</tr>
														</tbody>
													</table>
												</div>
												<!-- /.Table -->
											</div>
											<!-- /.card-body -->
										</form>
										<!-- /.form-->
									</div>
								</div> <!-- /.row -->
							</form>
						</div>
						<!-- /.card -->
					</div>
					<!--/.col (left) -->
					<!-- right column -->
					<!--VALORES CALCULADOS-->
					<div class="col-md-3">
						<!-- Form Element sizes -->
						<div class="card card-success card-outline">
							<div class="card-header">
								<h3 class="card-title"><b>VALORES CALCULADOS</b></h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-12 text-center">
										<span>Valor por Cuota</span>
										<h3><span id="valorCuota">$ 0.00</span></h3>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 text-center">
										<span>Interes</span>
										<h3><span id="Interes">$ 0.00</span></h3>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 text-center">
										<span>Monto Total</span>
										<h3><span id="montoTotal">$ 0.00</span></h3>
									</div>
								</div>
							</div>
							<div class="card-body">
								<button type="button" class="btn btn-block btn-success"><b>Guardar Préstamo</b></button>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card card-danger card-outline">
							<div class="card-header">
								<h3 class="card-title"><b>ACCIONES</b></h3>
							</div>
							<div class="card-body">
								<button type="button" class="btn btn-block btn-primary"><b>IMP. PRESTAMO</b></button>
								<button type="button" class="btn btn-block btn-warning"><b>LIMPIAR CAMPOS</b></button>
								<button type="button" data-dismiss="modal" class="btn btn-block btn-danger"><b>CERRAR</b></button>
							</div>
						</div>
						<!-- /.card -->
					</div>
					<!--/.col (right) -->
				</div>
				<!-- /.row -->
			</div>
		</div>
	</div>
</div>

<!-- /.modal -->
<div class="modal fade" id="modalListClientes" tabindex="-1" role="dialog" aria-hidden="true">>
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header bg-gradient-success">
				<h5 class="modal-title w-100 text-center" id="titleModal"><b>Listado de Clientes</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="tableListClientes" class="table table table-striped table-bordered table-alto" style="width:100%">
					<thead>
					<tr>
						<th>ID</th>
						<th>Identificación</th>
						<th>Nombres</th>
						<th>Apellidos</th>
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
 <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

