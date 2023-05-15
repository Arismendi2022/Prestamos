<?php
	
	class Errors extends controllers
	{
		public function __construct()
		{
			parent::__construct();
			session_start();
		}
		
		public function notFound()
		{
			$this->views->getView($this, "error");
			
		}
	}
	
	$notFound = new Errors();
	$notFound->notFound();

	
