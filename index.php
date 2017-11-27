<?php include 'header.php';?>

<main id="start">
    <h1>Skidloppet AB </h1>
    
	<div id="left">
		<img src="images/BilderKartor3.jpg" alt="Karta" id="kartaindex">
		<!-- dynamisk bilder, hovereffekt över delsträckor med väderprognos, om spåret är öppet, kommentarer osv? 
		eller ska det ändras på kartan färger direkt (flera bilder till en bildmap?) Väder ovanpå som bild? 
		dynamiskt - animationer? eller enbart bilder som ändras? 
		-->
		<?php AU_view_closedDelstrackor(); ?>
		
		
	</div>
	
	<div id="nyheter">
		<h2>Nyheter</h2>
		<?php AU_view_news(); ?>
	</div>
	<!--
	<div id="nyhetertest">
		
		<div id="titel">
			<h3>TEST TITEL</h3>
		</div>
		
		<div id="nyhetbeskrivning">
			<p>TEST beskriving av nyhet</p>
		</div>
		
		<div id="postmeta">
			<div id="nyhetpostat">
				<span>Datum</span>
				<span id="nyhetdate">
					2017-02-02
				</span>
			</div>
			
			<div id="merlink">
				<a href="#">Visa mer&rarr;</a>
			</div>
		</div>
	</div>-->
    
	
	<!-- tabell problem -->
    <div id="rapporteraproblem">
		<h2>Rapportera problem</h2> <!-- hänvisning till kontaktsida, egen? Ej någon klientsida/serversida kontroll formulär, måste!!-->
		
			<form action="index.php" method="post">   
	
				<input type="text" name="rName" placeholder="Namn">
				
				
				<input type="email" name="rMail" placeholder="E-post">
				
				
				<input type="text" name="rDescr" placeholder="Meddelande">
				
				
				<div id="stracka">
					<!--<select>
						<option value="" disabled selected>Välj delsträcka</option>
						<option value="hedemora">Hedemora-Norrhyttan</option>
						<option value="norrhyttan">Norrhyttan-Bondhyttan</option>
						<option value="bondhyttan">Bondhyttan-Bommansbo</option>
						<option value="bommansbo">Bommansbo-Smedjebacken</option>
						<option value="smedjebacken">Smedjebacken-Björsjö</option>
						<option value="bjorsjo">Björsjö-Grängesberg</option>
					</select>-->
					
					<input list="rOrt" name="rOrt">
					<datalist id="rOrt">
						<option value="Hedemora-Norrhyttan">
						<option value="Norrhyttan-Bondhyttan">
						<option value="Bondhyttan-Bommansbo">
						<option value="Bommansbo-Smedjebacken">
						<option value="Smedjebacken-Björsjö">
						<option value="Björsjö-Grängesberg">
					</datalist>
				</div>
			
				<div id="problem">

					<input list="probChoice" name="probChoice">
					<datalist id="probChoice">
						<option value="Ett blockerande träd">
						<option value="Död björn över spåret">
						<option value="Vattenöversvämmning">
					</datalist>	
				</div>	
				<br>		
				<button class="knapp" type="submit">SKICKA</button>
			</form>
			
		</div>
		
       <?php		
			//Skickar in variablerna i funktionen AU_Problem
			//Tar bort onödig felmeddelande med if(isset...)
			if(isset($_POST['rMail'])){
			$rMail = $_POST["rMail"];
			$rName = $_POST["rName"];
			$rDescr = $_POST["rDescr"];	
			$probChoice = $_POST["probChoice"];	
			$rOrt = $_POST["rOrt"];	
				
			AU_Problem($rMail, $rName, $rDescr, $probChoice, $rOrt);  //Delsträcka ska läggas till
			}
		?>
</main>

<?php /*include 'footer.php';*/?>