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
				<li> <a class="activedue" href="planner.php">Home</a> </li>
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
		<div id="contenuto" class="clearfix">
			<div id="imguno" class="clearfix">
				<img src="righello.png" />
			</div>
			
			<div class="slideshow-container">
				<div class="mySlides fade">
					<div class="numbertext">1 / 4</div>
					<img src="copertina.jpg" style="width:50%"/>
				</div>

				<div class="mySlides fade">
					<div class="numbertext">2 / 4</div>
					<img src="copertinauno.jpg" style="width:50%"/>
				</div>

				<div class="mySlides fade">
					<div class="numbertext">3 / 4</div>
					<img src="copertinadue.jpg" style="width:50%">
				</div>
				
				<div class="mySlides fade">
					<div class="numbertext">4 / 4</div>
					<img src="copertinatre.jpg" style="width:50%"/>
				</div>
			</div>
			<br/>
			<div style="text-align:center">
				<span class="dot" onclick="currentSlide(1)"></span> 
				<span class="dot" onclick="currentSlide(2)"></span> 
				<span class="dot" onclick="currentSlide(3)"></span> 
				<span class="dot" onclick="currentSlide(4)"></span> 
			</div>
			<script>
				let slideIndex = 0;
				showSlides();

				function showSlides() {
				  let i;
				  let slides = document.getElementsByClassName("mySlides");
				  let dots = document.getElementsByClassName("dot");
				  for (i = 0; i < slides.length; i++) {
					slides[i].style.display = "none";  
				  }
				  slideIndex++;
				  if (slideIndex > slides.length) {slideIndex = 1}    
				  for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(" active", "");
				  }
				  slides[slideIndex-1].style.display = "block";  
				  dots[slideIndex-1].className += " active";
				  setTimeout(showSlides, 3000); 
				}
			</script>
			<div id="imgdue" class="clearfix">
				<img src="squadra.png" />
			</div>

		</div>
		<br/>
		
		
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