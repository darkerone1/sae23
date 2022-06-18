<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title>Supprimer un batiment</title>
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
			<h1>Supprimer un batiment</h1>
			</header>
				<nav>
					<ul>
						<li><a class="link" href="../index.php">Accueil</a></li>
					
						<li><a class="link" href="../batRT.php">Bat R&T</a></li>
						<li><a class="link" href="../batInfo.php">Bat Info</a></li>
						<li><a class="link" href="../mention_legale.php">Mention L&eacute;gale</a></li>
						<?php if($_SESSION['username'] == "admin") { ?>
							<li><a class="link" href="../administration.php">Administration</a></li>
						<?php } ?>
						<?php
							if($_SESSION['username'] != ""){ ?>
								<li><a class="link" href="disconnect.php"><button>D&eacute;connexion</button></a></li>
								<?php } else { ?>
								<li><a class="link" href="../admin.php">Connecter admin</a></li>
								<li><button id="logBtn" onclick="openPopup('logBtn','logPopup')">Connexion</button></li>
						<?php } ?>
					</ul>
				</nav>
		<section id="first">
			<h2>Supprimer un batiment</h2>
		</section>
		<section>
			<?php
				/* Accès à la base */
				include ("mysql.php");
				$nom_batiment = $_POST['nom_batiment']; 	
				$requete = "DELETE FROM `batiment` WHERE `nom`= '$nom_batiment'";
				$resultat = mysqli_query($id_bd, $requete)
					or die("Execution de la requete impossible : $requete");
				mysqli_close($id_bd);

				echo '<div class="ajout">';
				echo "<br /><strong>La donn&egravee suivante a &eacute;t&eacute; supprim&eacute;e au catalogue : </strong><br />";
				echo "<ul>
						<li> Nom du batiment : $nom_batiment</li>
						</ul>
					</div>";	
			?>
			<hr />
			<a href="../administration.php"><button>OK</button></a>
		</section>
	    <footer>
			<ul>
			<li>IUT de Blagnac</li>
			<li>Département Réseaux et Télécommunications</li>
			<li>BUT1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
			</ul>  
		</footer>
	</body>
</html>