<?php
	
	class Clientes extends controllers {
		public function __construct()
		{
			parent::__construct();
		}
		
		public function clientes()
		{
			$data['page_tag'] = "Clientes";
			$data['page_title'] = "CLIENTES <small> Sistema de Crédito</small>";
			$data['page_name'] = "clientes";
			$this->views->getView($this,"clientes",$data);
		}
		
		
	}
	// end file clientes.php
