<?php include 'header.php'; ?>

<main id="start">

    <?php include 'arenachefmeny.php'; ?>   
<!--<div class="ao">

 <h2>Arbetsordrar</h2>
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
			<th>Startdatum</th>
			<th>Slutdatum</th>
			<th>					
				<select class="scroll">
					<option>Problem</option>
					<option>Fallet tr�d</option>
					<option>Problem2</option>
				</select>
			</th>
			<th>Kommentar</th>
			<th>					
				<select class="scroll">
					<option>Status</option>
					<option>F�rdig</option>
					<option>P�g�ende</option>
				</select>
			</th>
			<th>�ndra</th>	
		</tr>
		<tr>
			<td>1</td>
			<td>Jonas Heed</td>
			<td>2017-11-01</td>
			<td>2017-11-02</td>
			<td>Fallet tr�d</td>
			<td>Ett tr�d</td>
			<td>F�rdig</td>
			<td><button class="minbutton">�ndra</button></td>
		</tr>
		<tr>
			<td>1</td>
			<td>Jonas Heed</td>
			<td>2017-11-01</td>
			<td>2017-11-02</td>
			<td>Fallet tr�d</td>
			<td>Ett tr�d</td>
			<td>F�rdig</td>
			<td><button class="minbutton">�ndra</button></td>
		</tr>	
		<tr>
			<td>1</td>
			<td>Jonas Heed</td>
			<td>2017-11-01</td>
			<td>2017-11-02</td>
			<td>Fallet tr�d</td>
			<td>Ett tr�d</td>
			<td>F�rdig</td>
			<td><button class="minbutton">�ndra</button></td>
		</tr>
	</table>
	
	
	<div id="test">
   <h2>Under f�rhandling</h2>
    <table id="tabellstracka">
		<tr>
			<th>					
				<select class="scroll">
					<option>Delstr�cka</option>
					<option>1</option>
					<option>2</option>
				</select>
			</th>
			<th>					
				<select class="scroll">
					<option>UE</option>
					<option>Jonas Heed</option>
					<option>Underentrepren�r 2</option>
				</select>
			</th>
			<th>Datum</th>
			
			<th>					
				<select class="scroll">
					<option>Problem</option>
					<option>Fallet tr�d</option>
					<option>Problem2</option>
				</select>
			</th>
			<th>Kommentar</th>
					
			<th>Acceptera</th>
			<th>�ndra</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Jonas Heed</td>
			<td>171120-171124</td>
			<td>Fallet tr�d</td>
			<td>Femton tr�d</td>
			<td><button class="minbutton">Acceptera</button></td>
			<td><button class="minbutton">�ndra</button></td>
		</tr>

	</table>
	</div>
	</div> -->
	
    <!-- Genererad tabell med alla arbetsordrar, kunna sortera p� f�rdiga, p�g�ende, planerade, under f�rhandling osv.
    Knappar bredvid varje arbetsorder Radera (med varning), Uppdatera (med kommentarsfunktion),
    
    kunna sortera/s�ka p� enskild undent,
    
    
    kalender,
    
    
    -->
    <div class="flex">
    <h3>Ny arbetsorder</h3>
    
    		<form action="kontakt.php" method="post">
				
			<input type="tel" name="del"  placeholder="Delsträcka"> <!-- dropdown -->

			<input type="text" name="underent" placeholder="Underentreprenör"> <!-- laddas in automatiskt beroende p� delstr�cka, dropdown -->
			
			<!-- en dropdown för problem??? --> 
            
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