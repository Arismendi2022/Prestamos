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
				WHERE rolid = ".RCLIENTES." and estado != 0 ";
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectClienteloan(int $idpersona){
			$this->intIdUsuario = $idpersona;
			$sql = "SELECT idpersona,identificacion,concat(nombres, ' ', apellidos) as nombres,telefono,email_user,estado,prestamos
				FROM persona
				WHERE idpersona = $this->intIdUsuario and rolid = ".RCLIENTES;
			$request = $this->select($sql);
			return $request;
		}
		
	
	}
	/** End of file prestamosModel.php **/
