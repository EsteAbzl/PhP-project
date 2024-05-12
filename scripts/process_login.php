
<?php
    include 'redirection.php';


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

        return 1;
    }


// Main:
    $pseudo = $_POST['pseudo'];
    
    if(verif($pseudo)){

        //modification des paramètres de session A FAIRE ICI
    
        echo "<script> redirection('menu'); </script>";
    }

?>