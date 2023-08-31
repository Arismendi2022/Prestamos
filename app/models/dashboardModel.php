<?php
	
	class DashboardModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectPrestamosActivos()
		{
			$sql = "SELECT COALESCE(SUM(monto_prestamo),0) AS total FROM tbl_prestamos WHERE estado = 1 ;";
			$request = $this->select($sql);
			$arrData = $request['total'];
			return $arrData;
		}
		
		public function selectSaldoCaja()
		{
			$sql = "SELECT SUM(interes) AS interes FROM tbl_amortizacion WHERE estado = 0";
			$request = $this->select($sql);
			$arrData = $request['interes'];
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
			$sql = "SELECT clienteid, (nombres) AS nombre, (monto_prestamo) AS total FROM  tbl_prestamos p
							INNER JOIN tbl_clientes c
							ON c.idcliente = p.clienteid
							WHERE p.estado != 0;";
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
		
		
	}
	/** Fin Archivo dashboarModel.php */