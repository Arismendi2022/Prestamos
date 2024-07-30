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
										<table id="reports_diferidos" class="table table-bordered dataTable no-footer" style="background: #FFF;" role="grid">
											<thead>
											<tr class="bg-gray-light" role="row">
												<th class="text-bold sorting_disabled" style="font-size: 22px; width: 550px;" rowspan="1" colspan="1">Ingresos Diferidos
												</th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 130px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 132.889px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 134.889px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 129.889px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 131.889px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 131.889px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 129.889px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 129.889px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 134.889px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 127.889px;"></th>
												<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 132.889px;"></th>
											</tr>
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
											</tr>
											<tr role="row" class="even">
												<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #00b226">Ingresos</td>
												<td></td>
											</tr>
											<tr role="row" class="even">
												<td style="padding-left: 50px">Reembolsos de capital del préstamo</td>
												<?php foreach($data['ingresosDiferidos'] as $row): ?>
													<td class="text-right">
														<?= $row['Prestamos'] == '0' ? '' : formatMoney($row['Prestamos']) ?>
													</td>
												<?php endforeach; ?>
											</tr>
											<tr role="row" class="odd">
												<td style="padding-left: 50px">Reembolso de intereses de préstamos</td>
												<?php foreach($data['ingresosDiferidos'] as $row): ?>
													<td class="text-right">
														<?= $row['Intereses'] == '0' ? '' : formatMoney($row['Intereses']) ?>
													</td>
												<?php endforeach; ?>
											</tr>
											<tr class="even" role="row">
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000; color: #00b226">Total de ingresos (A)</td>
												<?php foreach($data['ingresosDiferidos'] as $row): ?>
													<td class="text-bold text-right" style="font-size: 14px; border-top: 1px solid #000">
														<?= $row['Total'] == '0' ? '' : formatMoney($row['Total']) ?>
													</td>
												<?php endforeach; ?>
											</tr>
											<tr role="row" class="odd">
											</tr>
											<tr class="odd" role="row">
												<td></td>
												<td></td>
											</tr>
											<tr class="bg-gray even" role="row">
												<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Saldo total (A)
												</td>
												<?php foreach($data['ingresosDiferidos'] as $row): ?>
													<td align="right" class="text-bold" style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">
														<?= $row['Total'] == '0' ? '' : formatMoney($row['Total']) ?>
													</td>
												<?php endforeach; ?>
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
