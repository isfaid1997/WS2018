<?php

	session_start();
	$logeatuta= $_SESSION['var'];
	include ("segurtasunaKAU.php");
	
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
		
		function datuakEskatu() {
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  myFunction(this);
			}
		  };
		  xhttp.open("GET", "../xml/questions.xml?q="+ new Date().getTime(), true);
		  xhttp.send();
		}
		function myFunction(xml) {
		  var i;
		  var zerbait=false;
		  var xmlDoc = xml.responseXML;
		  var table="<tr><th>Galdera</th><th>Title</th></tr>";
		  var x = xmlDoc.getElementsByTagName("assessmentItem");
		  for (i = 0; i <x.length; i++) {
			if(x[i].getAttribute("author")=="<?php echo "$logeatuta" ?>"){
				table += "<tr><td>" +
				x[i].getElementsByTagName("p")[0].childNodes[0].nodeValue +
				"</td><td>" +
				x[i].getElementsByTagName("value")[0].childNodes[0].nodeValue +
				"</td></tr>";
				zerbait=true;
			}
		  }
		  if(!zerbait) table = "<tr><th> Ez daukazu galderarik sortuta</th></tr>";
		  document.getElementById("emaitza").innerHTML = table;
		}
		
		$(document).ready(function(){
			$('#add').click(function(){
				var url = "addQuestion5HTML.php";
				$.ajax({
					type:"POST",
					url: url,
					cache: false,
					data: $("#galderenF").serialize(),
					success: function birkargatu(){
						datuakEskatu();
					}
				});
			});
		});
		
		
	</script>
	<style>
	.column{
		float: left;
		width: 40%;
	}
	</style>
		 
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
		<span><a href='layoutR.php'>Home</a></span>
		<span>Quizzes</span>
		<span><a href='credits.php'>Credits</a></span>
		<span><a href='addQuestion.php'>Add questions</a></span>
		<span><a href='addQuestion5HTML.php'>Add questions HTML5</a></span>
		<span><a href='showQuestions.php'>ShowQuestions</a></span>
		<span><a href='../xml/questions.xml'>XML questions</a></span>
		<span><a href='showXMLquestions.php'>XML questions PHP</a></span>
		<span><a href='../xml/questionsTransAuto.xml'>XML trans auto</a></span>
		<span><a href='handlingQuizesAJAX.php'>Handling Questions</a></span>
		<?php if ($_SESSION['rol'] == "admin") echo "<span><a href='handlingAccounts.php'>Handling Accounts</a></span>" ?>
	</nav>
	
    <section class="main" id="s1">
	<div class="column">
		<input type="button" value="View question" id="view" name="view" onclick="datuakEskatu()">
		<br><br>
		<table id="emaitza" style="background-color:#ffffff;">
			<tr><th>Galderak hemen agertuko dira...</th></tr>
		</table>
	</div>
	<div class="column">
		<?php echo "<form id='galderenF' name='galderenF' method='post'>" ?>
		<?php echo"Emaila(*): <input type='email' pattern='[a-zA-Z]{3,}[0-9]{3}@ikasle\.ehu\.eus' id='email' name='email' value='$logeatuta' 
			placeholder='xxx000@ikasle.ehu.eus' required readonly><br>" ?>
			Questions(*): <input type="text" id="galdera" name="galdera" pattern="[a-zA-Z].{9,}" placeholder="10 karaktere gutxienez" required><br>
			Correct answer(*): <input type="text" id="eranzuzen" name="eranzuzen" pattern="[a-zA-Z].*" required><br>
			Incorrect answer1(*): <input type="text" id="eranoker1" name="eranoker1" pattern="[a-zA-Z].*" required><br>
			Incorrect answer2(*): <input type="text" id="eranoker2" name="eranoker2" pattern="[a-zA-Z].*" required><br>
			Incorrect answer3(*): <input type="text" id="eranoker3" name="eranoker3" pattern="[a-zA-Z].*" required><br><br>
			Difficulty(*): <input type="text" id="zailtasuna" name="zailtasuna"pattern="[0-5]{1}" placeholder="Zailtasuna 0-5 artekoa" required><br>
			Subject(*): <input type="text" id="gaia" name="gaia"required><br><br>
			Picture: <input type="file" id="argazkia" name="argazkia"><br><br><br>
			
			<input type="reset" value="Reset" id="reset">
			<input type="button" value="Add question" id="add" name="send">
		</form>
		<br><br><br>
	</div>
	
	
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/isfaid1997/WS2018'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>

