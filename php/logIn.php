<?php 


	if(isset($_POST['email'])){
		$usr_email=$_POST['email'];
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
		if ($rows_cnt==1){
			$rows_cnt=0;
			header('location: layoutR.php');
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
      <span class="right" style="display:none;"><a href="/logout">LogOut</a> </span>
	<h2>Quiz: crazy questions</h2>
    </header>
	<nav class='main' id='n1' role='navigation'>
		<span><a href='../layout.html'>Home</a></span>
		<span><a href='showQuestions.php?log=0'>Quizzes</a></span>
		<span><a href='credits.php?log=0'>Credits</a></span>
		<span style="display:none;"><a href='../addQuestion.html'>Add questions</a></span>
		<span style="display:none;"><a href='../addQuestion5HTML.html'>Add questions HTML5</a></span>
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		<br>
		<form id="galderenF" name="galderenF" action="logIn.php" method="post">
			Emaila(*): <input type="email" pattern="[a-zA-Z]{3,}[0-9]{3}@ikasle\.ehu\.eus" id="email" name="email" placeholder="xxx000@ikasle.ehu.eus" required><br>
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