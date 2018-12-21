<?php

	session_start();
	if(!isset($_SESSION['var'])){ 
		$_SESSION['var'] = "anonimous";
	}	
	$logeatuta= $_SESSION['var'];
	
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
	
	
	<?php if($logeatuta=='anonimous'){ ?>
		<span class="right"><a href="logIn.php">LogIn</a> </span>
		<span class="right"><a href="signUp.php">SignUp</a> </span>
	<?php }else{ ?>
		<?php echo "<span class='right'> $logeatuta</span>" ?>
		</br>
		<span class='right'><a href='logOut.php'>LogOut</a> </span>
	<?php } ?>
	
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
	
	<?php if($logeatuta=='anonimous'){ ?>
		<span><a href='layout.php'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php'>Credits</a></span>
		<span class="right"><a href="getNewPassword.php">Recover Password</a> </span>
	<?php }else{ ?>
		<span><a href='layout.php'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php'>Credits</a></span>
		<?php if ($_SESSION['rol'] == "ikasle") echo "<span><a href='handlingQuizesAJAX.php'>Handling Quizzes</a></span>" ?>
		<?php if ($_SESSION['rol'] == "admin") echo "<span><a href='handlingAccounts.php'>Handling Accounts</a></span>" ?>
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
