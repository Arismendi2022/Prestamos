<?php
	
	class PagosModel extends Mysql
	{
		private $intIdUsuario;
		private $intIdPrestamo;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		//Extrae pagos datatable
		public function selectPagos()
		{
			$sql = "SELECT idpago, CONCAT(nombres, ' ', apellidos) as nombre,prestamoid,FORMAT(fecha_pago, 'dd-MM-yyyy') as fecha_pago,monto_pagado,cuota_pagada FROM tbl_pagos
							INNER JOIN tbl_clientes
							ON tbl_clientes.idcliente = tbl_pagos.clienteid";
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectClientesPrestamo()
		{
			$sql = "SELECT p.idprestamo, c.idcliente,c.identificacion, CONCAT(c.nombres, ' ', c.apellidos ) AS cliente, p.monto_prestamo, p.estado FROM tbl_prestamos p
							INNER JOIN tbl_clientes c
							ON p.clienteid = c.idcliente
							WHERE p.estado != 0" ;
			$request = $this->select_all($sql);
			return $request;
			
		}
		
		public function selectPrestamo(int $idprestamo)
		{
			$this->intIdPrestamo = $idprestamo;
			$request = array();
			$sql = "SELECT p.idprestamo, c.idcliente,c.identificacion, CONCAT(c.nombres, ' ', c.apellidos ) AS cliente, p.monto_prestamo, forma_pago, moneda
							FROM tbl_prestamos p
							INNER JOIN tbl_clientes c
							ON p.clienteid = c.idcliente
							WHERE p.idprestamo = $this->intIdPrestamo";
			$request = $this->select($sql);
			
			return $request;
		}
		
		public function selectDetalle(int $idprestamo)
		{
				$this->intIdPrestamo = $idprestamo;
				$sql = "SELECT idamortizacion, prestamoid, nro_cuota, fecha_cuota, valor_cuota, estado FROM tbl_amortizacion
								WHERE prestamoid = $this->intIdPrestamo";
				$request = $this->select_all($sql);
				return $request;
		}
		
	}
	/** end files pagosModel.php */
