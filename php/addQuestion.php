<?php 


	include 'dbConfig.php';
	
	
	if(!preg_match('/^[a-zA-Z]{3,}[0-9]{3}@ikasle\.ehu\.eus$/',$_POST['email'])){
		echo "Wrong email!";
		echo "<p><a href='layoutR.php'>HOMEra itzuli</a>";
	}
	else if(!preg_match('/^[0-5]{1}$/',$_POST['zailtasuna'])){
		echo "Difficulty out of range!";
		echo "<p><a href='layoutR.php'>HOMEra itzuli</a>";
	}
	else if(!preg_match('/^[a-zA-Z].{9,}$/',$_POST['galdera'])){
		echo "Bad question made";
		echo "<p><a href='layoutR.php'>HOMEra itzuli</a>";
	}
	else if(!preg_match('/^[a-zA-Z].*$/',$_POST['eranzuzen'])){
		echo "Wrong correct answer!";
		echo "<p><a href='layoutR.php'>HOMEra itzuli</a>";
	}
	else if(!preg_match('/^[a-zA-Z].*$/',$_POST['eranoker1'])){
		echo "Wrong incorrect1 answer!";
		echo "<p><a href='layoutR.php'>HOMEra itzuli</a>";
	}
	else if(!preg_match('/^[a-zA-Z].*$/',$_POST['eranoker2'])){
		echo "Wrong incorrect2 answer!";
		echo "<p><a href='layoutR.php'>HOMEra itzuli</a>";
	}
	else if(!preg_match('/^[a-zA-Z].*$/',$_POST['eranoker3'])){
		echo "Wrong incorrect3 answer!";
		echo "<p><a href='layoutR.php'>HOMEra itzuli</a>";
	}
	else if(!preg_match('/^[a-zA-Z].*$/',$_POST['gaia'])){
		echo "Wrong incorrect3 answer!";
		echo "<p><a href='layoutR.php'>HOMEra itzuli</a>";
	}
	else{
	
		$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
		//$linki= new mysqli("localhost","root","","quiz");
	
		$sql="INSERT INTO questions(ema, ques, ca, ia1, ia2, ia3, dif, sub, pic) VALUES
			('$_POST[email]' , '$_POST[galdera]' ,'$_POST[eranzuzen]', '$_POST[eranoker1]', 
			'$_POST[eranoker2]', '$_POST[eranoker3]', '$_POST[zailtasuna]', '$_POST[gaia]', 
			'$_POST[argazkia]')";
	
	
		if (!$linki->query($sql)) {
			die('Errorea: ' . $linki->error);
		}
		
		echo "Erregistro bat gehitu da!";
		echo "<p> <a href='layoutR.php'> HOMEra itzuli</a>";
		echo "<p> <a href='showQuestions.php?log=1'> Erregistratutako datuak ikusi</a>";
		$linki->close();
	
	}

	
?>