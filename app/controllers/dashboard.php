<?php
	
	class Dashboard extends controllers
	{
		public function __construct()
		{
			parent::__construct();
			
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
			getPermisos(MDASHBOARD);
		}
		
		public function dashboard()
		{
			$data['page_tag'] = "Dashboard | Sistema de Crédito";
			$data['page_title'] = "Dashboard - <small>Sistema de Crédito</small>";
			$data['page_name'] = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";
			
			$anio = date('Y');
			$mes = date('m');
			
			$data['prestamosActivos'] = $this->model->selectPrestamosActivos();
			//dep($data['prestamosAnio']);exit;
			$data['saldoCaja'] = $this->model->selectSaldoCaja();
			$data['saldoCaja'] = (CAPITAL - $data['prestamosActivos'])+ $data['saldoCaja'];
			$data['porcentajeRecaudo'] = $this->model->selectPorcentajeRecaudo();
			//dep($data['totalRecaudo']); exit;
			
			
		 
			
			$this->views->getView($this, "dashboard", $data);
		}
		
		
	}
	/** end file dashboard.php **/

