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
							WHERE p.estado != 0";
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
		
		/** guardamos los pagos de las cuotas */
		public function insertPagos(int $idPrestamo, int $idCliente, int $valorCuota, int $nroCuota)
		{
			$this->intIdPrestamo = $idPrestamo;
			$this->intIdCliente = $idCliente;
			$this->intCuota = $valorCuota;
			$this->intNroCuota = $nroCuota;
			
			$return = 0;
			
			$query_insert = "insert into tbl_pagos(prestamoid,clienteid,monto_pagado,cuota_pagada)
												values(?,?,?,?)";
			$arrData = array($this->intIdPrestamo,
				$this->intIdCliente,
				$this->intCuota,
				$this->intNroCuota);
			
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
			return $return;
			
		}
		
		public function updatePrestamo(int $idCuota)
		{
			$this->intIdCuota = $idCuota;
			$sql = "UPDATE tbl_amortizacion SET estado = ? WHERE idamortizacion = $this->intIdCuota ";
			$arrData = array(0);
			$request = $this->update($sql, $arrData);
			
			return $request;
		}
		
		public function updateEstadoPrestamo(int $idPrestamo, int $idCliente)
		{
			$this->intIdPrestamo = $idPrestamo;
			$this->intIdCliente = $idCliente;
			
			$sql = "EXEC proc_pagoprestamos $this->intIdPrestamo ";
			$request = $this->select($sql);
			$estado = $request['estado'];
			
			if ($estado == 0) {
				/** sctualiza el estdo del prestamo en el cliente */
				$sql_clientes = "UPDATE tbl_clientes SET prestamo = ? WHERE idcliente = $this->intIdCliente";
				$arrData = array(0);
				$request = $this->update($sql_clientes, $arrData);
				/** actualiza el estado del prestamo */
				$sql_prestamos = "UPDATE tbl_prestamos SET estado = ? WHERE idprestamo = $this->intIdPrestamo";
				$arrData = array(0);
				$request = $this->update($sql_prestamos, $arrData);
				
			}
			return $request;
		}
		
	}
	/** end files pagosModel.php */
