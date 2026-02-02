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
			<ul id="menu" class="clearfix">
				<li> <a href="planner.php">Home</a> </li>
				<li> <a href="plannerLogin.php">login o registrati</a> </li>
				<li> <a href="plannerChi.php">chi siamo</a> </li>
				<li> <a href="plannerCartacei.php">planner cartacei</a> </li>
				<li> <a class="activedue" href="plannerDigitali.php">planner digitali</a> </li>
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
			<?php
				echo("<form action='paginaAcquisto.php' method='get'>");
				$query="SELECT * FROM planner_comprare WHERE tipo='digitale' ";
				$risultato=mysqli_query($connessione,$query);
				while($riga=mysqli_fetch_array($risultato)){
					echo("<div class='elencoDigitali' class='clearfix'>");
					echo("<img src='".$riga["img"]."'/>");
					echo("<h1>".$riga["nome"]."</h1>");
					echo("<p>".$riga["prezzo"]." euro</p>");
					echo("<p>".$riga["descrizione"]."</p>");
					echo("<p>Disponibilità: ".$riga["disponibilita"]."</p>");
					echo("<input type='submit' value='Compra' class='bottone'/>");
					if(isset($_GET["comprato"])){
							if($_GET["comprato"]=="si"){
								echo("comprato");
							}
						}
					echo("</div>");
				}
				
				echo("<input type='hidden' value='digitale' name='tipo' />");
				echo("</form>");
				?>
		<div id="footerDue" class="clearfix">
			<ul>
				<li> seguici:</li>
				<li> <a href="https://www.facebook.com/"> <img src="facebook.png"/> </a></li>
				<li> <a href="https://twitter.com/?lang=it"> <img src="twitter.png"/> </a></li>
				<li> <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"> <img src="youtube.png"/> </a></li>
			</ul>
		</div>
	</body>
</html>