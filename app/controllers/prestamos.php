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
						$btnAgregar = '<button type="button" class="btn btn-info btn-sm" onClick="fntAgregar(' . $arrData[$i]['idpersona'] . ')" title="Agregar Cliente">
							<i class="fa-solid fa-plus"></i></button>';
					}
					
					$arrData[$i]['options'] = '<div class="text-center">' . $btnAgregar . '</div>';
				}
				echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getClienteloan($idpersona){
			if($_SESSION['permisosMod']['r']){
				$idusuario = intval($idpersona);
				if($idusuario > 0)
				{
					$arrData = $this->model->selectClienteLoan($idusuario);
					if(empty($arrData))
					{
						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
					}else{
						$arrResponse = array('status' => true, 'data' => $arrData);
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
		
	}
	/** end file prestamos.php **/
