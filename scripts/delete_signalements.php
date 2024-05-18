<?php

include 'check_session.php';


function resetNotificationsFile() {


    $filePath = '../data/signalements.csv';

    // Supprimer le fichier s'il existe
    if (file_exists($filePath)) {
        if (!unlink($filePath)) {
            echo "Impossible de supprimer le fichier notifs.csv existant.";
            return;
        }
    }

    // Créer le fichier notifs.csv
    file_put_contents($filePath, '');

    echo "Le fichier signalements.csv a été réinitialisé avec succès.";
    echo "<script>location.href=\"../afficher_signalements.php\";</script>";
    exit;
}

resetNotificationsFile();
?>