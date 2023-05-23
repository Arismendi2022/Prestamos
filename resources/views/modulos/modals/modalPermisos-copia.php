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
								<input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required="">
								<!-- /.card-header -->
								<div class="card-body table-responsive">
									<table class="table">
										<thead>
										<tr>
											<th>#</th>
											<th>Módulos</th>
											<th>Ver</th>
											<th>Crear</th>
											<th>Actualizar</th>
											<th>Eliminar</th>
										</tr>
										</thead>
										<tbody>
										<?php
											$no = 1;
											$modulos = $data['modulos'];
											for ($i = 0;
											     $i < count($modulos);
											     $i++) {
												
												$permisos = $modulos[$i]['permisos'];
												$rCheck = $permisos['r'] == 1 ? " checked " : "";
												$wCheck = $permisos['w'] == 1 ? " checked " : "";
												$uCheck = $permisos['u'] == 1 ? " checked " : "";
												$dCheck = $permisos['d'] == 1 ? " checked " : "";
												
												$idmod = $modulos[$i]['idmodulo'];
												?>
												<tr>
													<td>
														<?= $no; ?>
														<input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" required>
													</td>
													<td>
														<?= $modulos[$i]['titulo']; ?>
													</td>
													<td>
														<div class="form-check pl-0">
															<label>
																<input type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="sm" name="modulos[<?= $i; ?>][r]" <?= $rCheck ?>>
															</label>
														</div>
													</td>
													<td>
														<div class="form-check pl-0">
															<label>
																<input type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="sm" name="modulos[<?= $i; ?>][w]" <?= $wCheck ?>>
															</label>
														</div>
													</td>
													<td>
														<div class="form-check pl-0">
															<label>
																<input type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="sm" name="modulos[<?= $i; ?>][u]" <?= $uCheck ?>>
															</label>
														</div>
													</td>
													<td>
														<div class="form-check pl-0">
															<label>
																<input type="checkbox" data-toggle="toggle" data-onstyle="success" data-size="sm" name="modulos[<?= $i; ?>][d]" <?= $dCheck ?>>
															</label>
														</div>
													</td>
												</tr>
												<?php
													$no++;
												}
											?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
								<div class="text-center mb-3">
									<button class="btn btn-success mr-2" type="submit"><i class="fa fa-fw fa-lg fa-check-circle" aria-hidden="true"></i> Guardar</button>
									<button class="btn btn-danger ml-2" type="button" data-dismiss="modal"><i class="app-menu__icon fas fa-sign-out-alt"
									                                                                          aria-hidden="true"></i>Salir
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


<div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch=""></div>