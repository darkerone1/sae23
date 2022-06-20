<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Mention l&eacute;gales</title>
        <link rel="stylesheet" href="style/roomStyle.css">
    </head>
    <body>
        <?php
                session_start();
                error_reporting(E_ERROR | E_PARSE);
        ?>

        <script src="JS/popup.js"></script>
        <header>
		<h1>Mention l&eacute;gales</h1>
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
             				<li><button id="logBtn" onclick="openPopup('logBtn','logPopup')">Connexion</button></li>
             		<?php } ?>
                </ul>
            </nav>
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
	<section id="first">
		<h2>Mention l&eacute;gales</h2>
	
		<p>
		En vertu de l'article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l'économie numérique, il est précisé aux utilisateurs du site internet http://localhost/sae23 l'identité des différents intervenants dans le cadre de sa réalisation et de son suivi:
		</p>
		<p>
		<strong>Propriétaire du site :</strong>Groupe amaury - Contact : xinyu.zhao0427@gmail.com 0784959933 - Adresse : 1 Pl.Georges Brassens 31700 BLAGNAC.
		</p>
		<p>
		<strong>Identification de l'entreprise :</strong>Groupe amaury au capital social de € - SIREN : - RCS ou RM : - Adresse postale : 1 Pl.Georges Brassens 31700 BLAGNAC.
		</p>
		<p>
		<strong>Directeur de la publication : </strong> - Contact : .
		</p>
		<p>
		<strong>Hébergeur : </strong> AutreEOHOST
		</p>
		<p>
		<strong>Délégué à la protection des données :</strong> -
		</p>
		<p>
		<strong>Autres contributeurs :</strong> -
		</p>
		<h2><strong>2 - Propriété intellectuelle et contrefaçons.</strong></h2>
		<p>
		<strong>ZHAO Xinyu</strong> est propriétaire des droits de propriété intellectuelle et détient les droits d’usage sur tous les éléments accessibles sur le site internet, notamment les textes, images, graphismes, logos, vidéos, architecture, icônes et sons.
		</p>
		<p>
		Toute reproduction, représentation, modification, publication, adaptation de tout ou partie des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable de <strong>ZHAO Xinyu.</strong>
		</p>
		<p>
		Toute exploitation non autorisée du site ou de l’un quelconque des éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.
		</p>
		<h2><strong>3 - Limitations de responsabilité.</strong></h2>
		<p>
		<strong>ZHAO Xinyu</strong> ne pourra être tenu pour responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site http://localhost/sae23.
		</p>
		<p>
		<strong>ZHAO Xinyu</strong> décline toute responsabilité quant à l’utilisation qui pourrait être faite des informations et contenus présents sur http://localhost/sae23.
		</p>
		<p>
		<strong>ZHAO Xinyu</strong> s’engage à sécuriser au mieux le site http://localhost/sae23, cependant sa responsabilité ne pourra être mise en cause si des données indésirables sont importées et installées sur son site à son insu.
		</p>
		<p>
		Des espaces interactifs (espace contact ou commentaires) sont à la disposition des utilisateurs.<strong>ZHAO Xinyu</strong> se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données.
		</p>
		<p>
		Le cas échéant, <strong>ZHAO Xinyu</strong> se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas de message à caractère raciste, injurieux, diffamant, ou p****graphique, quel que soit le support utilisé (texte, photographie …).
		</p>
		<h2><strong>4 - CNIL et gestion des données personnelles.</strong></h2>
		<p>
		Conformément aux dispositions de la loi 78-17 du 6 janvier 1978 modifiée, l’utilisateur du site http://localhost/sae23 dispose d’un droit d’accès, de modification et de suppression des informations collectées. Pour exercer ce droit, envoyez un message à notre Délégué à la Protection des Données : - .
		</p>
		<p>
		Pour plus d'informations sur la façon dont nous traitons vos données (type de données, finalité, destinataire...), lisez notre Politique de Confidentialité.
		</p>
		<p>
		Il est également possible de déposer une réclamation auprès de la CNIL.
		</p>
		<h2><strong>5 - Liens hypertextes et cookies</strong></h2>
		<p>
		Le site http://localhost/sae23 contient des liens hypertextes vers d’autres sites et dégage toute responsabilité à propos de ces liens externes ou des liens créés par d’autres sites vers http://xzhao.atwebpages.com/SAé14.
		</p>
		<p>
		La navigation sur le site http://localhost/sae23 est susceptible de provoquer l’installation de cookie(s) sur l’ordinateur de l’utilisateur.
		</p>
		<p>
		Un "cookie" est un fichier de petite taille qui enregistre des informations relatives à la navigation d’un utilisateur sur un site. Les données ainsi obtenues permettent d'obtenir des mesures de fréquentation, par exemple.
		</p>
		<p>
		Vous avez la possibilité d’accepter ou de refuser les cookies en modifiant les paramètres de votre navigateur. Aucun cookie ne sera déposé sans votre consentement.
		</p>
		<p>
		Les cookies sont enregistrés pour une durée maximale de mois.
		</p>
		<p>
		Pour plus d'informations sur la façon dont nous faisons usage des cookies, lisez notre Politique de Confidentialité.
		</p>
		<h2><strong>6 - Droit applicable et attribution de juridiction.</strong></h2>
		<p>
		Tout litige en relation avec l’utilisation du site http://localhost/sae23 est soumis au droit français. En dehors des cas où la loi ne le permet pas, il est fait attribution exclusive de juridiction aux tribunaux compétents de .
		</p>
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