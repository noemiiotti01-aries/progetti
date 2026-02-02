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
		<link type="text/css" rel="stylesheet" href="paginaGrafica.css"/>
	<body>
			<?php
			if(isset($_GET["tipo"])){
				if($_GET["tipo"]=="cartaceo"){
					if(isset($_SESSION["username"])){
						header("Location: plannerCartacei.php?comprato=si");
					}else{
						header("Location: plannerLogin.php");
					}
				}else{
					if(isset($_SESSION["username"])){
						header("Location: plannerDigitali.php?comprato=si");
					}else{
						header("Location: plannerLogin.php");
					}
				}
			}
				
			?>
	</body>
</html>