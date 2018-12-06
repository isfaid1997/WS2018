<?php

	$email = $_POST['mail'];
	$type = $_POST['type'];
	$ego = $_POST['ego'];
	
	//$linki= new mysqli("localhost","root","","quiz");
	$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
	if($type=='change'){
		if($ego=='aktibo')
			$sql = "UPDATE users SET egoera='blokeatuta' where email='$email'";
		else 
			$sql = "UPDATE users SET egoera='aktibo' where email='$email'";
		$linki->query($sql);
	}else if($type=='delete'){
		$sql="DELETE FROM users where email='$email'";
		$linki->query($sql);
	}
		
	$linki->close();

?>