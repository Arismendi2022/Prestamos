<?php
	
	class ClientesModel extends Mysql
	{
		private $intIdUsuario;
		private $strIdentificacion;
		private $strNombre;
		private $strApellido;
		private $strTelefono;
		private $strEmail;
		private $strPassword;
		private $strToken;
		private $intTipoId;
		private $intStatus;
		private $strNit;
		private $strNomFiscal;
		private $strDirFiscal;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function insertCliente(string $identificacion, string $nombre, string $apellido, string $telefono, string $email, string $password, int $tipoid, string $nit, string $nomFiscal, string $dirFiscal)
		{
			
			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strTelefono = $telefono;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			$this->strNit = $nit;
			$this->strNomFiscal = $nomFiscal;
			$this->strDirFiscal = $dirFiscal;
			$return = 0;
			
			$sql = "SELECT * FROM persona WHERE
				email_user = '{$this->strEmail}' or identificacion = '{$this->strIdentificacion}' ";
			$request = $this->select_all($sql);
			
			if (empty($request)) {
				$query_insert = "INSERT INTO persona(identificacion,nombres,apellidos,telefono,email_user,password,rolid,nit,nombrefiscal,direccionfiscal)
							  VALUES(?,?,?,?,?,?,?,?,?,?)";
				$arrData = array($this->strIdentificacion,
					$this->strNombre,
					$this->strApellido,
					$this->strTelefono,
					$this->strEmail,
					$this->strPassword,
					$this->intTipoId,
					$this->strNit,
					$this->strNomFiscal,
					$this->strDirFiscal);
				$request_insert = $this->insert($query_insert, $arrData);
				$return = $request_insert;
			} else {
				$return = 0;
			}
			return $return;
		}
		
		public function selectClientes()
		{
			$sql = "SELECT idpersona,identificacion,nombres,apellidos,telefono,email_user,estado
				FROM persona
				WHERE rolid = ".RCLIENTES." and estado != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectCliente(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT idpersona,identificacion,nombres,apellidos,telefono,email_user,nit,nombrefiscal,direccionfiscal,estado, DATE_FORMAT(datecreated, '%d-%m-%Y') as fechaRegistro
				FROM persona
				WHERE idpersona = $this->intIdUsuario and rolid = ".RCLIENTES;
			$request = $this->select($sql);
			return $request;
		}
		
	}
	/** End of file clientesModel.php **/
