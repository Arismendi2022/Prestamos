<!-- Modal Prestamos-->
<div class="modal fade" id="modalFormPrestamo" tabindex="-1" role="dialog" aria-hidden="true" xmlns="http://www.w3.org/1999/html">
	<div class="modal-dialog modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title" id="titleModal">Nuevo Préstamo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formPrestamos" name="formPrestamos" class="form-horizontal">
					<input type="hidden" id="idUsuario" name="idUsuario" value="">
					<div class="row">
						<div class="col-md-9">
							<!--Información del Cliente-->
							<div class="card card-outline card-orange">
								<div class="card-header">
									<h4 class="card-title w-100 text-center"><b>INFORMACION DEL CREDITO</b></h4>
								</div>
								<div class="card-body">
									<div class="row">
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
										<div class="form-group col-md-8">
											<label for="txtNombre">Nombres y Apellidos <span class="required">*</span></label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fa-solid fa-user"></i></span>
												</div>
												<input type="text" class="form-control valid validText font-weight-bold font-size" id="txtNombre" name="txtNombre" required="" readonly>
											</div>
										</div>
										<div class="form-group col-md-12">
											<label for="txtDetalle">Detalle</label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fa-solid fa-circle-info"></i></i></span>
												</div>
												<input type="text" class="form-control" id="txtNombre" name="txtDetalle" placeholder="Ingrese detalle préstamo">
											</div>
										</div>
									</div> <!-- /.crow -->
									<div class="row">
										<div class="col-md-4">
											<label for="txtMonto">Monto del Préstamo <span class="required">*</span></label>
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
												</div>
												<input type="text" class="form-control font-weight-bold font-size-20" id="txtMonto" name="txtMonto" oninput="formatoMillares(this)" required="">
											</div>
										</div>
										<div class="col-md-4">
											<label for="txtCuota">Nro Cuotas <span class="required">*</span></label>
											<div class="input-group">
												<input type="text" class="form-control font-weight-bold font-size valid validNumber" id="txtCuotas" name="txtCuotas" required=""
															 onkeypress="return controlTag(event);">
												<div class="input-group-append">
													<span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label for="txtInteres">Interes Anual <span class="required">*</span></label>
											<div class="input-group">
												<input type="text" class="form-control font-weight-bold font-size" id="txtInteres" name="txtInteres" required=""
															 onkeypress="return controlTag(event);">
												<div class="input-group-append">
													<span class="input-group-text"><i class="fa-solid fa-percent"></i></span>
												</div>
											</div>
										
										</div>
									</div> <!-- /.crow -->
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
											<div class="input-group date" id="reservaFecha" data-target-input="nearest" readonly>
												<input type="text" id="fechaInicio" class="form-control datetimepicker-input" data-target="#reservaFecha" placeholder="dd/mm/yyyy"
															 required="">
												<div class="input-group-append" data-target="#reservaFecha" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div>
											</div>
										</div>
									</div> <!-- /.row -->
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="card-footer">
											<button type="button" onclick="btnCalcular();" class="btn btn-block btn-danger btn-sm"><i class="fa-solid fa-calculator
												mr-2"></i><b>CALCULAR</b></button>
										</div>
									</div>
								</div> <!-- /.row -->
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<div class="col-md-3">
							<div class="card card-lightblue">
								<div class="card-header">
									<h4 class="card-title w-100 text-center"><b>VALORES CALCULADOS</b></h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 text-center">
											<span>Valor por Cuota</span>
											<h4><span id="valorCuota" class="font-weight-bold">0.00</span></h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-center">
											<span>Interes</span>
											<h4><span id="Interes" class="font-weight-bold">0.00</span></h4>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-center">
											<span>Monto Total</span>
											<h4><span id="montoTotal" class="font-weight-bold">0.00</span></h4>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card -->
							<div class="card card-info">
								<div class="card-header">
									<h4 class="card-title w-100 text-center"><b>ACCIONES</b></h4>
								</div>
								<div class="card-body">
									<button id="btnActionForm" class="btn btn-block btn-success" type="submit" disabled><span id="btnText"><b>GUARDAR PRESTAMO</b></span></button>
									<button type="button" class="btn btn-block btn-info"><b>IMP. PRESTAMO</b></button>
									<button type="button" onclick="btnLimpiarForm();" class="btn btn-block btn-danger"><b>LIMPIAR CAMPOS</b></button>
								</div>
							</div>
							<!-- /.card -->
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-outline-secondary" type="button" style="float: right" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle mr-2"></i>Cerrar
						</button>
					</div>
				</form> <!-- /.form -->
			</div> <!-- /.body -->
		</div>
	</div>
