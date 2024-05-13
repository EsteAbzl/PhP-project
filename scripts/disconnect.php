<?php
    /*
        Charge la session ou la crée.
        Vérifie si un profil est chargé, renvoi vers l'accueil si ce n'est pas le cas.
    */

    session_start();

    session_destroy();

    header("Location: ../accueil.php");
?>