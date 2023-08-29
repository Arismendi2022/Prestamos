<?php
	
	class DashboardModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectPrestamosActivos(){
			$sql = "SELECT COALESCE(SUM(monto_prestamo),0) AS total FROM tbl_prestamos WHERE estado = 1 ;";
			$request = $this->select($sql);
			$arrData = $request['total'];
			return $arrData;
		}
		
		public function selectSaldoCaja(){
			$sql = "SELECT SUM(interes) AS interes FROM tbl_amortizacion WHERE estado = 0";
			$request = $this->select($sql);
			$arrData = $request['interes'];
			return $arrData;
		}
		
		public function selectPorcentajeRecaudo(){
			$sql = "SELECT prestamos, abonos FROM view_reporteRecaudo";
			$request = $this->select($sql);
			$arrData = ($request['abonos'] * 100) / $request['prestamos'];
			return $arrData;
		}
		
		public function selectPagosAnio(int $anio){
			$sql = "SELECT ISNULL(SUM(monto_pagado),0) AS pagos FROM tbl_pagos
							WHERE YEAR(fecha_pago) = $anio";
			$request = $this->select($sql);
			$arrData = $request['pagos'];
			return $arrData;
		}
		
		public function selectPagosHoy(){
			$fechaActual = date("Y-m-d");
			$sql = "SELECT COUNT(valor_cuota) pagos_hoy FROM tbl_amortizacion
							WHERE fecha_cuota <= '$fechaActual' AND estado != 0";
			$request = $this->select($sql);
			$arrData = $request['pagos_hoy'];
			return $arrData;
		}
		
		
	}
	/** Fin Archivo dashboarModel.php */