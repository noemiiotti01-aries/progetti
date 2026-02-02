<?php
	session_start();
	$slot=$_GET["slot"];
	$data=$_GET["data"];
	$numPress=$_GET["numpress"];
	
	$server="localhost";
	$user="root";
	$pwd="";
	$db="planner";
	$connessione=mysqli_connect($server,$user,$pwd,$db);
?>
<html>
	<head>
		<title>
			Planner Online
	</title>
	<link type="text/css" rel="stylesheet" href="planner.css"/>
	<body>
		<div id="inserisciAtt" class="clearfix">
			<form action="nuovaAttivita.php" method="get">
				<label> tipo attività </label>
				<select name="tipo">
					<option value="1"> Libero </option>
					<option value="2"> Scuola </option>
					<option value="3"> Lavoro </option>
					<option value="4"> Appuntamenti </option>
					<option value="5"> Salute </option>
				</select>
				<br/>
				<br/>
				<label> descrizione</label>
				<input type="text" name="descrizione" required /> </br> </br>
				<input type="hidden" name="slot" value="<?php echo($slot); ?>"/>
				<input type="hidden" name="data" value="<?php echo($data); ?>"/>
				<input type="hidden" name="numpress" value="<?php echo($numPress); ?>"/>
				<input type="submit" value="inserisci" class="bottone"/>
				
			</form>
		</div>
		
		
	</body>
</html>