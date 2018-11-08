


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
	
	
		$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
		//$linki= new mysqli("localhost","root","","quiz");

	
		$sql="SELECT * FROM questions";
	
	
		if (!$linki->query($sql)) {
			die('Errorea: ' . $linki->error);
		}else{
			$ema= $linki->query($sql);
		}
		
		
		
		echo "<table border=1> <tr> <th>EMAILA</th> <th>GALDERA</th> <th>ERANTZUNZUZEN</th></tr>";
		
		$quiz = simplexml_load_file('../xml/questions.xml');
		foreach($quiz->assessmentItem as $qui){
			echo"<tr><td>".$qui['author']."</td><td>".$qui->itemBody->p."</td> <td>".$qui->correctResponse->value."</td></tr>"; 
		}
		echo "</table>";
		$ema->free();
		$linki->close();

	?>
		
		
		
	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/isfaid1997/WS2018'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>