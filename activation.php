<?php 
if(!empty($_GET['id']) && !empty($_GET['u']) && !empty($_GET['e']) && !empty($_GET['ssl'])){
	//Connexion à la base de données et assainissement des variables
	require "includes/connect_db.php";
	extract($_GET);
	$id = preg_replace('#[^0-9]#i', '', $id); 
	$pseudo = preg_replace('#[^a-z0-9]#i', '', $u);

	//Evaluation de la longueur des variables $_GET
	if(empty($id) || strlen($pseudo) < 3 || strlen($e) < 5 || strlen($ssl) < 5){
		header("Location: info.php?msg=activation_length");
		exit();
	}
	
	//On vérifie la concordance avec la base de données
	$q = $db->prepare('SELECT id FROM users WHERE id = :id AND pseudo = :pseudo AND email = :email AND password = :pass LIMIT 1');
	$q->execute(array(
			'id' => $id,
			'pseudo' => $pseudo,
			'email' => $e,
			'pass' => $ssl
		));	
	$numRows = $q->rowCount();
	if($numRows == 0){
		header("Location: info.php?msg=fake_parameters");
		exit();
	}
	
	//Tout est bon, on active le compte
	$q = $db->prepare("UPDATE users SET activated = '1' WHERE id = ?");
	$q->execute(array($id));

	//Double vérification
	$q = $db->prepare("SELECT * FROM users WHERE activated = '1' AND id = ?");
	$q->execute(array($id));
	$numRows = $q->rowCount();
	
	if($numRows == 0){
		header("Location: info.php?msg=activation_error");
		exit();
	} else {
		header("Location: info.php?msg=activation_success");
		exit();
	}
	

} else {
	header("Location: info.php?msg=get_vars_missing");
}
?> 
