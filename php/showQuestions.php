

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
	

		 
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
	
      <?php if($logeatuta==0){ ?>
		<span class="right"><a href="logIn.php">LogIn</a> </span>
		<span class="right"><a href="signUp.php">SignUp</a> </span>
	<?php }else{ ?>
		 <span class="right"><a href="logOut.php">LogOut</a> </span>
	<?php } ?>
	
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
	
	<?php if($logeatuta==0){ ?>
		<span><a href='../layout.html'>Home</a></span>
		<span><a href='showQuestions.php?log=0'>Quizzes</a></span>
		<span><a href='credits.php?log=0'>Credits</a></span>
		<span style="display:none;"><a href='../addQuestion.html'>Add questions</a></span>
		<span style="display:none;"><a href='../addQuestion5HTML.html'>Add questions HTML5</a></span>
	<?php }else{ ?>
		<span><a href='layoutR.php'>Home</a></span>
		<span><a href='showQuestions.php?log=1'>Quizzes</a></span>
		<span><a href='credits.php?log=1'>Credits</a></span>
		<span><a href='../addQuestion.html'>Add questions</a></span>
		<span><a href='../addQuestion5HTML.html'>Add questions HTML5</a></span>
	<?php } ?>
	
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
		
		
		
		echo "<table border=1> <tr> <th>EMAILA</th> <th>GALDERA</th> <th>ERANTZUNZUZEN</th> <th>ERANOKER1</th> </tr>";
		while($row= $ema->fetch_array(MYSQLI_ASSOC)){
			echo"<tr><td>".$row['ema']."</td> <td>".$row['ques']."</td> <td>".$row['ca']."</td> <td>".$row['ia1']."</td></tr>"; 
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