<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Administration</title>
        <link rel="stylesheet" href="style/roomStyle.css">
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
			<h1>Administration</h1>
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
                             <?php } else if($_SESSION['username'] == "admin"){ ?>
             				<li><a class="link" href="#">Administration</a></li>
             		<?php } else { ?>
             				<li><button id="logBtn" onclick="openPopup('logBtn','logPopup')">Connexion</button></li>
             		<?php } ?>
                </ul>
            </nav>
        <section id="first">
			<h2>Ex&eacute;cut&eacute; les modifications</h2>
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
		<!-- The buttons for modifing the infomations of buildings and sensors -->
		<section>
			<center>
				<a href="PHP/form_addbatiment.php"><button>Ajouter un batiment</button></a>
				<br />
				<br />
				<a href="PHP/form_delbatiment.php"><button>Supprimer un batiment</button></a>
				<br />
				<br />
				<a href="PHP/form_addcapteur.php"><button>ajouter un capteur</button></a>
				<br />
				<br />
				<a href="PHP/form_delcapteur.php"><button>Supprimer un capteur</button></a>
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