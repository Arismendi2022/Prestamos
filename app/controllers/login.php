<?php
	
	class Login extends Controllers
	{
		public function __construct()
		{
			session_start();
			
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
		
		
	}
	// End of file login.php
