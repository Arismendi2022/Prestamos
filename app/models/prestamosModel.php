<?php
	
	class PrestamosModel extends Mysql
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectClientesLoan()
		{
			$sql = "SELECT idcliente,identificacion,concat(nombres,' ',apellidos) as nombres,telefono,prestamo
				FROM tbl_clientes
				WHERE estado != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectClienteloan(int $idcliente)
		{
			$this->intIdUsuario = $idcliente;
			$sql = "SELECT idcliente,identificacion,concat(nombres, ' ', apellidos) as nombres,telefono,email,estado,prestamo
				FROM tbl_clientes
				WHERE idcliente = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}
		
		public function insertPrestamo(int    $idUsuario, $dtFecha, int $intMonto, int $intCuotas, int $intInteres, int $intValorCuota, int $intTotalInteres, int $intMontoTotal,
																	 string $strFormaPago, string $strMoneda)
		{
			$this->intidUsuario = $idUsuario;
			$this->dtFecha = $dtFecha;
			$this->intMonto = $intMonto;
			$this->intCuotas = $intCuotas;
			$this->intInteres = $intInteres;
			$this->intValorCuota = $intValorCuota;
			$this->intTotalInteres = $intTotalInteres;
			$this->intMontoTotal = $intMontoTotal;
			$this->strFormaPago = $strFormaPago;
			$this->strMoneda = $strMoneda;
			
			$return = 0;
			
			/** inserta cabecera prestamos */
			$query_insert = "insert into tbl_prestamos(clienteid,fecha_prestamo,monto_prestamo,nro_cuotas,interes,valor_cuota,total_interes,total_pagar,forma_pago,moneda)
												values(?,?,?,?,?,?,?,?,?,?)";
			$arrData = array($this->intidUsuario,
				$this->dtFecha,
				$this->intMonto,
				$this->intCuotas,
				$this->intInteres,
				$this->intValorCuota,
				$this->intTotalInteres,
				$this->intMontoTotal,
				$this->strFormaPago,
				$this->strMoneda);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
			
			/** actualizamos estado prestamo en clientes */
			$this->intIdUsuario = $idUsuario;
			$sql = "UPDATE tbl_clientes SET prestamo = ? WHERE idcliente = $this->intIdUsuario";
			$arrData = array(1);
			$request = $this->update($sql, $arrData);
			/** retornamos a controlador prestamos */
			return $return;
		}
		
		/** inserta detalle prestamos */
		public function insertPrestamoItems(int $nroCuota, $dtFecha, int $intCuota, int $intInteres, int $intCapital, int $intSaldo)
		{
			/** actualizamos el consecutivo del prestamo */
			$sql = "EXEC proc_consecutivoPrestamo;";
			$request = $this->select($sql);
			$consecutivo = $request['consecutivo'];
			
			$this->intConsecutivo = $consecutivo;
			$this->nroCuota = $nroCuota;
			$this->dtFecha = $dtFecha;
			$this->intCuota = $intCuota;
			$this->intInteres = $intInteres;
			$this->intCapital = $intCapital;
			$this->intSaldo = $intSaldo;
			$return = 0;
			
			/** inserta items amortizacion */
			$query_insert = "insert into tbl_amortizacion(prestamoid,nro_cuota,fecha_cuota,valor_cuota,interes,capital,saldo)
												values(?,?,?,?,?,?,?)";
			$arrData = array($this->intConsecutivo,
				$this->nroCuota,
				$this->dtFecha,
				$this->intCuota,
				$this->intInteres,
				$this->intCapital,
				$this->intSaldo);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
			
			return $return;
			
		}
		
		public function selectPrestamos()
		{
			$sql = "SELECT idprestamo,cliente,FORMAT(fecha_prestamo, 'dd-MM-yyyy') as fecha_prestamo,forma_pago,nro_cuotas,valor_cuota,monto_prestamo,total_pagar,abonos,
       							(total_pagar-abonos) as saldo,estado
			FROM view_reportePrestamos";
			$request = $this->select_all($sql);
			return $request;
			
		}
		
		public function selectPrestamo(int $idPrestamo)
		{
			$this->intIdPrestamo = $idPrestamo;
			$sql = "SELECT clienteid,identificacion,CONCAT(nombres,' ',apellidos) AS nombres,telefono,direccion,ciudad,email,FORMAT(fecha_prestamo, 'dd-MM-yyyy') as fechaRegistro,
        idprestamo,monto_prestamo,interes,nro_cuotas,valor_cuota,total_pagar,total_interes,forma_pago,FORMAT(fecha_prestamo,'dd-MM-yyyy') as fechaPrestamo FROM tbl_prestamos
				INNER JOIN tbl_clientes
				ON tbl_prestamos.clienteid = tbl_clientes.idcliente
				WHERE idprestamo = $this->intIdPrestamo";
			$request = $this->select($sql);
			return $request;
		}
		
		public function selectAmortizacion(int $idPrestamo)
		{
			$this->intIdPrestamo = $idPrestamo;
			$sql = "SELECT prestamoid,nro_cuota,FORMAT(fecha_cuota,'dd-MM-yyyy') as fechaPago,valor_cuota,saldo,estado FROM tbl_amortizacion
            	WHERE prestamoid = $this->intIdPrestamo";
			$request = $this->select_all($sql);
			return $request;
		}
		
	}
	/** End of file prestamosModel.php **/
