<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf8">
        <title>consultation des données</title>
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
		<h1>consultation des données</h1>
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
			<h2>consultation des données</h2>
        </section>
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

    <center>    
        <section id="TableWrapper">
            <section class="monitor">
                    <article id="TempTable">
                    <?php 
						$gestionnaire=$_SESSION['username'];
						$nom_batiment = $_POST['nom_batiment'];
						$results = mysql_query("SELECT `nom` FROM `batiment` WHERE `identifiant`='$gestionnaire' ; ");
						$row = mysql_fetch_array($results);
						/* admin can manage all sensors */
						/* the manager of each building can manage their own building */
						if($nom_batiment == $row['nom'] || $_SESSION['username'] == "admin"){ ?>
							<?php
							$type_capteur = $_POST['type_capteur'];
							$nom_batiment = $_POST['nom_batiment'];
							$nom_salle = $_POST['nom_salle'];
							$results = mysql_query("SELECT `nom_capteur`, `horaire`, avg(`valeur`) as moy, min(`valeur`) as mini, max(`valeur`) as maxi FROM `mesure` 
													WHERE `nom_capteur`=(SELECT `nom_capteur` FROM `capteur` 
															WHERE `type_capteur`= '$type_capteur' AND `nom_batiment`='$nom_batiment') 
															AND `nom_capteur` LIKE '$nom_salle%';");
							$row = mysql_fetch_array($results); ?>
							<p>Moyenne : <?php echo $row['moy']," , Min : ", $row['mini']," , Max : ", $row['maxi']," "?></p>
							<table>
								<thead>
									<tr>
										<td>Nom_capteur</td>
										<td>Date & Heure</td>
										<td>Valeur</td>
										<td>ID Mesure</td>
									</tr>
								</thead>
								<tbody>
									<?php
									/* Find the corresponding information in the database based on the content of the form */
										$type_capteur = $_POST['type_capteur'];
										$nom_batiment = $_POST['nom_batiment'];
										$nom_salle = $_POST['nom_salle'];
										
										$results = mysql_query("SELECT  `nom_capteur`, `horaire`, `valeur`, `id` FROM `mesure` 
																WHERE `nom_capteur`=(SELECT `nom_capteur` FROM `capteur` 
																WHERE `type_capteur`= '$type_capteur' AND `nom_batiment`='$nom_batiment') 
																AND `nom_capteur` LIKE '$nom_salle%' ORDER BY `mesure`.`horaire` DESC ;");
										while($row = mysql_fetch_array($results)) {
									?>
										<tr>
											<td><?php echo $row['nom_capteur']?></td>
											<td><?php echo $row['horaire']?></td>
											<td><?php echo $row['valeur']?></td>
											<td><?php echo $row['id']?></td>
										</tr>

									<?php }?>
									</tbody>
							</table>
							<button id="addTempBtn" onclick="openPopup('addTempBtn','addTempPopup')">Ajouter une valeur</button>
							<button id="removeTempBtn" onclick="openPopup('removeTempBtn','removeCO2Popup')">Supprimer une valeur</button>
							
							
                    <?php } else { 
							$type_capteur = $_POST['type_capteur'];
							$nom_batiment = $_POST['nom_batiment'];
							$nom_salle = $_POST['nom_salle'];
                          $results = mysql_query("SELECT `nom_capteur`, `horaire`, `valeur`, `id` FROM `mesure` 
                          WHERE `nom_capteur`=(SELECT `nom_capteur` FROM `capteur` 
															WHERE `type_capteur`= '$type_capteur' AND `nom_batiment`='$nom_batiment') 
															AND `nom_capteur` LIKE '$nom_salle%'ORDER BY `mesure`.`horaire` DESC LIMIT 1;");
                          $row = mysql_fetch_array($results); ?>
						  
                        <p>Derniere Valeur : <?php echo $row['nom_capteur']," : ", $row['horaire']," : ", $row['valeur']," "?></p>
						<?php
							$type_capteur = $_POST['type_capteur'];
							$nom_batiment = $_POST['nom_batiment'];
							$nom_salle = $_POST['nom_salle'];
							$results = mysql_query("SELECT `nom_capteur`, `horaire`, avg(`valeur`) as moy, min(`valeur`) as mini, max(`valeur`) as maxi FROM `mesure` 
													WHERE `nom_capteur`=(SELECT `nom_capteur` FROM `capteur` 
															WHERE `type_capteur`= '$type_capteur' AND `nom_batiment`='$nom_batiment') 
															AND `nom_capteur` LIKE '$nom_salle%';");
							$row = mysql_fetch_array($results); ?>
						<p>Moyenne : <?php echo $row['moy']," , Min : ", $row['mini']," , Max : ", $row['maxi']," "?></p>
                    <?php } ?>  
                    </article>

        </section>
	</center>
            <!-- Same for this popus since it is linked to the addTempBtn -->
			 <section id="addTempPopup" class="popup">
					/* the form to add a data */
                    <!-- Popup content -->
                    <article class="popup-content">
                    <form action="addTemp.php" method="post">
                        <label for="date">Date et heure</label><br/>
                        <input type="datetime-local" id="datetime" name="datetime"><br/>
                        <label for="temperature">Valeur</label><br/>
                        <input type="number" id="temperature" name="valeur"><br/>
                        <label for="nomCap">Nom du Capteur</label> </br>
                        <input type="text" name="nomCap" id="nomCap"> </br>
                        <input type="submit" value="Submit" class="subBtn">
                    </form>
                    </article>
                </section>
			
					/* the form to remove a data */
                <section id="removeCO2Popup" class="popup">
                    <!-- Popup content -->
                    <article class="popup-content">
                        <form action="supTemp.php" method="post">
                            <label for="CO2">ID de la valeur</label><br/>
                            <input type="number" id="ID" name="idValeur"><br/>
                            <input type="submit" value="Submit" class="subBtn">
                        </form>
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