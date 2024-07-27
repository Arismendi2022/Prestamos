<?php
	
	class ContabilidadModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}
		
		/** Datos Flujo de Caja **/
		public function selectFlujoCaja(int $anio)
		{
			$sql     = "EXEC proc_flujoCaja $anio";
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
		
		/** Datos Hoja de ganancias & perdidas **/
		public function selectUtilidad()
		{
			$sql     = "EXEC proc_utilidad";
			$arrData = $this->select($sql);
			return $arrData;
		}
		
		public function selectIngresosDiferidos(int $anio)
		{
			$sql     = "EXEC proc_ingresosDiferidos $anio";
			$arrData = $this->select_all($sql);
			return $arrData;
		}
		
		
	}
		
