<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Ajouter un capteur</title>
        <link rel="stylesheet" href="../style/roomStyle.css">
    </head>
    <body>
        <?php
                session_start();
                error_reporting(E_ERROR | E_PARSE);
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
	
		
		<!-- the form for adding a sensor -->
	
		<section class="center" id="first">	
			<h2 class="left">Ajouter un capteur</h2>
			<article id="logForm">
				<form action="addcapteur.php" method="POST">
					<label>Nom du capteur</label><br/>
					<input type="text" name="nom_capteur"><br/>
					<br />
					<label>Type de capteur</label><br/>
					<input type="text" name="type"><br/>
					<br />
					<label>Ce capteur appartient à quel batiment</label><br/>
					<input type="text" name="nom_batiment"><br/>
					<br />
					<input type="submit" id="submit" value="Submit">
				</form>
			</article>
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