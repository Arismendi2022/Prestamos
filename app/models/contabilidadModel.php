<?php
	
	class ContabilidadModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		/** Datos Flujo de Caja **/
		public function selectFlujoCaja()
		{
			$sql     = "EXEC proc_flujoCaja";
			$arrData = $this->select($sql);
			return $arrData;
		}
		
		/** Datos Hoja de Balance **/
		public function selectHojaBalance()
		{
			$sql     = "EXEC proc_hojaBalance";
			$arrData = $this->select($sql);
			return $arrData;
		}
		
		
	}
		
