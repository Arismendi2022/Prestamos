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
	}
