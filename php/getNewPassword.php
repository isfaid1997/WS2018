<?php
session_start();
include("segurtasunaNotAnon.php");
	
	if(isset($_POST['email'])){
		$usr_email=$_POST['email'];
		include 'dbConfig.php';
		$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
		//$linki= new mysqli("localhost","root","","quiz");
		$sql="select * FROM users where email='$usr_email'";
		$result= $linki->query($sql);
		if(!($result)){
			echo "Error in the query". $result->error;
		}
		else{
			$rows_cnt = $result->num_rows;
			if($rows_cnt==1){
				$rows_cnt=0;
				$str = substr(base64_encode(sha1(mt_rand())),0,10);
				$passHash = password_hash($str, PASSWORD_BCRYPT);
				mail($usr_email, 'Pasahitz berria','Zure pasahitz berria hau da: '.$str, 'FROM: admin000@ehu.eus');
				$sql2="UPDATE users SET pass='$passHash' where email='$usr_email'";
				$result2= $linki->query($sql2);
				if(!($result2)){
					echo "Error in the query". $result2->error;
				}
				else{	
					echo "<script>alert('Emailera mezu bat bidali dizugu pasahitz berriarekin')</script>";	
				}
			}else{
				echo "<script>alert('Jarri duzun emaila ez dago erregistratua')</script>";
			}
		}
	}
	
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
      <span class="right"><a href="logIn.php">LogIn</a> </span>
	  <span class="right"><a href="signUp.php">SignUp</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='layout.php'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php'>Credits</a></span>
		<span class="right"><a href="getNewPassword.php">Recover password</a> </span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		<br>
		<form id="galderenF" name="galderenF" action="getNewPassword.php" method="post">
			Emaila(*): <input type="email"  id="email" name="email" placeholder="xxx000@ikasle.ehu.eus" required><br>
			<br>
			<input type="submit" value="Recover password" id="send">
		</form>
		<br><br><br>
		<br><br><br>
	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/isfaid1997/WS2018'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

