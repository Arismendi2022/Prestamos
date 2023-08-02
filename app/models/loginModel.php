<?php
	
	class LoginModel extends Mysql
	{
		private $intIdUsuario;
		private $strUsuario;
		private $strPassword;
		private $strToken;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function loginUser(string $usuario, string $password)
		{
			$this->strUsuario = $usuario;
			$this->strPassword = $password;
			$sql = "SELECT idusuario,estado FROM tbl_usuarios WHERE
					email_user = '$this->strUsuario' and
					password = '$this->strPassword'";
			$request = $this->select($sql);
			return $request;
		}
		
		public function sessionLogin(int $iduser){
			$this->intIdUsuario = $iduser;
			//BUSCAR ROLE
			$sql = "SELECT u.idusuario,
							u.identificacion,
							u.nombres,
							u.apellidos,
							u.foto,
							u.telefono,
							u.email_user,
							r.idrol,r.nombrerol,
							u.estado
					FROM tbl_usuarios u
					INNER JOIN tbl_rol r
					ON u.rolid = r.idrol
					WHERE u.idusuario = $this->intIdUsuario";
			$request = $this->select($sql);
			$_SESSION['userData'] = $request;
			return $request;
		}
		
	}
	/** End of file loginModel.php **/
