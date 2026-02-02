<?php
	session_start();
	$slot=$_GET["slot"];
	$data=$_GET["data"];
	$numPress=$_GET["numpress"];
	$tipo=$_GET["tipo"];
	$descrizione=$_GET["descrizione"];
	$n_dati=0;
	
	
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
		<div id="inserisciAtt">
			<?php
			if(isset($_GET["tipo"]) AND isset($_GET["descrizione"])){
				$query="INSERT INTO slot_giornaliero(data_giorno, fk_cod_slot, fk_username, descrizione, fk_cod_attivita) VALUES('$data', '$slot', '".$_SESSION["username"]."', '$descrizione', '$tipo');";
				echo("$query");
				$n_dati=$n_dati+1;
				mysqli_query($connessione,$query);
			}
			?>
		</div>
	</body>
</html>