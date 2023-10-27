<?php
	
	class Empresa extends controllers
	{
		
		public function __construct()
		{
			parent::__construct ();
			session_start ();
			if (empty($_SESSION['login'])) {
				header ('Location: ' . base_url () . '/login');
				die();
			}
			getPermisos (MUSUARIOS);
		}
		
		public function empresa()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header ("Location:" . base_url () . '/dashboard');
			}
			$data['page_tag'] = "Empresa";
			$data['page_title'] = "Informacion General";
			$data['page_name'] = "empresa";
			$data['page_functions_js'] = "functions_empresa.js";
			
			$this->views->getView ($this, "empresa", $data);
		}
		
		/** agrega capital a SQL Server*/
		public function setCapital()
		{
			if ($_POST) {
				
				if (empty($_POST['txtFecha']) || empty($_POST['txtMonto']) || empty($_POST['txtDescripcion']) || empty($_POST['listCuentas'])) {
					
					$arrResponse = array ("status" => false, "msg" => 'Datos incorrectos.');
					
				} else {
					$intIdcapital = intval ($_POST['idCapital']);
					$strFecha = convertDateFormat ($_POST['txtFecha']);
					$intMonto = intval (removerMiles ($_POST['txtMonto']));
					$strDescripcion = strClean ($_POST['txtDescripcion']);
					$strCuentas = strClean ($_POST['listCuentas']);
					$request_cap = '';
					
					if ($intIdcapital == 0) {
						/** Agregar capital */
						if ($_SESSION['permisosMod']['w']) {
							$request_capt = $this->model->insertCapital ($strFecha, $intMonto, $strDescripcion, $strCuentas);
							$option = 1;
						}
						
					} else {
						/** Actualizar capital */
						if ($_SESSION['permisosMod']['w']) {
							$request_capt = $this->model->updateCapital ($intIdcapital, $strFecha, $intMonto, $strDescripcion, $strCuentas);
							$option = 2;
						}
					}
					if ($request_capt > 0) {
						if ($option == 1) {
							$arrResponse = array ('status' => true, 'msg' => 'Datos guardados correctamente.');
						} else {
							$arrResponse = array ('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
					} else {
						$arrResponse = array ("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode ($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		/** Extrae el listado del capital en DataTable */
		public function getCapital()
		{
			if ($_SESSION['permisosMod']['r']) {
				$btnEdit = '';
				$btnDelete = '';
				
				$arrData = $this->model->selectCapital ();
				
				for ($i = 0; $i < count ($arrData); $i++) {
					$arrData[$i]['capital'] = SMONEY . formatMoney ($arrData[$i]['capital']);
					
					if ($_SESSION['permisosMod']['u']) {
						$btnEdit = '<button type="button" class="btn btn-info btn-sm btnEditCapital" onClick="fntEditCapital(' . $arrData[$i]['idcapital'] . ')" title="Editar">
							<i class="fa-solid fa-pen-to-square"></i></button>';
					}
					if ($_SESSION['permisosMod']['d']) {
						$btnDelete = '<button type="button" class="btn btn-danger btn-sm btnDelCapital" onClick="fntDelCapital(' . $arrData[$i]['idcapital'] . ')" title="Eliminar">
							<i class="fas fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">' . $btnEdit . ' ' . $btnDelete . '</div>';
					
				}
				echo json_encode ($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		/** Actualiza Capital */
		public function getEditCapital(int $idcapital)
		{
			if ($_SESSION['permisosMod']['r']) {
				$intIdcapital = intval (strClean ($idcapital));
				if ($intIdcapital > 0) {
					$arrData = $this->model->selectEditCapital ($intIdcapital);
					
					$arrData['capital'] = formatMoney ($arrData['capital']);
					
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
		
		public function delCapital()
		{
			if ($_POST) {
				if ($_SESSION['permisosMod']['d']) {
					$intidcapital = intval ($_POST['idCapital']);
					$requestDelete = $this->model->deleteCapital ($intidcapital);
					if ($requestDelete) {
						$arrResponse = array ('status' => true, 'msg' => 'Se ha eliminado el capital ');
					} else {
						$arrResponse = array ('status' => false, 'msg' => 'Error al eliminar el capital.');
					}
					echo json_encode ($arrResponse, JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
		/** traemos el valor del capital */
		public function getPatrimonio()
		{
			if ($_SESSION['permisosMod']['r']) {
				
				$arrData = $this->model->selectPatrimonio ();
				$arrData['total'] = SMONEY . formatMoney ($arrData['total']);
				
				if (empty($arrData)) {
					$arrResponse = array ('status' => false, 'msg' => 'Datos no encontrados.');
				} else {
					$arrResponse = array ('status' => true, 'data' => $arrData);
				}
				
				echo json_encode ($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			
			die();
		}
		
		
	}
