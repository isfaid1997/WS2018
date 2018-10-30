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
