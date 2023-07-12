<?php
	
	//Retorna la url del proyecto
	function base_url()
	{
		return ROOT;
	}
	
	//Retorna la url de Assets
	function media()
	{
		//return ROOT . "/../resources";
		return ROOT;
	}
	
	function headerAdmin($data="")
	{
		$view_header = "../resources/views/modulos/header.php";
		require_once ($view_header);
	}
	
	function footerAdmin($data="")
	{
		$view_footer = "../resources/views/modulos/footer.php";
		require_once($view_footer);
	}
	
	//Muestra información formateada
	function dep($data)
	{
		$format = print_r('<pre>');
		$format .= print_r($data);
		$format .= print_r('</pre>');
		return $format;
	}
	
	function getModal(string $nameModal, $data)
	{
		$view_modal = "../resources/views/modulos/modals/{$nameModal}.php";
		require_once $view_modal;
	}
	
	function getPermisos(int $idmodulo){
		require_once ("../App/Models/PermisosModel.php");
		$objPermisos = new PermisosModel();
//		if(!empty($_SESSION['userData'])){
			$idrol = $_SESSION['userData']['idrol'];
			$arrPermisos = $objPermisos->permisosModulo($idrol);
			$permisos = '';
			$permisosMod = '';
			if(count($arrPermisos) > 0 ){
				$permisos = $arrPermisos;
				$permisosMod = isset($arrPermisos[$idmodulo]) ? $arrPermisos[$idmodulo] : "";
			}
			$_SESSION['permisos'] = $permisos;
			$_SESSION['permisosMod'] = $permisosMod;
		//}
	}
	
	function sessionUser(int $idpersona){
		require_once ("../App/Models/LoginModel.php");
		$objLogin = new LoginModel();
		$request = $objLogin->sessionLogin($idpersona);
		return $request;
	}
	
	//Elimina exceso de espacios entre palabras
	function strClean($strCadena)
	{
		$string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ''], $strCadena);
		$string = trim($string); //Elimina espacios en blanco al inicio y al final
		$string = stripslashes($string); // Elimina las \ invertida
		//$string = str_replace(['(', ')', '-'], '', $string); // Elimina guiones a formato telefono (000-000-0000)
		$string = str_ireplace("<script>", "", $string);
		$string = str_ireplace("</script>", "", $string);
		$string = str_ireplace("<script src>", "", $string);
		$string = str_ireplace("<script type=>", "", $string);
		$string = str_ireplace("SELECT * FROM", "", $string);
		$string = str_ireplace("DELETE FROM", "", $string);
		$string = str_ireplace("INSERT INTO", "", $string);
		$string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
		$string = str_ireplace("DROP TABLE", "", $string);
		$string = str_ireplace("OR '1'='1", "", $string);
		$string = str_ireplace('OR "1"="1"', "", $string);
		$string = str_ireplace('OR ´1´=´1´', "", $string);
		$string = str_ireplace("is NULL; --", "", $string);
		$string = str_ireplace("is NULL; --", "", $string);
		$string = str_ireplace("LIKE '", "", $string);
		$string = str_ireplace('LIKE "', "", $string);
		$string = str_ireplace("LIKE ´", "", $string);
		$string = str_ireplace("OR 'a'='a", "", $string);
		$string = str_ireplace('OR "a"="a', "", $string);
		$string = str_ireplace("OR ´a´=´a", "", $string);
		$string = str_ireplace("OR ´a´=´a", "", $string);
		$string = str_ireplace("--", "", $string);
		$string = str_ireplace("^", "", $string);
		$string = str_ireplace("[", "", $string);
		$string = str_ireplace("]", "", $string);
		$string = str_ireplace("==", "", $string);
		return $string;
	}
	
	/** Elimina el punto en los millares */
	function quitarMillar($numero) {
		return str_replace(".", "", $numero); // Elimina el punto en los millares
	}
	
	//Genera una contraseña de 10 caracteres
	function passGenerator($length = 10)
	{
		$pass = "";
		$longitudPass = $length;
		$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$longitudCadena = strlen($cadena);
		
		for ($i = 1; $i <= $longitudPass; $i++) {
			$pos = rand(0, $longitudCadena - 1);
			$pass .= substr($cadena, $pos, 1);
		}
		return $pass;
	}
	
	//Formato para valores monetarios
	function formatMoney($cantidad)
	{
		$cantidad = number_format($cantidad, 2, SPD, SPM);
		return $cantidad;
	}
	
