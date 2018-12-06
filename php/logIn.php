<?php 

	session_start ();
	
	
	if(isset($_POST['email'])){
		$usr_email=$_POST['email'];
		
		$_SESSION['var'] = $usr_email;
		$_SESSION['kau'] = "BAI";
		
		if($usr_email == "admin000@ehu.eus"){
			$_SESSION['rol'] = "admin";
		}else{
			$_SESSION['rol'] = "ikasle";
		}
		
		include 'dbConfig.php';
		$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
		//$linki= new mysqli("localhost","root","","quiz");
		$usr_pass=$_POST['pasahitz'];
		$sql="select * FROM users where email='$usr_email' and pass='$usr_pass'";
		$result= $linki->query($sql);
		if(!($result)){echo "Error in the query". $result->error;
		}
		else{		
		$rows_cnt = $result->num_rows;
		$linki->close();
		$emaitza = $result->fetch_array(MYSQLI_ASSOC);
		if ($rows_cnt==1 && $emaitza['egoera']=="aktibo"){
			$rows_cnt=0;
			
			if($_SESSION['rol']=="admin"){
				header('location: handlingAccounts.php');
			}else{
				header('location: handlingQuizesAJAX.php');
			}
		}else if($emaitza['egoera']=="blokeatuta"){
			echo "<script> alert('Blokeatuta zaude eta ezin duzu log in egin!') </script>";
		}
		else{ echo"<script> alert('Authentication failure!') </script>";
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
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		<br>
		<form id="galderenF" name="galderenF" action="logIn.php" method="post">
			Emaila(*): <input type="email"  id="email" name="email" placeholder="xxx000@ikasle.ehu.eus" required><br>
			Pasahitza(*): <input type="password" id="pasahitz" name="pasahitz"  required><br><br><br>
		
			<input type="submit" value="Log in" id="send">
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