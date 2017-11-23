<?php include 'header.php';?>

<main id="start">
    <h1>Vy för Underentreprenör</h1>
    
	<h2>Arbetsordrar</h2>
	
	<h3>Förfrågningar </h3>
	
<table class="tabellstracka tabellstor">
		<tr>
			<th>ID</th>
			<th>Delsträcka</th>
			<th>Startdatum</th>
			<th>Slutdatum</th>
			<th>Problem</th>
			<th>Kommentar</th>	
			<th>Acceptera</th>
			<th>Acceptera ej</th>
			<th>Ändra</th>
		</tr>
		<tr>
			<td>001</td>
			<td>1</td>
			<td>2017-11-20</td>
			<td>2017-11-22</td>
			<td>Fallet träd</td>
			<td>Femton träd</td>
			<td>
			<button class="minbutton">Acceptera</button>
			</td>
			<td>
			<button class="minbutton">Acceptera ej</button>
			</td>
			<td>
			<button class="minbutton">Ändra</button>
			</td>
		</tr>

	</table>
	
	
	<h3>Alla arbetsordrar</h3>
	
	    <table class="tabellstracka">
		<tr>
			<th>ID</th>
			<th>					
				<select class="scroll">
					<option>Delsträcka</option>
					<option>1</option>
					<option>2</option>
				</select>
			</th>
			<th>Startdatum</th>
			<th>Slutdatum</th>
			<th>					
				<select class="scroll">
					<option>Problem</option>
					<option>Fallet träd</option>
					<option>Problem2</option>
				</select>
			</th>
			<th>Kommentar</th>
			<th>					
				<select class="scroll">
					<option>Status</option>
					<option>Färdig</option>
					<option>Pågående</option>
				</select>
			</th>
			<th>Markera</th>
			<th>Ändra</th>
		</tr>
		<tr>
			<td>001</td>
			<td>1</td>
			<td>2017-11-15</td>
			<td>2017-11-17</td>
			<td>Fallet träd</td>
			<td>Femton träd</td>
			<td>Pågående</td>
			<td>
			<button class="minbutton">Markera som klar</button>
			</td><td>
			<button class="minbutton">Ändra</button>
			</td>
		</tr>

	</table>
	
    <h2>Anmäl otillgänglighet</h2>
	<form action="underent.php">
		<input type="date" name="start" placeholder="Startdatum">
			
		<input type="date" name="slut" placeholder="Slutdatum">
		
		<textarea name="comment" placeholder="Meddelande"></textarea><br>
		
		<button class="knapp" type="submit">SKICKA</button>
	</form>
    
</main>

<?php include 'footer.php';?>
