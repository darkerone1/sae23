<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Ajouter un capteur</title>
		<link rel="stylesheet" type="text/css" href="../style/roomStyle.css" />
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
			<h1>Ajouter un capteur</h1>
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
				<h2>Ajouter un capteur</h2>
		</section>
		<section>
			<?php
				/* Accès à la base */
				/* add an information to database */
				include ("mysql.php");
				$nom_capteur = $_POST['nom_capteur'];
				$type = $_POST['type'];
				$nom_batiment = $_POST['nom_batiment']; 
				/* verify if the sensor exite in the database */
				$results = mysql_query("SELECT `nom_capteur` FROM `capteur` WHERE `nom_capteur`='$nom_capteur'; ");
				$row = mysql_fetch_array($results);
				if(!mysql_num_rows($results)){
					$requete = "INSERT INTO `capteur` (`nom_capteur`, `type_capteur`, `nom_batiment`)
					VALUES('$nom_capteur','$type','$nom_batiment')";
					$resultat = mysqli_query($id_bd, $requete)
						or die("Execution de la requete impossible : $requete");
					mysqli_close($id_bd);

					/* display the added information */
					echo '<div class="ajout">';
					echo "<br /><strong>La donn&egravee suivante a &eacute;t&eacute; ajout&eacute;e au catalogue : </strong><br />";
					echo "<ul>
							<li> Nom du capteur : $nom_capteur</li>
							<li> type du capteur : $type</li>
							<li> Nom du batiment : $nom_batiment</li>
							</ul>
						</div>";	
				} else {
						echo "<br /><strong> Ce capteur existe déjà dans la base de donnée. </strong><br />";
						
							}	
			?>
			<hr />
			<a href="../administration.php"><button>OK</button></a>
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