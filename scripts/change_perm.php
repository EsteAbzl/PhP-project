<?php

 /* session_start();
 $pseudo = $_SESSION['pseudo']; 


$chemin_fichier = "../data/profils/".$pseudo."/profil.csv";


$file = fopen($chemin_fichier, "r+") or die("erreur lors de l'ouverture du fichier");


while (($line = fgetcsv($file, 100, ";")) !== false) {
    
    if ($line[0] == "perm" && $line[1] == "1") {
        
        $line[1] = "2"; 

        // Rembobiner le pointeur de fichier pour écrire au début de la ligne
        fseek($file, -strlen(implode(";", $line)), SEEK_CUR);

        // Écrire la ligne modifiée dans le fichier
        fwrite($file, implode(";", $line));


        break;
    }
}

fclose($file); */
?>