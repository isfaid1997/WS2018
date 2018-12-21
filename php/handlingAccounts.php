<?php 
	session_start();
	$logeatuta= $_SESSION['var'];
	include ("segurtasunaAccounts.php");
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('.editatu').click(function(){
				var user =$(this).closest('tr').find('.email').text();
				var nola=$(this).closest('tr').find('.egoera').text();
				$.ajax({
					type: "POST",
					url: "adminPower.php",
					cache: false,
					data: {
						'mail': user,
						'type': 'change',
						'ego': nola
					},
					success: function(msg){
						location.reload();
					}
				});
			});
			
			$('.ezabatu').click(function(){
				var user =$(this).closest('tr').find('.email').text();
				$.ajax({
					type:"POST",
					url: "adminPower.php",
					cache: false,
					data: {
						'mail': user,
						'type': 'delete',
						'ego': 'hutsa'
					},
					success: function(msg){
						location.reload();
					}
				});
			});
		});
		
		
	
	</script>

		 
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
		<?php if ($_SESSION['rol'] == "admin") echo "<span><a href='handlingAccounts.php'>Handling Accounts</a></span>" ?>

	
	</nav>
    <section class="main" id="s1">
    
	
	<div>
		
		<?php 


		include 'dbConfig.php';
	
	
		$linki= new mysqli("localhost","id7176205_egoisa","egoisa1997","id7176205_quiz");
		//$linki= new mysqli("localhost","root","","quiz");

	
		$sql="SELECT * FROM users";
	
	
		if (!$linki->query($sql)) {
			die('Errorea: ' . $linki->error);
		}else{
			$ema= $linki->query($sql);
		}
		
		
		
		echo "<table border=1> <tr> <th>EMAILA</th> <th>DEITURAK</th> <th>PASAHITZA</th> <th>EGOERA</th> <th>EDITATU EGOERA</th> <th>EZABATU</th></tr>";
		while($row= $ema->fetch_array(MYSQLI_ASSOC)){
			echo"<tr><td class='email'>".$row['email']."</td><td>".$row['dei']."</td> <td><marquee width='220px'>".$row['pass']."</marquee></td> <td class='egoera'>".$row['egoera']."</td>
			<td><button class='editatu'>Egoera editatu</button></td>
			<td><button class='ezabatu'>Ezabatu</button></td></tr>";
		}
		echo "</table>";
		$ema->free();
		$linki->close();

	?>
		
		
		
	</div>
    </section>
	<footer class='main' id='f1'>
		 <a href='https://github.com/isfaid1997/WS2018'>Link GITHUB</a>
	</footer>
</div>
</body>
</html>