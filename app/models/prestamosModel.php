<?php
	
	class PrestamosModel extends Mysql
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectClientesLoan()
		{
			$sql = "SELECT idpersona,identificacion,concat(nombres, ' ', apellidos) as nombres,telefono,prestamos
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
		
		public function insertPrestamo(int $idUsuario, int $intMonto, int $intInteres, int $intCuotas, int $intValorCuota, string $strFormaPago, string $strMoneda, $dtFecha)
		{
			$this->intidUsuario = $idUsuario;
			$this->intMonto = $intMonto;
			$this->intInteres = $intInteres;
			$this->intCuotas = $intCuotas;
			$this->intValorCuota = $intValorCuota;
			$this->strFormaPago = $strFormaPago;
			$this->strMoneda = $strMoneda;
			$this->dtFecha = $dtFecha;
			$return = 0;
			
			/** inserta cabecera prestamos */
			$query_insert = "insert into prestamos(personaid,monto_credito,interes,num_cuotas,valor_cuota,forma_pago,moneda,fecha_prestamo)
												values(?,?,?,?,?,?,?,?)";
			$arrData = array($this->intidUsuario,
				$this->intMonto,
				$this->intInteres,
				$this->intCuotas,
				$this->intValorCuota,
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
			return true;
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
			
			/** inserta items prestamo_detalle */
			$query_insert = "insert into pagos(prestamoid,num_cuota,fecha_cuota,valor_cuota,interes,capital,saldo)
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
			
			return true;
			
		}
		
		
	}
	/** End of file prestamosModel.php **/
