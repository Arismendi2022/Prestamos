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
			$total = $request['total'];
			return $total;
		}
		
		public function selectSaldoCaja(){
			$sql = "SELECT SUM(interes) AS interes FROM tbl_amortizacion WHERE estado = 0";
			$request = $this->select($sql);
			$interes = $request['interes'];
			return $interes;
		}
		
		public function selectPorcentajeRecaudo(){
			$sql = "SELECT prestamos, abonos FROM view_reporteRecaudo";
			$request = $this->select($sql);
			$recaudo = ($request['abonos'] * 100) / $request['prestamos'];
			return $recaudo;
		}
		
		
	}