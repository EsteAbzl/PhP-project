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

//Notification de souscrire à prime
function addNotification4() {

    $file = '../../data/profils/'. $_SESSION['pseudo'] .'/notifs.csv';
    $data = '4;' . $_SESSION['pseudo'] . ';' . date("Y-m-d H:i:s") . ';' . $_SESSION['pseudo'] . ' pour avoir souscrit à Prime!' . "\n";

    $handle = fopen($file, 'a');
    if ($handle) {

        fwrite($handle, $data);
        fclose($handle);

    } else {
        echo "Impossible d'ouvrir le fichier pour écriture.";
    }
}

addNotification4();
?>