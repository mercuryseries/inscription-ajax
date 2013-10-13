<?php 
	session_start();
	
	$_SESSION = array();
	
	//Expire their cookie files
	if(isset($_COOKIE['id']) && isset($_COOKIE['pseudo']) && isset($_COOKIE['password'])){
		setcookie("id", $data->id, strtotime("-5 days"), "/");
		setcookie("pseudo", $data->pseudo, strtotime("-5 days"), "/");
		setcookie("password", $data->password, strtotime("-5 days"), "/");
	}
	
	session_destroy();
	
	//Double vérification
	if(isset($_SESSION['id'])){
		header('Location: message.php?msg=LOGOUT_FAILED');
	} else {
		header('LOCATION: index.php');
	}

?>