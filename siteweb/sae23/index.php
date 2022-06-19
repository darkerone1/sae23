<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Accueil</title>
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
				L'objectif du site est de permettre à des utilisateurs sp&eacute;cifiques d'avoir acc&egrave;s &aacute; des données concernant le batiment auquel ils sont associ&eacute;s.
				Ils peuvent visualiser des donn&eacute;es sur la temp&eacute;rature ou le taux de CO2 etc grâce à une connexion d&eacute;di&eacute; &aacute; ces utilisateurs.
			</p>	
		</section>
		<br />
		<br />
		<center>
			<section>
			<img src="images/iut.jfif" width="500" height="200"/>
			</section>
		</center>
			<br />
			<br />
			
			
			
<section>
		<h2>Les temperatures de IUT:</h2>
</section>	
<!--la graphique de la temperature de IUT ligne rouge est E208 ligne verte est D101-->	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<center>	
		<canvas id="myChart" style="width:100%;max-width:600px"></canvas>
						
								
	<?php
			session_start();
             error_reporting(E_ERROR | E_PARSE);
             $connect = mysql_connect("localhost","zhao", "passroot");
             if (!$connect) {
                 die(mysql_error());
             }
             mysql_select_db("sae23");
			 
			 
		$results = mysql_query("SELECT `valeur` FROM `mesure`WHERE `nom_capteur`='E208_temperature' ORDER BY `mesure`.`horaire` DESC LIMIT 10;");	 
		while($row = mysql_fetch_array($results)) {
											$valeur[] = $row['valeur'];
													}
													
		
		$valeur1 = $valeur[0];
		$valeur2 = $valeur[1];
		$valeur3 = $valeur[2];
		$valeur4 = $valeur[3];
		$valeur5 = $valeur[4];
		$valeur6 = $valeur[5];
		$valeur7 = $valeur[6];
		$valeur8 = $valeur[7];
		$valeur9 = $valeur[8];
		$valeur10 = $valeur[9];
		
		$results = mysql_query("SELECT `valeur` FROM `mesure`WHERE `nom_capteur`='D101_temperature' ORDER BY `mesure`.`horaire` DESC LIMIT 10;");	 
		while($row = mysql_fetch_array($results)) {
											$value[] = $row['valeur'];
													}
		$value1 = $value[0];
		$value2 = $value[1];
		$value3 = $value[2];
		$value4 = $value[3];
		$value5 = $value[4];
		$value6 = $value[5];
		$value7 = $value[6];
		$value8 = $value[7];
		$value9 = $value[8];
		$value10 = $value[9];
		
		echo "<script type=\"text/javascript\">\n";
		echo "var valeur1 = ${valeur1};\n";
		echo "var valeur2 = ${valeur2};\n";
		echo "var valeur3 = ${valeur3};\n";
		echo "var valeur4 = ${valeur4};\n";
		echo "var valeur5 = ${valeur5};\n";
		echo "var valeur6 = ${valeur6};\n";
		echo "var valeur7 = ${valeur7};\n";
		echo "var valeur8 = ${valeur8};\n";
		echo "var valeur9 = ${valeur9};\n";
		echo "var valeur10 = ${valeur10};\n";
		echo "var value1 = ${value1};\n";
		echo "var value2 = ${value2};\n";
		echo "var value3 = ${value3};\n";
		echo "var value4 = ${value4};\n";
		echo "var value5 = ${value5};\n";
		echo "var value6 = ${value6};\n";
		echo "var value7 = ${value7};\n";
		echo "var value8 = ${value8};\n";
		echo "var value9 = ${value9};\n";
		echo "var value10 = ${value10};\n";
		echo "</script>\n";
		
	?>	
	
