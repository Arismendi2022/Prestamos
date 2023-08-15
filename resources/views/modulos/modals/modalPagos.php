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
					<input type="hidden" id="idUsuario" name="idUsuario" value="">
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
												<button type="button" onclick="openModalClientes();" class="btn btn-info"><i class="fa-solid fa-magnifying-glass"></i></button>
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
											<table id="tableAmorizacion" class="table table-striped table-bordered table-sm w-100">
												<thead>
												<tr>
													<th>#</th>
													<th>No. Cuota</th>
													<th class="text-center">Fecha de Pago</th>
													<th class="right-margin">Monto Cuota</th>
													<th class="text-center">Estado</th>
												</tr>
												</thead>
												<tbody class="right-margin">
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
								<div class="card card-lightblue">
									<div class="card-header">
										<h4 class="card-title"><b>INFORMACION CUOTAS</b></h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 text-center">
												<span>Monto Préstamo</span>
												<h3><span id="valorCuota" class="font-weight-bold">0</span></h3>
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-md-12 text-center">
												<span>No. Préstamo</span>
												<h6><span id="Interes"></span></h6>
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-md-12 text-center">
												<span>Plazo Préstamo</span>
												<h6><span id="montoTotal"></span></h6>
											</div>
										</div>
										<div class="row mt-2">
											<div class="col-md-12 text-center">
												<span>Tipo moneda</span>
												<h6><span id="montoTotal"></span></h6>
											</div>
										</div>
									</div>
									<!-- /.card-body -->
								</div>
								<div class="card card-danger">
									<div class="card-header">
										<h4 class="card-title"><b>PAGAR</b></h4>
									</div>
									<div class="card-body">
										<div class="form-row">
											<div class="form-group col-md-12 text-center">
												<label class="control-label">Monto Total</label>
												<div class="input-group">
													<input class="form-control text-center text-bold font-size-24" id="txtMonto" name="txtMonto" type="text" required placeholder="0.00" readonly>
												</div>
												<button id="btnActionForm" class="btn btn-block btn-success mt-4" type="submit"><span id="btnText"><b>PAGAR</b></span></button>
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

