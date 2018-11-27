<?php

	$logeatuta= $_GET['log'];
	
?>
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
	<script>
		$(document).ready(function(){
			$('#galderenF').submit(function(){
			
			
				if( $('#email').val()=="" || $('#galdera').val()=="" || $('#eranzuzen').val()=="" || $('#eranoker1').val()=="" || $('#eranoker2').val()=="" || 
					$('#eranoker3').val()=="" || $('#zailtasuna').val()=="" || $('#gaia').val()==""){
					alert("Eremuren bat falta zaizu betetzeko");
					return false;
				}
			
				var email = $('#email').val();
				var mailformat = /^[a-zA-Z]{3,}[0-9]{3}@ikasle\.ehu\.eus$/;
				if(!mailformat.test(email)){
					alert("Okerreko email bat idatzi duzu. Emaila horrela izan behar du: Letrak + 3 zenbaki + @ikasle.ehu.eus");
					return false;
				}
				
				var gald = $('#galdera').val();
				if(gald.trim().length<10){
					alert("Galderak 10 karaktere eduki behar ditu gutxienez");
					return false;
				}
				
				var zailt = $('#zailtasuna').val();
				var zailtformat= /^[0-5]{1}$/;
				if(!zailtformat.test(zailt)){
					alert("Okerreko zailtasuna sartu duzu. Zailtasuna 0 eta 5 arteko zenbaki batizan behar du.");
					return false;
				}
	
				alert("Eremu guztiak ondo bete dituzu.");
				return true;
			});
			
			
			$('#reset').click(function(){
				$('#email').val("");
				$('#galdera').val("");
				$('#eranzuzen').val("");
				$('#eranoker1').val("");
				$('#eranoker2').val("");
				$('#eranoker3').val("");
				$('#zailtasuna').val("");
			});
			
		});
		
	</script>

		 
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <?php echo "<span class='right'> $logeatuta</span>" ?>
	  </br>
	  <?php echo "<span class='right'><a href='logOut.php?log=$logeatuta'>LogOut</a> </span>" ?>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<?php echo "<span><a href='layoutR.php?log=$logeatuta'>Home</a></span>" ?>
		<span>Quizzes</span>
		<?php echo "<span><a href='credits.php?log=$logeatuta'>Credits</a></span>" ?>
		<?php echo "<span><a href='addQuestion.php?log=$logeatuta'>Add questions</a></span>" ?>
		<?php echo "<span><a href='addQuestion5HTML.php?log=$logeatuta'>Add questions HTML5</a></span>" ?>
		<?php echo "<span><a href='showQuestions.php?log=$logeatuta'>ShowQuestions</a></span>" ?>
		<?php echo "<span><a href='../xml/questions.xml'>XML questions</a></span>" ?>
		<?php echo "<span><a href='showXMLquestions.php?log=$logeatuta'>XML questions PHP</a></span>" ?>
		<?php echo "<span><a href='../xml/questionsTransAuto.xml'>XML trans auto</a></span>" ?>
		<?php echo "<span><a href='handlingQuizesAJAX.php?log=$logeatuta'>Handling Questions</a></span>" ?>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		
<?php 

	if(isset($_POST['email'])){
		include 'dbConfig.php';
		
		
		if(!preg_match('/^[a-zA-Z]{3,}[0-9]{3}@ikasle\.ehu\.eus$/',$_POST['email'])){
			echo "Wrong email!";
		}
		else if(!preg_match('/^[0-5]{1}$/',$_POST['zailtasuna'])){
			echo "Difficulty out of range!";
		}
		else if(!preg_match('/^[a-zA-Z].{9,}$/',$_POST['galdera'])){
			echo "Bad question made";
		}
		else if(!preg_match('/^[a-zA-Z].*$/',$_POST['eranzuzen'])){
			echo "Wrong correct answer!";
		}
		else if(!preg_match('/^[a-zA-Z].*$/',$_POST['eranoker1'])){
			echo "Wrong incorrect1 answer!";
		}
		else if(!preg_match('/^[a-zA-Z].*$/',$_POST['eranoker2'])){
			echo "Wrong incorrect2 answer!";
		}
		else if(!preg_match('/^[a-zA-Z].*$/',$_POST['eranoker3'])){
			echo "Wrong incorrect3 answer!";
		}
		else if(!preg_match('/^[a-zA-Z].*$/',$_POST['gaia'])){
			echo "Wrong incorrect3 answer!";
		}
		else{
		
			//$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
			$linki= new mysqli("localhost","root","","quiz");
		
			$sql="INSERT INTO questions(ema, ques, ca, ia1, ia2, ia3, dif, sub, pic) VALUES
				('$_POST[email]' , '$_POST[galdera]' ,'$_POST[eranzuzen]', '$_POST[eranoker1]', 
				'$_POST[eranoker2]', '$_POST[eranoker3]', '$_POST[zailtasuna]', '$_POST[gaia]', 
				'')";
		
		
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

	}else{ ?>
		<br>
		<?php echo "<form id='galderenF' name='galderenF' action='addQuestion.php?log=$logeatuta' method='post'>" ?>
		<?php echo "Emaila(*): <input type='text' name='email' id='email' value='$logeatuta' placeholder='xxx000@ikasle.ehu.eus' readonly><br>" ?>
			Questions(*): <input type="text" id="galdera" name="galdera" placeholder="10 karaktere gutxienez"><br>
			Correct answer(*): <input type="text" id="eranzuzen" name="eranzuzen"><br>
			Incorrect answer1(*): <input type="text" id="eranoker1" name="eranoker1"><br>
			Incorrect answer2(*): <input type="text" id="eranoker2" name="eranoker2"><br>
			Incorrect answer3(*): <input type="text" id="eranoker3" name="eranoker3"><br><br>
			Difficulty(*): <input type="text" id="zailtasuna" name="zailtasuna"placeholder="Zailtasuna 0-5 artekoa"><br>
			Subject(*): <input type="text" id="gaia" name="gaia"><br><br>
			Picture: HTML5 erabili irudiak kargatzeko <br><br><br>
			
			<input type="button" value="Reset" id="reset">
			
			<input type="submit" value="Send question" id="send">
		</form>
		<br><br><br>
	<?php } ?>
	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/isfaid1997/WS2018'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

