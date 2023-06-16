<?php
	
	class clientes extends Controllers
	{
		
		public function __construct()
		{
			parent::__construct();
			session_start();
			if (empty($_SESSION['login'])) {
				header('Location: ' . base_url() . '/login');
				die();
			}
			getPermisos(MCLIENTES);
		}
		
		public function clientes()
		{
			if (empty($_SESSION['permisosMod']['r'])) {
				header("Location:" . base_url() . '/dashboard');
			}
			$data['page_tag'] = "Clientes";
			$data['page_title'] = "Clientes - <small>Sistema de Crédito</small>";
			$data['page_name'] = "clientes";
			$data['page_functions_js'] = "functions_clientes.js";
			$this->views->getView($this, "clientes", $data);
		}
		
		public function setCliente()
		{
			if ($_POST) {
				if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['txtNit']) || empty($_POST['txtNombreFiscal']) || empty($_POST['txtDirFiscal'])) {
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				} else {
					$idUsuario = intval($_POST['idUsuario']);
					$strIdentificacion = strClean($_POST['txtIdentificacion']);
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strApellido = ucwords(strClean($_POST['txtApellido']));
					$strTelefono = strClean($_POST['txtTelefono']);
					$strEmail = strtolower(strClean($_POST['txtEmail']));
					$strNit = strClean($_POST['txtNit']);
					$strNomFiscal = strClean($_POST['txtNombreFiscal']);
					$strDirFiscal = strClean($_POST['txtDirFiscal']);
					$intTipoId = 3;
					
					if ($idUsuario == 0) {
						$option = 1;
						$strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
						if ($_SESSION['permisosMod']['w']) {
							$request_user = $this->model->insertCliente($strIdentificacion,
								$strNombre,
								$strApellido,
								$strTelefono,
								$strEmail,
								$strPassword,
								$intTipoId,
								$strNit,
								$strNomFiscal,
								$strDirFiscal);
							
						}
					} else {
						$option = 2;
						$strPassword = empty($_POST['txtPassword']) ? "" : hash("SHA256", $_POST['txtPassword']);
						if ($_SESSION['permisosMod']['u']) {
							$request_user = $this->model->updateCliente($idUsuario,
								$strIdentificacion,
								$strNombre,
								$strApellido,
								$strTelefono,
								$strEmail,
								$strPassword,
								$strNit,
								$strNomFiscal,
								$strDirFiscal);
						}
					}
					
					if ($request_user > 0) {
						if ($option == 1) {
							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
						} else {
							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
						}
					} else if ($request_user == 0) {
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');
					} else {
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		
	}
	/** end file clientes.php **/
