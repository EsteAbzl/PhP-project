<?php

session_start();

//Notification de souscrire à prime
function addNotification4() {

    $file = '../../data/profils/'. $_SESSION['pseudo'] .'/notifs.csv';
    $data = '4;'.$_SESSION['pseudo'].';'.date("d/m/Y H:i:s").';'.'Merci d\'avoir souscrit au Prime!'."\n";

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