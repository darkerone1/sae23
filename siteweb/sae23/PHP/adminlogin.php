
<?php
    session_start();
    if(isset($_POST['username']) && isset($_POST['password'])) {

        $hostname='localhost';
    	$username='zhao';
    	$passwd='passroot';
    	$dbName="sae23";

    	$dbCon = mysqli_connect($hostname,$username,$passwd,"$dbName");
    	if(!$dbCon) { die('Could not Connect MySQL Server :' .mysqli_connect_error()); }

        $identifiant = mysqli_real_escape_string($dbCon,htmlspecialchars($_POST['username']));
        $mdp = mysqli_real_escape_string($dbCon,htmlspecialchars($_POST['password']));
        
        if($identifiant !== "" && $mdp !== "" ) { //Check if the form is filled
            $requete = "SELECT count(*) FROM administration where 
                login = '".$identifiant."' and mot_de_passe = '".$mdp."' ";
            $exec_requete = mysqli_query($dbCon,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            if($count!=0) { //Check if the username and password are correct
                $_SESSION['username'] = $identifiant;
                header('Location: ../index.php');
            } else {
                header('Location: logError.php?erreur=1');
            }
        } else {
            header('Location: logError.php?erreur=2');
        }
    } else {
       header('Location: login.php');
    }
    mysqli_close($dbCon); // close the connection to the database
?>
