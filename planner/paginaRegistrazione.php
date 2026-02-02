<?php
	$nuovoUsername=$_GET["nuovoUsername"];
	$nuovaPassword=$_GET["nuovaPassword"];
	$ripetiPassword=$_GET["ripetiPassword"];
	$nome=$_GET["nome"];
	$cognome=$_GET["cognome"];
	$email=$_GET["email"];
	$indirizzo=$_GET["indirizzo"];
	$citta=$_GET["citta"];
	$cap=$_GET["cap"];
	$nCell=$_GET["nCell"];
	
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
		<link type="text/css" rel="stylesheet" href="paginaGrafica.css"/>
	<body>
		<div id="inserito">
			<?php
				if($nuovaPassword==$ripetiPassword){
					if(isset($_GET["nome"]) AND isset($_GET["cognome"])){
						$query="INSERT INTO cliente(username, password, nome, cognome, email, indirizzo, citta, cap, n_cell) VALUES('$nuovoUsername', '$nuovaPassword', '$nome', '$cognome', '$email', '$indirizzo', '$citta', '$cap', '$nCell')";
						mysqli_query($connessione,$query);
						header("Location: plannerLogin.php?registrato=si");
					}
				}else{
					header("Location: plannerLogin.php?errore=si");
				}
			?>
		</div>
	</body>
</html>
