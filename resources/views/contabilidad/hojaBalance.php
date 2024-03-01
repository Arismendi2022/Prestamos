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
							<li class="breadcrumb-item active">Hoja de Balance</li>
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
					<div class="col-sm-12">
						<div class="card card-info card-outline">
							<div class="col-sm-7">
								<div class="card-body">
									<div class="table-responsive">
										<table id="reports_table" class="table table-bordered table-hover dataTable no-footer" role="grid">
											<thead>
											<tr class="bg-gray-light" role="row">
												<th class="text-bold sorting_disabled" style="font-size: 22px; width: 757px;" rowspan="1" colspan="1">Hoja de Balance</th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 170px;"></th>
											</tr>
											</thead>
											<tbody>
											<tr role="row" class="odd">
												<td></td>
												<td style="text-align: right;"><b><?= date('jS M Y') ?></b></td>
											</tr>
											<tr role="row" class="even">
												<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #3D9970">Activos</td>
												<td></td>
											</tr>
											<tr role="row" class="odd">
												<td class="text-bold" style="padding-left: 50px; font-size: 14px;">Efectivo y Bancos</td>
												<td></td>
											</tr>
											<tr role="row" class="even">
												<td style="padding-left: 75px">Efectivo</td>
												<td class="text-right"><a style="color: #0c84ff"><?= SMONEY . ' ' . formatMoney($data['hojaBalance']['totalEfectivo']) ?></a></td>
											</tr>
											<tr role="row" class="odd">
												<td style="padding-left: 75px"><b>Total</b></td>
												<td class="text-right"><b><?= SMONEY . ' ' . formatMoney($data['hojaBalance']['totalEfectivo']) ?></b></td>
											</tr>
											<tr role="row" class="even">
												<td class="text-bold" style="padding-left: 50px; font-size: 14px;">Préstamos</td>
												<td></td>
											</tr>
											<tr role="row" class="odd">
												<td style="padding-left: 75px">Préstamos activos</td>
												<td class="text-right"><a style="color: #0c84ff"><?= SMONEY . ' ' . formatMoney($data['hojaBalance']['totalPrestamos']) ?></a></td>
											</tr>
											<tr class="bg-gray even" role="row">
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Total Activos
												</td>
												<td align="right" class="text-bold"
														style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= SMONEY . ' ' . formatMoney($data['hojaBalance']['totalActivos']) ?></td>
											</tr>
											<tr role="row" class="odd">
												<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #9c3328">Pasivos</td>
												<td></td>
											</tr>
											<tr class="even" role="row">
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000;">Total Pasivos</td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000">0</td>
											</tr>
											<tr role="row" class="odd">
												<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #9c3328">Patrimonio</td>
												<td></td>
											</tr>
											<tr role="row" class="even">
												<td style="padding-left: 75px">Patrimonio de la empresa</td>
												<td class="text-right"><a style="color: #0c84ff"><?= SMONEY . ' ' . formatMoney($data['hojaBalance']['totalCapital']) ?></a></td>
											</tr>
											<tr role="row" class="odd">
												<td style="padding-left: 75px">Ingreso Neto Después de Impuestos y Subsidios (Año en Curso)</td>
												<td class="text-right"><?= SMONEY . ' ' . formatMoney($data['hojaBalance']['totalInteres']) ?></td>
											</tr>
											<tr class="even" role="row">
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000;">Total Patrimonio</td>
												<td class="text-bold text-right"
														style="font-size: 15px; border-top: 1px solid #000"><?= SMONEY . ' ' . formatMoney($data['hojaBalance']['totalPatrimonio']) ?></td>
											</tr>
											<tr class="bg-gray odd" role="row">
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Total Pasivo +
													Total Patrimonio (Igual Total Activo)
												</td>
												<td align="right" class="text-bold"
														style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= SMONEY . ' ' . formatMoney($data['hojaBalance']['totalPatrimonio']) ?></td>
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

<?php footerAdmin($data); ?>