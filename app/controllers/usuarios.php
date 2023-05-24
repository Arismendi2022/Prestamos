<?php
	
	class Usuarios extends Controllers
	{
		public function __construct()
		{
			parent::__construct();
			session_start();
			
		}
		
		public function Usuarios()
		{
			$data['page_tag'] = "Usuarios";
			$data['page_title'] = "Usuarios - <small> Sistema de Crédito</small>";
			$data['page_name'] = "usuarios";
			//$data['page_functions_js'] = "functions_usuarios.js";
			$this->views->getView($this, "usuarios", $data);
		}
		
		public function setUsuario()
		{
			if ($_POST) {
				if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail'])
					|| empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
					
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				} else {
					//$idUsuario = intval($_POST['idUsuario']);
					$strIdentificacion = intval(strClean($_POST['txtIdentificacion']));
					$strNombre = ucwords(strClean($_POST['txtNombre']));
					$strApellido = ucwords(strClean($_POST['txtApellido']));
					$intTelefono = intval(strClean($_POST['txtTelefono']));
					$strEmail = strtolower(strClean($_POST['txtEmail']));
					$intTipoId = intval(strClean($_POST['listRolid']));
					$intStatus = intval(strClean($_POST['listStatus']));
					
					$strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
					
					$request_user = $this->model->insertUsuario($strIdentificacion,
						$strNombre,
						$strApellido,
						$intTelefono,
						$strEmail,
						$strPassword,
						$intTipoId,
						$intStatus);
					if ($request_user > 0 and $request_user != "exist") {
						$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
					} else if ($request_user == "exist") {
						$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');
					} else {
						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
					}
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		public function getUsuarios()
		{
			$arrData = $this->model->selectUsuarios();
			for ($i = 0; $i < count($arrData); $i++) {
				
				if ($arrData[$i]['estado'] == 1) {
					$arrData[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
				} else {
					$arrData[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
				}
				
				$arrData[$i]['options'] = '<div class="text-center">
						<button class="btn btn-info btn-sm btnViewUsuario" onClick = "fntViewUsuario(' . $arrData[$i]['idpersona'] . ')" title = "Ver usuario" ><i class="far fa-eye" ></i ></button>
						<button class="btn btn-primary  btn-sm btnEditUsuario" onClick = "fntEditUsuario(this,' . $arrData[$i]['idpersona'] . ')" title = "Editar usuario" ><i class="fas fa-pencil-alt" ></i ></button>
						<button class="btn btn-danger btn-sm btnDelUsuario" onClick = "fntDelUsuario(' . $arrData[$i]['idpersona'] . ')" title = "Eliminar usuario" ><i class="far fa-trash-alt" ></i ></button>
						</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}
		
		
	}
	// End of file Usuarios.php
	
