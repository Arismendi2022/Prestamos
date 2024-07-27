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
			
			$anio = date('Y');
			
			$data['flujoCaja']  = $this->model->selectFlujoCaja($anio);
			
			$this->views->getView($this, "flujoCaja", $data);
			
		}
		
		public function hojaBalance()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			$data['page_tag'] = "Contabilida";
			$data['page_title'] = "Hoja de balance - <small>Sistema de Crédito</small>";
			$data['page_name'] = "contabilidad";
			$data['page_functions_js'] = "functions_contabilidad.js";
			
			$data['hojaBalance']  = $this->model->selectHojaBalance();
			
			//dep($data['hojaBalance']); exit;
			
			$this->views->getView($this, "hojaBalance", $data);
		}
		
		public function ganancias(){
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			$data['page_tag'] = "Contabilida";
			$data['page_title'] = "Ganancias / Perdidas";
			$data['page_name'] = "contabilidad";
			$data['page_functions_js'] = "functions_contabilidad.js";
			
			$data['utilidad']  = $this->model->selectUtilidad();
			
			$this->views->getView($this, "ganancias", $data);
			
		}
		
		public function cajaMensual(){
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			$data['page_tag'] = "Contabilida";
			$data['page_title'] = "Ingresos Diferidos Mensuales";
			$data['page_name'] = "contabilidad";
			$data['page_functions_js'] = "functions_contabilidad.js";
			
			$anio = date('Y');
			$data['ingresosDiferidos']  = $this->model->selectIngresosDiferidos($anio);
			//dep($data['ingresosDiferidos']); exit;
			$this->views->getView($this, "ingresosDiferidos", $data);
		}
		
	}
	/** end file Contabilidad.php **/

