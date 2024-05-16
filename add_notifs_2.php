<?php

include 'scripts/check_session.php';

$pseudo_recevant = isset($_GET['pseudo']) ? $_GET['pseudo'] : '';

//Notification d'abonnement
function addNotification2($pseudo_recevant) {

    $file = 'data/profils/'. $pseudo_recevant .'/notifs.csv';
    $data = '2;' . $_SESSION['pseudo'] . ';' . date("Y-m-d H:i:s") . ';' . $_SESSION['pseudo'] . ' vous suit.' . "\n";

    $handle = fopen($file, 'a');
    if ($handle) {

        fwrite($handle, $data);
        fclose($handle);

    } else {
        echo "Impossible d'ouvrir le fichier pour écriture.";
    }
}

addNotification2($pseudo_recevant);
?>