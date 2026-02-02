<?php
	session_start();
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
		<div id="sfondodue" class="clearfix">
			<div id="modifica" class="clearfix">
				<form action="paginaMod.php" method="get">
					<label> password </label>
					<input type="password" name="modificaNuovaPassword" /> </br> </br>
					<label> ripeti password </label>
					<input type="password" name="modificaRipetiPassword" /> </br> </br>
					<label> email </label>
					<input type="text" name="modificaEmail" /> </br> </br>
					<label> indirizzo </label>
					<input type="text" name="modificaIndirizzo" /> </br> </br>
					<label> città </label>
					<input type="text" name="modificaCitta" /> </br> </br>
					<label> cap </label>
					<input type="number" name="modificaCap" /> </br> </br>
					<label> numero cellulare </label>
					<input type="number" name="modificaCell" /> </br> </br>
					<input type="submit" value="modifica" class="bottone"/>
					<?php
						if(isset($_GET["errore"])){
							if($_GET["errore"]=="si"){
								echo("hai sbagliato password");
							}
						}
					?>
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