<?php require "includes/header.php"; ?>
		

			<section id="presentation">
				<h1>Découvrez !</h1>
				ESMT SOCIAL NETWORK est Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</section>
			
			<section id="inscription">
				<h1>Appréciez!</h1>
				<form method="post" action="">
					<p>
						<label for="nom">Nom:</label><br/>
						<input type="text" placeholder="Entrer votre nom" id="nom" name="nom" required/> <br/>
						<label for="prenom">Prénoms:</label><br/>
						<input type="text" placeholder="Entrer votre prénom" id="prenom" name="prenom" required/> <br/>
						<label for="pseudo">Pseudo:</label><br/>
						<input type="text" placeholder="Entrer votre pseudo" id="nom" name="nom" required/> <br/>
						<label for="pass1">Mot de passe:</label><br/>
						<input type="password" id="pass1" name="pass1" required/> <br/>
						<label for="pass2">Confirmer votre mot de passe:</label><br/>
						<input type="password" id="pass2" name="pass2" required/> <br/>
						<label for="email">Email:</label><br/>
						<input type="email" placeholder="johndoe@exemple.com" id="email" name="email" required/> <br/>
						<label for="niveau">Niveau d'étude:</label><br/>
						<select name="niveau">
							<option value="">DTS</option>
							<option value="">Licence</option>
							<option value="">Ingénieur</option>
							<option value="">Master</option>
							<option value="">Master spécialisé</option>
						</select> <br/>
						<input type="submit" value="Inscription" />
					</p>
				</form>
			</section>
			
			<section id="connexion">
				<h1>Restez scotché...</h1>
				<form method="post" action="">
					<p>
						<label for="pseudo">Pseudo:</label><br/>
						<input type="text" placeholder="Entrer votre pseudo" id="nom" name="nom" required/> <br/>
						<label for="pass">Mot de passe:</label><br/>
						<input type="password" id="pass" name="pass" required/> <br/>
						<label for="cnx_persistent">
							<input type="checkbox" /> Garder ma sessiona active
						</label> <br/>
						<a href="#">Mot de passe oublié ?</a> <br/>
						<input type="submit" value="Connexion" />
					</p>
				</form>
			</section>
			<section id="news">
				<h1>Les dernières actualités</h1>
				<article id="amicale">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</article>
				<article id="club_scientifique">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</article>
				<article id="enactus">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</article>
			</section>

<?php require "includes/footer.php"; ?>
		
		
		