<?php

	$logeatuta= $_GET['log'];
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Quizzes</title>
    <link rel='stylesheet' type='text/css' href='../styles/style.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (min-width: 530px) and (min-device-width: 481px)'
		   href='../styles/wide.css' />
	<link rel='stylesheet' 
		   type='text/css' 
		   media='only screen and (max-width: 480px)'
		   href='../styles/smartphone.css' />
		   
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
	
	
	<?php if($logeatuta=='null'){ ?>
		<span class="right"><a href="logIn.php">LogIn</a> </span>
		<span class="right"><a href="signUp.php">SignUp</a> </span>
	<?php }else{ ?>
		<?php echo "<span class='right'> $logeatuta</span>" ?>
		</br>
		 <?php echo "<span class='right'><a href='logOut.php?log=$logeatuta'>LogOut</a> </span>" ?>
	<?php } ?>
	
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
	
	<?php if($logeatuta=='null'){ ?>
		<span><a href='../layout.html'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php?log=null'>Credits</a></span>
	<?php }else{ ?>
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
	<?php } ?>
	</nav>
    <section class="main" id="s1">
    
	<div>
	<div>Isabel Losantos eta Egoitz Herrera</div>
	<div>Informatikako Ingeniaritza</div>
	<div><img src=../images/empresa.png width="200"  height="200"/></div>
	<div>Informatika fakultatako 24 orduko gelan bizi gara</div>
	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/isfaid1997/WS2018'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>
