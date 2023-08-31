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
			/** Tarjetas */
			$data['prestamosActivos'] = $this->model->selectPrestamosActivos();
			$data['saldoCaja'] = $this->model->selectSaldoCaja();
			$data['saldoCaja'] = (CAPITAL - $data['prestamosActivos']) + $data['saldoCaja'];
			$data['porcentajeRecaudo'] = $this->model->selectPorcentajeRecaudo();
			$data['pagosAnio'] = $this->model->selectPagosAnio($anio);
			$data['pagosHoy'] = $this->model->selectPagosHoy();
			/** Graficos */
			$data['chartPrestamos'] = $this->model->selectChartPrestamos();
			$data['chartPagos'] = $this->model->selectChartPagos($anio);
			
			//dep($data['chartPagos']); exit;
			
			$this->views->getView($this, "dashboard", $data);
		}
		
		
	}
	/** end file dashboard.php **/

