<?php
$servername = "wwwlab.iit.his.se";
$username = "sqllab";
$password = "Tomten2009";

try {
    $conn = new PDO("mysql:host=$servername;dbname=KapishAB2;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully<br>"; 	
	
// ------------------------------------------------------------------------------------------
// ----------INSERTS-MOT-DATABAS-------------------------------------------------------------	
// ------------------------------------------------------------------------------------------


	function AU_Problem($rMail, $rName, $rDescr, $probChoice, $rOrt){ //Variabel sträcka?
		global $conn;
		global $servername;
		global $username;
		global $password;
		global $rDate;
		
		echo "Ditt namn är: ".$rName."<br>"; 
		echo "Din mail är: ".$rMail."<br>";
		echo "Din rDescr är: ".$rDescr."<br>";
		echo "Din probChoice är: ".$probChoice."<br>";
		echo "Din rOrt är: ".$rOrt."<br>";
		

		$querystring='INSERT INTO report (rMail, rName, rDescr, probChoice, rOrt, rDate) 
					  values (:rMail,:rName,:rDescr,:probChoice,:rOrt,:rDate);';
		$stmt = $conn->prepare($querystring);
		$stmt->bindValue(':rMail', $rMail, PDO::PARAM_STR);
		$stmt->bindParam(':rName', $rName, PDO::PARAM_STR);
		$stmt->bindParam(':rDescr', $rDescr, PDO::PARAM_STR);
		$stmt->bindParam(':probChoice', $probChoice, PDO::PARAM_STR);
		$stmt->bindParam(':rOrt', $rOrt, PDO::PARAM_STR);
		$stmt->bindParam(':rDate', $rOrt, PDO::PARAM_STR);
		$stmt->execute();
		
		//Ta bort tester	
		echo "<table>";
		foreach($conn->query( 'SELECT * FROM report;' ) as $row){
			echo "<tr>";
			echo "<td>".$row['rMail']."</td>";      
			echo "<td>".$row['rName']."</td>";      
			echo "</tr>";
		}
		echo "</table>";
			
	}

// ------------------------------------------------------------------------------------------

function AC_update_news($article, $nHeader, $nOrt){
		global $conn;
		global $servername;
		global $username;
		global $password;
		global $nDate;
		
		echo "Rubrik: ".$nHeader."<br>"; 
		echo "Sträcka: ".$nOrt."<br>";
		echo "Beskrivning: ".$article."<br>";
		echo "datum: ".$nDate."<br>";
		
		
		$querystring='INSERT INTO news (nDate, article, nHeader, nOrt) 
					  values (:nDate, :article,:nHeader,:nOrt);';
		$stmt = $conn->prepare($querystring);
		
		$stmt->bindParam(':article', $article, PDO::PARAM_STR);
		$stmt->bindParam(':nHeader', $nHeader, PDO::PARAM_STR);
		$stmt->bindParam(':nOrt', $nOrt, PDO::PARAM_STR);
		$stmt->bindParam(':nDate', $nDate, PDO::PARAM_STR);
		$stmt->execute();
		
		//För att testa att det görs en insert
		echo "<table>";
		foreach($conn->query( 'SELECT * FROM news;' ) as $row){
			echo "<tr>";
			echo "<td>".$row['nHeader']."</td>";      
			echo "<td>".$row['article']."</td>"; 
			echo "<td>".$row['nDate']."</td>";      		
			echo "</tr>";
		}
		echo "</table>";
		
	
}

// ------------------------------------------------------------------------------------------

function XXX(){
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		echo "Du har tillkallat den hemliga funktionen ;)";
		//Öppna och Stängda delsträckor insert i databas, finns ingen tabell?
	
}

// ------------------------------------------------------------------------------------------

function AC_update_workOrder(){
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		/*
		wWorkOrderID INT auto_increment, 
		wStartDate DATE,
		wEndDate DATE,
		wTyp INT(1),  #1 = Under förhandling / 2 = Pågående / 3 = Genomförd
		WdNr INT(2), #Delsträckenummer
		PRIMARY KEY (wWorkOrderID)
		*/
		
		//Delsträcka nr?
		//Akut? attribut i databas
		//Beskrivning på hemsida men ej i databas
		
		
		echo "Rubrik: ".$nHeader."<br>"; 
		echo "Sträcka: ".$nOrt."<br>";
		echo "Starttid: ".$wStartDate."<br>";
		echo "Sluttid: ".$wEndDate."<br>";
		echo "Beskrivning: ".$article."<br>";
		
		
		$querystring='INSERT INTO workOrder (wStartDate, wEndDate, wTyp, nHeader, nOrt) 
					  values (:wStartDate,:wEndDate,:article,:nHeader,:nOrt);';
		$stmt = $conn->prepare($querystring);
		$stmt->bindValue(':nStartDate', $nStartDate, PDO::PARAM_STR);
		$stmt->bindParam(':nEndDate', $nEndDate, PDO::PARAM_STR);
		$stmt->bindParam(':article', $article, PDO::PARAM_STR);
		$stmt->bindParam(':nHeader', $nHeader, PDO::PARAM_STR);
		$stmt->bindParam(':nOrt', $nOrt, PDO::PARAM_STR);
		$stmt->execute();
		
		//För att testa att det görs en insert
		echo "<table>";
		foreach($conn->query( 'SELECT * FROM workOrder;' ) as $row){
			echo "<tr>";
			echo "<td>".$row['nHeader']."</td>";      
			echo "<td>".$row['article']."</td>"; 
			echo "<td>".$row['nStartDate']."</td>";      
			echo "<td>".$row['nEndDate']."</td>";			
			echo "</tr>";
		}
		echo "</table>";
	
	
}
// ------------------------------------------------------------------------------------------
// ----------VISNING-AV-TABELLER-------------------------------------------------------------	
// ------------------------------------------------------------------------------------------

function AU_view_news(){
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		
		echo '<table class="tabellstracka">';
			echo "<tr>";
				echo "<th> Rubrik: </th>";
				echo "<th> Artikel: </th>";
				echo "<th> Datum: </th>";
				
			echo "</tr>";
			
		//För att testa att det görs en insert
		
		foreach($conn->query( 'SELECT * FROM news;' ) as $row){
			echo "<tr>";
			echo "<td>".$row['nHeader']."</td>";      
			echo "<td>".$row['article']."</td>"; 
			echo "<td>".$row['nDate']."</td>";      
			echo "</tr>";
		}
		echo "</table>";
		
	
}

// ------------------------------------------------------------------------------------------

function AC_view_AUProblem(){
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		
		//Hur gör vi med deleteknappen i tabellen?
		echo "<table class='tabellstracka'>";
			echo "<tr>";
				/*echo "<th> Mail: </th>";
				echo "<th> Namn: </th>";*/
				echo "<th> Beskrivning: </th>";
				echo "<th> Problem: </th>";
				echo "<th> Ort: </th>";
				echo "<th> Datum: </th>";
			echo "</tr>";
			
			 
			
			foreach($conn->query( 'SELECT * FROM report;' ) as $row){
				echo "<tr>";
				/*echo "<td>".$row['rMail']."</td>";      
				echo "<td>".$row['rName']."</td>";   */
				echo "<td>".$row['rDescr']."</td>";      
				echo "<td>".$row['probChoice']."</td>";
				echo "<td>".$row['rOrt']."</td>";
				echo "<td>".$row['rDate']."</td>";
				echo "</tr>";
			}
		echo "</table>";
}

// ------------------------------------------------------------------------------------------

function AU_view_UE(){
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		/*
		aPnr CHAR(13),
		aPassw VARCHAR(20),
		aUsern VARCHAR(20),
		aNamn VARCHAR(20),
		aMail VARCHAR(20),
		aAdress VARCHAR(30),
		aTel INT(10),
		aTyp INT(1), #Hur tänkte vi här?
		*/
			
		//Hur gör vi med deleteknappen/Ändra i tabellen?
		echo "<table class='tabellstracka'>";
			echo "<tr>";
				echo "<th> Personnummer: </th>";
				echo "<th> Namn: </th>";
				echo "<th> Mail: </th>";
				echo "<th> Adress: </th>";
				echo "<th> Telefonnummer: </th>";
				//echo "<td> Delsträcka: </td>";     <------ Behöver läggas till i databas
			echo "</tr>";
			
			 
			
			foreach($conn->query( "SELECT * FROM anv where aTyp='1';" ) as $row){
				echo "<tr>";
				echo "<td>".$row['aPnr']."</td>";      
				echo "<td>".$row['aNamn']."</td>";   
				echo "<td>".$row['aMail']."</td>";      
				echo "<td>".$row['aAdress']."</td>";
				echo "<td> +46 ".$row['aTel']."</td>";
				//echo "<td>".$row['Delsträcka']."</td>";                         <------ Behöver läggas till i databas
				echo "</tr>";
			}
		echo "</table>";
}
		
	

// ------------------------------------------------------------------------------------------

// Funktion för att visa arbetsordrar under förhandling. 
function AC_view_AOp(){
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		
		echo "<table class='tabellstracka'>";
			echo "<tr>";
				echo "<th> Delsträcka: </th>";
				echo "<th> UE: </th>";
				echo "<th> Datum: </th>";
				echo "<th> Kommentar: </th>";
				echo "<th> Acceptera: </th>";
				echo "<th> Ändra: </th>";
			echo "</tr>";
			
			 
			
			foreach($conn->query( 'SELECT * FROM workOrder, UndEntArb, anv where workOrder.wTyp=1 and workOrder.wWorkOrderID=UndEntArb.woID and anv.aPnr=UndEntArb.uPNr;' ) as $row){
				echo "<tr>";
				echo "<td>".$row['WdNr']."</td>";      
				echo "<td>".$row['aNamn']."</td>"; 
				echo "<td>".$row['wStartDate']."-".$row['wEndDate']."</td>"; 
				echo "<td>".$row['wComment']."</td>";      
				echo "<td><button class='minbutton'>Acceptera</button></td>";
				echo "<td><button class='minbutton'>Ändra</button></td>";
				echo "</tr>";
			}
		echo "</table>";
}

	

	
	
// ------------------------------------------------------------------------------------------
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}





?>


	