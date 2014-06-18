<?php 
if(!empty($_GET['msg'])){
	$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
	
	if($msg == "activation_error"){
		$message = "<h2>Erreur lors de l'activation</h2>
					<p>Une erreur est survenue lors de l'activation de votre compte.<br/>
					Veuillez réessayer plus tard.</p>";
					
	} else if($msg == "activation_success") {
		$message = '<h2>Activation réussie</h2>
					<p>Votre compte est maintenant activé.<br/>
					Félicitations vous êtes dorénavant un <strong>student du NET.</strong><br/> 
					Faites vous de nouveaux amis et surtout profiter de 
					votre vie d\'étudiant virtuel avec Zéro stress :) ...<br/><br/>
					Vous pouvez cliquer sur ce <a style="color:yellow" href="login.php">lien</a> pour vous connecter.</p>';
	} else if($msg == "fake_parameters") {
		$message = '<h2>Paramètres érronés</h2>
					<p>Les paramètres fournis dans l\'URL sont érronés<br/>
					Vérifiez que vous avez copier/coller le bon lien d\'activation</p>';
	} else {
		$message = $msg;
	}
	
} else {
	$message = "Aucun message";
}
?>
<?php require "includes/header.php"; ?>
		<div class="info"><?php echo $message; ?></div></div>
<?php require "includes/footer.php"; ?>
		