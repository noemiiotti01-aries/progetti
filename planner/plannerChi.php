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
				<li> <a class="activedue" href="plannerChi.php">chi siamo</a> </li>
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
		<div id="testo" class="clearfix">
			<p> 
			La pianificazione è il processo di riflessione sulle attività necessarie per raggiungere un obiettivo desiderato. È la prima e più importante attività per ottenere i risultati desiderati. Implica la creazione e il mantenimento di un piano, come gli aspetti psicologici che richiedono abilità concettuali. In quanto tale, la pianificazione è una proprietà fondamentale del comportamento intelligente. È un termine usato per prevedere in linea di massima quando compiere un'attività o una serie di attività. Un ulteriore significato importante, spesso chiamato semplicemente "pianificazione", è il contesto giuridico degli sviluppi edilizi consentiti.
			</p>
			<br/>
			<p> 
			sito realizzato da: Iotti Noemi 5SA
			</p>
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