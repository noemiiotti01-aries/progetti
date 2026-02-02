<?php 
	session_start();
	$modificaNuovaPassword=$_GET["modificaNuovaPassword"];
	$modificaRipetiPassword=$_GET["modificaRipetiPassword"];
	$modificaEmail=$_GET["modificaEmail"];
	$modificaIndirizzo=$_GET["modificaIndirizzo"];
	$modificaCitta=$_GET["modificaCitta"];
	$modificaCap=$_GET["modificaCap"];
	$modificaCell=$_GET["modificaCell"];   
	
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
			<?php
			if(isset($_GET["modificaNuovaPassword"]) and $_GET["modificaNuovaPassword"]!=""){
				if($modificaNuovaPassword==$modificaRipetiPassword){
					$queryUpdate="UPDATE cliente SET password='$modificaNuovaPassword' WHERE username='".$_SESSION["username"]."'";
					mysqli_query($connessione,$queryUpdate);
				}else{
					header("Location: paginaModifica.php?errore=si");
				}
			}
			if(isset($_GET["modificaEmail"]) and $_GET["modificaEmail"]!=""){
					$queryUpdate="UPDATE cliente SET email='$modificaEmail' WHERE username='".$_SESSION["username"]."'";
					mysqli_query($connessione,$queryUpdate);
			}
			if(isset($_GET["modificaIndirizzo"]) and $_GET["modificaIndirizzo"]!=""){
					$queryUpdate="UPDATE cliente SET indirizzo='$modificaIndirizzo' WHERE username='".$_SESSION["username"]."'";
					mysqli_query($connessione,$queryUpdate);
			}
			if(isset($_GET["modificaCitta"]) and $_GET["modificaCitta"]!=""){
					$queryUpdate="UPDATE cliente SET citta='$modificaCitta' WHERE username='".$_SESSION["username"]."'";
					mysqli_query($connessione,$queryUpdate);
			}	
			if(isset($_GET["modificaCap"]) and $_GET["modificaCap"]!=""){
					$queryUpdate="UPDATE cliente SET cap='$modificaCap' WHERE username='".$_SESSION["username"]."'";
					mysqli_query($connessione,$queryUpdate);
			}
			if(isset($_GET["modificaCell"]) and $_GET["modificaCell"]!=""){
					$queryUpdate="UPDATE cliente SET n_cell='$modificaCell' WHERE username='".$_SESSION["username"]."'";
					mysqli_query($connessione,$queryUpdate);
			}
			header("Location: paginaInfo.php");
				
				
			?>
	</body>
</html>
