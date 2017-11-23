<?php include 'header.php';?>

<main id="start">
    <h1>Skidloppet AB administration </h1>
    <h2>Logga in</h2>
    
    <form action="kontakt.php" method="post">

			<input type="text" name="namn" placeholder="Användarnamn">
			
            <input type="text" name="password" placeholder="Lösenord">
            
			<button class="knapp" type="submit">
				LOGGA IN 
			  </button>

		</form>
    
    <br><br><br>
    
    Se vyer utan inlogg:      
    <a href="arenachef.php">Arenachef</a>
    <a href="underent.php">Underentreprenör</a>
    <!--<a href="vd.php">VD</a>-->
    

</main>


<?php include 'footer.php';?>

