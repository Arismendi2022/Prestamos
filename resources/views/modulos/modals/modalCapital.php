<!-- Modal -->
<div class="modal fade" id="modalFormCapital" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal" role="document">
		<div class="modal-content">
			<div class="modal-header headerRegister">
				<h5 class="modal-title" id="titleModal">Agregar Capital</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="tile">
					<div class="tile-body">
						<form id="formCapital" name="formCapital">
							<input type="hidden" id="idCapital" name="idCapital" value="">
							<div class="form-group">
								<!-- Date -->
								<div class="form-group">
									<label>Fecha</label>
									<div class="input-group date" id="reservaFecha" data-target-input="nearest">
										<input type="text" id="txtFecha" name="txtFecha" class="form-control datetimepicker-input" data-target="#reservaFecha" placeholder="dd/mm/yyyy"
													 required>
										<div class="input-group-append" data-target="#reservaFecha" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa-solid fa-calendar"></i></div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Monto</label>
								<input class="form-control" id="txtMonto" name="txtMonto" type="text" oninput="formatoMillares(this)" placeholder="0,00" required>
							</div>
							<div class="form-group">
								<label class="control-label">Descripción</label>
								<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción" required></textarea>
							</div>
							<div class="form-group">
								<label for="exampleSelect1">Cuentas</label>
								<select class="form-control select2" id="listCuentas" name="listCuentas" required="">
									<option value="Efectivo">Efectivo</option>
									<option value="Banco">Banco</option>
								</select>
							</div>
							<div class="tile-footer">
								<button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span>
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














