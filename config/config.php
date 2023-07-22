<?php
	
	if ($_SERVER['SERVER_NAME'] == 'localhost') {
		
		define('ROOT', 'http://localhost/banco/public');
	} else {
		
		define('ROOT', 'http://banco.net');
	}
	
	/** Zona horaria **/
	date_default_timezone_set('America/Bogota');
	
	/** Datos de conexion a Base de Datos **/
	const DB_HOST = "localhost";
	const DB_NAME = "db_prestamos";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";
	
	/** Delimitador decimal y millar EJ: 24.189,00 **/
	const SPD = ",";
	const SPM = ".";
	
	/** Símbolo de moneda **/
	const SMONEY = "$";
	
	/** Módulos **/
	const MDASHBOARD = 1;
	const MCLIENTES = 2;
	const MPRESTAMOS = 3;
	const MLSTPRESTAMOS = 4;
	const MPAGOS = 5;
	const MUSUARIOS = 6;
	const MROLES = 7;
	const MREPORTES = 8;
	const MCONTABILIDAD = 9;
	
	/** Roles **/
	const RADMINISTRADOR = 1;
	const RSUPERVISOR = 2;
	const RCLIENTES = 3;
	const RAGENTE = 4;
	

	


	