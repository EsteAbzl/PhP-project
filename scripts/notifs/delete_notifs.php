<?php
    session_start();

    if(!isset($_SESSION['perm']) || $_SESSION['perm'] == 0){

        echo '  <script>
                    widow.alert("Vous n\'êtes pas connecté.")
                </script>';
        
        echo '<script>location.href="../../accueil.php";</script>';
    }


    function resetNotificationsFile(){
        $filePath = '../../data/profils/'.$_SESSION['pseudo'].'/notifs.csv';

        $file = fopen($filePath, "w");
        fwrite($file, "TYPE;PSEUDO;DATE;MSG;\n");
        fclose($file);

        echo "<script>widow.alert(\"Le fichier notifs.csv a été réinitialisé avec succès.\");</script>";
        echo "<script>history.go(-1)</script>";
        exit;
    }

    resetNotificationsFile();
?>