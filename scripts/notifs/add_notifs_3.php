<?php

session_start();

/*echo "  Info de session</br>
        ||[Profil]: ".$_SESSION['pseudo']."</br>
        ||[Permission]: ".$_SESSION['perm'];
*/
if(!isset($_SESSION['perm']) || $_SESSION['perm'] == 0){

    echo '  <script>
                widow.alert("Vous n\'êtes pas connecté.")
            </script>';
    
    echo '<script>location.href="../../accueil.php";</script>';
}


$pseudo_recevant = isset($_GET['pseudo']) ? $_GET['pseudo'] : '';

//Notification de visite (qq à visité ton profil)
function addNotification3($pseudo_recevant) {

    $file = '../../data/profils/'. $pseudo_recevant .'/notifs.csv';
    $data = '3;' . $_SESSION['pseudo'] . ';' . date("Y-m-d H:i:s") . ';' . $_SESSION['pseudo'] . ' a vu votre profil' . "\n";

    $handle = fopen($file, 'a');
    if ($handle) {

        fwrite($handle, $data);
        fclose($handle);

    } else {
        echo "Impossible d'ouvrir le fichier pour écriture.";
    }
}

addNotification3($pseudo_recevant);
?>