</div>

<!-- /.modal Buscar clientes-->
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
				<div class="row">
					<div class="col-md-12">
						<div class="tile">
							<div class="table-responsive">
								<table id="tableListClientes" class="table table-hover table-striped table-bordered" style="width:100%">
									<thead>
									<tr>
										<th>ID</th>
										<th>Identificaion</th>
										<th>Nombre Completo</th>
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
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-right">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Cerrar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>

<!-- Modal info Prestamos-->
<div class="modal fade" id="modalViewLoan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title" id="exampleModalCenterTitle">Detalle Préstamo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header with-border">
						<div class="row">
							<div class="col-sm-4">
								<div class="user-block">
									<img class="img-circle" src="<?= ROOT ?>/admin/dist/img/face_image_placeholder.png">
									<span id="celNombre" class="username" style="font-size:15px; color:#000000"> Arismendi Guiza </span>
									<span id="celIdentificacion" class="description" style="font-size:13px; color:#000000">79425387<br></span>
									<span class="description" style="font-size:13px; color:#000000">
										<br>Fecha Creado: <span id="celFechaRegistro"> 25/07/2023</span>
										<span id="celGenero"> Genero</span>
									</span>
								</div><!-- /.user-block -->
							</div><!-- /.col -->
							<div class="col-sm-4">
								<ul class="list-unstyled" style="font-size:13px; color:#000000">
									<li><b>Direeción: </b> <span id="celDireccion"> Calle 12</span></li>
									<li class="float-center"><b>Ciudad: </b><span id="celCiudad"> Bogotá</span></li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul class="list-unstyled" style="font-size:13px; color:#000000">
									<li><b>Email: </b><span id="celEmail" style="color: blue;">Arismendi.Guiza@yahoo.com</span></li>
									<div class="btn-group-horizontal">
										<li><b>Teléfono: </b><span id="celTelefono"> 3508473267</span></li>
									</div>
									<a type="button" class="btn-xs bg-red mr-2" href="#">Enviar SMS</a>
								</ul>
								<span id="celDetalle" style="Color: #000; font-size: 14px">Detalle</span>
							</div>
						</div><!-- /.row -->
					</div>
				</div><!-- /.card -->
				<div class="card card-outline card-orange">
					<div class="card-header with-border">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<div class="clearfix mb-2">
										<div class="float-left">
											<span class="aligned-span-iz">Monto Credito:</span> <span class="aligned-span" id="celMontoCredito" style="color: blue;">0,00</span><br>
											<span class="aligned-span-iz">Total Interes:</span> <span class="aligned-span" id="celTotalIntereses" style="color: blue;">0,00</span><br>
											<span class="aligned-span-iz">Total a Pagar:</span> <span class="aligned-span" id="celMontoTotal" style="color: blue;">0,00</span><br>
											<span class="aligned-span-iz">Interes Anual:</span> <b><span class="aligned-span" id="celInteres" style="color: green;"> 24%</span></b>
											<!--Monto cuota: 11,025 <br>-->
										</div>
										<div class="float-right">
											<span class="aligned-span-iz">Fecha Credito:</span> <span class="aligned-span" id="celFechaCredito"> 25/07/2023</span><br>
											<b><span class="aligned-span-iz">Nro Credito:</span></b> <b><span class="aligned-span" id="celnroCredito"> 10</span></b><br>
											<span class="aligned-span-iz">Forma Pago:</span> <span class="aligned-span" id="celFormaPago"> Mensual</span><br>
											<span class="aligned-span-iz">Nro Cuotas:</span> <span class="aligned-span" id="celnroCuotas"> 10</span><br>
										</div>
									</div>
									<div class="table-responsive">
										<table id="tableViewCuotas" class="table table-striped table-bordered table-sm" style="width:100%">
											<thead>
											<tr class="active" style="background-color: #dff0d8">
												<th>Cuota</th>
												<th>Fecha Pago</th>
												<th class="right-margin">Cuota</th>
												<th class="right-margin">Interes</th>
												<th class="right-margin">Capital</th>
												<th class="right-margin">Saldo</th>
												<th>Estado</th>
											</tr>
											</thead>
											<tbody id="tableBody">
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.card -->
			</div> <!-- /.body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle mr-1"></i>Cerrar</button>
			</div>
		</div>
	</div>
</div>









