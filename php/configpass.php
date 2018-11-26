<?php

	require_once('../nusoap/lib/nusoap.php');
	require_once('../nusoap/lib/class.wsdlcache.php');
	$soapclient = new nusoap_client('https://localhost/WS2018/php/egiaztatuPasahitza.php?wsdl ',true);
	$result = $soapclient->call('egiaztatuP', array('x'=>$_GET['pasahitz'], 'y'=>1010));
	echo "$result";


?>