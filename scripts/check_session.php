<!--    
    Vérifie la session
-->
<?php
    session_start();
    if(!isset($_SESSION['pseudo'])){
        header("Location: acceuil.php");
    }
?>