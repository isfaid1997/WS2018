<?php
	
	if ($_SESSION["rol"] != "admin") {
		header("Location: layoutR.php");
		exit();
	}
?> 