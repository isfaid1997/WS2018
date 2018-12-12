<?php
	
	if ($_SESSION['rol'] != "ikasle") {
		//header("Location: layout.php");
		echo "<script> location.href='layout.php'</script>";
		exit();
	}
?> 