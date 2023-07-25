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

<!-- Modal info Prestamos-->
<div class="modal fade" id="modalViewLoan" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalCenterTitle">Detalle Préstamo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card">
					<div class="card-header with-border">
						<div class="row">
							<div class="col-sm-7">
								<div class="user-block">
									<img class="img-circle" src="<?= ROOT ?>/admin/dist/img/face_image_placeholder.png">
									<span id="celNombre" class="username"> Arismendi Guiza </span>
									<span id="celIdentificacion" class="description" style="font-size:13px; color:#000000">79425387<br></span>
								</div><!-- /.user-block -->
							</div><!-- /.col -->
							<div class="col-sm-5">
								<ul class="list-unstyled">
									<li class="float-right"><b>Email: </b><span id="celEmail" style="color: blue;">Arismendi.Guiza@yahoo.com</span>
									</li>
								</ul>
							</div>
						</div><!-- /.row -->
						<div class="row">
							<div class="col-sm-4">
								<div class="user-block">
	                  <span class="description" style="font-size:13px; color:#000000">
		                  <p><br>Fecha Creado: <span id="celFechaRegistro"> 25/07/2023</span><br></p>
	                  </span>
								</div><!-- /.user-block -->
							</div><!-- /.col -->
							<div class="col-sm-4">
								<ul class="list-unstyled">
									<li class="float-center"><b>Ciudad:</b> Bogotá</li>
								</ul>
							</div>
							<div class="col-sm-4">
								<ul class="list-unstyled">
									<li class="float-right"><b>Telefono: </b><span id="celTelefono"> 350-847-3667</span></li>
								</ul>
							</div>
						</div><!-- /.row -->
					</div>
				</div><!-- /.card -->
				<div class="card card-outline card-info">
					<div class="card-header with-border">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive">
									<div class="clearfix mb-2">
										<div class="float-left">
											<a>Monto Credito: <span id="celMontoCredito" style="color: blue;"> 105,000</span></a><br>
											<a>Total Interes: <span id="celTotalIntereses" style="color: blue;"> 20.000</span></a><br>
											<a>Total a Pagar: <span id="celMontoTotal" style="color: blue;"> 125.000</span></a><br>
											<a>Interes Anual: <span id="celInteres"> 24 %</span></a>
											<!--Monto cuota: 11,025 <br>-->
										</div>
										<div class="float-right">
											<a>Fecha Credito: <span id="celFechaCredito"> 25/07/2023</span></a><br>
											<a>Forma Pago: <span id="celFormaPago"> Mensual</span></a><br>
											<a>Nro Cuotas: <span id="celnroCuotas"> 10</span></a>
											<!--Estado Credito: Pendiente-->
										</div>
									</div>
									<div class="table-responsive">
										<table id="tableViewCotas" class="table table-striped table-bordered table-sm w-100">
											<thead>
											<tr class="active" style="background-color: #F2F8FF">
												<th>Nro Cuota</th>
												<th class="col-xs-2">Fecha Pago</th>
												<th class="col-xs-2 text-right">Total pagar</th>
												<th class="col-xs-2 text-center">Estado</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>1</td>
												<td>2023-05-01</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Cancelado</td>
											</tr>
											<tr>
												<td>2</td>
												<td>2023-05-08</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Cancelado</td>
											</tr>
											<tr>
												<td>3</td>
												<td>2023-05-15</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Cancelado</td>
											</tr>
											<tr>
												<td>4</td>
												<td>2023-05-22</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Cancelado</td>
											</tr>
											<tr>
												<td>5</td>
												<td>2023-05-29</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Cancelado</td>
											</tr>
											<tr>
												<td>6</td>
												<td>2023-06-05</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Cancelado</td>
											</tr>
											<tr>
												<td>7</td>
												<td>2023-06-12</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Cancelado</td>
											</tr>
											<tr>
												<td>8</td>
												<td>2023-06-19</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Cancelado</td>
											</tr>
											<tr>
												<td>9</td>
												<td>2023-06-26</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Cancelado</td>
											</tr>
											<tr>
												<td>10</td>
												<td>2023-07-03</td>
												<td class="text-right">11,025</td>
												<td class="text-center">Pendiente</td>
											</tr>
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
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>







