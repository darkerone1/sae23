<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
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
        <script src="../JS/popup.js"></script>
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
		<section id="logPopup" class="popup">

            <!-- Popup content -->
            <article id="log" class="popup-content">
              <form action="login.php" method="POST">
                  <label for="username">Nom du compte</label><br/>
                  <input type="text" name="username" required><br/>
                  <label for="passwd">Mot de passe</label><br/>
                  <input type="password" name="password" required><br/>
                  <input type="submit" id="submit" value="LOGIN">
              </form>
            </article>
        </section>
		
		<section id="first">
        <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
        ?>
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