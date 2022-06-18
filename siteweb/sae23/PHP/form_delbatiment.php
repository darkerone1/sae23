<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Supprimer un batiment</title>
        <link rel="stylesheet" href="../style/roomStyle.css">
    </head>
    <body>
        <?php
                session_start();
                error_reporting(E_ERROR | E_PARSE);
        ?>

        <script src="JS/popup.js"></script>
        <header>
			<h1>Supprimer un batiment</h1>
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
	<center>
		<section>
			<article id="logForm">
				<form action="delbatiment.php" method="POST">
					<label for="batiment">Nom du batiment</label><br/>
					<input type="text" name="nom_batiment" required><br/>
					<br />
					<input type="submit" id="submit" value="Submit">
				</form>
			</article>
        </section>
	</center>
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