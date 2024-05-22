<?php

session_start();


//Notification de retour de signalement
function addNotification5() {

    $file = '../../data/profils/'. $_SESSION['pseudo'] .'/notifs.csv';
    $data = '5;' . $_SESSION['pseudo'] . ';' . date("d/m/Y H:i:s") . ';'.'Votre signalement à bien été pris en compte.' . "\n";
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