<?php
	
	class Dashboard extends controllers
	{
		public function __construct()
		{
			parent::__construct();
			
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
				die();
			}
		}
		
		public function dashboard()
		{
			$data['page_tag'] = "Dashboard | Sistema de Crédito";
			$data['page_title'] = "Dashboard - <small>Sistema de Crédito</small>";
			$data['page_name'] = "dashboard";
			$this->views->getView($this, "dashboard", $data);
		}
		
		
	}
	// end file dashboard.php

