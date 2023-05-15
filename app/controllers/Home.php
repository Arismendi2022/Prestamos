<?php
	
	class Home extends controllers {
		public function __construct()
		{
			parent::__construct();
			session_start();
		}
		
		public function home()
		{
			$data['page_id'] = 1;
			$data['tag_page'] = "Home";
			$data['page_title'] = "Pagina principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa debitis delectus, et exercitationem iusto modi porro quas
			 	quibusdam quisquam ullam.";
				
				$this->views->getView($this,"home",$data);
		}
		
		
	}
	// end file home.php



