<?php
	
	class empresaModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct ();
		}
		
		/** inserta registro agregar capital */
		public function insertCapital(string $fecha, int $monto, string $descripcion, string $cuentas)
		{
			$return = "";
			$this->strFecha = $fecha;
			$this->intMonto = $monto;
			$this->strDescripcion = $descripcion;
			$this->strCuentas = $cuentas;
			
			$query_insert = "INSERT INTO tbl_capital(fecha,capital,cuenta,descripcion) VALUES(?,?,?,?)";
			$arrData = array ($this->strFecha, $this->intMonto, $this->strCuentas, $this->strDescripcion);
			$request_insert = $this->insert ($query_insert, $arrData);
			$return = $request_insert;
			return $return;
			
		}
		
		/** Extrae listado capital de trabajo para datatable */
		public function selectCapital()
		{
			$sql = "SELECT idcapital,fecha,capital,cuenta,descripcion
							FROM tbl_capital
							WHERE estado != 0";
			$request = $this->select_all ($sql);
			return $request;
			
		}
		
		/** busca un item de capital para editar */
		public function selectEditCapital(int $idcapital)
		{
			$this->intIdcapital = $idcapital;
			$sql = "SELECT idcapital, FORMAT(fecha,'dd/MM/yyyy') AS fecha, capital, cuenta, descripcion FROM tbl_capital
              WHERE idcapital = $this->intIdcapital";
			$request = $this->select ($sql);
			return $request;
		}
		
		/** actualiza registro capital */
		public function updateCapital(int $idcapital, string $fecha, int $monto, string $descripcion, string $cuentas)
		{
			$this->intIdCapital = $idcapital;
			$this->strFecha = $fecha;
			$this->intMonto = $monto;
			$this->strDescripcion = $descripcion;
			$this->strCuentas = $cuentas;
			
			$sql = "SELECT * FROM tbl_capital WHERE fecha = '$this->strFecha' AND idcapital != $this->intIdCapital";
			$request = $this->select_all ($sql);
			
			if (empty($request)) {
				$sql = "UPDATE tbl_capital SET fecha = ?, capital = ?, cuenta = ?, descripcion = ? WHERE idcapital = $this->intIdCapital";
				$arrData = array ($this->strFecha, $this->intMonto, $this->strCuentas, $this->strDescripcion);
				$request = $this->update ($sql, $arrData);
			} else {
				
				$request = 0;
			}
			
			return $request;
		}
		
		
	}
	
