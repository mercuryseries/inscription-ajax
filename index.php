<?php require "includes/header.php"; ?>
		

			<section id="presentation">
				<h1>Découvrez !</h1>
				<p>
				   ESMT Social Network permet à tout étudiant de l'ESMT de sortir de sa petite bulle.<br/>
				   C'est l'espace adéquat pour faire connaitre vos talents divers, exprimer vos passions, 
				   partager vos connaissances, mais aussi tisser des liens d'amitié durables avec des 
				   personnes à qui vous n'osez pas adresser la parole en vrai sur le campus... 
				</p>
			</section>
			
			<section id="inscription">
				<h1>Testez !</h1>
				<form id="register_form" method="post" onsubmit="return false;">
					<p>
						<label for="nom">Nom:</label>
						<input type="text" placeholder="Entrez votre nom" id="nom" name="nom" required/> 
						<label for="prenom">Prénom:</label>
						<input type="text" placeholder="Entrez votre prénom" id="prenom" name="prenom" required/>
						<label for="pseudo">Pseudo:</label>
						<input type="text" placeholder="Entrez votre pseudo" id="pseudo" name="pseudo" required/>
						<small id="output_checkuser"></small>
						<label for="pass1">Mot de passe:</label>
						<input type="password" id="pass1" name="pass1" required/>
						<small id="output_pass1"></small>
						<label for="pass2">Confirmer votre mot de passe:</label>
						<input type="password" id="pass2" name="pass2" required/> 
						<small id="output_pass2"></small>
						<label for="email">Email:</label>
						<input type="email" placeholder="johndoe@exemple.com" id="email" name="email" required/>
						<label for="niveau">Niveau d'étude:</label>
						<select name="niveau">
							<option value="">DTS</option>
							<option value="">Licence</option>
							<option value="">Ingénieur</option>
							<option value="">Master</option>
							<option value="">Master spécialisé</option>
						</select> <br/>
						<input type="submit" id="bRegister" class="btn btn-success" value="Inscription" />
					</p>
				</form>
			</section>
			
			<section id="connexion">
				<h1>Restez scotché...</h1>
				<form method="post" action="">
					<p>
						<label for="pseudo">Pseudo:</label>
						<input type="text" placeholder="Entrez votre pseudo" id="nom" name="nom" required/>
						<label for="pass">Mot de passe:</label>
						<input type="password" id="pass" name="pass" required/>
						<label for="cnx_persistent">
							<input type="checkbox" style="vertical-align: top;"/> Garder ma session active
						</label>
						<a href="#">Mot de passe oublié ?</a> <br/>
						<input type="submit" class="btn btn-primary" value="Connexion" />
					</p>
				</form>
			</section>
			

			<script>
				$(document).ready(function(){
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
								$("#output_pass1").html('<img src="images/check.png" class="small_image" alt="" />');
								if($("#pass2").val() != ""){
									$("#output_pass2").html('<img src="images/check.png" class="small_image" alt="" />');
								}
							}
					});
					$("#pass2").keyup(function(){
						//On vérifie si les mots de passe coïncident
							check_password();
					});
					
					//Traitement du formulaire d'inscription
					$("#register_form").submit(function(){
						$.ajax({
							type: "post",
							url:  "register.php",
							beforeSend: function(){
											$("#bRegister").attr({"value": "Traitement en cours...",
																  "disabled": "disabled"});
											$("#bRegister").css({"background-color": "#ccc",
																 "color" : "#000"
															});
										},
							success: function(data){
										
									 }
						});
					});
					
					function check_pseudo(){
							$.ajax({
								type: "post",
								url:  "register.php",
								data: {
									'pseudo' : $("#pseudo").val()
								},
								success: function(data){
											if(data == "success"){
												$("#output_checkuser").html('<img src="images/check.png" class="small_image" alt="" />');
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
									'pass1' : $("#pass1").val(),
									'pass2' : $("#pass2").val()
								},
								success: function(data){
											if(data == "success"){
												 $("#output_pass2").html('<img src="images/check.png" class="small_image" alt="" />');
												 $("#output_pass1").html('<img src="images/check.png" class="small_image" alt="" />');
											} else {
												$("#output_pass2").css("color", "red").html(data);
											}
										 }
							});
					}
				});
			</script>
<?php require "includes/footer.php"; ?>
		
		
		