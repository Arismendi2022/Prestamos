<?php
	
	class PagosModel extends Mysql
	{
		
		public function __construct()
		{
			parent::__construct();
		}
		
		//Extrae pagos datatable
		public function selectPagos()
		{
			$sql = "SELECT idpago, CONCAT(nombres, ' ', apellidos) as nombre,prestamoid,FORMAT(fecha_pago, 'dd-MM-yyyy') as fecha_pago,monto_pagado,cuota_pagada FROM tbl_pagos
							INNER JOIN tbl_clientes
							ON tbl_clientes.idcliente = tbl_pagos.clienteid";
			$request = $this->select_all($sql);
			return $request;
		}
		
		
	}
	/** end files pagosModel.php */
