<?php
	headerAdmin($data);
?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<div class="input-group">
							<h1><i class="fa-solid fa-scale-unbalanced-flip"></i> <?= $data['page_title'] ?></h1>
						</div>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
							<li class="breadcrumb-item active">Ganancias / Pérdidas</li>
						</ol>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->
		
		<!-- Main content -->
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-info card-outline">
							<div class="col-sm-7">
								<div class="card-body">
									<div class="table-responsive">
										<table id="reports_table" class="table table-bordered table-hover">
											<thead>
											<tr class="bg-gray-light">
												<th class="text-bold" style="font-size: 22px;">Ganancias y Pérdidas</th>
												<th></th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td></td>
												<td style="text-align: right;"><b><?= date("jS M Y",strtotime('first day of January '.date('Y'))) ?></b> - <b><?= date('jS M Y') ?></b></td>
											</tr>
											<tr>
												<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #3D9970">Ganancias</td>
												<td></td>
											</tr>
											<tr>
												<td class="text-bold" style="padding-left: 50px; font-size: 14px;">Ingresos por préstamos</td>
												<td></td>
											</tr>
											<tr>
												<td style="padding-left: 75px">Intereses sobre préstamos</td>
												<td class="text-right"><a href="" target="_blank"><?= $data['utilidad']['ingresos'] == '0' ? '' : SMONEY.' '.formatMoney($data['utilidad']['ingresos']) ?></a></td>
											</tr>
											<tr class="">
												<td class="text-bold" style="padding-left: 50px; font-size: 15px;">Total Ingresos</td>
												<td class="text-bold text-right" style="font-size: 15px;"><?= $data['utilidad']['ingresos'] == '0' ? '' : SMONEY.' '.formatMoney($data['utilidad']['ingresos']) ?></td>
											</tr>
											<tr>
												<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #9c3328">Gastos</td>
												<td></td>
											</tr>
											<!--<tr>
												<td class="text-bold" style="padding-left: 50px; font-size: 14px;">Gastos varios</td>
												<td></td>
											</tr>
											<tr>
												<td style="padding-left: 75px">Seguro</td>
												<td class="text-right"><a href="" target="_blank">4,00</a></td>
											</tr>-->
											<tr class="">
												<td class="text-bold" style="padding-left: 50px; font-size: 15px;">Total Gastos</td>
												<td class="text-bold text-right" style="font-size: 15px;"><?= $data['utilidad']['gastos'] == '0' ? '' : SMONEY.' '.formatMoney($data['utilidad']['gastos']) ?></td>
											</tr>
											<tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Utilidad
													operativa neta
												</td>
												<td align="right" class="text-bold"
														style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['utilidad']['utilidadOperativa'] == '0' ? '' : SMONEY.' '.formatMoney($data['utilidad']['utilidadOperativa']) ?></td>
											</tr>
											<tr>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Utilidad neta
													antes de impuestos
												</td>
												<td align="right" class="text-bold"
														style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['utilidad']['utilidadOperativa'] == '0' ? '' : SMONEY.' '.formatMoney($data['utilidad']['utilidadOperativa']) ?></td>
											</tr>
											<tr>
												<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #000000">Impuestos</td>
												<td></td>
											</tr>
											<tr>
												<td style="padding-left: 75px">Total Impuesto a la Renta</td>
												<td class="text-right"><?= $data['utilidad']['impuestos'] == '0' ? '' : SMONEY.' '.formatMoney($data['utilidad']['impuestos']) ?></td>
											</tr>
											<tr class="bg-gray">
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Utilidad neta
													después de impuestos
												</td>
												<td align="right" class="text-bold"
														style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['utilidad']['utilidadNeta'] == '0' ? '' : SMONEY.' '.formatMoney($data['utilidad']['utilidadNeta']) ?></td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
								<!-- /.card-body -->
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

<?php footerAdmin($data); ?><?php
