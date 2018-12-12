<?php 
session_start();
include("segurtasunaNotAnon.php");
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
	
			$pass = $_POST['pasahitz'];    
			$passHash = password_hash($pass, PASSWORD_BCRYPT);
			
			$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
			//$linki= new mysqli("localhost","root","","quiz");

			$sql="INSERT INTO users(email, dei, pass, arg, egoera) VALUES
				('$_POST[email]' , '$_POST[deitura]' ,'$passHash', '$_POST[argazkia]', 'aktibo')";
	
	
			if (!$linki->query($sql)) {
				die('Errorea: ' . $linki->error);
			}
		
			echo "<script>location.href='logIn.php'</script>";
			
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
		var emailona=false;
		var pasahitzona=false;
		$(document).ready(function(){
		
			$('#galderenF').submit(function(){
				
				var pasahitz = $('#pasahitz').val();
				var pasahitz2 = $('#pasahitz2').val();
				
				if(pasahitz!=pasahitz2){
					alert("Pasahitzak ez dute koiziditzen");
					return fasle;
				}
				if(emailona==true && pasahitzona==true) {
					alert("Ondo erregistratu zara");
					return true;
				}else{ 
					alert("Zerbait ez da baliozkoa");
					return false;
				 } 
			});
		});
		
	xhro = new XMLHttpRequest();
	xhro.onreadystatechange=function(){
		//alert(xhro.readyState);
		if (xhro.readyState==4 && xhro.status==200){
			var ema=xhro.responseText;
			if(ema=="BAI"){
				emailona=true; 
				document.getElementById("emaitza").innerHTML= "Emaila BALIOZKOA da";
			}else{
				emailona=false; 
				document.getElementById("emaitza").innerHTML= "Emaila BALIOGABEA da";
			}
		}
			
	}
	function egiaztatuEmaila(){
		var emai = document.getElementById("email").value;
		xhro.open("GET", "configemail.php?email="+emai, true);
		xhro.send();
	}
	
	
	xhro2 = new XMLHttpRequest();
	xhro2.onreadystatechange=function(){
		if (xhro2.readyState==4 && xhro2.status==200){
			var ema=xhro2.responseText;
			if(ema=="BALIOZKOA"){
				pasahitzona=true;
				document.getElementById("emaitzapas").innerHTML= "BALIOZKO pasahitza idatzi duzu";
			}else if(ema=="BALIOGABEA"){
				pasahitzona=false;
				document.getElementById("emaitzapas").innerHTML= "Pasahitz BALIOGABEA idatzi duzu";
			}else{
				pasahitzona=false; 
				document.getElementById("emaitzapas").innerHTML= "Zerbitzurik GABE";
			}
		}
			
	}
	function egiaztatuPasahitza(){
		var emai = document.getElementById("pasahitz").value;
		xhro2.open("GET", "configpass.php?pasahitz="+emai, true);
		xhro2.send();
	}
	
		
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
		<span><a href='layout.php'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php'>Credits</a></span>
		<span><a href='getNewPassword.php'>Recover Password</a></span>
	</nav>
    <section class="main" id="s1">
    
	<div id="emaitza"></div>
	<div id="emaitzapas"></div>
	<div>
		<br>
		<form id="galderenF" name="galderenF" action="signUp.php" method="post">
			Emaila(*): <input type="email" id="email" name="email" pattern="[a-zA-Z]{3,}[0-9]{3}@ikasle\.ehu\.eus" placeholder="xxx000@ikasle.ehu.eus" onchange="egiaztatuEmaila()" required><br>
			Deitura(*): <input type="text" id="deitura" name="deitura" pattern="[A-Z][a-z]*(\s[A-Z][a-z]*)+" placeholder="10 karaktere gutxienez" required><br>
			Pasahitza(*): <input type="password" id="pasahitz" name="pasahitz" pattern="[a-zA-Z0-9]{8,}" onchange="egiaztatuPasahitza()"required><br>
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