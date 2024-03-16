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
						<li class="breadcrumb-item active">Flujo de caja</li>
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
									<table id="reports_table" class="table table-bordered table-hover dataTable no-footer" style="background: #FFF;" role="grid">
										<thead>
										<tr class="bg-gray-light" role="row">
											<th class="text-bold sorting_disabled" style="font-size: 22px; width: 562px;" rowspan="1" colspan="1">Estado de Flujo de Efectivo</th>
											<th class="sorting_disabled" rowspan="1" colspan="1" style="width: 364px;"></th>
										</tr>
										</thead>
										<tbody>
										<tr role="row" class="odd">
											<td></td>
											<td style="text-align: right;"><b><?= date("jS M Y",strtotime('first day of January '.date('Y'))) ?></b> - <b><?= date('jS M Y') ?></b></td>
										</tr>
										<tr role="row" class="even">
											<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #00b226">Ingresos</td>
											<td></td>
										</tr>
										<tr role="row" class="odd">
											<td style="padding-left: 75px">Capital de la empresa</td>
											<td class="text-right"><?= $data['flujoCaja']['totalCapital'] == '0' ? '' : formatMoney($data['flujoCaja']['totalCapital']) ?></td>
										</tr>
										<tr role="row" class="even">
											<td style="padding-left: 75px">Reembolso de préstamos</td>
											<td class="text-right"><?= $data['flujoCaja']['totalAbonos'] == '0' ? '' : formatMoney($data['flujoCaja']['totalAbonos']) ?></td>
										</tr>
										<tr role="row" class="odd">
											<td style="padding-left: 75px">Reembolso de intereses sobre préstamos</td>
											<td class="text-right"><?= $data['flujoCaja']['totalInteres'] == '0' ? '' : formatMoney($data['flujoCaja']['totalInteres']) ?></td>
										</tr>
										<tr class="even" role="row">
											<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000; color: #00b226">Total de Ingresos (A)</td>
											<td class="text-bold text-right"
											    style="font-size: 15px; border-top: 1px solid #000"><?= $data['flujoCaja']['totalIngresos'] == '0' ? '' : formatMoney($data['flujoCaja']['totalIngresos']) ?></td>
										</tr>
										<tr role="row" class="odd">
											<td class="text-bold" style="padding-left: 25px; font-size: 18px; color: #ff2d00">Pagos</td>
											<td></td>
										</tr>
										<tr role="row" class="even">
											<td style="padding-left: 75px">Préstamos liberados (principal)</td>
											<td class="text-right"><?= $data['flujoCaja']['totalPrestamos'] == '0' ? '' : formatMoney($data['flujoCaja']['totalPrestamos']) ?></td>
										</tr>
										<tr class="odd" role="row">
											<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000; color: #ff2d00">Pagos Totales (B)</td>
											<td class="text-bold text-right"
											    style="font-size: 15px; border-top: 1px solid #000"><?= $data['flujoCaja']['totalPrestamos'] == '0' ? '' : formatMoney($data['flujoCaja']['totalPrestamos']) ?></td>
										</tr>
										<tr class="bg-gray even" role="row">
											<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000">Saldo Total de
												Efectivo (A) - (B)
											</td>
											<td align="right" class="text-bold"
											    style="font-size: 15px; border-top: 1px solid #000000; border-bottom: 1px solid #000000"><?= $data['flujoCaja']['balanceEfectivo'] == '0' ? '' : formatMoney($data['flujoCaja']['balanceEfectivo']) ?></td>
										</tr>
										<tr class="odd" role="row">
											<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000;">Balance anterior</td>
											<td class="text-right" style="font-size: 15px; border-top: 1px solid #000">Balance
												a <?= date('d/m/Y',strtotime('last day of December '.(date('Y') - 1))); ?>
												<br><b><?= $data['flujoCaja']['balanceAnterior'] == '0' ? '' : formatMoney($data['flujoCaja']['balanceAnterior']) ?></b></td>
										</tr>
										<tr class="even" role="row">
											<td class="text-bold" style="padding-left: 25px; font-size: 15px; border-top: 1px solid #000;">Total Balance</td>
											<td class="text-right" style="font-size: 15px; border-top: 1px solid #000">Balance a <?= date('d/m/Y') ?>
												<br><b><?= $data['flujoCaja']['totalBalance'] == '0' ? '' : formatMoney($data['flujoCaja']['totalBalance']) ?></b></td>
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



