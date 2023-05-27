<?php
	
	class Roles extends controllers
	{
		public function __construct()
		{
			parent::__construct();
			session_start();
		}
		
		public function roles()
		{
			$data['page_tag'] = "Roles usuarios";
			$data['page_title'] = "Roles Usuarios - <small>Sistema de Crédito</small>";
			$data['page_name'] = "rol_usuario";
			//$data['page_functions_js'] = "functions_roles.js";
			$this->views->getView($this, "roles", $data);
		}
		
		//muestra listado de roles en datatable
		public function getRoles()
		{
			$arrData = $this->model->selectRoles();
			
			for ($i = 0; $i < count($arrData); $i++) {
				if ($arrData[$i]['estado'] == 1) {
					$arrData[$i]['estado'] = '<span class="badge bg-success">Activo</span>';
				} else {
					$arrData[$i]['estado'] = '<span class="badge bg-danger">Inactivo</span>';
				}
				$arrData[$i]['options'] = '<div class="text-center">
					<button type="button" class="btn btn-success btn-sm btnPermisosRol" onClick="fntPermisos(' . $arrData[$i]['idrol'] . ')" title="Permisos"><i class="fas fa-key"></i></button>
					<button type="button" class="btn btn-info btn-sm btnEditRol" onClick="fntEditRol(' . $arrData[$i]['idrol'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
					<button type="button" class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol(' . $arrData[$i]['idrol'] . ')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
				</div>';
			}
			echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
			die();
		}
		
		// Extrae roles para usuarios
		public function getSelectRoles()
		{
			$htmlOptions = "";
			$arrData = $this->model->selectRoles();
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) {
					if($arrData[$i]['estado'] == 1 ){
						$htmlOptions .= '<option value="'.$arrData[$i]['idrol'].'">'.$arrData[$i]['nombrerol'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();
		}
		
		//Actualiza Rol
		public function getRol(int $idrol)
		{
			$intIdrol = intval(strClean($idrol));
			if ($intIdrol > 0) {
				$arrData = $this->model->selectRol($intIdrol);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				} else {
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
		//Guarda Rol
		public function setRol()
		{
			$intIdrol = intval($_POST['idRol']);
			$strRol = ucwords(strClean($_POST['txtNombre']));
			$strDescripcion = strClean($_POST['txtDescripcion']);
			$intStatus = intval($_POST['listStatus']);
			
			if ($intIdrol == 0) {
				//Crear
				$request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
				$option = 1;
			} else {
				//Actualizar
				$request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescripcion, $intStatus);
				$option = 2;
			}
			if ($option == 1) {
				if ($request_rol != 'exist') {
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				} elseif ($request_rol == 'exist') {
					$arrResponse = array('status' => false, 'msg' => '¡Atención! El Rol ya existe.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			} else {
				$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			die();
		}
		
		// eliminar rol
		public function delRol()
		{
			if ($_POST) {
				$intIdrol = intval($_POST['idrol']);
				$requestDelete = $this->model->deleteRol($intIdrol);
				if ($requestDelete == 'ok') {
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Rol');
				} elseif ($requestDelete == 'exist') {
					$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Rol asociado a usuarios.');
				} else {
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Rol.');
				}
				echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
			}
			die();
		}
		
	}
	// end of file roles.php

