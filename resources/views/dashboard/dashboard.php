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
						<a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
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
					<div class="card card-lime card-outline">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-chart-pie mr-1"></i>
								Prestamos Activos
							</h3>
							<div class="card-tools">
							</div>
						</div><!-- /.card-header -->
						<div class="card-body">
							<figure class="highcharts-figure">
								<div id="prestamosActivos" style="width: 100%; height: 260px; margin: 0 auto"></div>
							</figure>
						</div>
						      <!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col (LEFT) -->
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-orange card-outline">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas far fa-chart-bar mr-1"></i>
								Pagos por Mes
							</h3>
						</div>
						<div class="card-body">
							<figure class="highcharts-figure">
								<div id="pagosMes" style="width: 100%; height: 260px; margin: 0 auto"></div>
							</figure>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col (RIGHT) -->
			</div>
			<div class="row">
				<div class="col-md-6">
					<!-- LINE CHART -->
					<div class="card card-success card-outline">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-chart-line mr-1"></i>
								Interes total por año <b> <?= SMONEY . ' ' . formatMoney($data['totalInteres']['total']) ?> </b>
							</h3>
							<div class="card-tools">
							</div>
						</div><!-- /.card-header -->
						<div class="card-body">
							<figure class="highcharts-figure">
								<div id="interes" style="width: 100%; height: 260px; margin: 0 auto"></div>
							</figure>
						</div>
						      <!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col (LEFT) -->
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-primary card-outline">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas far fa-chart-bar mr-1"></i>
								Capital Préstado
							</h3>
						</div>
						<div class="card-body">
							<figure class="highcharts-figure">
								<div id="capitalPrestado" style="width: 100%; height: 260px; margin: 0 auto"></div>
							</figure>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col (RIGHT) -->
			</div>
			<div class="row">
				<div class="col-md-6">
					<!-- LINE CHART -->
					<div class="card card-indigo card-outline">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-chart-line mr-1"></i>
								Montos Prestados año: <?= $data['montosPrestados']['anio'] ?>
							</h3>
							<div class="card-tools">
							</div>
						</div><!-- /.card-header -->
						<div class="card-body">
							<figure class="highcharts-figure">
								<div id="montoPrestado" style="width: 100%; height: 260px; margin: 0 auto"></div>
							</figure>
						</div>
						      <!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col (LEFT) -->
				<div class="col-md-6">
					<!-- LINE CHART -->
					<div class="card card-olive card-outline">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-chart-line mr-1"></i>
								Rentabilidad
							</h3>
							<div class="card-tools">
							</div>
						</div><!-- /.card-header -->
						<div class="card-body">
							<figure class="highcharts-figure">
								<div id="container" style="width: 100%; height: 260px;"></div>
							</figure>
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
	
	/** Pie chart **/
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
				foreach ($data['totalPrestamos'] as $pagos) {
					echo "{name:'" . $pagos['nombre'] . "',y:" . $pagos['total'] . "},";
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
					foreach ($data['totalPagos']['meses'] as $mes) {
						echo "['" . $mes['mes'] . "'," . formatMoney($mes['pagos']) . "],";
					}
					?>
				],
			}
		],
	});
	
	/** Line */
	Highcharts.chart('interes', {
		chart: {
			type: 'line'
		},
		title: {
			text: ''
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			categories: [
				<?php
				foreach ($data['totalInteres']['meses'] as $mes) {
					echo "'" . $mes['mes'] . "',";
				}
				?>
			]
		},
		yAxis: {
			title: {
				text: ''
			}
		},
		plotOptions: {
			line: {
				dataLabels: {
					enabled: true
				},
				enableMouseTracking: false
			}
		},
		series: [{
			name: '',
			data: [
				<?php
				foreach ($data['totalInteres']['meses'] as $mes) {
					echo $mes['interes'] . ",";
				}
				?>
			]
		}]
	});
	
	/** GAUGE */
	Highcharts.chart('capitalPrestado', {
		
		chart: {
			type: 'gauge',
			plotBackgroundColor: null,
			plotBackgroundImage: null,
			plotBorderWidth: 0,
			plotShadow: false,
			height: '' +
				'40%'
		},
		
		title: {
			text: ''
		},
		
		pane: {
			startAngle: -90,
			endAngle: 89.9,
			background: null,
			center: ['50%', '75%'],
			size: '120%'
		},
		
		// the value axi
		yAxis: {
			min: 0,
			max: 100,
			tickPixelInterval: 72,
			tickPosition: 'inside',
			tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
			tickLength: 20,
			tickWidth: 2,
			minorTickInterval: null,
			labels: {
				distance: 20,
				style: {
					fontSize: '14px'
				}
			},
			lineWidth: 0,
			plotBands: [{
				from: 0,
				to: 60,
				color: '#55BF3B', // green
				thickness: 20
			}, {
				from: 60,
				to: 80,
				color: '#DDDF0D', // yellow
				thickness: 20
			}, {
				from: 80,
				to: 100,
				color: '#DF5353', // red
				thickness: 20
			}]
		},
		
		series: [{
			name: 'Préstamos',
			data: [<?= number_format($data['saldoPrestamos'], 2) ?>],
			tooltip: {
				valueSuffix: ' %'
			},
			dataLabels: {
				format: '{y} %',
				borderWidth: 0,
				color: (
					Highcharts.defaultOptions.title &&
					Highcharts.defaultOptions.title.style &&
					Highcharts.defaultOptions.title.style.color
				) || '#333333',
				style: {
					fontSize: '16px'
				}
			},
			dial: {
				radius: '80%',
				backgroundColor: 'gray',
				baseWidth: 12,
				baseLength: '0%',
				rearLength: '0%'
			},
			pivot: {
				backgroundColor: 'gray',
				radius: 6
			}
			
		}]
	});
	
	/** Columnas 3D */
	const chart = new Highcharts.Chart({
		chart: {
			renderTo: 'montoPrestado',
			type: 'column',
			options3d: {
				enabled: true,
				alpha: 5,
				beta: 12,
				depth: 50,
				viewDistance: 25
			}
		},
		xAxis: {
			type: 'category',
			labels: {
				rotation: 0,
				style: {
					fontSize: '12px',
					fontFamily: 'Verdana, sans-serif'
				}
			}
		},
		yAxis: {
			title: {
				enabled: false
			}
		},
		tooltip: {
			headerFormat: '<b>{point.key}</b><br>',
			pointFormat: 'Préstamos: ${point.y}'
		},
		title: {
			text: '',
			align: 'left'
		},
		subtitle: {
			text: '',
			align: 'left'
		},
		legend: {
			enabled: false
		},
		plotOptions: {
			column: {
				depth: 25
			}
		},
		series: [{
			name: 'Préstamos',
			data: [
				<?php
				foreach ($data['montosPrestados']['meses'] as $mes) {
					echo "['" . $mes['mes'] . "'," . $mes['total'] . "],";
				}
				?>
			],
			colorByPoint: true,
		}],
		
	});
	
	// Add some life
	setInterval(() => {
		const chart = Highcharts.charts[0];
		if (chart && !chart.renderer.forExport) {
			const point = chart.series[0].points[0],
				inc = Math.round((Math.random() - 0.5) * 20);
			
			let newVal = point.y + inc;
			if (newVal < 0 || newVal > 200) {
				newVal = point.y - inc;
			}
			
			point.update(newVal);
		}
		
	}, 3000);

</script>

