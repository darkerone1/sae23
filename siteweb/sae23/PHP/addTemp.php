<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Ajouter une donnée</title>
		<link rel="stylesheet" href="../style/roomStyle.css">
	</head>
	<body>
		<?php
				session_start();
				error_reporting(E_ERROR | E_PARSE);
				$connect = mysql_connect("localhost","zhao", "passroot");
				if (!$connect) {
					die(mysql_error());
				}
				mysql_select_db("sae23");
			?>
			<script src="JS/popup.js"></script>
			<header>
			<h1>Ajouter une donnée</h1>
			</header>
				<nav>
					<ul>
						<li><a class="link" href="../index.php">Accueil</a></li>
						<li><a class="link" href="../consultation.php">Consultation</a></li>
						<li><a class="link" href="../mention_legale.php">Mention L&eacute;gale</a></li>
						<?php if($_SESSION['username'] == "admin") { ?>
							<li><a class="link" href="../administration.php">Administration</a></li>
						<?php } ?>
						<?php
							if($_SESSION['username'] != ""){ ?>
								<li><a class="link" href="disconnect.php">D&eacute;connexion</a></li>
								<?php } else { ?>
								<li><button id="logBtn" onclick="openPopup('logBtn','logPopup')">Connexion</button></li>
						<?php } ?>
					</ul>
				</nav>
		<section id="first">
			<h2>Ajouter une donn&eacute;e</h2>
		</section>
		<section>
			<?php
				/* Accès à la base */
				/* add an information to database */
				include ("mysql.php");
				$horaire = $_POST['datetime'];
				$valeur = $_POST['valeur'];
				$nom_capteur = $_POST['nomCap'];
				$gestionnaire=$_SESSION['username'];
				$results = mysql_query("SELECT `identifiant` FROM `batiment` WHERE `nom`=(SELECT `nom_batiment` FROM `capteur` WHERE `nom_capteur`='$nom_capteur'); ");
				$row = mysql_fetch_array($results);
				if($gestionnaire == $row['identifiant'] || $_SESSION['username'] == "admin"){
					/* verify if the data exite in the database */
					$results = mysql_query("SELECT horaire FROM `mesure` WHERE `horaire`='$horaire'; ");
					$row = mysql_fetch_array($results);
					if(!mysql_num_rows($results)){
						$requete = "INSERT INTO `mesure` (`horaire`, `valeur`, `nom_capteur`)
						VALUES('$horaire','$valeur','$nom_capteur')";
						$resultat = mysqli_query($id_bd, $requete)
							or die("Execution de la requete impossible : $requete");
						mysqli_close($id_bd);

						/* display the added information */
						echo '<div class="ajout">';
						echo "<br /><strong>La donn&egravee suivante a &eacute;t&eacute; ajout&eacute;e au catalogue : </strong><br />";
						echo "<ul>
								<li> nom de capteur : $nom_capteur</li>
								<li> horaire ajout&eacute : $horaire</li>
								<li> la valeur ajout&eacute : $valeur</li>
								</ul>
							</div>";	
						
					} else {
						echo "<br /><strong> il y a déjà une donnée dans ce temps </strong><br />";
						
							}
				} else {
					echo "<br /><strong>Vous n'avez pas de droit pour modifier les donnée de ce capteur</strong><br />";
						}
			?>
			<hr />
			<a href="../index.php"><button>OK</button></a>
		</section>
		<aside id="last">
			<hr />
		</aside>
	    <footer>
			<ul>
			<li>IUT de Blagnac</li>
			<li>Département Réseaux et Télécommunications</li>
			<li>BUT1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			</ul>  
		</footer>
	</body>
</html>
