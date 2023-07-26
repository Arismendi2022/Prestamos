<?php
	
	class PrestamosModel extends Mysql
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectClientesLoan()
		{
			$sql = "SELECT idpersona,identificacion,concat(nombres,' ',apellidos) as nombres,telefono,prestamos
				FROM persona
				WHERE rolid = " . RCLIENTES . " and estado != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectClienteloan(int $idpersona)
		{
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT idpersona,identificacion,concat(nombres, ' ', apellidos) as nombres,telefono,email_user,estado,prestamos
				FROM persona
				WHERE idpersona = $this->intIdUsuario and rolid = " . RCLIENTES;
			$request = $this->select($sql);
			return $request;
		}
		
		public function insertPrestamo(int $idUsuario, int $intMonto, int $intInteres, int $intCuotas, int $intValorCuota, int $intMontoTotal, string $strFormaPago, string
				$strMoneda, $dtFecha)
		{
			$this->intidUsuario = $idUsuario;
			$this->intMonto = $intMonto;
			$this->intInteres = $intInteres;
			$this->intCuotas = $intCuotas;
			$this->intValorCuota = $intValorCuota;
			$this->intMontoTotal = $intMontoTotal;
			$this->strFormaPago = $strFormaPago;
			$this->strMoneda = $strMoneda;
			$this->dtFecha = $dtFecha;
			$return = 0;
			
			/** inserta cabecera prestamos */
			$query_insert = "insert into prestamos(personaid,monto_credito,interes,num_cuotas,valor_cuota,monto_total,forma_pago,moneda,fecha_prestamo)
												values(?,?,?,?,?,?,?,?,?)";
			$arrData = array($this->intidUsuario,
				$this->intMonto,
				$this->intInteres,
				$this->intCuotas,
				$this->intValorCuota,
				$this->intMontoTotal,
				$this->strFormaPago,
				$this->strMoneda,
				$this->dtFecha);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
			
			/** actualizamos estado prestamo en clientes */
			$this->intIdUsuario = $idUsuario;
			$sql = "UPDATE persona SET prestamos = ? WHERE idpersona = $this->intIdUsuario";
			$arrData = array(1);
			$request = $this->update($sql,$arrData);
			/** retornamos a controlador prestamos */
			return $return;
		}
		
		/** inserta detalle prestamos */
		public function insertPrestamoItems(int $nroCuota, $dtFecha, int $intCuota, int $intInteres,int $intCapital,int $intSaldo)
		{
			/** actualizamos el consecutivo del prestamo */
			$sql = "CALL consecutivoPrestamo()";
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
			$query_insert = "insert into amortizacion(prestamoid,num_cuota,fecha_cuota,valor_cuota,interes,capital,saldo)
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
			$sql = "SELECT idprestamo,cliente,DATE_FORMAT(fecha_prestamo, '%d-%m-%Y') as fecha,forma_pago,num_cuotas,valor_cuota,monto_credito,monto_total,abonos,
       							(monto_total-abonos) as saldo,estado
			FROM reportePrestamos";
			$request = $this->select_all($sql);
			return $request;
			
		}
		
		public function selectPrestamo(int $idPrestamo){
			$this->intIdPrestamo = $idPrestamo;
			$sql = "SELECT personaid,identificacion,CONCAT(nombres,' ',apellidos) AS nombres,telefono,email_user,DATE_FORMAT(datecreated, '%d-%m-%Y') as fechaRegistro,
        idprestamo,monto_credito,interes,num_cuotas,valor_cuota,monto_total,(monto_total-monto_credito ) as totalIntereses,forma_pago,DATE_FORMAT(fecha_prestamo,'%d-%m-%Y') as fechaPrestamo FROM prestamos
				INNER JOIN persona
				ON prestamos.personaid = persona.idpersona
				WHERE idprestamo = $this->intIdPrestamo";
			$request = $this->select($sql);
			return $request;
		}
		
		public function selectAmortizacion(int $idPrestamo){
			$this->intIdPrestamo = $idPrestamo;
			$sql = "SELECT prestamoid,num_cuota,DATE_FORMAT(fecha_cuota,'%d-%m-%Y') as fechaPago,valor_cuota,saldo,estado FROM amortizacion
            	WHERE prestamoid = $this->intIdPrestamo";
			$request = $this->select_all($sql);
			return $request;
		}
		
	}
	/** End of file prestamosModel.php **/
