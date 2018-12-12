<?php
	
	if ($_SESSION['rol'] != "admin") {
		//header("Location: layout.php");
		echo "<script> location.href='layout.php'</script>";
		exit();
	}
?> 