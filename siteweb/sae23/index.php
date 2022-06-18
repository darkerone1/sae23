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
        ?>

        <script src="JS/popup.js"></script>
        <header>
		<h1>Accueil</h1>
		</header> 
            <nav>
                <ul>
					<li><a class="link" href="index.php">Accueil</a></li>
                    
                    <li><a class="link" href="batRT.php">Bat R&T</a></li>
                    <li><a class="link" href="batInfo.php">Bat Info</a></li>
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
			<h2>Description</h2>
			<p>
				L'objectif du site est de permettre &aacute; des utilisateurs sp&eacute;cifiques d'avoir acc&egrave;s &aacute; des données concernant le batiment auquel ils sont associ&eacute;s.
				Ils peuvent visualiser des donn&eacute;es sur la temp&eacute;rature ou le taux de CO2 etc grace &aacute; une connexion d&eacute;di&eacute; &aacute; ces utilisateurs.
			</p>	
		</section>
			<br />
			<br />
			
			<section>
				<h2>les batiments g&eacute;r&eacute;s:</h2>
			</section>
			<?php
             session_start();
             error_reporting(E_ERROR | E_PARSE);
             $connect = mysql_connect("localhost","zhao", "passroot");
             if (!$connect) {
                 die(mysql_error());
             }
             mysql_select_db("sae23");
			?> 
				<section id="TableWrapper">
					<section class="monitor">
						<article id="TempTable">
							<table>
								<thead>
									<tr>
										<td>Nom_batiment</td>
									</tr>
								</thead>
								<tbody>
									<?php
										$results = mysql_query("SELECT `nom` FROM `batiment`;");
										while($row = mysql_fetch_array($results)) {
									?>
										<tr>
											<td><?php echo $row['nom']?></td>
										</tr>
									<?php }?>
								</tbody>
							</table>
						</article>
					</section>
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