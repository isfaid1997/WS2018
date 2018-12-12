<?php

	require_once('../nusoap/lib/nusoap.php');
	require_once('../nusoap/lib/class.wsdlcache.php');
	//$soapclient = new nusoap_client('http://localhost/WS2018/php/egiaztatuPasahitza.php?wsdl',true);
	$soapclient = new nusoap_client('http://lanakunibertsitatea.000webhostapp.com/lab6/php/egiaztatuPasahitza.php?wsdl',true);
	$result = $soapclient->call('egiaztatuP', array('x'=>$_GET['pasahitz'], 'y'=>1010));
	echo $result;


?>