<?php
	
	if ($_SESSION['kau'] != "BAI") {
		header("Location: layout.php");
		exit();
	}
?> 