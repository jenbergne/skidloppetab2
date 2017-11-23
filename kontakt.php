<?php include 'header.php';?>

<main>
<h1>Kontakt</h1>

<!-- kontaktsida rätt standard, ej med i krav? Ej eller samma som ss? -->

	<?php
if(isset($_POST['epost'])) {
 
    $email_to = "";
    $email_subject = "";
 
    $name = $_POST['namn']; 
    $nummer = $_POST['nummer']; 
    $email_from = $_POST['epost'];
    $comments = $_POST['comment']; 
 
    $email_message = "Från formulär: \n \n ";
 
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Namn: ".clean_string($name)."\n";
    $email_message .= "Nummer: ".clean_string($nummer)."\n";
    $email_message .= "Epost: ".clean_string($email_from)."\n";
    $email_message .= "Meddelande: ".clean_string($comments)."\n";
 
mail("","Från formulär",$email_message);

?>
 
Meddelande skickat. Tack för din feedback. 
 
<?php
 
}
?>

	<div id="formular">

		<form action="kontakt.php" method="post">

			<input type="text" name="namn" placeholder="Namn">
			
			<input type="tel" name="nummer"  placeholder="Telefonnummer">
			
			<input type="email" name="epost" placeholder="E-post">
			
			<textarea name="comment" placeholder="Meddelande"></textarea><br>
			<button class="knapp" type="submit">
				SKICKA 
			  </button>

		</form>
	</div>
</div>


</div>
</main>


<?php include 'footer.php';?>
