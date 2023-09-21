<?php
	
	class DashboardModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectPrestamosActivos()
		{
			$sql = "SELECT ISNULL((SUM(monto_prestamo)-SUM(abonos)),0) AS total FROM view_saldoPrestamos
							WHERE estado != 0";
			$request = $this->select($sql);
			$arrData = $request['total'];
			return $arrData;
		}
		
		public function selectSaldoCaja()
		{
			$sql = "SELECT ISNULL(SUM(abonos),0) as abonos FROM view_reportePrestamos WHERE estado = 1";
			$sql_loan = "SELECT ISNULL(SUM(monto_prestamo),0) AS total FROM tbl_prestamos WHERE estado = 1";
			$request = $this->select($sql);
			$request_loan = $this->select($sql_loan);
			$arrData = (MCAPITAL - $request_loan['total']) + $request['abonos'];
			return $arrData;
		}
		
		
		public function selectPorcentajeRecaudo()
		{
			$sql = "SELECT prestamos, abonos FROM view_reporteRecaudo";
			$request = $this->select($sql);
			$arrData = ($request['abonos'] * 100) / $request['prestamos'];
			return $arrData;
		}
		
		public function selectPagosAnio(int $anio)
		{
			$sql = "SELECT ISNULL(SUM(monto_pagado),0) AS pagos FROM tbl_pagos
							WHERE YEAR(fecha_pago) = $anio";
			$request = $this->select($sql);
			$arrData = $request['pagos'];
			return $arrData;
		}
		
		public function selectPagosHoy()
		{
			$fechaActual = date("Y-m-d");
			$sql = "SELECT COUNT(valor_cuota) pagos_hoy FROM tbl_amortizacion
							WHERE fecha_cuota <= '$fechaActual' AND estado != 0";
			$request = $this->select($sql);
			$arrData = $request['pagos_hoy'];
			return $arrData;
		}
		
		public function selectChartPrestamos()
		{
			$sql = "SELECT idprestamo, idcliente, nombres AS nombre,  (monto_prestamo-abonos) AS total FROM view_saldoPrestamos
							WHERE estado = 1";
			$arrData = $this->select_all($sql);
			return $arrData;
		}
		
		public function selectChartPagos(int $anio)
		{
			$arrMPagos = array();
			$arrMeses = Meses();
			for ($i = 1; $i <= 12; $i++) {
				$arrData = array('anio' => '', 'no_mes' => '', 'mes' => '', 'pagos' => '');
				$sql = "SELECT $anio AS anio, $i AS mes, ISNULL(SUM(monto_pagado),0) AS pagos FROM tbl_pagos
							WHERE MONTH(fecha_pago) = $i AND YEAR(fecha_pago) = $anio
							GROUP BY MONTH(fecha_pago)";
				$pagosMes = $this->select($sql);
				$arrData['mes'] = $arrMeses[$i - 1];
				if (empty($pagosMes)) {
					$arrData['anio'] = $anio;
					$arrData['no_mes'] = $i;
					$arrData['pagos'] = 0;
				} else {
					$arrData['anio'] = $pagosMes['anio'];
					$arrData['no_mes'] = $pagosMes['mes'];
					$arrData['pagos'] = $pagosMes['pagos'];
				}
				array_push($arrMPagos, $arrData);
			}
			$arrPagos = array('anio' => $anio, 'meses' => $arrMPagos);
			return $arrPagos;
		}
		
		public function selectChartInteres(int $anio)
		{
			$totalInteresAnio = 0;
			$arrMInteres = array();
			$arrMeses = Meses();
			for ($i = 1; $i <= 12; $i++) {
				$arrData = array('anio' => '', 'no_mes' => '', 'mes' => '', 'interes' => '');
				$sql = "SELECT $anio AS anio, $i As mes, SUM(interes) AS interes FROM tbl_amortizacion
								WHERE MONTH(fecha_cuota) = $i AND YEAR(fecha_cuota) = $anio AND estado = 0
								GROUP BY MONTH(fecha_cuota)";
				$interesMes = $this->select($sql);
				$arrData['mes'] = $arrMeses[$i - 1];
				if (empty($interesMes)) {
					$arrData['anio'] = $anio;
					$arrData['no_mes'] = $i;
					$arrData['interes'] = 0;
				} else {
					$arrData['anio'] = $interesMes['anio'];
					$arrData['no_mes'] = $interesMes['mes'];
					$arrData['interes'] = $interesMes['interes'];
					$totalInteresAnio += $interesMes['interes'];
				}
				array_push($arrMInteres, $arrData);
				
			}
			$arrInteres = array('anio' => $anio, 'total' => $totalInteresAnio, 'meses' => $arrMInteres);
			return $arrInteres;
		}
		
		public function saldoPrestamos(){
			$sql = "EXEC proc_saldoPrestamos";
			$request = $this->select($sql);
			$arrData = ($request['total'] * 100) / MCAPITAL;
			return $arrData;
			
		}
		
		public function montosPrestados(int $anio){
			$arrMontos = array();
			$arrMeses = Meses();
			for ($i = 1; $i <= 12; $i++) {
				$arrData = array('anio' => '', 'no_mes' => '', 'mes' => '', 'total' => '');
				$sql = "SELECT $anio AS anio, $i AS mes, ISNULL(SUM(monto_prestamo),0) AS total FROM  tbl_prestamos
								WHERE MONTH(fecha_prestamo) = $i AND YEAR(fecha_prestamo) = $anio
								GROUP BY MONTH(fecha_prestamo)";
				$montosPrestados = $this->select($sql);
				$arrData['mes'] = $arrMeses[$i - 1];
				if (empty($montosPrestados)) {
					$arrData['anio'] = $anio;
					$arrData['no_mes'] = $i;
					$arrData['total'] = 0;
				} else {
					$arrData['anio'] = $montosPrestados['anio'];
					$arrData['no_mes'] = $montosPrestados['mes'];
					$arrData['total'] = $montosPrestados['total'];
				}
				array_push($arrMontos, $arrData);
			}
			$arrMontoPagado = array('anio' => $anio, 'meses' => $arrMontos);
			return $arrMontoPagado;
			
		}
		
		public function selectPagosPrestamos(){
			$sql = "SELECT 'prestamos' AS nombre, SUM(total_pagar) AS total FROM view_reportePrestamos
							WHERE estado = 1
							UNION ALL
							SELECT 'abonos' AS nombre, SUM(abonos) AS total FROM view_reportePrestamos
							WHERE estado = 1
							ORDER BY nombre DESC;";
			$arrData = $this->select_all($sql);
			return $arrData;
		}
		
		
	}
	/** Fin Archivo dashboarModel.php */