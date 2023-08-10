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
				if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail'])
					|| empty($_POST['txtDirFiscal']) || empty($_POST['txtCiudad'])) {
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				} else {
					$idUsuario = intval($_POST['idUsuario']);
					$strIdentificacion = intval(strClean($_POST['txtIdentificacion']));
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strApellido = ucwords(strClean($_POST['txtApellido']));
					$intGenero = intval(strClean($_POST['listStatus']));
					$strTelefono = strClean($_POST['txtTelefono']);
					$strEmail = strtolower(strClean($_POST['txtEmail']));
					$strDirFiscal = ucwords(strClean($_POST['txtDirFiscal']));
					$strCiudad = ucwords(strClean($_POST['txtCiudad']));
					$request_user = "";
					
					if ($idUsuario == 0) {
						$option = 1;
						$strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
						if ($_SESSION['permisosMod']['w']) {
							$request_user = $this->model->insertCliente($strIdentificacion,
								$strNombre,
								$strApellido,
								$intGenero,
								$strTelefono,
								$strEmail,
								$strDirFiscal,
								$strCiudad);
							
						}
					} else {
						$option = 2;
						$strPassword = empty($_POST['txtPassword']) ? "" : hash("SHA256", $_POST['txtPassword']);
						if ($_SESSION['permisosMod']['u']) {
							$request_user = $this->model->updateCliente($idUsuario,
								$strIdentificacion,
								$strNombre,
								$strApellido,
								$intGenero,
								$strTelefono,
								$strEmail,
								$strDirFiscal,
								$strCiudad);
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
		
		public function getClientes()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectClientes();
				for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
					$btnEdit = '';
					$btnDelete = '';
					if($_SESSION['permisosMod']['r']){
						$btnView = '<button type="button" class="btn btn-info btn-sm" onClick="fntViewInfo('.$arrData[$i]['idcliente'].')" title="Ver cliente"><i class="far fa-eye"></i></button>';
					}
					if($_SESSION['permisosMod']['u']){
						$btnEdit = '<button type="button" class="btn btn-primary  btn-sm" onClick="fntEditInfo(this,'.$arrData[$i]['idcliente'].')" title="Editar cliente"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){
						$btnDelete = '<button type="button" class="btn btn-danger btn-sm" onClick="fntDelInfo('.$arrData[$i]['idcliente'].')" title="Eliminar cliente"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getCliente($idcliente){
			if($_SESSION['permisosMod']['r']){
				$idusuario = intval($idcliente);
				if($idusuario > 0)
				{
					$arrData = $this->model->selectCliente($idusuario);
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
		
		public function delCliente()
		{
			if($_POST){
				if($_SESSION['permisosMod']['d']){
					$intidcliente = intval($_POST['idUsuario']);
					$requestDelete = $this->model->deleteCliente($intidcliente);
					if($requestDelete)
					{
						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el cliente');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar al cliente.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				}
			}
			die();
		}
		
	}
	/** end file clientes.php **/
