<?php
	
	class ClientesModel extends Mysql
	{
		private $intIdUsuario;
		private $strIdentificacion;
		private $strNombre;
		private $strApellido;
		private $intGenero;
		private $strTelefono;
		private $strEmail;
		private $strToken;
		private $strDirFiscal;
		private $strCiudad;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function insertCliente(string $identificacion, string $nombre, string $apellido, int $genero, string $telefono, string $email, string $dirFiscal, string $ciudad)
		{
			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strTelefono = $telefono;
			$this->intGenero = $genero;
			$this->strEmail = $email;
			$this->strDirFiscal = $dirFiscal;
			$this->strCiudad = $ciudad;
			$return = 0;
			
			$sql = "SELECT * FROM tbl_clientes WHERE
				email = '{$this->strEmail}' or identificacion = '{$this->strIdentificacion}' ";
			$request = $this->select_all($sql);
			
			if (empty($request)) {
				$query_insert = "INSERT INTO tbl_clientes(identificacion,nombres,apellidos,genero,telefono,email,direccion, ciudad)
							  VALUES(?,?,?,?,?,?,?,?)";
				$arrData = array($this->strIdentificacion,
					$this->strNombre,
					$this->strApellido,
					$this->intGenero,
					$this->strTelefono,
					$this->strEmail,
					$this->strDirFiscal,
					$this->strCiudad);
				$request_insert = $this->insert($query_insert, $arrData);
				$return = $request_insert;
			} else {
				$return = 0;
			}
			return $return;
		}
		
		public function selectClientes()
		{
			$sql = "SELECT idcliente,identificacion,nombres,apellidos,telefono,email,estado
				FROM tbl_clientes
				WHERE estado != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectCliente(int $idcliente)
		{
			$this->intIdUsuario = $idcliente;
			$sql = "SELECT idcliente,identificacion,nombres,apellidos,genero,telefono,email,direccion,ciudad,estado, FORMAT(fecha_creado,'dd-MM-yyyy') as fechaRegistro
				FROM tbl_clientes
				WHERE idcliente = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}
		
		public function updateCliente(int    $idUsuario, string $identificacion, string $nombre, string $apellido, int $genero, string $telefono, string $email,
																	string $dirFiscal, string $ciudad)
		{
			
			$this->intIdUsuario = $idUsuario;
			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->intGenero = $genero;
			$this->strTelefono = $telefono;
			$this->strEmail = $email;
			$this->strDirFiscal = $dirFiscal;
			$this->strCiudad = $ciudad;
			
			$sql = "SELECT * FROM tbl_clientes WHERE (email = '{$this->strEmail}' AND idcliente != $this->intIdUsuario)
									  OR (identificacion = '{$this->strIdentificacion}' AND idcliente != $this->intIdUsuario) ";
			$request = $this->select_all($sql);
			
			if (empty($request)) {
				$sql = "UPDATE tbl_clientes SET identificacion=?, nombres=?, apellidos=?, genero=?, telefono=?, email=?, direccion=?, ciudad=?
						WHERE idcliente = $this->intIdUsuario ";
				$arrData = array($this->strIdentificacion,
					$this->strNombre,
					$this->strApellido,
					$this->intGenero,
					$this->strTelefono,
					$this->strEmail,
					$this->strDirFiscal,
					$this->strCiudad);
				
				$request = $this->update($sql, $arrData);
			} else {
				$request = 0;
			}
			return $request;
		}
		
		public function deleteCliente(int $intIdcliente)
		{
			$this->intIdUsuario = $intIdcliente;
			$sql = "UPDATE tbl_clientes SET estado = ? WHERE idcliente = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->update($sql, $arrData);
			return $request;
		}
		
	}
	/** End of file clientesModel.php **/

