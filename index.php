<!DOCTYPE html>
<html lang="fr">
<head>
	<title>ESMT SOCIAL NETWORK</title>
	<meta charset="UTF-8" />
	<style>
	
		/****** STYLISATION GLOBALE *************/
		*{margin: 0px; padding: 0px;}
		
		body{
			background-color: green;
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
		}
		
		#content>#presentation, #content>#inscription{
			display: inline-block;
			vertical-align: top;
			width: 30%;
			float: left;
			min-height: 500px;
		}
		
		
		#content>#connexion{
			display: inline-block;
			vertical-align: top;
			width: 35%;
			padding-left: 1%;
			background-color: green;
			min-height: 500px;
			float: left;
		}
		
		#content>#presentation{
			background-color: red;
			padding-left: 5px;
		}
		
		#content>#inscription{
			background-color: yellow;
			padding-left: 1%;
		}
		
		#content>#news{
		clear: both;
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
		
		
		/************ Forms **********************/
		input[type="text"], input[type="email"], input[type="password"], select{
			border: 1px solid #eaeaea;
			padding: 10px;
			border-radius: 5px;
			width: 70%;
		}
		
		input[type="submit"]{
			border: 1px solid #eaeaea;
			padding: 10px;
			border-radius: 6px;
			width: 100px;
			background-color: #2c3fed;
			color: white;
			margin-top: 2px;
			font-size: 13px;
			font-family: "Trebuchet MS";
			font-weight: bold;
		}
		
		input[type="submit"]:hover{
			cursor: pointer;
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
		</div>
		
		<footer>
			<p>&copy; ESMT SOCIAL NETWORK - Tous droits réservés (Designed & Developped by Honoré HOUNWANOU)</p>
		</footer>
	</div>
</body>
</html>