<?php
	

	class Controllers
	{
		public function __construct()
		{
			$this->loadModel();
		}
		
		public function loadModel()
		{
			$model = get_class($this) . "Model";
			$routClass = "App/Models/" . $model . ".php";
			if (file_exists($routClass)) {
				require_once($routClass);
				$this->model = new $model();
			}
		}
		
	}
