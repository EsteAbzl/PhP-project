<?php

include 'scripts/check_session.php';
include 'add_notifs_5.php';

    // Vérifier si toutes les données nécessaires sont présentes
    if (isset($_POST['sender']) && isset($_POST['message']) && isset($_POST['timestamp']) && isset($_POST['id'])) {
        // Récupérer les données du formulaire
        $sender = $_POST['sender'];
        $message = $_POST['message'];
        $timestamp = $_POST['timestamp'];
        $id_discussion = $_POST['id'];



        $ligne = "$sender; $message; $timestamp; $id_discussion\n";


        $fichier_csv = 'data/signalements.csv';

        $handle = fopen($fichier_csv, 'a');

        fwrite($handle, $ligne);

        fclose($handle);

       echo "<script>location.href='homepage.php';</script>";
        addNotification5();

    } else {

        echo "Erreur : Certaines données sont manquantes.";

    }

?>