<?php 
	session_start();
	
	//Si l'utilisateur est déjà connecté
	if(isset($_SESSION['id'])){
		header("Location: profile.php?id=".$_SESSION['id']);
		exit();
	}
	
	//Traitement d'une requête de connexion
	if(!empty($_POST['pseudo']) && !empty($_POST['pass'])){
		//Connexion à la base de données
		require "includes/connect_db.php";
		
		extract($_POST);
		
		$hpass = sha1($pass);
		//GET USER IP ADDRESS
		$ip = preg_replace("#[^0-9.]#", "", $_SERVER['REMOTE_ADDR']);
		
		if(empty($pseudo) || empty($pass)){
			echo 'login_failed';
			exit();
		} else {
			$q = $db->prepare("SELECT id, pseudo, password FROM users WHERE pseudo = ? AND password = ? AND activated = '1' LIMIT 1");
			$q->execute(array($pseudo, $hpass));
			
			$numRows = $q->rowCount();
			if($numRows < 1){
				echo 'login_failed';
				exit();
			} else {
				$data = $q->fetch(PDO::FETCH_OBJ);
				$_SESSION['id'] = $data->id;
				$_SESSION['pseudo'] = $data->pseudo;
				$_SESSION['password'] = $data->password;
				
				if(isset($_POST['cnx_persistent'])){
					setcookie("id", $data->id, strtotime("+30 days"), "/", "", "", TRUE);
					setcookie("pseudo", $data->pseudo, strtotime("+30 days"), "/", "", "", TRUE);
					setcookie("password", $data->password, strtotime("+30 days"), "/", "", "", TRUE);
				}
				
				//UPDATE THEIR "IP" AND "LAST_LOGIN" fields
				$q = $db->prepare("UPDATE users SET ip = ? AND lastlogin = now() WHERE id = ?");
				$q->execute(array($ip, $data->id));
				
				echo $data->id;//On renvoie son identifiant pour le rediriger vers sa page de profil
				exit();
			}
		}
	}
	
	$title = "Connexion | ESMT SOCIAL NETWORK";
	require "includes/header.php"; 
?>
	<section id="connexion">
		<h1>Connexion</h1>
		<form id="login_form" onsubmit="return false;">
			<p>
				<label for="pseudo">Pseudo:</label>
				<input type="text" placeholder="Entrez votre pseudo" id="pseudo" required/>
				<label for="pass">Mot de passe:</label>
				<input type="password" id="pass" required/>
				<label for="cnx_persistent">
				<input type="checkbox" id="cnx_persistent" style="vertical-align: top;"/> Garder ma session active
				</label>
				<a href="#">Mot de passe oublié ?</a> <br/>
				<input type="submit" id="bConnexion" class="btn btn-primary" value="Connexion" />
				<div id="status">
					Remplir tous les champs
				</div>
			</p>
		</form>
	</section>
	
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script>
		$(document).ready(function(){
			$("input").focus(function(){
				$("#status").fadeOut(800);
			});

			$("#login_form").submit(function(){
				var pseudo = $("#pseudo").val();
				var pass   = $("#pass").val();
				var status = $("#status");	
				
				if(pseudo == "" || pass == ""){
					status.html("Veuillez remplir tous les champs.").fadeIn(400);	
				} else {
					$.ajax({
						type: 'post',
						url: "login.php",
						data: {
							'pseudo' : pseudo,
							'pass' : pass
						},
						beforeSend: function(){
							status.html("Veuillez patienter...").fadeIn(400);
						},
						success: function(data){
							if(data == "login_failed"){
								status.html("Pseudo/mot de passe invalide !").fadeIn(400);
							} else {
								window.location = "profile.php?id="+data;
							}
						}
					});
				}
			});
		});
	</script>
<?php require "includes/footer.php"; ?>