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
						<h1><i class="fa-solid fa-file-signature"></i> <?= $data['page_title'] ?></h1>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
						<li class="breadcrumb-item active">Ingresos Diferidos</li>
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
						<div class="col-sm-12">
							<div class="card-body">
								<div class="table-responsive">
									<div class="table-responsive">
										<table id="reports_diferidos" class="table table-bordered table-hover dataTable no-footer" style="background: #FFF;" role="grid">
											<thead>
											<tr class="bg-gray-light" role="row"><th class="text-bold sorting_disabled" style="font-size: 22px; width: 550px;" rowspan="1" colspan="1">Ingresos
													Diferidos
											</th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 130px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 132
											.889px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 134.889px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 129.889px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 131.889px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 131.889px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 129.889px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 129.889px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 134.889px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 127.889px;"></th><th class="sorting_disabled" rowspan="1" colspan="1" style="width: 132.889px;"></th></tr>
											</thead>
											<tbody>
											<tr role="row" class="odd">
												<td></td>
												<td style="text-align: right;"><b>Ene</b></td>
												<td style="text-align: right;"><b>Feb</b></td>
												<td style="text-align: right;"><b>Mar</b></td>
												<td style="text-align: right;"><b>Abr</b></td>
												<td style="text-align: right;"><b>May</b></td>
												<td style="text-align: right;"><b>Jun</b></td>
												<td style="text-align: right;"><b>Jul</b></td>
												<td style="text-align: right;"><b>Ago</b></td>
												<td style="text-align: right;"><b>Sep</b></td>
												<td style="text-align: right;"><b>Oct</b></td>
												<td style="text-align: right;"><b>Nov</b></td>
												<td style="text-align: right;"><b>Dic</b></td>
											</tr><tr role="row" class="even">
												<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #00b226">Ingresos</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<tr role="row" class="even">
												<td style="padding-left: 40px">Reembolsos de capital del préstamo</td>
												<td class="text-right"><?= $data['ingresosDiferidos'][0]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][0]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][1]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][1]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][2]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][2]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][3]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][3]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][4]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][4]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][5]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][5]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][6]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][6]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][7]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][7]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][8]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][8]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][9]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][9]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][10]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][10]['Prestamos']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][11]['Prestamos'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][11]['Prestamos']) ?></td>
											</tr><tr role="row" class="odd">
												<td style="padding-left: 40px">Reembolso de intereses de préstamos</td>
												<td class="text-right"><?= $data['ingresosDiferidos'][0]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][0]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][1]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][1]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][2]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][2]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][3]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][3]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][4]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][4]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][5]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][5]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][6]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][6]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][7]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][7]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][8]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][8]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][9]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][9]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][10]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][10]['Intereses']) ?></td>
												<td class="text-right"><?= $data['ingresosDiferidos'][11]['Intereses'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][11]['Intereses']) ?></td>
												<td class="text-right"></td>
											</tr>
											<tr class="even" role="row">
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000; color: #00b226">Total de ingresos (A)</td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][0]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][0]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][1]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][1]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][2]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][2]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][3]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][3]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][4]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][4]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][5]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][5]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][6]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][6]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][7]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][7]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][8]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][8]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][9]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][9]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][10]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][10]['Total']) ?></td>
												<td class="text-bold text-right" style="font-size: 15px; border-top: 1px solid #000"><?= $data['ingresosDiferidos'][11]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][11]['Total']) ?></td>
											</tr>
											<tr role="row" class="odd">
											</tr>
											<tr class="odd" role="row">
												<td></td>
											</tr>
											<tr class="bg-gray even" role="row">
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Saldo total de efectivo (A)</td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][0]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][0]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][1]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][1]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][2]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][2]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][3]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][3]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][4]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][4]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][5]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][5]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][6]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][6]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][7]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][7]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][8]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][8]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][9]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][9]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][10]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][10]['Total']) ?></td>
												<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['ingresosDiferidos'][11]['Total'] == '0' ? '' : formatMoney($data['ingresosDiferidos'][11]['Total']) ?></td>
											</tr>
											</tbody>
										</table>
									</div>
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
