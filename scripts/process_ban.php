<?php

if(isset($_POST['pseudo'])) {

    $pseudo = $_POST['pseudo'];


    $profilFile = "../data/profils/$pseudo/profil.csv";


    if(file_exists($profilFile)) {

        // Lire la ligne 7 du fichier profil.csv
        $lines = file($profilFile);
        
        $line7 = $lines[6];
        $data = explode(";", $line7);
        $bannedUser = $data[1]; // mail
        $blacklistFile = "../data/blacklist.csv";

        file_put_contents($blacklistFile, $bannedUser . "\n", FILE_APPEND);

        echo "  <script>
                    var requete = new XMLHttpRequest();
                    requete.open(\"POST\", \"./delete_profil.php\", true);
                    requete.setRequestHeader(\"Content-Type\", \"application/x-www-form-urlencoded\");
                    requete.send(\"pseudo=$pseudo\");
                </script>";


        echo "Utilisateur banni avec succès.";
        echo "<script>location.href=\"../admin/template_admin.php\";</script>";
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "Veuillez soumettre un pseudo.";
}
?>