<?php $title = "Bienvenue sur le réseau social des Teachers du NET"; ?>
<?php require "includes/header.php"; ?>
		

			<section id="presentation">
				<h1>Découvrez !</h1>
				<p>
					A travers des vidéos simples et chirurgicales, nous vous aidons
					à devenir des développeurs chevronnés.
				</p>
				<p>
					Les TEACHERS DU NET,<br/> c'est actuellement plus de <strong>400</strong> étudiants, une communauté active
					et un corps professoral jeune, dynamique et passionné.
				</p>
				<p>
					Vous n'êtes toujours pas convaincu ? Regardez simplement l'une de nos vidéos
					et nous vous laisserons juge !!<br/>
					<span style="float: right;">&rarr; <a href="http://youtube.com/hounwanou1993" style="color: #012;">Chaîne YouTube</a> &larr;</span>
				</p>
			</section>
			
			<section id="inscription">
				<h1>Testez !</h1>
				<form id="register_form" onsubmit="return false;">
					<p>
						<label for="nom">Nom:</label>
						<input type="text" placeholder="Entrez votre nom" id="nom" name="nom" required/> 
						<label for="prenom">Prénom:</label>
						<input type="text" placeholder="Entrez votre prénom" id="prenom" name="prenom" required/>
						<label for="pseudo">Pseudo:</label>
						<input type="text" placeholder="Entrez votre pseudo" id="pseudo" name="pseudo" maxlength="16" required/>
						<small id="output_checkuser"></small>
						<label for="pass1">Mot de passe:</label>
						<input type="password" id="pass1" name="pass1" required/>
						<small id="output_pass1"></small>
						<label for="pass2">Confirmer votre mot de passe:</label>
						<input type="password" id="pass2" name="pass2" required/> 
						<small id="output_pass2"></small>
						<label for="email">Adresse électronique:</label>
						<input type="email" placeholder="johndoe@exemple.com" id="email" name="email" required/>
						<small id="output_email"></small>
						<div id="status">
							Remplir tous les champs
						</div>
						<input type="submit" id="bRegister" class="btn btn-success" value="Inscription" />
					</p>
				</form>
			</section>
			
			<section id="connexion">
				<h1>Restez scotché...</h1>
				<form id="login_form" method="post" onsubmit="return false;">
					<p>
						<label for="login">Pseudo:</label>
						<input type="text" placeholder="Entrez votre pseudo" id="login" name="login" required/>
						<label for="mdp">Mot de passe:</label>
						<input type="password" id="mdp" name="mdp" required/>
						<label for="cnx_persistent">
							<input type="checkbox" id="cnx_persistent" style="vertical-align: top;"/> Garder ma session active
						</label>
						<a href="#">Mot de passe oublié ?</a> <br/>
						<input type="submit" class="btn btn-primary" value="Connexion" />
					</p>
					<div id="status2">
						Remplir tous les champs
					</div>
				</form>
			</section>

			<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
			<script>
				$(document).ready(function(){
					
					$("#register_form input").focus(function(){
						$("#status").fadeOut(800);
					});
					
					$("#pseudo").keyup(function(){
						//On vérifie si le pseudo est ok ou n'a pas été déjà pris
							check_pseudo();
					});

					$("#pass1").keyup(function(){
						//On vérifie si le mot de passe est ok
							if($(this).val().length < 6){
								$("#output_pass1").css("color", "red").html("<br/>Trop court (6 caractères minimum)");
							} else if($("#pass2").val() != "" && $("#pass2").val() != $("#pass1").val()){
								$("#output_pass1").html("<br/>Les deux mots de passe sont différents");
								$("#output_pass2").html("<br/>Les deux mots de passe sont différents");
							} else {
								$("#output_pass1").html('<img src="img/check.png" class="small_image" alt="" />');
							}
					});

					$("#pass2").keyup(function(){
						//On vérifie si les mots de passe coïncident
							check_password();
					});
					
					$("#email").keyup(function(){
						//On vérifie si les mots de passe coïncident
							check_email();
					});
					
					function check_pseudo(){
							$.ajax({
								type: "post",
								url:  "register.php",
								data: {
									'pseudo_check' : $("#pseudo").val()
								},
								success: function(data){
											if(data == "success"){
												$("#output_checkuser").html('<img src="img/check.png" class="small_image" alt="" />');
												return true;
											} else {
												$("#output_checkuser").css("color", "red").html(data);
											}
										 }
							});
					}
					
					function check_password(){
							$.ajax({
								type: "post",
								url:  "register.php",
								data: {
									'pass1_check' : $("#pass1").val(),
									'pass2_check' : $("#pass2").val()
								},
								success: function(data){
											if(data == "success"){
												 $("#output_pass2").html('<img src="img/check.png" class="small_image" alt="" />');
												 $("#output_pass1").html('<img src="img/check.png" class="small_image" alt="" />');
											} else {
												$("#output_pass2").css("color", "red").html(data);
											}
										 }
							});
					}
					
					function check_email(){
							$.ajax({
								type: "post",
								url:  "register.php",
								data: {
									'email_check' : $("#email").val()
								},
								success: function(data){
											if(data == "success"){
												$("#output_email").html('<img src="img/check.png" class="small_image" alt="" />');
											} else {
												$("#output_email").css("color", "red").html(data);
											}
										 }
							});
					}
					
					
					//Traitement du formulaire d'inscription
					$("#register_form").submit(function(){
						var status = $("#status");
						var nom = $("#nom").val();
						var prenom = $("#prenom").val();
						var pseudo = $("#pseudo").val();
						var pass1 = $("#pass1").val();
						var pass2 = $("#pass2").val();
						var email = $("#email").val();

						if(nom == "" || prenom == "" || pseudo == "" || pass1 == "" || pass2 == "" || email == "" ){
							status.html("Veuillez remplir tous les champs").fadeIn(400);
						} else if(pass1 != pass2) {
							status.html("Les deux mots de passe sont différents").fadeIn(400);
						} else {	
							$.ajax({
								type: "post",
								url:  "register.php",
								data: {
									'nom'    : nom,
									'prenom' : prenom,
									'pseudo' : pseudo,
									'pass1' : pass1,
									'pass2' : pass2,
									'email' : email,
								},
								beforeSend: function(){
												$("#bRegister").attr("value", "Traitement en cours...");
											},
								success: function(data){
											if(data != "register_success"){
												status.html(data).fadeIn(400);
												$("#bRegister").attr("value", "Inscription");
												$("#bRegister").addClass("btn-primary").css("color", "white");
											} else {
												$("#presentation").hide();
												$("#connexion h1").html("Connexion");
												$("#inscription").html("<strong>Juste une dernière étape " + prenom + " " + nom + " !</strong><br/>Un lien d'activation de votre compte vient de vous être envoyé à l'adresse électronique indiquée lors de l'inscription.<br/>Veuillez tout simplement cliquer ce lien et vous serez définitivement membre du <strong>TDN SOCIAL NETWORK</strong>.<br/><em>(Pensez à vérifier vos spams ou courriers indésirables, si vous ne voyez pas ce mail dans votre boîte de réception)</em><br/><br/>Une fois que ceci est fait, vous n'aurez plus qu'à vous connecter!<br/>Alors, on se dit à très bientôt ;) !").css("width", "inherit").fadeIn(400);
											}
										 }
							});
						}
					});
					
				
					$("#login_form").submit(function(){
						var pseudo = $("#login").val();
						var pass   = $("#mdp").val();
						var status = $("#status2");	
						
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
									status.html("Connexion en cours...").fadeIn(400);
								},
								success: function(data){
									if(data == "login_failed"){
										status.html("Pseudo/mot de passe invalide !").fadeIn(400);
									} else {
										window.location = "profile.php";
									}
								}
							});
						}
					});
				});
			</script>
<?php require "includes/footer.php"; ?>
		
		
		