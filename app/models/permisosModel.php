<?php
	
	class PermisosModel extends Mysql
	{
		public $intIdpermiso;
		public $intRolid;
		public $intModuloid;
		public $r;
		public $w;
		public $u;
		public $d;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function selectModulos()
		{
			$sql = "SELECT * FROM tbl_modulos";
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function selectPermisosRol(int $idrol)
		{
			$this->intRolid = $idrol;
			$sql = "SELECT * FROM tbl_permisos WHERE rolid = $this->intRolid";
			$request = $this->select_all($sql);
			return $request;
		}
		
		public function deletePermisos(int $idrol)
		{
			$this->intRolid = $idrol;
			$sql = "DELETE FROM tbl_permisos WHERE rolid = $this->intRolid";
			$request = $this->delete($sql);
			return $request;
		}
		
		public function insertPermisos(int $idrol, int $idmodulo, int $r, int $w, int $u, int $d)
		{
			$this->intRolid = $idrol;
			$this->intModuloid = $idmodulo;
			$this->r = $r;
			$this->w = $w;
			$this->u = $u;
			$this->d = $d;
			$query_insert = "INSERT INTO tbl_permisos(rolid,moduloid,r,w,u,d) VALUES(?,?,?,?,?,?)";
			$arrData = array($this->intRolid, $this->intModuloid, $this->r, $this->w, $this->u, $this->d);
			$request_insert = $this->insert($query_insert, $arrData);
			return $request_insert;
		}
		
		public function permisosModulo(int $idrol){
			$this->intRolid = $idrol;
			$sql = "SELECT p.rolid,
						   p.moduloid,
						   m.titulo as modulos,
						   p.r,
						   p.w,
						   p.u,
						   p.d
					FROM tbl_permisos p
					INNER JOIN tbl_modulos m
					ON p.moduloid = m.idmodulo
					WHERE p.rolid = $this->intRolid";
			$request = $this->select_all($sql);
			$arrPermisos = array();
			for ($i=0; $i < count($request); $i++) {
				$arrPermisos[$request[$i]['moduloid']] = $request[$i];
			}
			return $arrPermisos;
		}
		
	}
	/** End of file permisosModel.php **/



