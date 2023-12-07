<?php
	headerAdmin ($data);
	getModal('modalCartera', $data)
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<div class="input-group">
						<h1><i class="fa-solid fa-gauge"></i> <?= $data['page_title'] ?>
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
							<h3><?= SMONEY . ' ' . formatMoney ($data['prestamosActivos']) ?></h3
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
					<div class="small-box bg-success">
						<div class="inner">
							<div class="flex-container">
								<h3><?= SMONEY . ' ' . formatMoney ($data['pagosAnio']) ?></h3>
								<h3 class="float-right mr-4"><?= $data['pagosHoy'] ?></h3>
							</div>
							<div class="flex-container">
								<p>Total Pagos</p>
								<p class="float-right">Pagos Hoy</p>
							</div>
						</div>
						<div class="icon">
							<i class="fa-solid fa-chart-column mr-1"></i>
						</div>
						<a href="#" <?php if (!empty($_SESSION['permisos'][MPAGOS]['r'])) { ?> onclick="openModal();" <?php } ?>class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?= formatDecimal ($data['porcentajeRecaudo']) ?><sup style="font-size: 20px">%</sup></h3>
							
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
							<h3><?= SMONEY . ' ' . formatMoney ($data['saldoCaja']) ?></h3>
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
								<i class="fa-solid fa-chart-column mr-1"></i>
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
								<i class="fa-solid fa-chart-column mr-1"></i>
								Pagos año: <?= $data['totalPagos']['anio'] ?>
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
								<i class="fa-solid fa-chart-column mr-1"></i>
								Interes total por año <b> <?= SMONEY . ' ' . formatMoney ($data['totalInteres']['total']) ?> </b>
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
								<i class="fa-solid fa-chart-column mr-1"></i>
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
								<i class="fa-solid fa-chart-column mr-1"></i>
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
								<i class="fa-solid fa-chart-column mr-1"></i>
								Préstamos y Pagos año: <?= date('Y') ?>
							</h3>
							<div class="card-tools">
							</div>
						</div><!-- /.card-header -->
						<div class="card-body">
							<figure class="highcharts-figure">
								<div id="pagosPrestamos" style="width: 100%; height: 260px; margin: 0 auto"></div>
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

<?php footerAdmin ($data); ?>

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
						echo "['" . $mes['mes'] . "'," . $mes['pagos'] . "],";
					}
					?>
				],
			}
		],
	});
	
	/** Line Area */
	Highcharts.chart('interes', {
		chart: {
			zoomType: 'x'
		},
		title: {
			text: '',
			align: 'left'
		},
		subtitle: {
			text: '',
			align: 'left'
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
		
		legend: {
			enabled: false
		},
		plotOptions: {
			series: {
				dataLabels: {
					enabled: true,
					format: '{point.y:,0f}'
				},
				fillColor: {
					linearGradient: {
						x1: 1,
						y1: 1,
						x2: 1,
						y2: 1
					},
					stops: [
						[0, Highcharts.getOptions().colors[0]],
						[1, Highcharts.color(Highcharts.getOptions().colors[2]).setOpacity(0.3).get('rgba')],
					]
				},
				
				threshold: null,
				marker: {
					lineWidth: 2,
					lineColor: null,
					fillColor: 'white'
				}
			}
		},
		
		series: [{
			type: 'areaspline', // areaspline
			name: 'Interes',
			lineColor: Highcharts.getOptions().colors[1],
			data: [
				<?php
				foreach ($data['totalInteres']['meses'] as $mes) {
					echo $mes['interes'] . ",";
				}
				?>
			],
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
			height: '' + '40%'
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
			data: [<?= number_format ($data['saldoPrestamos'], 2) ?>],
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
				alpha: 3,
				beta: 12,
				depth: 60,
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
				depth: 25,
				dataLabels: {
					enabled: true,
					format: '{point.y:,0f}'
				},
				enableMouseTracking: true
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
	
	/** Donut */
	Highcharts.chart('pagosPrestamos', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: '',
			align: 'left'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				size: '110%',
				innerSize: '60%',
				borderRadius: 1,
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.2f} %'
				}
			}
		},
		colors: ['#fe6a35', '#00e272', '#d568fb'],
		
		series: [{
			name: 'Total',
			colorByPoint: true,
			data: [
				<?php
				foreach ($data['pagosPrestamos'] as $pagos) {
					echo "{name:'" . $pagos['nombre'] . "',y:" . $pagos['total'] . "},";
				}
				?>
			]
		}]
	});
	
	/** Añade algo de vida */
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
