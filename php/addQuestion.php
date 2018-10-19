<?php 


	include 'dbConfig.php';
	
	
	$linki= new mysqli("localhost","id7176205_egoisa","","id7176205_quiz");

	
	$sql="INSERT INTO questions(ema, ques, ca, ia1, ia2, ia3, dif, sub, pic) VALUES
		('$_POST[email]' , '$_POST[galdera]' ,'$_POST[eranzuzen]', '$_POST[eranoker1]', 
		 '$_POST[eranoker2]', '$_POST[eranoker3]', '$_POST[zailtasuna]', '$_POST[gaia]', 
		 '$_POST[argazkia]')";
	
	
	if (!$linki->query($sql)) {
		die('Errorea: ' . $linki->error);
	}
		
	echo "Erregistro bat gehitu da!";
	echo "<p> <a href='../layout.html'> HOMEra itzuli</a>";
	echo "<p> <a href='showQuestions.php'> Erregistratutako datuak ikusi</a>";
	$linki->close();
	

	
?>