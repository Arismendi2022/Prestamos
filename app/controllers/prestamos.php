<?php
	
	class Prestamos extends Controllers
	{
		public function __construct()
		{
			parent::__construct ();
			session_start ();
			if (empty($_SESSION['login'])) {
				header ('Location: ' . base_url () . '/login');
				die();
			}
			getPermisos (MPRESTAMOS);
		}
		
		public function Prestamos()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header ("Location:" . base_url () . '/dashboard');
			}
			
			$data['page_tag'] = "Prestamos";
			$data['page_title'] = "Prestamos - <small> Sistema de Crédito</small>";
			$data['page_name'] = "prestamos";
			$data['page_functions_js'] = "functions_prestamos.js";
			$this->views->getView ($this, "prestamos", $data);
		}
		
		public function setPrestamo()
		{
			if ($_POST) {
				if (empty($_POST['txtIdentificacion']) || empty($_POST['txtMonto']) || empty($_POST['txtInteres']) || empty(['txtCuotas']) || empty(['valor_cuota'])
					|| empty(['valor_total']) || empty(['listFormPago']) || empty(['listMoneda']) || empty(['fecha_prestamo'])) {
					
					$arrResponse = array ("status" => false, "msg" => 'Datos incorrectos.');
				} else {
					/** cabecera prestamos */
					$idUsuario = intval ($_POST['idUsuario']);
					$dtFecha = date ("Y-m-d", strtotime ($_POST['fecha_prestamo']));
					$intMonto = intval (quitarMillar ($_POST['txtMonto']));
					$intCuotas = intval ($_POST['txtCuotas']);
					$intInteres = intval ($_POST['txtInteres']);
					$intValorCuota = intVal (quitarMillar ($_POST['valor_cuota']));
					$intTotalInteres = intVal (quitarMillar ($_POST['valor_interes']));
					$intMontoTotal = intVal (quitarMillar ($_POST['valor_total']));
					$strFormaPago = strClean ($_POST['listFormPago']);
					$strMoneda = strClean ($_POST['listMoneda']);
					$request_user = "";
					
					if ($_SESSION['permisosMod']['w']) {
						$request_user = $this->model->insertPrestamo ($idUsuario,
							$dtFecha,
							$intMonto,
							$intCuotas,
							$intInteres,
							$intValorCuota,
							$intTotalInteres,
							$intMontoTotal,
							$strFormaPago,
							$strMoneda);
						
						/** Detalle prestamo */
						$datos = json_decode ($_POST['datos'], true);
						/** Recorrer los datos y enviarlos a la base de datos */
						foreach ($datos as $row) {
							$columna1 = $row['nroCuota'];
							$columna2 = $row['Fecha'];
							$columna3 = $row['Cuota'];
							$columna4 = $row['Interes'];
							$columna5 = $row['Capital'];
							$columna6 = $row['Saldo'];
							
							$nroCuota = intval ($columna1);
							$dtFecha = date ('Y-m-d', strtotime (strClean ($columna2)));
							$intCuota = intval (quitarMillar ($columna3));
							$intInteres = intval (quitarMillar ($columna4));
							$intCapital = intval (quitarMillar ($columna5));
							$intSaldo = intval (quitarMillar ($columna6));
							
							$request_user = $this->model->insertPrestamoItems ($nroCuota,
								$dtFecha,
								$intCuota,
								$intInteres,
								$intCapital,
								$intSaldo);
						}
					}
					/** Final Detalle prestamo */
					if ($request_user > 0) {
						$arrResponse = array ('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else {
						$arrResponse = array ("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode ($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getClientesLoan()
		{
			if ($_SESSION['permisosMod']['r']) {
				$arrData = $this->model->selectClientesLoan ();
				for ($i = 0; $i < count ($arrData); $i++) {
					$btnAgregar = '';
					
					if ($arrData[$i]['prestamo'] == 0) {
						$arrData[$i]['prestamo'] = '<span class="badge badge-success">Sin Prestamos</span>';
					} else {
						$arrData[$i]['prestamo'] = '<span class="badge badge-danger">Con Prestamos</span>';
					}
					
					if ($_SESSION['permisosMod']['r']) {
						$btnAgregar = '<button type="button" class="btn btn-info btn-sm" onClick="fntBuscarCliente(' . $arrData[$i]['idcliente'] . ')" title="Agregar Cliente">
							<i class="fa-solid fa-plus"></i></button>';
					}
					
					$arrData[$i]['options'] = '<div class="text-center">' . $btnAgregar . '</div>';
				}
				echo json_encode ($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getClienteLoan($idcliente)
		{
			if ($_SESSION['permisosMod']['r']) {
				$idusuario = intval ($idcliente);
				if ($idusuario > 0) {
					$arrData = $this->model->selectClienteLoan ($idcliente);
					
					if ($arrData['prestamo'] == '1') {
						$arrResponse = array ('status' => false, 'msg' => '¡Cliente con préstamo pendiente.',);
					} else {
						if (empty($arrData)) {
							$arrResponse = array ('status' => false, 'msg' => 'Datos no encontrados.');
						} else {
							$arrResponse = array ('status' => true, 'data' => $arrData);
						}
					}
					echo json_encode ($arrResponse, JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
		public function getPrestamos()
		{
			if ($_SESSION['permisosMod']['r']) {
				$arrData = $this->model->selectPrestamos ();
				
				for ($i = 0; $i < count ($arrData); $i++) {
					$btnView = '';
					if ($arrData[$i]['estado'] == 1) {
						$arrData[$i]['estado'] = '<span class="badge badge-warning">Pendiente</span>';
					} else {
						$arrData[$i]['estado'] = '<span class="badge badge-success">Pagado</span>';
					}
					$arrData[$i]['valor_cuota'] = SMONEY . ' ' . formatMoney ($arrData[$i]['valor_cuota']);
					$arrData[$i]['monto_prestamo'] = SMONEY . ' ' . formatMoney ($arrData[$i]['monto_prestamo']);
					$arrData[$i]['total_pagar'] = SMONEY . ' ' . formatMoney ($arrData[$i]['total_pagar']);
					$arrData[$i]['abonos'] = SMONEY . ' ' . formatMoney ($arrData[$i]['abonos']);
					$arrData[$i]['saldo'] = SMONEY . ' ' . formatMoney ($arrData[$i]['saldo']);
					
					if ($_SESSION['permisosMod']['r']) {
						$btnView = '<button type="button" class="btn btn-primary btn-sm" onClick="fntViewLoan(' . $arrData[$i]['idprestamo'] . ')" title="Ver préstamo"><i class="far fa-eye"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">' . $btnView . '</div>';
					
				}
				echo json_encode ($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getPrestamo($idprestamo)
		{
			if ($_SESSION['permisosMod']['r']) {
				$idPrestamo = intval ($idprestamo);
				if ($idPrestamo > 0) {
					$arrData = $this->model->selectPrestamo ($idPrestamo);
					$arrData['monto_prestamo'] = SMONEY . formatMoney ($arrData['monto_prestamo']);
					$arrData['total_interes'] = SMONEY . formatMoney ($arrData['total_interes']);
					$arrData['total_pagar'] = SMONEY . formatMoney ($arrData['total_pagar']);
					$arrData['interes'] = $arrData['interes'] . '%';
					
					if (empty($arrData)) {
						$arrResponse = array ('status' => false, 'msg' => 'Datos no encontrados.');
					} else {
						$arrResponse = array ('status' => true, 'data' => $arrData);
					}
					echo json_encode ($arrResponse, JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
		public function getAmortizacion($idprestamo)
		{
			if ($_SESSION['permisosMod']['r']) {
				$idPrestamo = intval ($idprestamo);
				
				$arrData = $this->model->selectAmortizacion ($idPrestamo);
				
				for ($i = 0; $i < count ($arrData); $i++) {
					
					$arrData[$i]['valor_cuota'] = SMONEY . ' ' . formatMoney ($arrData[$i]['valor_cuota']);
					$arrData[$i]['interes'] = SMONEY . ' ' . formatMoney ($arrData[$i]['interes']);
					$arrData[$i]['capital'] = SMONEY . ' ' . formatMoney ($arrData[$i]['capital']);
					$arrData[$i]['saldo'] = SMONEY . ' ' . formatMoney ($arrData[$i]['saldo']);
					
					if ($arrData[$i]['estado'] == 0) {
						$arrData[$i]['estado'] = '<span class="badge bg-success">Pagado</span>';
					} else {
						$arrData[$i]['estado'] = '<span class="badge bg-danger">Pendiente</span>';
					}
				}
				echo json_encode ($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		
	}
	/** end file prestamos.php **/
