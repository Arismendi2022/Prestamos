<?php
	class RolesModel extends Mysql
	{
		public $intIdrol;
		public $strRol;
		public $strDescripcion;
		public $intStatus;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		//Extrae Roles para datatable
		public function selectRoles()
		{
			$whereAdmin = "";
			if($_SESSION['idUser'] != 1 ){
				$whereAdmin = " and idrol != 1 ";
			}
			$sql = "SELECT * FROM tbl_rol".$whereAdmin;
			$request = $this->select_all($sql);
			return $request;
		}
		//Buscar Roles
		public function selectRol(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM tbl_rol WHERE idrol = $this->intIdrol";
			$request = $this->select($sql);
			return $request;
		}
		//Inserta datos del nuevo rol
		public function insertRol(string $rol, string $descripcion, int $status){
			
			$return = "";
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;
			
			$sql = "SELECT * FROM tbl_rol WHERE nombrerol = '{$this->strRol}' ";
			$request = $this->select_all($sql);
			
			if(empty($request))
			{
				$query_insert  = "INSERT INTO tbl_rol(nombrerol,descripcion,estado) VALUES(?,?,?)";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
				$return = 0;
			}
			return $return;
		}
		//Actualiza Rol
		public function updateRol(int $idrol, string $rol, string $descripcion, int $status){
			$this->intIdrol = $idrol;
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;
			
			$sql = "SELECT * FROM tbl_rol WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
			$request = $this->select_all($sql);
			
			if(empty($request))
			{
				$sql = "UPDATE tbl_rol SET nombrerol = ?, descripcion = ?, estado = ? WHERE idrol = $this->intIdrol ";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = 0;
			}
			return $request;
		}
		//elimina rol
		public function deleteRol(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM tbl_usuarios WHERE rolid = $this->intIdrol";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "DELETE FROM tbl_rol WHERE idrol = $this->intIdrol ";
				$request = $this->delete($sql,$arrData);
				if($request)
				{
					$request = 'ok';
				}else{
					$request = 'error';
				}
			}else{
				$request = 0;
			}
			return $request;
		}
		
	}
	/** end files rolesModel.php */
