<?php
	
	class Dashboard extends controllers
	{
		public function __construct()
		{
			parent::__construct();
			
			session_start();
			if(empty($_SESSION['login'])){
				header('Location: ' . base_url() . '/login');
				die();
			}
			getPermisos(MDASHBOARD);
		}
		
		public function dashboard()
		{
			$data['page_tag']          = "Dashboard | Sistema de Crédito";
			$data['page_title']        = "Dashboard - <small>Sistema de Crédito</small>";
			$data['page_name']         = "dashboard";
			$data['page_functions_js'] = "functions_dashboard.js";
			
			$anio = date('Y');
			$mes  = date('m');
			
			/** Tarjetas */
			$data['tarjetasDashboard']  = $this->model->tarjetasDashboard($anio);
			$data['pagosCartera']      = $this->model->selectCartera();
			
			/** Graficos */
			$data['totalPrestamos']  = $this->model->selectChartPrestamos();
			$data['totalPagos']      = $this->model->selectChartPagos($anio);
			$data['totalInteres']    = $this->model->selectChartInteres($anio);
			$data['saldoPrestamos']  = $this->model->saldoPrestamos();
			$data['montosPrestados'] = $this->model->montosPrestados($anio);
			$data['pagosPrestamos']  = $this->model->selectPagosPrestamos($anio);
			
			//dep($data['pagosCartera']); exit;
			
			$this->views->getView($this,"dashboard",$data);
		}
		
		
	}
	/** end file dashboard.php **/

