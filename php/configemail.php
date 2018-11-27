<?php

	require_once('../nusoap/lib/nusoap.php');
	require_once('../nusoap/lib/class.wsdlcache.php');
	$soapclient = new nusoap_client('http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl',true);
	$result = $soapclient->call('egiaztatuE',array('x'=>$_GET['email']));
	echo $result;

?>