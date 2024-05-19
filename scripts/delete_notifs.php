<?php

include 'check_session.php';


function resetNotificationsFile() {


    $filePath = '../data/profils/' . $_SESSION['pseudo'] . '/notifs.csv';

    // Supprimer le fichier s'il existe
    if (file_exists($filePath)) {
        if (!unlink($filePath)) {
            echo "<script>widow.alert(\"Impossible de supprimer le fichier notifs.csv existant.\");</script>";
            return;
        }
    }

    // Créer le fichier notifs.csv
    file_put_contents($filePath, '');

    echo "<script>widow.alert(\"Le fichier notifs.csv a été réinitialisé avec succès.\");</script>";
    echo "<script>location.href=\"../afficher_notifs.php\";</script>";
    exit;
}

resetNotificationsFile();
?>