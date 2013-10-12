<?php 
//Vérification du pseudo
if(!empty($_POST['pseudo_check'])){
	$pseudo = $_POST['pseudo_check'];
	if(strlen($pseudo) < 3 || strlen($pseudo) > 16){
		echo '<br/>3 à 16 caractètres SVP.';
		exit();
	}
	
	if(is_numeric($pseudo[0])){
		echo '<br/>Le pseudo doit commencer par une lettre.';
		exit();
	}
	
	//Connexion à la base de données
	require "includes/connect_db.php";
	
	$q = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
	$q->execute(array($pseudo));
	
	$numRows = $q->rowCount();
	if($numRows > 0){
		echo '<br/>Pseudo déjà utilisé !';
		exit();
	} else {
		echo 'success';
		exit();
	}
}

//Vérification des mots de passe
if(!empty($_POST['pass1_check']) && !empty($_POST['pass2_check'])){
	if(strlen($_POST['pass1_check']) < 6 || strlen($_POST['pass1_check'])  < 6){
		echo '<br/>Trop court (6 caractères minimum)';
		exit();
	} else if($_POST['pass1_check'] == $_POST['pass2_check']){
		echo 'success';
		exit();
	} else {
		echo '<br/>Les deux mots de passe sont différents';
		exit();
	}

}

//Vérification de l'email
if(!empty($_POST['email_check'])){
	$email = $_POST['email_check'];
	
	//Vérifier l'adresse mail
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){  
		echo '<br/>Adresse email invalide !';
		exit();
	}
	//Connexion à la base de données
	require "includes/connect_db.php";
	
	$q = $db->prepare('SELECT id FROM users WHERE email = ?');
	$q->execute(array($email));
	
	$numRows = $q->rowCount();
	if($numRows > 0){
		echo '<br/>Adresse email déjà utilisée !';
		exit();
	} else {
		echo 'success';
		exit();
	}
}

//Traitement de l'inscription
if(isset($_POST['pseudo'])){
	require "includes/connect_db.php";
	extract($_POST);
	$q = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
	$q->execute(array($pseudo));
	$pseudo_check = $q->rowCount();
	
	$q = $db->prepare('SELECT id FROM users WHERE email = ?');
	$q->execute(array($email));
	$email_check = $q->rowCount();
	
	if(empty($nom) || empty($prenom) || empty($pseudo)|| empty($pass1) || empty($pass2) || empty($email) || empty($date_naiss) || empty($cycle)){
		echo "Tous les champs n'ont pas été remplis.";
	} else if($pseudo_check > 0) {
		echo "Pseudo déjà utilisé";
	} else if($email_check > 0) {
		echo "Cette adresse mail est déjà utilisée";
	} else if(strlen($pseudo) < 3 || strlen($pseudo) > 16) {
		echo "Pseudo éronné !";
	}  else if(is_numeric($pseudo[0])) {
		echo "Le pseudo doit commencer par une lettre.";
	}  else if($pass1 != $pass2) {
		echo "Les mots de passe ne correspondent pas.";
	} else {
		$hash_pass = sha1($pass1);
		$q = $db->prepare('INSERT INTO users(pseudo, email, password, id_cycle, ip, signup, lastlogin, notescheck)
						   VALUES(:pseudo, :email, :password, :id_cycle, :ip, now(), now(), now())');
		$q->execute(array(
			'pseudo' => $pseudo,
			'email' => $email,
			'password' => $hash_pass,
			'id_cycle' => $cycle,
			'ip' => $_SERVER['REMOTE_ADDR']
		));	
		
		$user_id = $db->lastInsertId();
								
		$q = $db->prepare('INSERT INTO useroptions(id, pseudo, background)
						   VALUES(:id, :pseudo, \'default\')');
		$q->execute(array('id' => $user_id,
						  'pseudo' => $pseudo));	
		
		if(!file_exists("members/$user_id")){
			mkdir("members/$user_id", 0755);
		}
		
		echo 'register_success';
		exit();
	}
	exit();
}
?>