<?php

session_start();

if(!isset($_SESSION['perm']) || $_SESSION['perm'] == 0){

    echo '  <script>
                widow.alert("Vous n\'êtes pas connecté.")
            </script>';
    
    echo '<script>location.href="../accueil.php";</script>';
}

include 'notifs/add_notifs_5.php';

    // Vérifier si toutes les données nécessaires sont présentes
    if(isset($_POST['sender']) && isset($_POST['message']) && isset($_POST['timestamp']) && isset($_POST['id'])){
        // Récupérer les données du formulaire
        $sender = $_POST['sender'];
        $message = $_POST['message'];
        $timestamp = $_POST['timestamp'];
        $id_discussion = $_POST['id'];


        $signalement = "$sender; $message; $timestamp; $id_discussion\n";

        $fichier_csv = '../data/signalements.csv';

        $file = fopen($fichier_csv, 'a');
        fwrite($file, $signalement);
        fclose($file);

        echo "<script>location.href='../homepage.php';</script>";
        addNotification5();

    } else {

        echo "Erreur : Certaines données sont manquantes.";

    }

?>