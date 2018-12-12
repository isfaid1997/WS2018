<?php
	
	if (isset($_SESSION['var']) && $_SESSION['var'] != "anonimous") {
		//header("Location: layout.php");
		echo "<script> location.href='layout.php'</script>";
		exit();
	}
?> 