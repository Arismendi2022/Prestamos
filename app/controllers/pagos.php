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
		
		public function getClientesPrestamo()
		{
			if ($_SESSION['permisosMod']['r']) {
				$arrData = $this->model->selectClientesPrestamo();
				
				for ($i = 0; $i < count($arrData); $i++) {
					$btnAgregar = '';
					$arrData[$i]['monto_prestamo'] = SMONEY . ' ' . formatMoney($arrData[$i]['monto_prestamo']);
					
					if ($arrData[$i]['estado'] != 0) {
						$arrData[$i]['estado'] = '<span class="badge badge-info">Pendiente</span>';
					}
					
					if ($_SESSION['permisosMod']['r']) {
						$btnAgregar = '<button type="button" class="btn btn-info btn-sm" onClick="fntAddCliente(' . $arrData[$i]['idcliente'] . ')" title="Agregar Cliente">
							<i class="fa-solid fa-plus"></i></button>';
					}
					
					$arrData[$i]['options'] = '<div class="text-center">' . $btnAgregar . '</div>';
				}
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getClientePrestamo($idprestamo)
		{
			if ($_SESSION['permisosMod']['r']) {
				$idPrestamo = intval($idprestamo);
				if ($idPrestamo > 0) {
					$arrData = $this->model->selectPrestamo($idPrestamo);
					
					//dep($arrData); exit;
					
					$arrData['prestamo']['monto_prestamo'] = SMONEY . ' ' . formatMoney($arrData['prestamo']['monto_prestamo']);
					$arrData['prestamo']['idprestamo'] = '0000' . $arrData['prestamo']['idprestamo'];
					//$arrData['total_interes'] = SMONEY . ' ' . formatMoney($arrData['total_interes']);
					//$arrData['total_pagar'] = SMONEY . ' ' . formatMoney($arrData['total_pagar']);
					//$arrData['interes'] = $arrData['interes'] . '%';
					
					if (empty($arrData)) {
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					} else {
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
		
	} /** Final Archivo pagos.php */
