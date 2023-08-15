<?php
	
	class Pagos extends Controllers
	{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('Location: ' . base_url() . '/login');
				die();
			}
			getPermisos(MPAGOS);
		}
		
		public function Pagos()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			
			$data['page_tag'] = "Pagos";
			$data['page_title'] = "Pagos Préstamos - <small> Sistema de Crédito</small>";
			$data['page_name'] = "pagos";
			$data['page_functions_js'] = "functions_pagos.js";
			$this->views->getView($this, "pagos", $data);
		}
		
		public function getPagos()
		{
			if ($_SESSION['permisosMod']['r']) {
				$arrData = $this->model->selectPagos();
			
				for ($i = 0; $i < count($arrData); $i++) {
					$arrData[$i]['prestamoid'] = '0000' . $arrData[$i]['prestamoid'];
					$arrData[$i]['monto_pagado'] = SMONEY . ' ' . formatMoney($arrData[$i]['monto_pagado']);
					
					if ($_SESSION['permisosMod']['r']) {
						$btnAgregar = '<button type="button" class="btn btn-info btn-sm" onClick="fntImprimirPago(' . $arrData[$i]['idpago'] . ')" title="Imprimir Recibo">
							<i class="fa-solid fa-print"></i></button>';
					}
					
					$arrData[$i]['options'] = '<div class="text-center">' . $btnAgregar . '</div>';
					
				}
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		
		}
		
		
	} /** Final Archivo pagos.php */
