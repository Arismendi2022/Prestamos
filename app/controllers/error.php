<?php
	
	class Errors extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}
		
		public function notFound()
		{
      $data['page_tag'] = "Página de error";
      $data['page_title'] = "404 - Página de error";
      $data['page_name'] = "error";
      $data['page_functions_js'] = "functions_error.js";
			$this->views->getView($this,"error",$data);
		}
	}
	
	$notFound = new Errors();
	$notFound->notFound();
	
