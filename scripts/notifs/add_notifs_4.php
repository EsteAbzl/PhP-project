<?php

include '../check_session.php';

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