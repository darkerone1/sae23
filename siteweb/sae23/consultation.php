<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Consulter les donn&eacute;es</title>
        <link rel="stylesheet" href="style/roomStyle.css">
    </head>
    <body>
        <?php
                session_start();
                error_reporting(E_ERROR | E_PARSE);
        ?>

        <script src="JS/popup.js"></script>
        <header>
			<h1>Consulter les donn&eacute;es</h1>
		</header>
            <nav>
                <ul>
					<li><a class="link" href="index.php">Accueil</a></li>
                    <li><a class="link" href="consultation.php">Consultation</a></li>
					<li><a class="link" href="mention_legale.php">Mention L&eacute;gale</a></li>
                    <?php if($_SESSION['username'] == "admin") { ?>
                        <li><a class="link" href="administration.php">Administration</a></li>
                    <?php } ?>
                    <?php
                     	if($_SESSION['username'] != ""){ ?>
                 			<li><a class="link" href="PHP/disconnect.php"><button>D&eacute;connexion</button></a></li>
                        <?php } else { ?>
							<li><a class="link" href="admin.php">Connecter admin</a></li>
             				<li><button id="logBtn" onclick="openPopup('logBtn','logPopup')">Connexion</button></li>
             		<?php } ?>
                </ul>
            </nav>
        

        <section id="first">
			<h2>Consulter les donn&eacute;es</h2>
        </section>
		<section id="logPopup" class="popup">

            <!-- Popup content -->
            <article id="log" class="popup-content">
              <form action="./PHP/login.php" method="POST">
                  <label for="username">Nom du compte</label><br/>
                  <input type="text" name="username" required><br/>
                  <label for="passwd">Mot de passe</label><br/>
                  <input type="password" name="password" required><br/>
                  <input type="submit" id="submit" value="LOGIN">
              </form>
            </article>
        </section>
		/* the form of consultation */
		<section>
			<center>
				<article id="logForm">
					<form action="PHP/resultat.php" method="POST">
						<label for="nom_batiment">Nom de batiment que vous voulez consulter:</label><br/>
						<input type="text" name="nom_batiment" required><br/>
						<br />
						<label for="type_capteur">Le type de capteur que vous voulez consulter:</label><br/>
						<input type="text" name="type_capteur" required><br/>
						<br />
						<label for="nom_salle">Le nom de la salle que vous voulez consulter:</label><br/>
						<input type="text" name="nom_salle" required><br/>
						<br />
						<input type="submit" id="submit" value="submit">
					</form>
				</article>
			</center>
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