<?php include 'header.php'; ?>

<main id="start">

	<?php include 'arenachefmeny.php'; ?>   
	
	 <h2>Underentreprenörer</h2>
		<table id="tabellstracka">
				<tr>
					<th>Personnummer</th>
					<th>Namn</th>
					<th>Mail</th>
					<th>Adress</th>
					<th>Telefonnummer</th>
					<th>Delsträcka</th>
					<th>Ändra</th>
					<th>Radera</th>
				</tr>
				<tr>
					<td>123456-1212</td>
					<td>Jonas Heed</td>
					<td>exempelmail@exempel.com</td>
					<td>hejgatan 34</td>
					<td>0501-755584</td>
					<td>1</td>
					<td><button class="minbutton">Ändra</button></td>
					<td><button class="minbutton">Radera</button></td>
				</tr>
			</table>
			<button>Lägg till ny</button>
			
</main>

<?php include 'footer.php';?>