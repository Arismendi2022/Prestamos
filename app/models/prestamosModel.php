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
		
		public function insertPrestamo(int $idUsuario, int $intMonto, int $intInteres, int $intCuotas, int $intValorCuota, string $strFormaPago, string $strMoneda,
																			 $dtFecha)
		{
			$this->intidUsuario = $idUsuario;
			$this->intMonto = $intMonto;
			$this->intintInteres = $intInteres;
			$this->intCuotas = $intCuotas;
			$this->intValorCuota = $intValorCuota;
			$this->strFormaPago = $strFormaPago;
			$this->strMoneda = $strMoneda;
			$this->dtFecha = $dtFecha;
			$return = 0;
			
			/** inserta cabecera prestamos */
			$query_insert = "insert into prestamos(personaid,monto_credito,interes,mun_cuotas,valor_cuota,forma_pago,moneda,fecha_prestamo)
												values(?,?,?,?,?,?,?,?)";
			$arrData = array($this->intidUsuario,
				$this->intMonto,
				$this->intIntereses,
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
			return $return;
		}
		
		
	}
	/** End of file prestamosModel.php **/
