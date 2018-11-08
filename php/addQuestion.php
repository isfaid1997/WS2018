

<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Sign up</title>
    <link rel='stylesheet' type='text/css' href='../styles/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../styles/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../styles/smartphone.css' />
		 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	

		 
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href="logOut.php">LogOut</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layoutR.php'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php?log=1'>Credits</a></span>
		<span><a href='../addQuestion.html'>Add questions</a></span>
		<span><a href='../addQuestion5HTML.html'>Add questions HTML5</a></span>
		<span><a href='showQuestions.php'>ShowQuestions</a></span>
		<span><a href='../xml/questions.xml'>XML questions</a></span>
		<span><a href='showXMLquestions.php'>XML questions PHP</a></span>
		<span><a href='../xml/questionsTransAuto.xml'>XML trans auto</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		
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
		
		echo "<p>Erregistro bat gehitu da!</p></br>";
		
		
		$xml = simplexml_load_file('../xml/questions.xml');
		if(!$xml) echo "Errorea XML fitxategia atzitzerakoan";
		else{
			$quiz = $xml->addChild('assessmentItem ');
			$quiz->addAttribute('author',$_POST['email']);
			$quiz->addAttribute('subject',$_POST['gaia']);
			$galde=$quiz->addChild('itemBody');
			$galde->addChild('p', $_POST['galdera']);
			$correct = $quiz->addChild('correctResponse');
			$correct->addChild('value', $_POST['eranzuzen']);
			$incorrect = $quiz->addChild('incorrectResponses');
			$incorrect->addChild('value', $_POST['eranoker1']);
			$incorrect->addChild('value', $_POST['eranoker2']);
			$incorrect->addChild('value', $_POST['eranoker3']);
			$xml->asXML('../xml/questions.xml');
			echo "<p>Datuak ondo gorde dira XML fitxategian</p></br>";
		}
		
		
		$linki->close();
	}

	
?>
	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/isfaid1997/WS2018'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