<script>
var xValues = [1,2,3,4,5,6,7,8,9,10];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [valeur10,valeur9,valeur8,valeur7,valeur6,valeur5,valeur4,valeur3,valeur2,valeur1],
      borderColor: "red",
      fill: false
    }, { 
      data: [value10,value9,value8,value7,value6,value5,value4,value3,value2,value1],
      borderColor: "green",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>
		
	</center>
		<!--la graphique de co2 de IUT ligne rouge est E208 ligne verte est D101-->	
			<section>
				<h2>Les CO2 de IUT:</h2>
			</section>		
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	<center>	
		<canvas id="Chart" style="width:100%;max-width:600px"></canvas>			
	<?php
			session_start();
             error_reporting(E_ERROR | E_PARSE);
             $connect = mysql_connect("localhost","zhao", "passroot");
             if (!$connect) {
                 die(mysql_error());
             }
             mysql_select_db("sae23");
			 
			 
		$results = mysql_query("SELECT `valeur` FROM `mesure`WHERE `nom_capteur`='E208_co2' ORDER BY `mesure`.`horaire` DESC LIMIT 10;");	 
		while($row = mysql_fetch_array($results)) {
											$data[] = $row['valeur'];
													}
													
		
		$data1 = $data[0];
		$data2 = $data[1];
		$data3 = $data[2];
		$data4 = $data[3];
		$data5 = $data[4];
		$data6 = $data[5];
		$data7 = $data[6];
		$data8 = $data[7];
		$data9 = $data[8];
		$data10 = $data[9];
		
		$results = mysql_query("SELECT `valeur` FROM `mesure`WHERE `nom_capteur`='D101_co2' ORDER BY `mesure`.`horaire` DESC LIMIT 10;");	 
		while($row = mysql_fetch_array($results)) {
											$dat[] = $row['valeur'];
													}
		$dat1 = $dat[0];
		$dat2 = $dat[1];
		$dat3 = $dat[2];
		$dat4 = $dat[3];
		$dat5 = $dat[4];
		$dat6 = $dat[5];
		$dat7 = $dat[6];
		$dat8 = $dat[7];
		$dat9 = $dat[8];
		$dat10 = $dat[9];
		
		echo "<script type=\"text/javascript\">\n";
		echo "var data1 = ${data1};\n";
		echo "var data2 = ${data2};\n";
		echo "var data3 = ${data3};\n";
		echo "var data4 = ${data4};\n";
		echo "var data5 = ${data5};\n";
		echo "var data6 = ${data6};\n";
		echo "var data7 = ${data7};\n";
		echo "var data8 = ${data8};\n";
		echo "var data9 = ${data9};\n";
		echo "var data10 = ${data10};\n";
		echo "var dat1 = ${dat1};\n";
		echo "var dat2 = ${dat2};\n";
		echo "var dat3 = ${dat3};\n";
		echo "var dat4 = ${dat4};\n";
		echo "var dat5 = ${dat5};\n";
		echo "var dat6 = ${dat6};\n";
		echo "var dat7 = ${dat7};\n";
		echo "var dat8 = ${dat8};\n";
		echo "var dat9 = ${dat9};\n";
		echo "var dat10 = ${dat10};\n";
		echo "</script>\n";
		
		echo "</script>\n";
	?>	
		
<script>
var xValues = [1,2,3,4,5,6,7,8,9,10];

new Chart("Chart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{ 
      data: [data10,data9,data8,data7,data6,data5,data4,data3,data2,data1],
      borderColor: "red",
      fill: false
    }, { 
      data: [dat10,dat9,dat8,dat7,dat6,dat5,dat4,dat3,dat2,dat1],
      borderColor: "green",
      fill: false
    }]
  },
  options: {
    legend: {display: false}
  }
});
</script>
		
	</center>		
			
			
			
			<section>
				<h2>Les batiments g&eacute;r&eacute;s:</h2>
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
										<td><strong>Nom_batiment</strong></td>
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
			
			
			
			<section>
				<h2>Les capteurs g&eacute;r&eacute;s:</h2>
			</section>
				<section id="TableWrapper">
					<section class="monitor">
						<article id="TempTable">
							<table>
								<thead>
									<tr>
										<td><strong>Nom_capteur</strong></td>
									</tr>
								</thead>
								<tbody>
									<?php
										$results = mysql_query("SELECT `nom_capteur` FROM `capteur`;");
										while($row = mysql_fetch_array($results)) {
									?>
										<tr>
											<td><?php echo $row['nom_capteur']?></td>
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