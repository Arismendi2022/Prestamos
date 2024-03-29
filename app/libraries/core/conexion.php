<?php
	
	class Conexion
	{
		private $conect;
		
		public function __construct()
		{
			$connectionString = "sqlsrv:server=" . SERVIDOR . ";database=" . DATABASE;
			try {
				$this->conect = new PDO($connectionString, USUARIO, PASSWORD);
				$this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				// echo "conexión exitosa";
			} catch (PDOException $e) {
				$this->conect = 'Error de conexión';
				echo "ERROR: " . $e->getMessage();
			}
		}
		
		public function conect()
		{
			return $this->conect;
		}
	}
	