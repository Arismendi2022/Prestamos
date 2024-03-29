<?php
	
	class Login extends Controllers
	{
		public function __construct()
		{
			session_start();
			if(isset($_SESSION['login']))
			{
				header('Location: '.base_url().'/dashboard');
				die();
			}
			parent::__construct();
		}
		
		public function login()
		{
			$data['page_tag'] = "Login - Sistema de Crédito";
			$data['page_title'] = "Login";
			$data['page_name'] = "login";
			$data['page_functions_js'] = "functions_login.js";
			$this->views->getView($this, "login", $data);
		}
		
		public function loginUser()
		{
			if ($_POST) {
				if (empty($_POST['txtEmail']) || empty($_POST['txtPassword'])) {
					$arrResponse = array('status' => false, 'msg' => 'Error de datos');
				} else {
					$strUsuario = strtolower(strClean($_POST['txtEmail']));
					$strPassword = hash("SHA256", $_POST['txtPassword']);
					$requestUser = $this->model->loginUser($strUsuario, $strPassword);
					
					if (empty($requestUser)) {
						$arrResponse = array('status' => false, 'msg' => 'El usuario o la contraseña es incorrecto.');
					} else {
						$arrData = $requestUser;
						if ($arrData['estado'] == 1) {
							$_SESSION['idUser'] = $arrData['idusuario'];
							$_SESSION['login'] = true;
							
							$arrData = $this->model->sessionLogin($_SESSION['idUser']);
							sessionUser($_SESSION['idUser']);
							$arrResponse = array('status' => true, 'msg' => 'ok');
						} else {
							$arrResponse = array('status' => false, 'msg' => 'Usuario inactivo.');
						}
					}
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		
	}
	/** end file login.php **/
