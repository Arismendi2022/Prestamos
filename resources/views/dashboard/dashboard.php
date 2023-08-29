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
			<!-- Main row -->
			<!-- Custom tabs (Charts with tabs)-->
			<div class="row">
				<!-- Left col -->
				<section class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-chart-pie mr-1"></i>
								Ventas
							</h3>
							<div class="card-tools">
								<ul class="nav nav-pills ml-auto">
									<li class="nav-item">
										<a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
									</li>
								</ul>
							</div>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content p-0">
								<!-- Morris chart - Sales -->
								<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 390px;">
									<div id="prestamosMes"></div>
								</div>
								<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 390px;">
									<div id="pagosMes"></div>
								</div>
							</div>
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</section>
				<!-- /.Left col -->
				<section class="col-lg-6">
					<!-- /.right col -->
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas far fa-chart-bar mr-1"></i>
								Pagos
							</h3>
						</div>
						<div class="card-body">
							<div id="graficoAnio"></div>
						</div>
						<!-- /.card-body -->
					</div>
				</section>
			</div>
			<!-- /.row (main row) -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php footerAdmin($data); ?>

<script>
	/** AREA **/
	Highcharts.chart('prestamosMes', {
		chart: {
			type: 'area'
		},
		accessibility: {
			description: 'Image description: An area chart compares the nuclear stockpiles of the USA and the USSR/Russia between 1945 and 2017. The number of nuclear weapons is plotted on the Y-axis and the years on the X-axis. The chart is interactive, and the year-on-year stockpile levels can be traced for each country. The US has a stockpile of 6 nuclear weapons at the dawn of the nuclear age in 1945. This number has gradually increased to 369 by 1950 when the USSR enters the arms race with 6 weapons. At this point, the US starts to rapidly build its stockpile culminating in 32,040 warheads by 1966 compared to the USSR’s 7,089. From this peak in 1966, the US stockpile gradually decreases as the USSR’s stockpile expands. By 1978 the USSR has closed the nuclear gap at 25,393. The USSR stockpile continues to grow until it reaches a peak of 45,000 in 1986 compared to the US arsenal of 24,401. From 1986, the nuclear stockpiles of both countries start to fall. By 2000, the numbers have fallen to 10,577 and 21,000 for the US and Russia, respectively. The decreases continue until 2017 at which point the US holds 4,018 weapons compared to Russia’s 4,500.'
		},
		title: {
			text: 'US and USSR nuclear stockpiles'
		},
		subtitle: {
			text: 'Source: <a href="https://fas.org/issues/nuclear-weapons/status-world-nuclear-forces/" ' +
				'target="_blank">FAS</a>'
		},
		xAxis: {
			allowDecimals: false,
			accessibility: {
				rangeDescription: 'Range: 1940 to 2017.'
			}
		},
		yAxis: {
			title: {
				text: 'Nuclear weapon states'
			}
		},
		tooltip: {
			pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
		},
		plotOptions: {
			area: {
				pointStart: 1940,
				marker: {
					enabled: false,
					symbol: 'circle',
					radius: 2,
					states: {
						hover: {
							enabled: true
						}
					}
				}
			}
		},
		series: [{
			name: 'USA',
			data: [
				null, null, null, null, null, 2, 9, 13, 50, 170, 299, 438, 841,
				1169, 1703, 2422, 3692, 5543, 7345, 12298, 18638, 22229, 25540,
				28133, 29463, 31139, 31175, 31255, 29561, 27552, 26008, 25830,
				26516, 27835, 28537, 27519, 25914, 25542, 24418, 24138, 24104,
				23208, 22886, 23305, 23459, 23368, 23317, 23575, 23205, 22217,
				21392, 19008, 13708, 11511, 10979, 10904, 11011, 10903, 10732,
				10685, 10577, 10526, 10457, 10027, 8570, 8360, 7853, 5709, 5273,
				5113, 5066, 4897, 4881, 4804, 4717, 4571, 4018, 3822, 3785, 3805,
				3750, 3708, 3708
			]
		}, {
			name: 'USSR/Russia',
			data: [null, null, null, null, null, null, null, null, null,
				1, 5, 25, 50, 120, 150, 200, 426, 660, 863, 1048, 1627, 2492,
				3346, 4259, 5242, 6144, 7091, 8400, 9490, 10671, 11736, 13279,
				14600, 15878, 17286, 19235, 22165, 24281, 26169, 28258, 30665,
				32146, 33486, 35130, 36825, 38582, 40159, 38107, 36538, 35078,
				32980, 29154, 26734, 24403, 21339, 18179, 15942, 15442, 14368,
				13188, 12188, 11152, 10114, 9076, 8038, 7000, 6643, 6286, 5929,
				5527, 5215, 4858, 4750, 4650, 4600, 4500, 4490, 4300, 4350, 4330,
				4310, 4495, 4477
			]
		}]
	});
	
	/** TORTA **/
	Highcharts.chart('pagosMes', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Browser market shares in May, 2020',
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
			name: 'Brands',
			colorByPoint: true,
			data: [{
				name: 'Chrome',
				y: 70.67,
				sliced: true,
				selected: true
			}, {
				name: 'Edge',
				y: 14.77
			}, {
				name: 'Firefox',
				y: 4.86
			}, {
				name: 'Safari',
				y: 2.63
			}, {
				name: 'Internet Explorer',
				y: 1.53
			}, {
				name: 'Opera',
				y: 1.40
			}, {
				name: 'Sogou Explorer',
				y: 0.84
			}, {
				name: 'QQ',
				y: 0.51
			}, {
				name: 'Other',
				y: 2.6
			}]
		}]
	});
	
	/** BARRAS **/
	Highcharts.chart('graficoAnio', {
		chart: {
			type: 'column'
		},
		title: {
			align: 'center',
			text: 'Browser market shares. January, 2022'
		},
		subtitle: {
			align: 'center',
			text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
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
				text: 'Total percent market share'
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
					format: '{point.y:.1f}%'
				}
			}
		},
		
		tooltip: {
			headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
			pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
		},
		
		series: [
			{
				name: 'Browsers',
				colorByPoint: true,
				data: [
					{
						name: 'Chrome',
						y: 63.06,
						drilldown: 'Chrome'
					},
					{
						name: 'Safari',
						y: 19.84,
						drilldown: 'Safari'
					},
					{
						name: 'Firefox',
						y: 14.18,
						drilldown: 'Firefox'
					},
					{
						name: 'Edge',
						y: 4.12,
						drilldown: 'Edge'
					},
					{
						name: 'Opera',
						y: 2.33,
						drilldown: 'Opera'
					},
					{
						name: 'Internet Explorer',
						y: 10.45,
						drilldown: 'Internet Explorer'
					},
					{
						name: 'Other',
						y: 1.582,
						drilldown: null
					}
				]
			}
		],
		drilldown: {
			breadcrumbs: {
				position: {
					align: 'right'
				}
			},
			series: [
				{
					name: 'Chrome',
					id: 'Chrome',
					data: [
						[
							'v65.0',
							0.1
						],
						[
							'v64.0',
							1.3
						],
						[
							'v63.0',
							53.02
						],
						[
							'v62.0',
							1.4
						],
						[
							'v61.0',
							0.88
						],
						[
							'v60.0',
							0.56
						],
						[
							'v59.0',
							0.45
						],
						[
							'v58.0',
							0.49
						],
						[
							'v57.0',
							0.32
						],
						[
							'v56.0',
							0.29
						],
						[
							'v55.0',
							0.79
						],
						[
							'v54.0',
							0.18
						],
						[
							'v51.0',
							0.13
						],
						[
							'v49.0',
							2.16
						],
						[
							'v48.0',
							0.13
						],
						[
							'v47.0',
							0.11
						],
						[
							'v43.0',
							0.17
						],
						[
							'v29.0',
							0.26
						]
					]
				},
				{
					name: 'Firefox',
					id: 'Firefox',
					data: [
						[
							'v58.0',
							1.02
						],
						[
							'v57.0',
							7.36
						],
						[
							'v56.0',
							0.35
						],
						[
							'v55.0',
							0.11
						],
						[
							'v54.0',
							0.1
						],
						[
							'v52.0',
							0.95
						],
						[
							'v51.0',
							0.15
						],
						[
							'v50.0',
							0.1
						],
						[
							'v48.0',
							0.31
						],
						[
							'v47.0',
							0.12
						]
					]
				},
				{
					name: 'Internet Explorer',
					id: 'Internet Explorer',
					data: [
						[
							'v11.0',
							6.2
						],
						[
							'v10.0',
							0.29
						],
						[
							'v9.0',
							0.27
						],
						[
							'v8.0',
							0.47
						]
					]
				},
				{
					name: 'Safari',
					id: 'Safari',
					data: [
						[
							'v11.0',
							3.39
						],
						[
							'v10.1',
							0.96
						],
						[
							'v10.0',
							0.36
						],
						[
							'v9.1',
							0.54
						],
						[
							'v9.0',
							0.13
						],
						[
							'v5.1',
							0.2
						]
					]
				},
				{
					name: 'Edge',
					id: 'Edge',
					data: [
						[
							'v16',
							2.6
						],
						[
							'v15',
							0.92
						],
						[
							'v14',
							0.4
						],
						[
							'v13',
							0.1
						]
					]
				},
				{
					name: 'Opera',
					id: 'Opera',
					data: [
						[
							'v50.0',
							0.96
						],
						[
							'v49.0',
							0.82
						],
						[
							'v12.1',
							0.14
						]
					]
				}
			]
		}
	});
</script>

