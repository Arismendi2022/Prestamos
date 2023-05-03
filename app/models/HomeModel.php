<?php
	
	class HomeModel
	{
		public function __construct()
		{
			//echo "Mensaje desde el model Home";
			//parent::__construct();
		}
		
		public function getCarrito($params)
		{
			return "Datos del carrito No. ".$params;
			
		}
		
	}

