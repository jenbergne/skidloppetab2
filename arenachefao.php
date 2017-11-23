<?php include 'header.php'; ?>

<main id="start">

    <?php include 'arenachefmeny.php'; ?>   
<!--<div class="ao">

 <h2>Arbetsordrar</h2>
    <table id="tabellstracka">
		<tr>
			<th>					
				<select class="scroll">
					<option>DelstrÃ¤cka</option>
					<option>1</option>
					<option>2</option>
				</select>
			</th>
			<th>					
				<select class="scroll">
					<option>UE</option>
					<option>Jonas Heed</option>
					<option>UnderentreprenÃ¶r 2</option>
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
			<th>Ändra</th>	
		</tr>
		<tr>
			<td>1</td>
			<td>Jonas Heed</td>
			<td>2017-11-01</td>
			<td>2017-11-02</td>
			<td>Fallet träd</td>
			<td>Ett träd</td>
			<td>Färdig</td>
			<td><button class="minbutton">Ändra</button></td>
		</tr>
		<tr>
			<td>1</td>
			<td>Jonas Heed</td>
			<td>2017-11-01</td>
			<td>2017-11-02</td>
			<td>Fallet träd</td>
			<td>Ett träd</td>
			<td>Färdig</td>
			<td><button class="minbutton">Ändra</button></td>
		</tr>	
		<tr>
			<td>1</td>
			<td>Jonas Heed</td>
			<td>2017-11-01</td>
			<td>2017-11-02</td>
			<td>Fallet träd</td>
			<td>Ett träd</td>
			<td>Färdig</td>
			<td><button class="minbutton">Ändra</button></td>
		</tr>
	</table>
	
	
	<div id="test">
   <h2>Under förhandling</h2>
    <table id="tabellstracka">
		<tr>
			<th>					
				<select class="scroll">
					<option>Delsträcka</option>
					<option>1</option>
					<option>2</option>
				</select>
			</th>
			<th>					
				<select class="scroll">
					<option>UE</option>
					<option>Jonas Heed</option>
					<option>Underentreprenör 2</option>
				</select>
			</th>
			<th>Datum</th>
			
			<th>					
				<select class="scroll">
					<option>Problem</option>
					<option>Fallet träd</option>
					<option>Problem2</option>
				</select>
			</th>
			<th>Kommentar</th>
					
			<th>Acceptera</th>
			<th>Ändra</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Jonas Heed</td>
			<td>171120-171124</td>
			<td>Fallet träd</td>
			<td>Femton träd</td>
			<td><button class="minbutton">Acceptera</button></td>
			<td><button class="minbutton">Ändra</button></td>
		</tr>

	</table>
	</div>
	</div> -->
	
    <!-- Genererad tabell med alla arbetsordrar, kunna sortera på färdiga, pågående, planerade, under förhandling osv.
    Knappar bredvid varje arbetsorder Radera (med varning), Uppdatera (med kommentarsfunktion),
    
    kunna sortera/söka på enskild undent,
    
    
    kalender,
    
    
    -->
    <div class="flex">
    <h3>Ny arbetsorder</h3>
    
    		<form action="kontakt.php" method="post">
				
			<input type="tel" name="del"  placeholder="DelstrÃ¤cka"> <!-- dropdown -->

			<input type="text" name="underent" placeholder="UnderentreprenÃ¶r"> <!-- laddas in automatiskt beroende på delsträcka, dropdown -->
			
			<!-- en dropdown fÃ¶r problem??? --> 
            
            <label><input type="checkbox" name="akut">Akut?</label>
			
			<input type="date" name="start" placeholder="Startdatum"> <!-- date???? -->
			
			<input type="date" name="slut" placeholder="Slutdatum">
			
			<textarea name="comment" placeholder="Beskrivning"></textarea><br>
			<button class="knapp" type="submit">
				SKICKA 
			  </button>

		</form>
    </div>    

</main>	

<?php include 'footer.php';?>