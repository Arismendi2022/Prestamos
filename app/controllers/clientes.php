<?php
	
	class Clientes extends controllers
	{
		
		public function __construct()
		{
			parent::__construct();
			session_start();
		}
		
		public function clientes()
		{
			$data['page_tag'] = "Clientes";

			$data['page_title'] = "Clientes - <small>Sistema de Crédito</small>";
			$data['page_name'] = "clientes";
			//$data['page_functions_js'] = "functions_roles.js";
			$this->views->getView($this, "clientes", $data);
		}
		
	}
	/** end file clientes.php **/

