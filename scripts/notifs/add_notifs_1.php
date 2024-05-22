<?php

session_start();


$pseudo_recevant = isset($_GET['pseudo']) ? $_GET['pseudo'] : '';

//Notification de message (Machin vous à envoyé un message)
function addNotification1($pseudo_recevant) {

    $file = '../../data/profils/'. $pseudo_recevant .'/notifs.csv';
    $data = '1;' . $_SESSION['pseudo'] . ';' . date("d/m/Y H:i:s") . ';' . $_SESSION['pseudo'] . ' vous a envoyé un message.' . "\n";

    $handle = fopen($file, 'a');
    if ($handle) {

        fwrite($handle, $data);
        fclose($handle);

    } else {
        echo "Impossible d'ouvrir le fichier pour écriture.";
    }
}

addNotification1($pseudo_recevant);
?>