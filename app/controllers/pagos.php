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
		
		public function setPagos()
		{
			if ($_POST) {
				$idPrestamo = intval($_POST['idPrestamo']);
				$idCliente = intval($_POST['idCliente']);
				
				if ($_SESSION['permisosMod']['w']) {
					/** Detalle prestamo */
					$datos = json_decode($_POST['datos'], true);
					/** Recorrer los datos y enviarlos a la base de datos */
					foreach ($datos as $row) {
						$intIdCuota = $row['id'];
						$intnroCuota = $row['ncuota'];
						$intCuota = $row['cuota'];
						
						$idCuota = intval($intIdCuota);
						$nroCuota = intval($intnroCuota);
						$valorCuota = intval(limpiarValores($intCuota));
						
						$request_pagos = $this->model->insertPagos($idPrestamo,
							$idCliente,
							$valorCuota,
							$nroCuota);
						/** actualiza es estado de la cuota pagada */
						$request_pagos = $this->model->updatePrestamo($idCuota);
					}
					/** cambia el  estado de prestamo en clientes y prestamos se pago en su totalidad */
					$request_pagos = $this->model->updateEstadoPrestamo($idPrestamo, $idCliente);
				}
				
				if ($request_pagos > 0) {
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
				
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
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
						$arrData[$i]['estado'] = '<span class="badge badge-success">Pendiente</span>';
					}
					
					if ($_SESSION['permisosMod']['r']) {
						$btnAgregar = '<button type="button" class="btn btn-primary btn-sm" onClick="fntAddCliente(' . $arrData[$i]['idprestamo'] . ')" title="Agregar Cliente">
							<i class="fa-solid fa-check"></i></button>';
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
					
					if ($_SESSION['permisosMod']['r']) {
						$btnCheckbox = '<input type="checkbox" onClick="fntPagosCuotas()" name="id[]" ' . ($arrData[$i]['estado'] ? '' : 'disabled checked') . " data-id=" .
							$arrData[$i]['idamortizacion'] . " data-nCuota=" . $arrData[$i]['nro_cuota'] . " data-cuota=" . $arrData[$i]['valor_cuota'] . ' value='
							. $arrData[$i]['idamortizacion'] . '>';
					}
					
					if ($arrData[$i]['estado'] == 0) {
						$arrData[$i]['estado'] = '<span class="badge bg-success">Pagado</span>';
					} else {
						$arrData[$i]['estado'] = '<span class="badge bg-danger">Pendiente</span>';
					}
					
					$arrData[$i]['checkbox'] = '<div class="text-center">' . $btnCheckbox . '</div>';
				}
				
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		
	} /** Final Archivo pagos.php */
