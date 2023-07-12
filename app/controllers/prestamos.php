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
				if (empty($_POST['txtIdentificacion']) || empty($_POST['txtMonto']) || empty($_POST['txtInteres']) || empty(['txtCuotas']) || empty(['valor_cuota']) || empty
					(['listFormPago']) || empty(['listMoneda']) || empty(['fecha_prestamo'])) {
					
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				} else {
					/** cabecera prestamos */
					/*$idUsuario = intval($_POST['idUsuario']);
					$intMonto = intval(quitarMillar($_POST['txtMonto']));
					$intInteres = intval($_POST['txtInteres']);
					$intCuotas = intval($_POST['txtCuotas']);
					$intValorCuota = intVal(quitarMillar($_POST['valor_cuota']));
					$strFormaPago = strClean($_POST['listFormPago']);
					$strMoneda = strClean($_POST['listMoneda']);
					$dtFecha = date("Y-m-d", strtotime($_POST['fecha_prestamo']));
					
					$request_user = $this->model->insertPrestamo($idUsuario,
						$intMonto,
						$intInteres,
						$intCuotas,
						$intValorCuota,
						$strFormaPago,
						$strMoneda,
						$dtFecha);*/
					
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
		
		public function Listado()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			
			$data['page_tag'] = "Listado";
			$data['page_title'] = "Listado de Préstamos - <small> Sistema de Crédito</small>";
			$data['page_name'] = "listado";
			$data['page_functions_js'] = "functions_prestamos.js";
			$this->views->getView($this, "listado", $data);
		}
		
	}
	/** end file prestamos.php **/
