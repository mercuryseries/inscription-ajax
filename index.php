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
						<label for="date_naissance">Date de naissance:</label>
						<input type="text" id="date_naiss" name="date_naiss" value="16/05/1993" />
						<label for="cycle">Cycle actuel:</label>
						<select id="cycle" name="cycle">
							<option value="1">DTS</option>
							<option value="2">Licence</option>
							<option value="3">Ingénieur</option>
							<option value="4">Master</option>
							<option value="5">Master spécialisé</option>
							<option value="6">Autre</option>
						</select> <br/>
						<div id="status">
							Remplir tous les champs
						</div>
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
			<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
			<script type="text/javascript" src="js/jquery-ui-1.10.3.min.js"></script>
			<script>
				$(document).ready(function(){
					
					 $( "#date_naiss" ).datepicker({
						minDate: new Date(1970, 1 - 1, 30), 
						maxDate: new Date(2010, 1 - 1, 30), 
						changeMonth: true,
						changeYear: true
					});
					
					$("input").focus(function(){
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
												$("#output_checkuser").html('<img src="images/check.png" class="small_image" alt="" />');
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
												 $("#output_pass2").html('<img src="images/check.png" class="small_image" alt="" />');
												 $("#output_pass1").html('<img src="images/check.png" class="small_image" alt="" />');
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
												$("#output_email").html('<img src="images/check.png" class="small_image" alt="" />');
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
						var date_naiss = $("#date_naiss").val();
						var cycle = $('#cycle option:selected').val();

						if(nom == "" || prenom == "" || pseudo == "" || pass1 == "" || pass2 == "" || email == "" || date_naiss == "" ){
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
									'date_naiss' : date_naiss,
									'cycle' : cycle
								},
								beforeSend: function(){
												$("#bRegister").attr("value", "Traitement en cours...");
												$("#bRegister").css({"background-color": "#ccc",
																	 "color" : "#000"
																	});
											},
								success: function(data){
											if(data != "register_success"){
												status.html(data).fadeIn(400);
												$("#bRegister").attr("value", "Inscription");
												$("#bRegister").addClass("btn-primary").css("color", "white");
											} else {
												$("#presentation").fadeOut();
												$("#connexion h1").html("Connexion");
												$("#inscription").html("<strong>Félicitation " + pseudo + " !</strong><br/>Un lien d'activation de votre compte vient de vous être envoyé à l'adresse électronique indiquée lors de l'inscription.<br/>Veuillez tout simplement cliquer ce lien et vous serez définitivement membre de <strong>l'ESMT SOCIAL NETWORK</strong>.<br/><br/>Une fois que ceci est fait, vous n'aurez plus qu'à vous connectez!<br/>Alors, on se dit à très bientôt ;) !").css("width", "inherit").fadeIn(400);
											}
										 }
							});
						}
					});
					
				});
			</script>
<?php require "includes/footer.php"; ?>
		
		
		