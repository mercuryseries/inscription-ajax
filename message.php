<?php 
if(!empty($_GET['msg'])){
	$msg = preg_replace('#[^a-z 0-9.:_()]#i', '', $_GET['msg']);
	
	if($msg == "activation_failure"){
		$message = "<h2>Erreur lors de l'activation</h2>
					<p>Une erreur est survenue lors de l'activation de votre compte.<br/>
					Veuillez réessayer plus tard.</p>";
					
	} else if($msg == "activation_success") {
		$message = '<h2>Activation réussie</h2>
					<p>Votre compte est activé.<br/>
					Cliquer sur ce <a href="login.php">lien</a> pour vous connecter</p>';
	} else {
		$message = $msg;
	}
	
} else {
	$message = "Aucun message";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Infos ESMT SOCIAL NETWORK</title>
	<meta charset="UTF-8" />
</head>
<body>
<div><?php echo $message; ?></div>
</body>
</html>