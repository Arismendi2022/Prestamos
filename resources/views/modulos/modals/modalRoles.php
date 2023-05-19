<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tile">
					<div class="tile-body">
						<form id="formRol" name="formRol">
							<input type="hidden" id="idRol" name="idRol" value="">
							<div class="form-group">
								<label class="control-label">Nombre</label>
								<input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del rol" required>
							</div>
							<div class="form-group">
								<label class="control-label">Descripción</label>
								<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del rol" required></textarea>
							</div>
							<div class="form-group">
								<label for="exampleSelect1">Estado</label>
								<select class="form-control" id="listStatus" name="listStatus" required="">
									<option value="1">Activo</option>
									<option value="2">Inactivo</option>
								</select>
							</div>
							<div class="tile-footer">
								<button id="btnActionForm" class="btn btn-primary" type="submit"><i
										class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span>
								</button>&nbsp;&nbsp;&nbsp;
								<a class="btn btn-danger" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Extra large modal -->
<div class="modal fade modalPermisos" tabindex=" -1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 class="modal-title">Permisos Roles de Usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- /.row -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<!-- /.form -->
							<form action="" id="formPermisos" name="formPermisos">
								<!-- /.card-header -->
								<div class="card-body table-responsive">
									<table class="table">
										<thead>
										<tr>
											<th>#</th>
											<th>Módulos</th>
											<th>Leer</th>
											<th>Escribir</th>
											<th>Actualizar</th>
											<th>Eliminar</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td>Usuarios</td>
											<td>
												<div class="form-check">
													<input type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="sm">
												</div>
											</td>
											<td>
												<div class="form-check">
													<input type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="sm">
												</div>
											</td>
											<td>
												<div class="form-check">
													<input type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="sm">
												</div>
											</td>
											<td>
												<div class="form-check">
													<input type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="sm">
												</div>
											</td>
											<td>
												<div class="form-check">
													<input type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="sm">
												</div>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
								<div class="text-center">
									<button class="btn btn-success my-4" type="submit"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i> Guardar</button>
									<button class="btn btn-danger ml-2" type="button" data-dismiss="modal"><i class="app-menu__icon fas fa-sign-out-alt" aria-hidden="true"></i>Salir
									</button>
								</div>
							</form>
							<!-- /.form -->
						</div>
						<!-- /.card-->
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.modal-body -->
		</div>
	</div>
</div>

	
	
	
	
	
	
	
	
	
