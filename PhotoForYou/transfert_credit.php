<?php
    require('./include/config.inc.php');
    require('./include/mysql.inc.php');
    include('./include/head.php');
    include('./include/navigation.php');
?>

<?php

	$credit_user = $_POST['credit_user'];

	 include('./function/php/requete.php');
	
	
	if(empty($credit_user))
	{
		echo('• Le champs "Nombre de crédit" attend une valeur numérique.<br/>');
	}
	if($credit_user <= 4)
	{
		echo ('• Veuillez saisir un nombre de crédit d\'au moins 5. <br/> <br/>');
	}
	
	else 
	{
		
		$sql = "UPDATE user 
				SET credit_user = credit_user + $credit_user
				WHERE email_user = '".$_SESSION['email_user']."';";
		$exec = mysqli_query($dbc, $sql);
		echo('Nous vous remercions de votre achat ! :-) <br/><br/>

			<form enctype="multipart/form-data" action="achatcredits.php" method="post">
         		<input type="submit" name="Envoie" value="ACHETER PLUS DE CREDITS" class="formbutton"/> <br/><br/>
         	</form> ');


	}
		// echo 'Voici quelques informations de débogage :';
		// print_r($_FILES);
		// echo '</pre>';




?>
 <div style="display: none">
<?php
    include('./include/cotedroit.php');
?>
</div>


<?php
    include('./include/footer.php');
?>