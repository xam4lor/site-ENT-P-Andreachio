<!DOCTYPE html>
<html>

	<head>
		<meta charset = "utf-8"/>
		<link rel = "stylesheet" href = "../css/coordonnees.css" />
		<title>ENT Pierre Andreacchio</title>
	</head>

	<body>
		<div id = "block_page">	

			<header>
				<div id = "titre_principal">

					<div id = "logo">
						<img src = "../resources/logo_andreacchio.png" />
						<h1>Pierre Andreacchio</h1>
					</div>

					<h2>Entreprise</h2>
				</div>
				<nav>

					<ul>
						<li><a href = "../index.html">Accueil</a></li>
						<li><a href = "#">Maçonnerie</a></li>
						<li><a href = "#">Chape</a></li>
						<li><a href = "#">Carrelage</a></li>
						<li><a href = "#">Rénovation</a></li>
						<li><a href = "#">Dallage</a></li>						
					</ul>

				</nav>
			</header>

			<br></br>

			<center>
				<div class = "devis">
					<form method = "post">
						<div class = "coordonnees">
							<fieldset>
								<lengend>Vos coordonnées :</lengend><br /><br />

								<label for="nom">Nom :<br /></label>
								<input type="text" name="nom" id="nom" required /><br /><br />

								<label for="prenom">Prénom :<br /></label>
								<input type="text" name="prenom" id="prenom" required /><br /><br />

								<label for="email">Adresse email :<br /></label>
								<input type="email" name="email" id="email" required /><br /><br />

								<label for="numero">Numéro de téléphone :<br /></label>
								<input type="tel" name="numero" id="numero" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" required /><br /><br />

								<label for="text">Travaux à faire :<br /><br /></label>
								<textarea name="text" id="text" rows="10" cols="45" required ></textarea>

								<input type="submit" name="post" value="Envoyer" />
							</fieldset>
						</div>
					</form>

					<?php
						if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['numero']) && isset($_POST['text'])) {
							$name = $_POST['nom'];
							$prename = $_POST['prenom'];
							$email = $_POST['email'];
							$tel = intval($_POST['numero']);
							$text = $_POST['text'];

							try {
								$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u660192439_syxam;charset=utf8', 'u660192439_xam', 'fripouille57', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
							}
							catch(Exception $e) {
								die('Erreur : ' . $e->getMessage());
							}
							
							$inser = $bdd->prepare('INSERT INTO mails(date_post, nom, prenom, email, numero_tel, text) VALUES(NOW(), :nom, :prenom, :email, :numero_tel, :text)');
							$inser->execute(array('nom' => $name, 'prenom' => $prename, 'email' => $email, 'numero_tel' => $tel, 'text' => $text));

							header('Location: envoye.html');
						}
					?>
				</div>
			</center>
		</div>
	</body>
</html>