<?php
	
	class Prestamos extends Controllers
	{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('Location: ' . base_url() . '/login');
				die();
			}
			getPermisos(MPRESTAMOS);
		}
		
		public function Prestamos()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			
			$data['page_tag'] = "Prestamos";
			$data['page_title'] = "Prestamos - <small> Sistema de Crédito</small>";
			$data['page_name'] = "prestamos";
			$data['page_functions_js'] = "functions_prestamos.js";
			$this->views->getView($this, "prestamos", $data);
		}
		
		
		
	}
	/** end file prestamos.php **/
	