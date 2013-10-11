<!DOCTYPE html>
<html lang="fr">
<head>
	<title>ESMT SOCIAL NETWORK</title>
	<meta charset="UTF-8" />
	<style>
		*{margin: 0px; padding: 0px;}
		
		body{
			background-color: #f2f2f2;
			margin: 0px;			
			font-family: "Trebuchet MS";
		}
		
		#main_wrapper{
			width: 100%;
			margin: 0px auto;
			min-width: 900px;
		}
		
		#top_header{
			background-color: #012;	
			color: white;
			width: 100%;
		}

		#top_header>hgroup>h1{
			text-shadow: 1px 2px 3px #CCC;
			letter-spacing: -3px;
			padding-left: 5px;
		}
		#top_header>hgroup>h2{
			color: rgba(255,255,255,0.6);
			letter-spacing: -1px;
			padding-left: 5px;
		}
		
		#content{
			width: 100%;
			background-color: green;
			
			text-align: center;
		}
		
		#content>#presentation, #content>#inscription{
			display: inline-block;
			vertical-align: top;
			width: 30%;
			padding-left: 5px;
			float: left;
			min-height: 400px;
		}
		
		
		#content>#connexion{
			display: inline-block;
			vertical-align: top;
			width: 38%;
			padding-left: 5px;
			background-color: green;
			min-height: 400px;
		}
		
		#content>#presentation{
			background-color: red;
		}
		
		#content>#inscription{
			background-color: yellow;
		}
		
		#content>#news{
			padding-left: 5px;
			background-color: blue;
			text-align: left;
		}
		
		#content>#news>article{
			margin-top: 10px;
		}
		
		footer{
			clear: both;
			border-top: 1px solid #000;
			padding-left: 5px;
			background-color: #012;	
			color: white;
			text-align: center;
		}
		
	</style>
</head>
<body>
	<div id="main_wrapper">
		<header id="top_header">
			<hgroup>
				<h1>ESMT SOCIAL NETWORK</h1>
				<h2>Notre slogan !</h2>
			</hgroup>
		</header>
		
		<div id="content">
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
						<label for="nom">Nom:</label>
						<input type="text" placeholder="Entrer votre nom" id="nom" name="nom" required/> <br/>
						<label for="prenom">Prénoms:</label>
						<input type="text" placeholder="Entrer votre prénom" id="prenom" name="prenom" required/> <br/>
						<label for="pseudo">Pseudo:</label>
						<input type="text" placeholder="Entrer votre pseudo" id="nom" name="nom" required/> <br/>
						<label for="pass1">Mot de passe:</label>
						<input type="password" id="pass1" name="pass1" required/> <br/>
						<label for="pass2">Confirmer votre mot de passe:</label>
						<input type="password" id="pass2" name="pass2" required/> <br/>
						<label for="email">Email:</label>
						<input type="email" placeholder="johndoe@exemple.com" id="email" name="email" required/> <br/>
						<label for="niveau">Niveau d'étude:</label>
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
						<label for="pseudo">Pseudo:</label>
						<input type="text" placeholder="Entrer votre pseudo" id="nom" name="nom" required/> <br/>
						<label for="pass">Mot de passe:</label>
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
		</div>
		
		<footer>
			<p>&copy; Honoré HOUNWANOU - Tous droits réservés</p>
		</footer>
	</div>
</body>
</html>