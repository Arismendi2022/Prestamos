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
		
		public function setPagos(){
			if ($_POST) {
				
				$idPrestamo = intval($_POST['idPrestamo']);
				$idCliente = intval($_POST['idCliente']);
				
				/** Detalle prestamo */
				$datos = json_decode($_POST['datos'], true);
				/** Recorrer los datos y enviarlos a la base de datos */
				foreach ($datos as $row) {
					$intIdCuota = $row['id_cuota'];
					$intnroCuota= $row['nro_cuota'];
					$intCuota = $row['valor_cuota'];
					
					$id_cuota = intval($intIdCuota);
					$nro_cuota = intval($intnroCuota);
					$valor_cuota = intval(limpiarValores($intCuota));
					
				}
				
				dep($valor_cuota); exit;
				
				
			}
			
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
						$arrData[$i]['estado'] = '<span class="badge badge-primary">Pendiente</span>';
					}
					
					if ($_SESSION['permisosMod']['r']) {
						$btnAgregar = '<button type="button" class="btn btn-info btn-sm" onClick="fntAddCliente(' . $arrData[$i]['idprestamo'] . ')" title="Agregar Cliente">
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
					
					$arrData['monto_prestamo'] = SMONEY . ' ' . formatMoney($arrData['monto_prestamo']);
					$arrData['idprestamo'] = '0000' . $arrData['idprestamo'];
					
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
		
		public function getDetalle($idprestamo)
		{
			if ($_SESSION['permisosMod']['r']) {
				$idPrestamo = intval($idprestamo);
				
				$arrData = $this->model->selectDetalle($idPrestamo);
				
				for ($i = 0; $i < count($arrData); $i++) {
					$btnCheckbox = '';
					$arrData[$i]['valor_cuota'] = SMONEY . '' . formatMoney($arrData[$i]['valor_cuota']);
					
					if ($arrData[$i]['estado'] == 0) {
						$arrData[$i]['estado'] = '<span class="badge bg-success">Pagado</span>';
					} else {
						$arrData[$i]['estado'] = '<span class="badge bg-danger">Pendiente</span>';
					}
					if ($_SESSION['permisosMod']['r']) {
						$btnCheckbox = '<input type="checkbox" onClick="fntPagosCuotas()" name="id[]" ' . ($arrData[$i]['estado'] ? '' : 'disabled
						checked') . ' data-cuota=' . $arrData[$i]['valor_cuota'] . ' value='.$arrData[$i]['idamortizacion'].'>';
					}
					
					$arrData[$i]['checkbox'] = '<div class="text-center">' . $btnCheckbox . '</div>';
					
				}
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
	
	
		
	} /** Final Archivo pagos.php */
