<?php
	
	class Prestamos extends Controllers
	{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('Location: ' . base_url() . '/login');
				die();
			}
			getPermisos(MPRESTAMOS);
			getPermisos(MLSTPRESTAMOS);
		}
		
		public function Prestamos()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			
			$data['page_tag'] = "Prestamos";
			$data['page_title'] = "Prestamos - <small> Sistema de Crédito</small>";
			$data['page_name'] = "prestamos";
			$data['page_functions_js'] = "functions_prestamos.js";
			$this->views->getView($this, "prestamos", $data);
		}
		
		public function setPrestamo()
		{
			if ($_POST) {
				if (empty($_POST['txtIdentificacion']) || empty($_POST['txtMonto']) || empty($_POST['txtInteres']) || empty(['txtCuotas']) || empty(['valor_cuota'])
					|| empty(['valor_total']) || empty(['listFormPago']) || empty(['listMoneda']) || empty(['fecha_prestamo'])) {
					
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				} else {
					/** cabecera prestamos */
					$idUsuario = intval($_POST['idUsuario']);
					$intMonto = intval(quitarMillar($_POST['txtMonto']));
					$intInteres = intval($_POST['txtInteres']);
					$intCuotas = intval($_POST['txtCuotas']);
					$intValorCuota = intVal(quitarMillar($_POST['valor_cuota']));
					$intMontoTotal = intVal(quitarMillar($_POST['valor_total']));
					$strFormaPago = strClean($_POST['listFormPago']);
					$strMoneda = strClean($_POST['listMoneda']);
					$dtFecha = date("Y-m-d", strtotime($_POST['fecha_prestamo']));
					$request_user = "";
					
					if ($_SESSION['permisosMod']['w']) {
						$request_user = $this->model->insertPrestamo($idUsuario,
							$intMonto,
							$intInteres,
							$intCuotas,
							$intValorCuota,
							$intMontoTotal,
							$strFormaPago,
							$strMoneda,
							$dtFecha);
						
						/** Detalle prestamo */
						$datos = json_decode($_POST['datos'], true);
						/** Recorrer los datos y enviarlos a la base de datos */
						foreach ($datos as $row) {
							$columna1 = $row[0];
							$columna2 = $row[1];
							$columna3 = $row[2];
							$columna4 = $row[3];
							$columna5 = $row[4];
							$columna6 = $row[5];
							
							$nroCuota = intval($columna1);
							$dtFecha = date('Y-m-d', strtotime(strClean($columna2)));
							$intCuota = intval(quitarMillar($columna3));
							$intInteres = intval(quitarMillar($columna4));
							$intCapital = intval(quitarMillar($columna5));
							$intSaldo = intval(quitarMillar($columna6));
							
							$request_user = $this->model->insertPrestamoItems($nroCuota,
								$dtFecha,
								$intCuota,
								$intInteres,
								$intCapital,
								$intSaldo);
						}
					}
					/** Final Detalle prestamo */
					if ($request_user > 0) {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getClientesLoan()
		{
			if ($_SESSION['permisosMod']['r']) {
				$arrData = $this->model->selectClientesLoan();
				for ($i = 0; $i < count($arrData); $i++) {
					$btnAgregar = '';
					
					if ($arrData[$i]['prestamos'] == 0) {
						$arrData[$i]['prestamos'] = '<span class="badge badge-success">Sin Prestamos</span>';
					} else {
						$arrData[$i]['prestamos'] = '<span class="badge badge-danger">Con Prestamos</span>';
					}
					
					if ($_SESSION['permisosMod']['r']) {
						$btnAgregar = '<button type="button" class="btn btn-info btn-sm" onClick="fntBuscarCliente(' . $arrData[$i]['idpersona'] . ')" title="Agregar Cliente">
							<i class="fa-solid fa-plus"></i></button>';
					}
					
					$arrData[$i]['options'] = '<div class="text-center">' . $btnAgregar . '</div>';
				}
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getClienteLoan($idpersona)
		{
			if ($_SESSION['permisosMod']['r']) {
				$idusuario = intval($idpersona);
				if ($idusuario > 0) {
					$arrData = $this->model->selectClienteLoan($idusuario);
					
					if ($arrData['prestamos'] == '1') {
						$arrResponse = array('status' => false, 'msg' => '¡Cliente con préstamo pendiente.',);
					} else {
						if (empty($arrData)) {
							$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
						} else {
							$arrResponse = array('status' => true, 'data' => $arrData);
						}
					}
					echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
		public function reportePrestamos()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			$data['page_tag'] = "Reporte de Prestamos";
			$data['page_title'] = "Reporte de Préstamos - <small> Sistema de Crédito</small>";
			$data['page_name'] = "reporte prestamos";
			$data['page_functions_js'] = "functions_prestamos.js";
			$this->views->getView($this, "reportePrestamos", $data);
		}
		
		public function getPrestamos()
		{
			if ($_SESSION['permisosMod']['r']) {
				$arrData = $this->model->selectPrestamos();
				
				for ($i = 0; $i < count($arrData); $i++) {
					$btnView = '';
					if ($arrData[$i]['estado'] == 1) {
						$arrData[$i]['estado'] = '<span class="badge badge-warning">Pendiente</span>';
					} else {
						$arrData[$i]['estado'] = '<span class="badge badge-primary">Pagado</span>';
					}
					$arrData[$i]['valor_cuota'] = SMONEY . ' ' . formatMoney($arrData[$i]['valor_cuota']);
					$arrData[$i]['monto_credito'] = SMONEY . ' ' . formatMoney($arrData[$i]['monto_credito']);
					$arrData[$i]['monto_total'] = SMONEY . ' ' . formatMoney($arrData[$i]['monto_total']);
					$arrData[$i]['abonos'] = SMONEY . ' ' . formatMoney($arrData[$i]['abonos']);
					$arrData[$i]['saldo'] = SMONEY . ' ' . formatMoney($arrData[$i]['saldo']);
					
					if ($_SESSION['permisosMod']['r']) {
						$btnView = '<button type="button" class="btn btn-primary btn-sm" onClick="fntViewLoan(' . $arrData[$i]['idprestamo'] . ')" title="Ver préstamo"><i class="far fa-eye"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';
					
				}
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getPrestamo($idprestamo)
		{
			if ($_SESSION['permisosMod']['r']) {
				$idPrestamo = intval($idprestamo);
				if ($idPrestamo > 0) {
					$arrData = $this->model->selectPrestamo($idPrestamo);
					$arrData['monto_credito'] = SMONEY . ' ' . formatMoney($arrData['monto_credito']);
					$arrData['totalIntereses'] = SMONEY . ' ' . formatMoney($arrData['totalIntereses']);
					$arrData['monto_total'] = SMONEY . ' ' . formatMoney($arrData['monto_total']);
					$arrData['interes'] = $arrData['interes'].'%';
					
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
	}
	/** end file prestamos.php **/
