<?php
$servername = "wwwlab.iit.his.se";
$username = "sqllab";
$password = "Tomten2009";

try {
    $conn = new PDO("mysql:host=$servername;dbname=a16gusca;charset=utf8", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo "Connected successfully<br>"; 	
	
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

function AC_update_delstracka($oOrt, $oDate, $oInfo){
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		$querystring='INSERT INTO orter (oOrt, oInfo, oDate) 
					  values (:oOrt, :oInfo,:oDate);';
		$stmt = $conn->prepare($querystring);
		
		$stmt->bindParam(':oOrt', $oOrt, PDO::PARAM_STR);
		$stmt->bindParam(':oInfo', $oInfo, PDO::PARAM_STR);
		$stmt->bindParam(':oDate', $oDate, PDO::PARAM_STR);
		$stmt->execute();
		
		
		echo "<table>";
		foreach($conn->query( 'SELECT * FROM orter;' ) as $row){
			echo "<tr>";
			echo "<td>".$row['oOrt']."</td>";      
			echo "<td>".$row['oInfo']."</td>"; 
			echo "<td>".$row['oDate']."</td>";      		
			echo "</tr>";
		}
		echo "</table>";
	
}

// ------------------------------------------------------------------------------------------
/*
function AC_update_workOrder($WdNr, $name_UE, $wStartDate, $wEndDate, $wComment){
		global $conn;
		global $servername;
		global $username;
		global $password;
		

		echo "delstracka: ".$WdNr."<br>"; 
		echo "Namn UE: ".$name_UE."<br>";
		echo "Starttid: ".$wStartDate."<br>";
		echo "Sluttid: ".$wEndDate."<br>";
		echo "Beskrivning: ".$wComment."<br>";
		
			<br>wWorkOrderID INT auto_increment, 
			<br>wStartDate DATE,
			<br>wEndDate DATE,
			<br>wTyp INT(1),  #1 = Under förhandling / 2 = Pågående / 3 = Genomförd
			<br>WdNr INT(2), #Delsträckenummer
			<br>wComment varchar(150),
			<br>PRIMARY KEY (wWorkOrderID)
			
		
		
		$querystring='INSERT INTO workOrder (wStartDate, wEndDate, wTyp, WdNr, wComment) 
					  values (:wStartDate,:wEndDate,:"1",:WdNr,:wComment);';
		$stmt = $conn->prepare($querystring);
		$stmt->bindValue(':nStartDate', $nStartDate, PDO::PARAM_STR);
		$stmt->bindParam(':nEndDate', $nEndDate, PDO::PARAM_STR);
		//$stmt->bindParam(':wTyp', $wTyp, PDO::PARAM_STR);
		$stmt->bindParam(':WdNr', $WdNr, PDO::PARAM_STR);
		$stmt->bindParam(':wComment', $wComment, PDO::PARAM_STR);
		$stmt->execute();
		
		//För att testa att det görs en insert
		echo "<table>";
		foreach($conn->query( 'SELECT * FROM workOrder;' ) as $row){
			echo "<tr>";
			echo "<td>".$row['wComment']."</td>";      
			echo "<td>".$row['WdNr']."</td>"; 
			echo "<td>".$row['nStartDate']."</td>";      
			echo "<td>".$row['nEndDate']."</td>";			
			echo "</tr>";
		}
		echo "</table>";
	
	
}
*/

// ------------------------------------------------------------------------------------------

function AC_update_map(){
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		/*
		oOrt VARCHAR(30),
		oStatus VARCHAR (15),
		oInfo TINYTEXT, #TINYTEXT limiterar texten till ca 255 tecken
		oStartDate date,
		oEndDate date,
		*/
		
		echo "oOrt: ".$oOrt."<br>"; 
		echo "oStatus: ".$oStatus."<br>";
		echo "oInfo: ".$oInfo."<br>";
		echo "oStartDate: ".$oStartDate."<br>";
		echo "oEndDate: ".$oEndDate."<br>";
		
		
		$querystring='INSERT INTO workOrder (oOrt, wEndDate, wTyp, nHeader, nOrt) 
					  values (:oOrt,:wEndDate,:article,:nHeader,:nOrt);';
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
		
		
		echo "<table class='tabellstracka'>";
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
		
		if(isset($_POST['idkoden'])){
			$idkoden = $_POST['idkoden'];
			$delete = "delete from report where rMail='" . $idkoden . "';"; 
			$conn->exec($delete);	
			echo "Rapport med mailadress: " .$idkoden . " har nu raderats från databasen.";
		}
		
		
		//Hur gör vi med deleteknappen i tabellen?
		echo "<table class='tabellstracka'>";
			echo "<tr>";
				echo "<th> Mail: </th>";
				echo "<th> Namn: </th>";
				echo "<th> Beskrivning: </th>";
				echo "<th> Förval problem: </th>";
				echo "<th> Ort: </th>";
				echo "<th> Datum: </th>";
				echo "<th> Delete: </th>";
			echo "</tr>";
			
			 
			
			foreach($conn->query( 'SELECT * FROM report;' ) as $row){
				echo "<tr>";
				echo "<td>".$row['rMail']."</td>";      
				echo "<td>".$row['rName']."</td>";   
				echo "<td>".$row['rDescr']."</td>";      
				echo "<td>".$row['probChoice']."</td>";
				echo "<td>".$row['rOrt']."</td>";
				echo "<td>".$row['rDate']."</td>";
				$rMail = $row['rMail']; 
				echo "<td><form action='arenachef.php' method='post'><input type='submit' value='delete'/>
						  <input type='hidden' name='idkoden' value='$rMail'></form></td>"; 
				echo "</tr>";
			}
		echo "</table>";
		
}

// ------------------------------------------------------------------------------------------

function AC_view_UE(){ //AU_view_UE gammalt namn
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
				//echo "<th> Delsträcka: <th>";     <------ Behöver läggas till i databas
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
function AC_view_AOp(){ //AOp = Arbetsorderpågående
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

// Funktion för att visa arbetsordrar. 
function AC_view_workOrder(){ 
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
				echo "<th> Ändra: </th>";
			echo "</tr>";
			
			 
			
			foreach($conn->query( 'SELECT * FROM workOrder, UndEntArb, anv where workOrder.wWorkOrderID=UndEntArb.woID and anv.aPnr=UndEntArb.uPNr;') as $row){
				echo "<tr>";
				echo "<td>".$row['WdNr']."</td>";      
				echo "<td>".$row['aNamn']."</td>"; 
				echo "<td>".$row['wStartDate']."-".$row['wEndDate']."</td>"; 
				echo "<td>".$row['wComment']."</td>";      
				echo "<td><button class='minbutton'>Ändra</button></td>";
				echo "</tr>";
			}
		echo "</table>";
}

// ------------------------------------------------------------------------------------------

function AU_view_closedDelstrackor(){ 
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		
		echo "<table class='tabellstracka'>";
			echo "<tr>";
				echo "<th> Sträcka: </th>";
				echo "<th> Öppnas åter: </th>";
				echo "<th> Information: </th>";
			echo "</tr>";
			
			 
			
			foreach($conn->query( 'SELECT * FROM orter;') as $row){
				echo "<tr>";
				echo "<td>".$row['oOrt']."</td>";      
				echo "<td>".$row['oDate']."</td>"; 
				echo "<td>".$row['oInfo']."</td>";       
				echo "</tr>";
			}
		echo "</table>";
}

// ------------------------------------------------------------------------------------------
// ----------DROPDOWN MENYER HELA FORM-------------------------------------------------------	
// ------------------------------------------------------------------------------------------

function AC_update_workOrder(){ 
		global $conn;
		global $servername;
		global $username;
		global $password;
		
			echo "<form action='arenachef.php' method='post'>";
			echo "<input type='date' name='wStartDate' placeholder='Startdatum'> ";
			echo "<input type='date' name='wEndDate' placeholder='Slutdatum'>";
			echo "<input type='text' name='wComment' placeholder='Beskrivning'><br>";
			
			echo "<select name='aPnr'>";
			foreach($conn->query( 'SELECT * FROM anv where aTyp=1;' ) as $row){
			echo "<option value=".$row['aPnr'].">".$row['aNamn']."</option>";      
			}
			echo "</select>";	
			
			echo'<input type="number" name="WdNr" min="1" max="21" placeholder="Delsträcka 1-21">';
		
			echo"<button class='knapp' type='submit'>SKICKA</button></form>";
			
			
			
		/*	//dropdown UE + delstracka
			<br>wWorkOrderID INT auto_increment, 
			underEntPnr
			<br>wStartDate DATE,
			<br>wEndDate DATE,
			<br>wTyp INT(1),  #1 = Under förhandling / 2 = Pågående / 3 = Genomförd
			<br>WdNr INT(2), #Delsträckenummer
			<br>wComment varchar(150),
			<br>PRIMARY KEY (wWorkOrderID)*/
		
		if(isset($_POST['wStartDate'])){
        $querystring='INSERT INTO workOrder (aPnr, wStartDate, wEndDate, wTyp, WdNr, wComment) 
					  values (:aPnr,:wStartDate,:wEndDate,1,:WdNr,:wComment);';
        $stmt = $conn->prepare($querystring);
		$stmt->bindParam(':aPnr', $_POST['aPnr']);
        $stmt->bindParam(':wStartDate', $_POST['wStartDate']);
        $stmt->bindParam(':wEndDate', $_POST['wEndDate']);
		$stmt->bindParam(':WdNr', $_POST['WdNr']);
		$stmt->bindParam(':wComment', $_POST['wComment']);
        $stmt->execute();
		}
		
		echo "<table class='tabellstracka'>";		
			foreach($conn->query( 'SELECT * FROM workOrder;') as $row){
				echo "<tr>";
				echo "<td>".$row['aPnr']."</td>";      
				echo "<td>".$row['wComment']."</td>"; 
				echo "<td>".$row['wStartDate']."</td>";       
				echo "</tr>";
			}
		echo "</table>";
}
// ------------------------------------------------------------------------------------------

function dropdown_UE(){ 
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		echo "<select name='UE'>";
		foreach($conn->query( 'SELECT * FROM anv where aTyp=1;' ) as $row){
			echo "<option value=".$row['aNamn'].">".$row['aNamn']."</option>";      
		}
		echo "</select>";
		$name_UE = $row['aNamn'];
		echo "namn".$name_UE;
		
		return $name_UE; 
}
// ------------------------------------------------------------------------------------------

function dropdown_dels(){ #Delsträckornas siffror mellan orter
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		echo "<select name='dID'>";
		foreach($conn->query( 'SELECT * FROM delstracka;' ) as $row){
			echo "<option>".$row['dID']."</option>";      
		}
		echo "</select>";
		$WdNr = $row['dID'];
		
		return $WdNr; 
}
// ------------------------------------------------------------------------------------------
// ----------INLOGGNING SKIDLOPPET-----------------------------------------------------------	
// ------------------------------------------------------------------------------------------

function login($aUsern,$aPassw){
		global $conn;
		global $servername;
		global $username;
		global $password;
		
		$aTyp;
		
		if($aUsern = DATABASKOLL && $aPassw = DATABASKOLL)
		{
			echo "Inloggning lyckades";
			if($aTyp = 1)
			{
				echo "Hej Underentreprenör";
				//underent.php
			}
			if($aTyp = 2)
			{
				echo "Hej ArenaChef";
				//arenachef.php
			}
			if($aTyp = 3)
			{
				echo "Hej VD";
				//vd.php
			}			
		}
		else
		{
			echo "Inloggning misslyckades";
		}
		
		
	
}
// ------------------------------------------------------------------------------------------
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}





?>


	