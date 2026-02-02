<?php 
	session_start();
	
	$server="localhost";
	$user="root";
	$pwd="";
	$db="planner";
	$connessione=mysqli_connect($server,$user,$pwd,$db);
?>
<html>
	<head>
		<title>
			
		</title>
		<link type="text/css" rel="stylesheet" href="planner.css"/>
	<body>
		<div id="titolo" class="clearfix">
			<h1>Planner</h1>
		</div>
		<div id="drop-menu" class="clearfix">
			<ul id="menu">
				<li> <a href="planner.php">Home</a> </li>
				<li> <a href="plannerLogin.php">login o registrati</a> </li>
				<li> <a href="plannerChi.php">chi siamo</a> </li>
				<li> <a href="plannerCartacei.php">planner cartacei</a> </li>
				<li> <a href="plannerDigitali.php">planner digitali</a> </li>
				<?php 
					if(isset($_SESSION["username"])){
						echo("<li> <p> Ciao ".$_SESSION["username"]." </p> <ul>"); 
							echo("<li><a href='paginaLogout.php'> Logout </a></li>");
							echo("<li><a href='paginaInfo.php'> Informazioni utente </a></li>");
							echo("<li><a href='paginaPlannerOnline.php'> Planner portatile </a></li>");
							echo("</ul>");
							echo("</li>");
					}
				?>	
				
			</ul>
		</div>
		<div id="Info" class="clearfix">
			<div id="utente">
				<h1> Info Utente </h1> 
			</div>
			
			<?php
				$query="SELECT * FROM cliente WHERE username='".$_SESSION["username"]."'";
				$risultato=mysqli_query($connessione,$query);
				while($riga=mysqli_fetch_array($risultato)){
					echo("<div class='elencoCliente' class='clearfix'> ");
					echo("<h2>".$riga["username"]."</h2>");
					echo("<p>".$riga["nome"]."</p>");
					echo("<p>".$riga["cognome"]."</p>");
					echo("<p>".$riga["email"]."</p>");
					echo("<p>".$riga["indirizzo"]."</p>");
					echo("<p>".$riga["citta"]."</p>");
					echo("<p>".$riga["cap"]."</p>");
					echo("<p>".$riga["n_cell"]."</p>");
					
					echo("</div>");
				}
				?>
			<div id="modPag">
				<form action="paginaModifica.php" method="get">
					<label> Cambia Informazioni </label>
					<input type="submit" value="modifica" class="bottone"/>
				</form>
			</div>
		</div>
		<div id="footer" class="clearfix">
			<ul>
				<li> seguici:</li>
				<li> <a href="https://www.facebook.com/"> <img src="facebook.png"/> </a></li>
				<li> <a href="https://twitter.com/?lang=it"> <img src="twitter.png"/> </a></li>
				<li> <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"> <img src="youtube.png"/> </a></li>
			</ul>
		</div>
	</body>
</html>