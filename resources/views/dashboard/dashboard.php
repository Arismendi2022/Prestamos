<?php headerAdmin($data); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<div class="input-group">
						<h1><i class="fa-solid fa-gauge mr-1"></i><?= $data['page_title'] ?>
						</h1>
					</div>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= ROOT ?>/dashboard">Inicio</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?= SMONEY . ' ' . formatMoney($data['prestamosActivos']) ?></h3
							<p>Préstamos Activos</p>
						</div>
						<div class="icon">
							<i class="ion ion-cash"></i>
						</div>
						<a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<div class="flex-container">
								<h3><?= SMONEY . ' ' . formatMoney($data['pagosAnio']) ?></h3>
								<h3 class="float-right mr-4"><?= $data['pagosHoy'] ?></h3>
							</div>
							<div class="flex-container">
								<p>Total Pagos</p>
								<p class="float-right">Pagos Hoy</p>
							</div>
						</div>
						<div class="icon">
							<i class="ion ion-pie-graph"></i>
						</div>
						<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?= formatDecimal($data['porcentajeRecaudo']) ?><sup style="font-size: 20px">%</sup></h3>
							
							<p>Porcentaje de Recaudo</p>
						</div>
						<div class="icon">
							<i class="ion ion-trophy"></i>
						</div>
						<a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?= SMONEY . ' ' . formatMoney($data['saldoCaja']) ?></h3>
							<p>Saldo en Caja</p>
						</div>
						<div class="icon">
							<i class="ion ion-archive"></i>
						</div>
						<a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
			<!-- Graficos -->
			<div class="row">
				<div class="col-md-6">
					<!-- PIE CHART -->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-chart-pie mr-1"></i>
								Prestamos Activos
							</h3>
							<div class="card-tools">
							</div>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div id="prestamosActivos" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></div>
						</div>
			      <!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col (LEFT) -->
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas far fa-chart-bar mr-1"></i>
								Pagos por Mes
							</h3>
						</div>
						<div class="card-body">
							<div id="pagosMes" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col (RIGHT) -->
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php footerAdmin($data); ?>

<script>
	
	/** Pie chart 3D **/
	Highcharts.chart('prestamosActivos', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: '',
			align: 'center'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				}
			}
		},
		series: [{
			name: 'Prestamo',
			colorByPoint: true,
			data: [
				<?php
				foreach ($data['chartPrestamos'] AS $pagos){
				echo "{name:'".$pagos['nombre']."',y:".$pagos['total']."},";
				}
				?>
				]
		}]
	});
	
	/** Columnas **/
	Highcharts.chart('pagosMes', {
		chart: {
			type: 'column'
		},
		title: {
			align: 'left',
			text: ''
		},
		subtitle: {
			align: 'left',
			text: ''
		},
		accessibility: {
			announceNewData: {
				enabled: true
			}
		},
		xAxis: {
			type: 'category'
		},
		yAxis: {
			title: {
				text: ''
			}
			
		},
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				borderWidth: 0,
				dataLabels: {
					enabled: true,
					format: '{point.y:,0f}'
				}
			}
		},
		
		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,0f}</b> total<br/>'
		},
		
		series: [
			{
				name: 'Pagos',
				colorByPoint: true,
				data: [
					<?php
					foreach ($data['chartPagos']['meses'] as $mes) {
						echo "['".$mes['mes']."',".formatMoney($mes['pagos'])."],";
					}
					?>
				],
			}
		],
	});
	
	/** Speedometer */

</script>

