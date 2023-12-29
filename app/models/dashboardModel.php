<?php
	
	class DashboardModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		/** Datos tarjetas Dahsboard **/
		public function tarjetasDashboard(int $anio)
		{
			$sql     = "EXEC proc_datosDashboard $anio";
			$arrData = $this->select($sql);
			return $arrData;
		}
		
		public function selectCartera()
		{
			$sql     = "SELECT RIGHT(REPLICATE('0', 6) + CONVERT(VARCHAR(6), p.idprestamo), 6) AS nro_prestamo, CONCAT(c.nombres,' ', c.apellidos) AS cliente, a.fecha_cuota,
    					a.nro_cuota, a.valor_cuota FROM  tbl_amortizacion a
							INNER JOIN tbl_prestamos p
							ON p.idprestamo = a.prestamoid
							INNER JOIN tbl_clientes c
							ON c.idcliente = p.clienteid
							WHERE fecha_cuota <= CONVERT(DATE, GETDATE())
							AND a.estado = 1";
			$request = $this->select_all($sql);
			return $request;
		}
		
		/** Datos graficos **/
		public function selectChartPrestamos()
		{
			$sql     = "SELECT idprestamo, idcliente, nombres AS nombre,  (monto_prestamo-abonos) AS total FROM view_saldoPrestamos
							WHERE estado = 1";
			$arrData = $this->select_all($sql);
			return $arrData;
		}
		
		public function selectChartPagos(int $anio)
		{
			$arrMPagos = array();
			$arrMeses  = Meses();
			for($i = 1;$i <= 12;$i++){
				$arrData        = array('anio' => '','no_mes' => '','mes' => '','pagos' => '');
				$sql            = "SELECT $anio AS anio, $i AS mes, ISNULL(SUM(monto_pagado),0) AS pagos FROM tbl_pagos
							WHERE MONTH(fecha_pago) = $i AND YEAR(fecha_pago) = $anio
							GROUP BY MONTH(fecha_pago)";
				$pagosMes       = $this->select($sql);
				$arrData['mes'] = $arrMeses[$i - 1];
				if(empty($pagosMes)){
					$arrData['anio']   = $anio;
					$arrData['no_mes'] = $i;
					$arrData['pagos']  = 0;
				}else{
					$arrData['anio']   = $pagosMes['anio'];
					$arrData['no_mes'] = $pagosMes['mes'];
					$arrData['pagos']  = $pagosMes['pagos'];
				}
				array_push($arrMPagos,$arrData);
			}
			$arrPagos = array('anio' => $anio,'meses' => $arrMPagos);
			return $arrPagos;
		}
		
		public function selectChartInteres(int $anio)
		{
			$totalInteresAnio = 0;
			$arrMInteres      = array();
			$arrMeses         = Meses();
			for($i = 1;$i <= 12;$i++){
				$arrData        = array('anio' => '','no_mes' => '','mes' => '','interes' => '');
				$sql            = "SELECT $anio AS anio, $i As mes, SUM(interes) AS interes FROM tbl_amortizacion
								WHERE MONTH(fecha_cuota) = $i AND YEAR(fecha_cuota) = $anio AND estado = 0
								GROUP BY MONTH(fecha_cuota)";
				$interesMes     = $this->select($sql);
				$arrData['mes'] = $arrMeses[$i - 1];
				if(empty($interesMes)){
					$arrData['anio']    = $anio;
					$arrData['no_mes']  = $i;
					$arrData['interes'] = 0;
				}else{
					$arrData['anio']    = $interesMes['anio'];
					$arrData['no_mes']  = $interesMes['mes'];
					$arrData['interes'] = $interesMes['interes'];
					$totalInteresAnio   += $interesMes['interes'];
				}
				array_push($arrMInteres,$arrData);
				
			}
			$arrInteres = array('anio' => $anio,'total' => $totalInteresAnio,'meses' => $arrMInteres);
			return $arrInteres;
		}
		
		public function saldoPrestamos()
		{
			$sql_capital = "EXEC proc_obtenerCapital";
			$capital     = $this->select($sql_capital);
			
			$sql     = "EXEC proc_saldoPrestamos";
			$request = $this->select($sql);
			$arrData = ($request['total'] * 100) / $capital['total'];
			return $arrData;
			
		}
		
		public function montosPrestados(int $anio)
		{
			$arrMontos = array();
			$arrMeses  = Meses();
			for($i = 1;$i <= 12;$i++){
				$arrData         = array('anio' => '','no_mes' => '','mes' => '','total' => '');
				$sql             = "SELECT $anio AS anio, $i AS mes, ISNULL(SUM(monto_prestamo),0) AS total FROM  tbl_prestamos
								WHERE MONTH(fecha_prestamo) = $i AND YEAR(fecha_prestamo) = $anio
								GROUP BY MONTH(fecha_prestamo)";
				$montosPrestados = $this->select($sql);
				$arrData['mes']  = $arrMeses[$i - 1];
				if(empty($montosPrestados)){
					$arrData['anio']   = $anio;
					$arrData['no_mes'] = $i;
					$arrData['total']  = 0;
				}else{
					$arrData['anio']   = $montosPrestados['anio'];
					$arrData['no_mes'] = $montosPrestados['mes'];
					$arrData['total']  = $montosPrestados['total'];
				}
				array_push($arrMontos,$arrData);
			}
			$arrMontoPagado = array('anio' => $anio,'meses' => $arrMontos);
			return $arrMontoPagado;
			
		}
		
		public function selectPagosPrestamos(int $anio)
		{
			$sql     = "EXEC proc_recaudoPrestamos $anio";
			$arrData = $this->select_all($sql);
			return $arrData;
		}
		
		
	}
	/** Fin Archivo dashboarModel.php */