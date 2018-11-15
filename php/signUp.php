<?php 


	if(isset($_POST['email'])){


		include 'dbConfig.php';
	
	
	
		if(!preg_match('/^[a-zA-Z]{3,}[0-9]{3}@ikasle\.ehu\.eus$/',$_POST['email'])){
			echo "Wrong email!";
			echo "<p><a href='../layout.html'>HOMEra itzuli</a>";
		}
		else if(!preg_match('/^[A-Z][a-z]*(\s[A-Z][a-z]*)+$/',$_POST['deitura'])){
			echo "Deitura okerrak!";
			echo "<p><a href='../layout.html'>HOMEra itzuli</a>";
		}
		else if(!preg_match('/^[a-zA-Z0-9]{8,}$/',$_POST['pasahitz'])){
			echo "Wrong password";
			echo "<p><a href='../layout.html'>HOMEra itzuli</a>";
		}
		else if(!preg_match('/^[a-zA-Z0-9]{8,}$/',$_POST['pasahitz2'])){
			echo "Wrong password!";
			echo "<p><a href='../layout.html'>HOMEra itzuli</a>";
		}
		else if($_POST['pasahitz']!=$_POST['pasahitz2']){
			echo "Not same password!";
			echo "<p><a href='../layout.html'>HOMEra itzuli</a>";
		}else{
	
	
			//$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
			$linki= new mysqli("localhost","root","","quiz");

			$sql="INSERT INTO users(email, dei, pass, arg) VALUES
				('$_POST[email]' , '$_POST[deitura]' ,'$_POST[pasahitz]', '$_POST[argazkia]')";
	
	
			if (!$linki->query($sql)) {
				die('Errorea: ' . $linki->error);
			}
		
			header('location: logIn.php');
			$linki->close();
		
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
	
	<script>
		$(document).ready(function(){
		
			$('#galderenF').submit(function(){
				
				var pasahitz = $('#pasahitz').val();
				var pasahitz2 = $('#pasahitz2').val();
				
				if(pasahitz!=pasahitz2){
					alert("Pasahitzak ez dute koiziditzen");
					return fasle;
				}
				alert("Ondo erregistratu zara");
				return true;
				
				
			});
				
		});
		
	</script>
	
	
		 
  </head>
  <body>
  <div id='page-wrap'>
	<header class='main' id='h1'>
      <span class="right"><a href="logIn.php">LogIn</a> </span>
	  <span class="right"><a href="signUp.php">SignUp</a> </span>
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../layout.html'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php?log=null'>Credits</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		<br>
		<form id="galderenF" name="galderenF" action="signUp.php" method="post">
			Emaila(*): <input type="email" pattern="[a-zA-Z]{3,}[0-9]{3}@ikasle\.ehu\.eus" id="email" name="email" placeholder="xxx000@ikasle.ehu.eus" required><br>
			Deitura(*): <input type="text" id="deitura" name="deitura" pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)+" placeholder="10 karaktere gutxienez" required><br>
			Pasahitza(*): <input type="password" id="pasahitz" name="pasahitz" pattern="[a-zA-Z0-9]{8,}" required><br>
			Pasahitza errepikatu(*): <input type="password" id="pasahitz2" name="pasahitz2" pattern="[a-zA-Z0-9]{8,}" required><br>
			Picture: <input type="file" id="argazkia" name="argazkia"><br><br><br>
			
			<input type="reset" value="Reset" id="reset">
			
			<input type="submit" value="Send user" id="send">
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