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
			$data['porcentajeRecaudo'] = $this->model->selectPorcentajeRecaudo();
			$data['pagosAnio'] = $this->model->selectPagosAnio($anio);
			$data['pagosHoy'] = $this->model->selectPagosHoy();
			/** Graficos */
			$data['totalPrestamos'] = $this->model->selectChartPrestamos();
			$data['totalPagos'] = $this->model->selectChartPagos($anio);
			$data['totalInteres'] = $this->model->selectChartInteres($anio);
			$data['saldoPrestamos'] = $this->model->saldoPrestamos();
			$data['montosPrestados'] = $this->model->montosPrestados($anio);
			
			//dep($data['montosPrestados']); exit;
			
			$this->views->getView($this, "dashboard", $data);
		}
		
		
	}
	/** end file dashboard.php **/

