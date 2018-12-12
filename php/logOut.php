<?php

	session_start();
	$logeatuta= $_SESSION['var'];
	include ("segurtasunaAnon.php");
	
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
	  <?php echo "<span class='right'> $logeatuta</span>" ?>
	  </br>
      <span class='right'><a href='logOut.php'>LogOut</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php'>Credits</a></span>
		<?php if ($_SESSION['rol'] == "ikasle") echo "<span><a href='handlingQuizesAJAX.php'>Handling Quizzes</a></span>" ?>
		<?php if ($_SESSION['rol'] == "admin") echo "<span><a href='handlingAccounts.php'>Handling Accounts</a></span>" ?>
		
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		
		Do you want to log out?<br>
		<input type="submit" value="Yes" id="irten" onclick="location.href='destroySession.php'">
		<input type="submit" value="No" id="geratu" onclick="location.href='layout.php'">
	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/isfaid1997/WS2018'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>