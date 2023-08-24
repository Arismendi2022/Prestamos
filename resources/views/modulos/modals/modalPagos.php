<!-- Modal Pagos-->
<div class="modal fade" id="modalFormPagos" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-xl " role="document">
		<div class="modal-content">
			<div class="modal-header bg-light">
				<h5 class="modal-title w-100 text-center" id="titleModal"><b>FORMULARIO DE PAGO</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formPagos" name="formPagos" class="form-horizontal">
					<input type="hidden" id="idCliente" name="idCliente" value="">
					<div class="row">
						<div class="col-md-8">
							<div class="card card-info">
								<div class="card-header">
									<h5 class="card-title"><b>PAGO DE CUOTAS DEL PRESTAMO</b></h5>
								</div>
								<div class="card-body">
									<div class="form-group col-md-6">
										<label for="txtIdentificacion">Identificación <span class="required">*</span></label>
										<div class="input-group">
											<input type="text" class="form-control valid validNumber" id="txtIdentificacion" name="txtIdentificacion" required="" onkeypress="return
														controlTag(event);">
											<div class="input-group-append">
												<button type="button" onclick="modalClientesPrestamos();" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button>
											</div>
										</div>
									</div>
									<div class="form-group col-md-12">
										<label for="txtNombre">Nombres y Apellidos </span></label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="fa-solid fa-user "></i></span>
											</div>
											<input type="text" class="form-control valid validText font-weight-bold font-size" id="txtNombre" name="txtNombre" required="" readonly>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
												<h6 class="tile-title mt-2"><b>LISTADO DE CUOTAS</b></h6>
											<table id="tableQuotas" class="table table-striped table-bordered table-sm w-100">
												<thead>
												<tr>
													<!--<th><input type="checkbox" value="1" id="select-all"></th>-->
													<th>#</th>
													<th>No. Cuota</th>
													<th class="text-center">Fecha de Pago</th>
													<th class="right-margin">Monto Cuota</th>
													<th class="text-center">Estado</th>
												</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
											<!-- /.Table -->
										</div>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<div class="card card-olive">
									<div class="card-header">
										<h4 class="card-title"><b>INFORMACION CUOTAS</b></h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 text-center">
												<span>Monto Préstamo</span>
												<h3><span id="montoTotal" class="font-weight-bold" aria-disabled="">0.00</span></h3>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 md-2 text-center">
												<span>No. Préstamo</span>
												<h5><span id="nroPrestamo"> 0</span></h5>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 md-2 text-center">
												<span>Plazo Préstamo</span>
												<h6><span id="plazoPrestamo"> </span></h6>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12 text-center">
												<span>Tipo moneda</span>
												<h6><span id="tipoMoneda"> </span></h6>
											</div>
										</div>
									</div>
									<!-- /.card-body -->
								</div>
								<div class="card card-lightblue">
									<div class="card-header">
										<h4 class="card-title"><b>PAGAR</b></h4>
									</div>
									<div class="card-body">
										<div class="form-row">
											<div class="form-group col-md-12 text-center">
												<label class="control-label">Monto Total</label>
												<div class="input-group">
													<input class="form-control text-center text-bold font-size-24" id="txtMonto" name="txtMonto" type="text"
													       required="" placeholder="0.00" readonly>
												</div>
												<button id="btnActionForm" class="btn btn-block btn-success mt-3" type="submit" disabled><i class="fa-solid fa-circle-check mr-2"></i><span
														id="btnText"><b>PAGAR</b></span></button>
												<button type="button" onclick="btnLimpiarForm();" class="btn btn-block btn-danger mt-3"><i class="fa-solid fa-circle-xmark mr-2"></i><b>LIMPIAR
												                                                                                                                                    CAMPOS</b></button>
											</div>
										</div>
									</div>
									<!-- /.card-body -->
								</div>
							</div>
							<!-- /.card -->
						</div>
						<div class="row">
						</div>
					</div>
					<!-- /.row-->
					<div class="card-footer">
						<button class="btn btn-outline-secondary" type="button" style="float: right" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle mr-2"></i>Cerrar
						</button>
					</div>
				</form> <!-- /.form -->
			</div> <!-- /.body -->
		</div>
	</div>
</div>

<!-- /.modal -->
<div class="modal fade" id="modalClientesPrestamos" tabindex="-1" role="dialog" aria-hidden="true">>
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header bg-gradient-lightblue">
				<h5 class="modal-title w-100 text-center" id="titleModal"><b>Listado de Clientes con Préstamos</b></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="tableClientesPrestamos" class="table table table-striped table-bordered" style="width:100%">
					<thead>
					<tr>
						<th>ID</th>
						<th style="width: 300px">Clientes</th>
						<th>Monto</th>
						<th>Estado</th>
						<th>Acciones</th>
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