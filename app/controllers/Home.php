<?php
	
	class Home extends Controllers {
		public function __construct()
		{
			parent::__construct();
		}
		
		public function home($params)
		{
			//echo "Mensaje desde el controlador";
		}
		
		public function datos($params)
		{
			echo "Dato recibido: ".$params;
		}
		
		public function carrito($params)
		{
			$carrito = $this->model->getCarrito($params);
			echo $carrito;
		}
		
		
	}



