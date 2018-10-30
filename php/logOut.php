<?php

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
      <span class="right" style="display:none;" ><a href="logIn.php">LogIn</a> </span>
	  <span class="right" style="display:none;" ><a href="signUp.php">SignUp</a> </span>
      <span class="right"><a href="logOut.php">LogOut</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layoutR.php'>Home</a></span>
		<span><a href='showQuestions.php?log=1'>Quizzes</a></span>
		<span><a href='credits.php?log=1'>Credits</a></span>
		<span><a href='../addQuestion.html'>Add questions</a></span>
		<span><a href='../addQuestion5HTML.html'>Add questions HTML5</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		
		Do you want to log out?<br>
		<input type="submit" value="LogOut" id="irten" onclick="location.href='../layout.html'">
	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/isfaid1997/WS2018'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>