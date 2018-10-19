<?php 


	include 'dbConfig.php';
	
	
	$linki= new mysqli("localhost","id7176205_egoisa","","id7176205_quiz");

	
	$sql="SELECT * FROM questions";
	
	
	if (!$linki->query($sql)) {
		die('Errorea: ' . $linki->error);
	}else{
		$ema= $linki->query($sql);
	}
		
		
		
	echo "<table border=1> <tr> <th>EMAILA</th> <th>GALDERA</th> <th>ERANTZUNZUZEN</th> <th>ERANOKER1</th> </tr>";
	while($row= $ema->fetch_array(MYSQLI_ASSOC)){
		echo"<tr><td>".$row['ema']."</td> <td>".$row['ques']."</td> <td>".$row['ca']."</td> <td>".$row['ia1']."</td></tr>"; 
	}
	echo "</table>";
	echo "<p><a href='../layout.html'> Itzuli HOMEra</a></p>";
	$ema->free();
	$linki->close();
	

	
?>