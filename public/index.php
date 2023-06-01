<?php
	
	//header('Access-Control-Allow-Origin: *');
	
	require_once("../Config/config.php");
	require_once("../App/Helpers/helpers.php");
	$url = !empty($_GET['url']) ? $_GET['url'] : 'login/login';
	$arrUrl = explode("/", $url);
	$controller = $arrUrl[0];
	$method = $arrUrl[0];
	$params = "";

	if(!empty($arrUrl[1]))
	{
		if($arrUrl[1] != "")
		{
			$method = $arrUrl[1];	
		}
	}

	if(!empty($arrUrl[2]))
	{
		if($arrUrl[2] != "")
		{
			for ($i=2; $i < count($arrUrl); $i++) {
				$params .=  $arrUrl[$i].',';
				
			}
			$params = trim($params,',');
		}
	}
	
	require_once("../App/Libraries/Core/autoload.php");
	require_once("../App/Libraries/Core/load.php");