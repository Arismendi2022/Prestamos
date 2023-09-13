<?php
	
	class Contabilidad extends controllers {
		
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('Location: ' . base_url() . '/login');
				die();
			}
			getPermisos(MCONTABILIDAD);
		}
		
		
		public function contabilidad()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			$data['page_tag'] = "Contabilidad";
			$data['page_title'] = "Flujo de caja - <small>Sistema de Crédito</small>";
			$data['page_name'] = "contabilidad";
			$data['page_functions_js'] = "functions_contabilidad.js";
			$this->views->getView($this, "contabilidad", $data);
		}
		
		public function balance()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			$data['page_tag'] = "Contabilida";
			$data['page_title'] = "Hoja de balance - <small>Sistema de Crédito</small>";
			$data['page_name'] = "contabilidad";
			$data['page_functions_js'] = "functions_contabilidad.js";
			$this->views->getView($this, "balance", $data);
		}
		
	}
	/** end file Contabilidad.php **/

