<?php include 'header.php';?>
<main id="start">
<?php include 'arenachefmeny.php'; ?>
    <h1>Vy för Arenachef</h1>
	<div class="flexar">
		<div class="flex">
			<img src="images/BilderKartor3.jpg" alt="Karta" id="kartaindex">
			<!-- bild på karta med klick? -->
			<!-- Fråga : vill du även skicka detta i nyhetsflödet? -> automatgenererat meddelande i nyhetsflöde -->  
	
			<h2>Inskickade åtgärdspunkter</h2>
			<!-- Hur löser vi raderaknappen? -->
			
			<?php /*include 'functions.php';*/ AC_view_AUProblem();?>
		
			<!-- Ny arbetsorder med info redan ifylld från inskickad åtgärdspunkt? -->			
		</div>
		<div class="flex">
			<h2>Under förhandling</h2>
			<?php AC_view_AOp(); ?>
			<h2>Alla arbetsordrar</h2>
			<?php AC_view_workOrder(); ?>
	
	</div>
	
		<?php/* include 'arbetsorder.php';*/?>
		
		<div class="flex">
			<h3>Ny arbetsordsddssdder</h3>
    		
				<?php AC_update_workOrder(); ?>			
		</div>     
	
		<div class="flex">		
			<h2>Uppdatera nyhetsflöde</h2>
			 <!--(under flik - delge info?)-->
			
			<!-- snabbknappar med olika info? 
			Öppna/stäng delsträcka osv. 
			--> 
			<!-- ska karta automatiskt uppdateras? val att uppdatera karta? --> 
			<form action="arenachef.php" method="post">
				<input type="text" name="nHeader" placeholder="Rubrik">
				
				<input list="nOrt" name="nOrt">
						<datalist id="nOrt">
							<option value="Hedemora-Norrhyttan">
							<option value="Norrhyttan-Bondhyttan">
							<option value="Bondhyttan-Bommansbo">
							<option value="Bommansbo-Smedjebacken">
							<option value="Smedjebacken-Björsjö">
							<option value="Björsjö-Grängesberg">
						</datalist>
						
				<!--<input type="date" name="nDate" placeholder="Datum"> --> 
				
				<input type="text" name="article"  placeholder="Beskrivning"><br>
				
				<button class="knapp" type="submit">SKICKA</button>
			</form>
			
			<?php 
			if(isset($_POST['nHeader'])){
				$nHeader = $_POST["nHeader"];
				$nOrt = $_POST["nOrt"];
				$article = $_POST["article"];
				AC_update_news($article, $nHeader, $nOrt);
			}?>
		</div>
		<div class="flex">
			<h2>Öppna/stäng delsträckor</h2>
				<form action="arenachef.php" method="post">

					<input list="oOrt" name="oOrt">
					
					<datalist id="oOrt">
						<option value="Hedemora-Norrhyttan">
						<option value="Norrhyttan-Bondhyttan">
						<option value="Bondhyttan-Bommansbo">
						<option value="Bommansbo-Smedjebacken">
						<option value="Smedjebacken-Björsjö">
						<option value="Björsjö-Grängesberg">
					</datalist>
					
					<input type="date" name="oDate" placeholder="Datum">
					
					
					
					<textarea name="oInfo" placeholder="Information"></textarea><br>
					<button class="knapp" type="submit">SKICKA</button>
				</form>
				<?php 
				if(isset($_POST['oOrt'])){
					$oOrt = $_POST["oOrt"];
					$oDate = $_POST["oDate"];
					$oInfo = $_POST["oInfo"];
					AC_update_delstracka($oOrt, $oDate, $oInfo);
				}?>
			<!-- <h2>Uppdatera karta</h2>
			 <img src="images/BilderKartor3.jpg" alt="Karta" id="kartaindex" > -->
			<!-- bild på karta med klick? -->
			<!-- Fråga : vill du även skicka detta i nyhetsflödet? -> automatgenererat meddelande i nyhetsflöde -->  	
		</div>
			
		<div class="flex">
			<h2>Statistik</h2>
			<!--<img src="images/kalender.png" alt="kalender" id="kalender"/>-->
		</div>
		<div class="flex">
		   <?php /* include 'arenachefue.php';*/?>
			<h2>Underentreprenörer</h2>
		   <?php AC_view_UE(); ?>
		</div>
	
	  <!--  <h2>Väderprognos</h2>-->  
	</div>
</main>

<?php include 'footer.php';?>




 
    
	
	
	
	
	
	
	
    
    -->