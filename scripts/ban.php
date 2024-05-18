<?php

if(isset($_POST['pseudo'])) {

    $pseudo = $_POST['pseudo'];


    $profilFile = "../data/profils/$pseudo/profil.csv";


    if(file_exists($profilFile)) {

        // Lire la ligne 7 du fichier profil.csv
        $lines = file($profilFile);
        $line7 = $lines[6]; // Index 6 pour la 7ème ligne (0-indexed)

        $data = explode(";", $line7);


        $bannedUser = $data[1];


        $blacklistFile = "../data/blacklist.csv";


        file_put_contents($blacklistFile, $bannedUser . "\n", FILE_APPEND);

        echo "Utilisateur banni avec succès.";
        echo "<script>location.href=\"../template_admin.php\";</script>";
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "Veuillez soumettre un pseudo.";
}
?>