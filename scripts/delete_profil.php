<?php

if(isset($_POST['pseudo'])) {

    $pseudo = $_POST['pseudo'];

    $profilFile = "../data/profils/$pseudo/profil.csv";

    if(file_exists($profilFile)) {
        // suppréssion des fichiers du profil
        $dossier = opendir("../data/profils/$pseudo");
        while (($fichier = readdir($dossier)) !== false) {
            if ($fichier != '.' && $fichier != '..') {
                unlink("../data/profils/$pseudo/".$fichier);
            }
        }
        rmdir("../data/profils/$pseudo");

        // suppréssion dans 'profil_list'
        $file = fopen("../data/profil_list.csv", "r+");
        while(!str_contains(fgets($file, 20), '['.$pseudo.']'));
        fseek($file, -strlen($pseudo)-3, SEEK_CUR);
        for($i = 0; $i<strlen($pseudo)+2; $i++){
            fwrite($file, " ");
        }
        fclose($file);
        
        echo "Utilisateur supprimé";

    }
    else{
        echo "Utilisateur non trouvé.";
    }
}
?>