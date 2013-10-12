<?php 
if(!empty($_POST['pseudo'])){
	
	$names = array('mercuryseries', 'bivens', 'gloradie');
	
	if(strlen($_POST['pseudo']) < 6){
		echo '<br/>Trop court (6 caractères minimum)';
		exit();
	}
	
	if(in_array($_POST['pseudo'], $names)){
		echo 'success';
		exit();
	}
	else{ 
		echo '<br/>Déjà utilisé !';
		exit();
	}
	
}

if(!empty($_POST['pass1']) && !empty($_POST['pass2'])){
	if(strlen($_POST['pass1']) < 6 || strlen($_POST['pass1'])  < 6){
		echo '<br/>Trop court (6 caractères minimum)';
		exit();
	} else if($_POST['pass1'] == $_POST['pass2']){
		echo 'success';
		exit();
	} else {
		echo '<br/>Les deux mots de passe sont différents';
		exit();
	}

}
?>