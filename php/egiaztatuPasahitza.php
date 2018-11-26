<?php
	
	require_once('../lib/nusoap.php');
	require_once('../lib/class.wsdlcache.php');
	
	
	//$ns="http://ehusw.es/rosa/webZerbitzuak/batuZerbitzua.php?wsdl";
	$ns="https://localhost/WS2018/php/egiaztatuPasahitza.php?wsdl";
	//$ns="egiaztatuPasahitza.php?wsdl";
	$server = new soap_server;
	$server->configureWSDL('egiaztatuP',$ns);
	$server->wsdl->schemaTargetNamespace=$ns;
	
	
	$server->register('egiaztatuP',array('x'=>'xsd:string','y'=>'xsd:int'),array('z'=>'xsd:string'),$ns);
	
	
	function egiaztatuP($x, $y){
		if($y!="1010") return "ZERBITZURIK GABE";
		else{
			$file= fopen("../nusoap/toppasswords.txt", "r");
			while($lerroa = fscanf($file, "%s")){
				if($x == $lerroa[0]) return "BALIOGABEA";
			}
			fclose($file);
			return "BALIOZKOA";
		}
	}
	
	
	if (!isset( $HTTP_RAW_POST_DATA )) {
		$HTTP_RAW_POST_DATA =file_get_contents( 'php://input' );
	}
	
	$server->service($HTTP_RAW_POST_DATA);
?>