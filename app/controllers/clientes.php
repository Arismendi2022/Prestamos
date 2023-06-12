<?php
	
	class clientes extends Controllers
	{
		
		public function __construct()
		{
			parent::__construct();
			session_start();
		}
		
		public function clientes()
		{
			$data['page_tag'] = "clientes";
			$data['page_title'] = "clientes - <small>Sistema de Crédito</small>";
			$data['page_name'] = "clientes";
			$data['page_functions_js'] = "functions_clientes.js";
			$this->views->getView($this, "clientes", $data);
		}
		
	}
	/** end file clientes.php **/
