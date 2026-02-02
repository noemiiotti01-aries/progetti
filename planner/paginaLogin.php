<?php 
	$username=$_GET["username"];
	$password=$_GET["password"];
	
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
	</head>
	<body>
			<?php
				$query="SELECT * FROM cliente WHERE username='$username' AND password='$password'";
				$risultato=mysqli_query($connessione,$query);
				$numero=mysqli_num_rows($risultato);
					if($numero>0){
						session_start();
						$_SESSION["username"]=$username;
						header("Location: planner.php");
					}else{
						header("Location: plannerLogin.php?erroreE=si");
					}
				
			?>
	</body>
</html>
