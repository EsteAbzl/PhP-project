<?php
    /*
        Supprime la session actuelle puis renvoi vers l'accueil.
    */

    session_start();

    session_destroy();

    header("Location: ../accueil.php");
?>