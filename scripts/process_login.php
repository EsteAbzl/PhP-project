<?php
    /*
        Vérifie le mot de passe et le pseudo.
        Charge les variable de session liées au profil
    */

    function verif($pseudo){

        // On vérifie si le pseudo existe
        $file = fopen("../data/profil_list.csv", "r") or die("erreur lors de l'ouverture de 'profil_list.csv'");
        if(!str_contains(fread($file, filesize("../data/profil_list.csv")+1), '['.$pseudo.']')){
            echo "<script>
                window.alert(\"Ce pseudo n'existe pas.\");
                history.back();
            </script>";
            return 0;
        }
        fclose($file);

        // On cherche le mod de passe
        $file = fopen("../data/profils/".$pseudo."/profil.csv", "r") or die("erreur lors de l'ouverture de '/data/profils/\".$pseudo.\"/profil.csv'");
        for($line = fgetcsv($file,100,";","\n","\n"); $line[0] != "mdp"; $line = fgetcsv($file,100,";","\n","\n"));
        if($_POST['motdepasse'] != $line[1]){
            echo "<script>
                window.alert(\"Le mot de passe est incorrect.\");
                history.back();
            </script>";
            return 0;
        }
        fclose($file);

        // Tout est correct:
        return 1;
    }

    function load_session($pseudo){
    /*Modification des paramètres de session*/

        session_start(); // Session start doit être avant toute sortie HTML
        //pseudo du profil
        $_SESSION['pseudo'] = $pseudo;

        //perm du profil
        $file = fopen("../data/profils/".$pseudo."/profil.csv", "r");
        for($line = fgetcsv($file,100,";","\n","\n"); $line[0] != "perm"; $line = fgetcsv($file,100,";","\n","\n"));
        $_SESSION['perm'] = intval($line[1]);   // 'intval()' permet de passer un caractère en nombre
        fclose($file);
    }
// Main:
    $pseudo = $_POST['pseudo'];

    if(verif($pseudo)){
        load_session($pseudo);

        echo "<script>location.href=\"../homepage.php\";</script>";
    }
?>