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

	}

	// end file roles.php

