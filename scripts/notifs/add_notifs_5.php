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

//Notification de retour de signalement
function addNotification5() {

    $file = '../../data/profils/'. $_SESSION['pseudo'] .'/notifs.csv';
    $data = '5;' . $_SESSION['pseudo'] . ';' . date("Y-m-d H:i:s") . ';'.$_SESSION['pseudo'].': Votre signalement à été pris en compte.' . "\n";
    $handle = fopen($file, 'a');
    if ($handle) {

        fwrite($handle, $data);
        fclose($handle);

    } else {
        echo "Impossible d'ouvrir le fichier pour écriture.";
    }
}

addNotification5();
?>