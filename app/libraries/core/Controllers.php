<?php
	class Controllers
	{
		public function __construct()
		{
		
		}
		
		public function loadModel()
		{
			$model = get_class($this)."Model";
			$routClass = "Models/".$model.".php";
		}
		
	}
