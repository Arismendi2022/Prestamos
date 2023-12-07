<!-- Modal -->
<div class="modal fade" id="modalFormCartera" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalCenterTitle">Cartera por Recaudar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<?php if (!empty($_SESSION['permisos'][MPAGOS]['r'])) { ?>
						<table class="table table-striped table-bordered">
							<thead>
							<tr>
								<th># Préstamo</th>
								<th style="width: 250px">Cliente</th>
								<th class="text-center">Fecha Pago</th>
								<th class="text-center">Nro Cuota</th>
								<th class="text-right">Valor Cuota</th>
							</tr>
							</thead>
							<tbody>
							<?php
								if (count ($data['pagosCartera']) > 0) {
									foreach ($data['pagosCartera'] as $pagos) {
										?>
										<tr>
											<td><?= $pagos['nro_prestamo'] ?></td>
											<td><?= $pagos['cliente'] ?></td>
											<td class="text-center"><?= $pagos['fecha_cuota'] ?></td>
											<td class="text-center"><?= $pagos['nro_cuota'] ?></td>
											<td class="text-right"><?= SMONEY . formatMoney ($pagos['valor_cuota']) ?></td>
										</tr>
									<?php }
								} ?>
							</tbody>
						</table>
					<?php } ?>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa-solid fa-circle-xmark"></i> Cerrar</button>
			</div>
		</div>
	</div>
</div>

