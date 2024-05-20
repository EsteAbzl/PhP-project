<?php
    /*
        Charge la session ou la crée.

        Vérifie si un profil est chargé, 
        renvoi vers l'accueil si ce n'est pas le cas.
    */

session_start();

/*echo "  Info de session</br>
        ||[Profil]: ".$_SESSION['pseudo']."</br>
        ||[Permission]: ".$_SESSION['perm'];
*/
if(!isset($_SESSION['perm']) || $_SESSION['perm'] == 0){

    echo '  <script>
                    widow.alert("Vous n\'êtes pas connecté.")
                </script>';
    
    echo '<script>location.href="./accueil.php";</script>';
}
?>