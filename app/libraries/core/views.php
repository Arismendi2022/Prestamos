<?php
	class Views
	{
		function getView($controller,$view,$data="")
		{
			$controller = get_class($controller);
			if($controller == "Home"){
				$view = "../Resources/views/".$view.".php";
			}else{
				$view = "../Resources/views/".$controller."/".$view.".php";
			}
			require_once($view);
		}
	}
