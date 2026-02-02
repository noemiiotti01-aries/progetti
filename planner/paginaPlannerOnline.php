<?php
	//aggiungere connessione al db
	session_start();
	
	$server="localhost";
	$user="root";
	$pwd="";
	$db="planner";
	$connessione=mysqli_connect($server,$user,$pwd,$db);
	
	$numPress=0;
	if(isset($_GET["numpress"])){
		$numPress=$_GET["numpress"];
	}
	
	$giorni=array();
	//legge data di oggi
	$today = getdate();
	$numGiorno=$today["wday"]-1;
	$numGiorno="-".$numGiorno." days";
	$today  = new DateTime();
	
	if($numPress>0){
		$g=7*$numPress;
		date_add($today, date_interval_create_from_date_string($g." days"));
		
	}
	
	//$numGiorno="-".$numGiorno." days";
	
	date_add($today, date_interval_create_from_date_string($numGiorno));
	$giorni[0]=new DateTime(date_format($today, 'd-m-Y'));
	date_add($today, date_interval_create_from_date_string('1 days'));
	$giorni[1]=new DateTime(date_format($today, 'd-m-Y'));
	date_add($today, date_interval_create_from_date_string('1 days'));
	$giorni[2]=new DateTime(date_format($today, 'd-m-Y'));
	date_add($today, date_interval_create_from_date_string('1 days'));
	$giorni[3]=new DateTime(date_format($today, 'd-m-Y'));
	date_add($today, date_interval_create_from_date_string('1 days'));
	$giorni[4]=new DateTime(date_format($today, 'd-m-Y'));
	date_add($today, date_interval_create_from_date_string('1 days'));
	$giorni[5]=new DateTime(date_format($today, 'd-m-Y'));
	date_add($today, date_interval_create_from_date_string('1 days'));
	$giorni[6]=new DateTime(date_format($today, 'd-m-Y'));
	
?>
<html>
<head>
	<title>
			Planner Online
	</title>
	<link type="text/css" rel="stylesheet" href="planner.css"/>
	<script>
		function cambia(i){
			var  numpress=parseInt(document.getElementById("numpress").value);
			if(i==1){
				numpress=numpress+1;
			}else{
				if(numpress>0){
					numpress=numpress-1;
				}else{
					alert("Non è possibile fissare appuntamenti per le settimane già passate");
				}
			}
		
			window.location.href = "paginaPlannerOnline.php?numpress="+numpress;
		}
		
	
	</script>
</head>

<body>
	
	
	<div  id="centro" >
	
		<table border="3"  cellspacing="0">
			<tr class="intestazione">
				<td>  </td>
				<td colspan="7">
					<img src="frecciasx.png" id="frecciasx" onclick="cambia(-1)"/> 
					<?php echo(date_format($giorni[0], 'd F'));?> - <?php echo(date_format($giorni[4], 'd F'));?>
					<img src="frecciadx.png" id="frecciadx" onclick="cambia(1)"/>
				</td>
			</tr>
			<tr class="intestazione">
				<td> Ora </td>
				<td> <?php echo(date_format($giorni[0], 'd l'));?></td>
				<td> <?php echo(date_format($giorni[1], 'd l'));?></td>
				<td> <?php echo(date_format($giorni[2], 'd l'));?></td>
				<td> <?php echo(date_format($giorni[3], 'd l'));?></td>
				<td> <?php echo(date_format($giorni[4], 'd l'));?></td>
				<td> <?php echo(date_format($giorni[5], 'd l'));?></td>
				<td> <?php echo(date_format($giorni[6], 'd l'));?></td>
			</tr>
			<tr></tr>
			<?php
			$numGiorno=1;
			
			$query="select slot_giornaliero.*,slot.* from slot LEFT JOIN slot_giornaliero ON slot_giornaliero.fk_cod_slot=slot.cod_slot  and data_giorno>='".date_format($giorni[0], 'Y-m-d')."' AND slot_giornaliero.data_giorno<='".date_format($giorni[6], 'Y-m-d')."'   and fk_username='".$_SESSION["username"]."' order by inizio , giorno";
					//echo($query);
			$result=mysqli_query($connessione, $query) or die("query sbagliata".$query);
			$num_rows=mysqli_num_rows($result);
			
			//formatta gli orari da lasciare così come è
			$pad_length = 2;
			$pad_char = 0;
			$str_type = 'd'; 
			$format = "%{$pad_char}{$pad_length}{$str_type}"; 
			
			//legge i risultati della query
			while($record=mysqli_fetch_array($result)){
				if($numGiorno==1){
					$ora=sprintf($format, $record["inizio"]);
					echo("<tr style='height:40px;'><td style='background:#3a251a; color:white;'> ".$ora." </td>");
				}
				
					
				if($record["cod_giorno"]=="NULL" or $record["cod_giorno"]=="" ){
					//se non c'è l'attività nello slot
					echo("<td style='background:white'>");
					//stampo link per aggiungere attività
					echo("<a href='./paginaNuovaAttivita.php?slot=".$record["cod_slot"]."&data=".date_format($giorni[$numGiorno-1], 'Y-m-d')."&numpress=".$numPress."' style='text-decoration: none; color: black;'>
							<div  class='appuntamentono'>Aggiungi
							</div>
						</a></td> ");
				}else{
					//se esiste già un'attività nello slot
					echo("<td style='background:lightgrey'>");
					$risultato=mysqli_query($connessione,$query);
				
					echo("<div class='elencoDati'>");
					echo("<p>".$record["descrizione"]."</p>");
					echo("</div>");
				
						
					("</td>");
					
				}
				$numGiorno=$numGiorno+1;
				if($numGiorno>7){
					echo("</tr>");
					$numGiorno=1;
				}				
					
			}
				
				
			
			
		?>
			
		</table>
		<input type="hidden" value="<?php echo($codiceLaboratorio); ?>" id="laboratorio"/>
		<input type="hidden" id="numpress" value="<?php echo($numPress) ?>"/>
		
		
	</div>
	<br/>
	<div id="bottone">
	<input type="button" value="Torna Home" class="bottone"  onclick="window.location.href='planner.php';"/>
	</div>

</body>

</html>