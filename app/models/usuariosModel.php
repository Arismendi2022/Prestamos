<?php
	
	class UsuariosModel extends Mysql
	{
		private $intIdUsuario;
		private $strIdentificacion;
		private $strNombre;
		private $strApellido;
		private $strDireccion;
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
		
		public function insertUsuario(string $identificacion, string $nombre, string $apellido, string $direccion, string $telefono, string $email, string $password, int
		$tipoid, int $status)
		{
			
			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strDireccion = $direccion;
			$this->strTelefono = $telefono;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;
			$return = 0;
			
			$sql = "SELECT * FROM tbl_usuarios WHERE
					email_user = '{$this->strEmail}' or identificacion = '{$this->strIdentificacion}' ";
			$request = $this->select_all($sql);
			
			if (empty($request)) {
				$query_insert = "INSERT INTO tbl_usuarios(identificacion,nombres,apellidos,direccion,telefono,email_user,password,rolid,estado)
								  VALUES(?,?,?,?,?,?,?,?,?)";
				$arrData = array($this->strIdentificacion,
					$this->strNombre,
					$this->strApellido,
					$this->strDireccion,
					$this->strTelefono,
					$this->strEmail,
					$this->strPassword,
					$this->intTipoId,
					$this->intStatus);
				$request_insert = $this->insert($query_insert, $arrData);
				$return = $request_insert;
			} else {
				$return = 0;
			}
			return $return;
		}
		
		public function selectUsuarios()
		{
			$whereAdmin = "";
			if($_SESSION['idUser'] != 1 ){
				$whereAdmin = " and u.idusuario != 1 ";
			}
			$sql = "SELECT u.idusuario,u.identificacion,u.nombres,u.direccion,u.apellidos,u.telefono,u.email_user,u.estado,r.idrol,r.nombrerol
					FROM tbl_usuarios u
					INNER JOIN tbl_rol r
					ON u.rolid = r.idrol
					".$whereAdmin;
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectUsuario(int $idusuario)
		{
			$this->intIdUsuario = $idusuario;
			$sql = "SELECT u.idusuario,u.identificacion,u.nombres,u.apellidos,u.direccion,u.telefono,u.email_user,r.idrol,r.nombrerol,u.estado,FORMAT(u.fecha_creado,'dd-MM-yyyy') AS fechaRegistro
					FROM tbl_usuarios u
					INNER JOIN tbl_rol r
					ON u.rolid = r.idrol
					WHERE u.idusuario = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}
		
		public function updateUsuario(int $idUsuario, string $identificacion, string $nombre, string $apellido, string $direccion, string $telefono, string $email, string
		$password, int $tipoid, int $status)
		{
			$this->intIdUsuario = $idUsuario;
			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strDireccion = $direccion;
			$this->strTelefono = $telefono;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;
			
			$sql = "SELECT * FROM tbl_usuarios WHERE (email_user = '{$this->strEmail}' AND idusuario != $this->intIdUsuario)
										  OR (identificacion = '{$this->strIdentificacion}' AND idusuario != $this->intIdUsuario) ";
			$request = $this->select_all($sql);
			
			if (empty($request)) {
				if ($this->strPassword != "") {
					$sql = "UPDATE tbl_usuarios SET identificacion=?, nombres=?, apellidos=?, direccion=?, telefono=?, email_user=?, password=?, rolid=?, estado=?
							WHERE idusuario = $this->intIdUsuario ";
					$arrData = array($this->strIdentificacion,
						$this->strNombre,
						$this->strApellido,
						$this->strDireccion,
						$this->strTelefono,
						$this->strEmail,
						$this->strPassword,
						$this->intTipoId,
						$this->intStatus);
				} else {
					$sql = "UPDATE tbl_usuarios SET identificacion=?, nombres=?, apellidos=?, direccion=?, telefono=?, email_user=?, rolid=?, estado=?
							WHERE idusuario = $this->intIdUsuario ";
					$arrData = array($this->strIdentificacion,
						$this->strNombre,
						$this->strApellido,
						$this->strDireccion,
						$this->strTelefono,
						$this->strEmail,
						$this->intTipoId,
						$this->intStatus);
				}
				$request = $this->update($sql, $arrData);
				$return = $request;
			} else {
				$request = 0;
			}
			return $request;
		}
		
		public function deleteUsuario(int $intIdusuario)
		{
			$this->intIdUsuario = $intIdusuario;
			$sql = "DELETE FROM tbl_usuarios WHERE idusuario = $this->intIdUsuario ";
			$request = $this->delete($sql, $arrData);
			return $request;
		}
		
		public function updatePerfil(int $idUsuario, string $identificacion, string $nombre, string $apellido, string $telefono, string $password){
			$this->intIdUsuario = $idUsuario;
			$this->strIdentificacion = $identificacion;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->strTelefono = $telefono;
			$this->strPassword = $password;
			
			if($this->strPassword != "")
			{
				$sql = "UPDATE tbl_usuarios SET identificacion=?, nombres=?, apellidos=?, telefono=?, password=?
						WHERE idusuario = $this->intIdUsuario ";
				$arrData = array($this->strIdentificacion,
					$this->strNombre,
					$this->strApellido,
					$this->strTelefono,
					$this->strPassword);
			}else{
				$sql = "UPDATE tbl_usuarios SET identificacion=?, nombres=?, apellidos=?, telefono=?
						WHERE idusuario = $this->intIdUsuario ";
				$arrData = array($this->strIdentificacion,
					$this->strNombre,
					$this->strApellido,
					$this->strTelefono);
			}
			$request = $this->update($sql,$arrData);
			return $request;
		}
		
		public function updateDataFiscal(int $idUsuario, string $strNit, string $strNomFiscal, string $strDirFiscal){
			$this->intIdUsuario = $idUsuario;
			$this->strNit = $strNit;
			$this->strNomFiscal = $strNomFiscal;
			$this->strDirFiscal = $strDirFiscal;
			$sql = "UPDATE persona SET nit=?, nombrefiscal=?, direccionfiscal=?
						WHERE idpersona = $this->intIdUsuario ";
			$arrData = array($this->strNit,
				$this->strNomFiscal,
				$this->strDirFiscal);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		
		
	}
	/** End of file usuariosModel.php **/
	
