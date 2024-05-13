<?php
session_start();

    $chemin_fichier = "../data/profils/".$_SESSION['pseudo']."/profil.csv";

    
    $file = fopen($chemin_fichier, "r+") or die("erreur lors de l'ouverture du fichier");

    
    $premiere_ligne = fgetcsv($file, 100, ";");

    
    $deuxieme_ligne = fgetcsv($file, 100, ";");

    // Si la deuxième ligne est "perm;1;"
    if ($deuxieme_ligne[0] == "perm" && $deuxieme_ligne[1] == "1") {
        
        $deuxieme_ligne[1] = "2";

        // Rembobiner le pointeur de fichier pour écrire au début de la deuxième ligne
        fseek($file, strlen(implode(";", $premiere_ligne)) +1 , SEEK_SET);

        // Écrire la deuxième ligne modifiée dans le fichier
        fwrite($file, implode(";", $deuxieme_ligne));
        fwrite($file, "\n");

        fclose($file);


    } 
    else {
        echo "La deuxième ligne n'est pas 'perm;1;'";
    }

   // $_SESSION['perm'] = "2";
?>