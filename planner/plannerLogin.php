<?php
	session_start();
?>
<html>
	<head>
		<title>
			
		</title>
		<link type="text/css" rel="stylesheet" href="planner.css"/>
	<body>
	<div id="titolo">
			<h1>Planner</h1>
		</div>
		<div id="drop-menu" class="clearfix">
			<ul id="menu">
				<li> <a href="planner.php">Home</a> </li>
				<li> <a class="activedue"  href="plannerLogin.php">login o registrati</a> </li>
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
		<div id="sfondo" class="clearfix">
			<div id="login" class="clearfix">
				<form action="paginaLogin.php" method="get">
					<h2> login </h2> <br/> 
					<label> Username </label> <br/>
					<input type="text" name="username" required /> </br> </br>
					<label> password </label> <br/>
					<input type="password" name="password" required /> </br> </br>
					<input type="submit" value="entra" class="bottone"/>
					<?php
						if(isset($_GET["erroreE"])){
							if($_GET["erroreE"]=="si"){
								echo("hai sbagliato password o username");
							}
						}
					?>
				</form>
			</div>
			<div id="registrazione" class="clearfix">
				<form action="paginaRegistrazione.php" method="get">
					<h2> Registrazione </h2> <br/> 
					<label> Username </label>
					<input type="text" name="nuovoUsername" required /> </br> </br>
					<label> password </label>
					<input type="password" name="nuovaPassword" required /> </br> </br>
					<label> ripeti password </label>
					<input type="password" name="ripetiPassword" required /> </br> </br>
					<label> Nome </label>
					<input type="text" name="nome" required /> </br> </br>
					<label> Cognome </label>
					<input type="text" name="cognome" required /> </br> </br>
					<label> email </label>
					<input type="text" name="email" required /> </br> </br>
					<label> indirizzo </label>
					<input type="text" name="indirizzo" required /> </br> </br>
					<label> città </label>
					<input type="text" name="citta" required /> </br> </br>
					<label> cap </label>
					<input type="number" name="cap" required /> </br> </br>
					<label> numero cellulare </label>
					<input type="number" name="nCell" required /> </br> </br>
					<input type="submit" value="registrati" class="bottone"/>
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