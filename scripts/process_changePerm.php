<?php
    session_start();
    
        $permission = $_POST['perm'];

        $chemin_fichier = "../data/profils/".$_SESSION['pseudo']."/profil.csv";
        $file = fopen($chemin_fichier, "r+") or die("erreur lors de l'ouverture de $chemin_fichier");
        
        fseek($file, 0, SEEK_SET);
        for($line = fgetcsv($file, 100, ";"); $line[0] != "perm"; $line = fgetcsv($file, 100, ";"));
        
        $line[1] = $permission;

        // Rembobiner le pointeur de fichier pour écrire au début de la deuxième ligne
        fseek($file, -strlen(implode(";", $line)) - 1, SEEK_CUR);

        // Écrire la deuxième ligne modifiée dans le fichier
        fwrite($file, implode(";", $line)."\n");

        $_SESSION['perm'] = $permission;
        fclose($file);
    
?>