<?php 

	session_start();
	$logeatuta= $_SESSION['var'];
	include ("segurtasuna.php");
	include ("segurtasunaKAU.php");
	
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
		function Editatu(user){
			<?php			
			//$linki2= new mysqli("localhost","root","","quiz");
			$linki2= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
			$nor=user;
			$sql2="SELECT egoera FROM users where email=$nor";
			$ema2= $linki2->query($sql2);
			
			if($ema2=='blokeatuta'){
				$ema2 = 'aktibo';
			}else{
				$ema2 = 'blokeatuta';
			}
			$sql3 = "UPDATE users SET egoera=$ema where email=$nor";

			$linki2->query($sql3);
			$linki2->close();
			?>
		}
		
		function Ezabatu(user){
			<?php
			//$linki3 = new mysqli("localhost","root","","quiz");
			$linki3= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
			$nor=user;
			$sql4="DELETE FROM users where email=$nor";
			$linki3->query($sql4);
			$linki3->close();
			?>
		}
	
	</script>

		 
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
		<?php echo "<span class='right'> $logeatuta</span>" ?>
		</br>
		 <span class='right'><a href='logOut.php'>LogOut</a> </span>
	
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
	
	
	
		<span><a href='layoutR.php'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php'>Credits</a></span>
		<span><a href='addQuestion.php'>Add questions</a></span>
		<span><a href='addQuestion5HTML.php'>Add questions HTML5</a></span>
		<span><a href='showQuestions.php?'>ShowQuestions</a></span>
		<span><a href='../xml/questions.xml'>XML questions</a></span>
		<span><a href='showXMLquestions.php'>XML questions PHP</a></span>
		<span><a href='../xml/questionsTransAuto.xml'>XML trans auto</a></span>
		<span><a href='handlingQuizesAJAX.php'>Handling Questions</a></span>
		<?php if ($_SESSION['rol'] == "admin") echo "<span><a href='handlingAccounts.php'>Handling Accounts</a></span>" ?>

	
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		
		<?php 


		include 'dbConfig.php';
	
	
		$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
		//$linki= new mysqli("localhost","root","","quiz");

	
		$sql="SELECT * FROM users";
	
	
		if (!$linki->query($sql)) {
			die('Errorea: ' . $linki->error);
		}else{
			$ema= $linki->query($sql);
		}
		
		
		
		echo "<table border=1> <tr> <th>EMAILA</th> <th>DEITURAK</th> <th>PASAHITZA</th> <th>EGOERA</th> <th>EDITATU EGOERA</th> <th>EZABATU</th></tr>";
		while($row= $ema->fetch_array(MYSQLI_ASSOC)){
			echo"<tr><td>".$row['email']."</td> <td>".$row['dei']."</td> <td>".$row['pass']."</td> <td>".$row['egoera']."</td>
			<td><input type='button' value='Egoera editatu' id='edit' onClick='Editatu(".$row['email'].")'</td>
			<td><input type='button' value='Ezabatu' id='eza' onClick='Ezabatu(".$row['email'].")'</td></tr>";
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