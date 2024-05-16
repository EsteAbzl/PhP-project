<?php
include 'scripts/check_session.php';
include 'template.php';

function ListeNotif() {
    $resultats = array();
    $chemin_fichier = "data/profils/" . $_SESSION['pseudo'] . "/notifs.csv";

    if (($dossier = fopen($chemin_fichier, "r")) !== FALSE) {

        while (($data = fgetcsv($dossier, 1000, ";")) !== FALSE) {
            $resultats[] = array(
                'type' => $data[0],
                'lien_photo' => "data/profils/" . $_SESSION['pseudo'] . "/pfp.jpg",
                'date' => $data[2], 
                'message' => $data[3] 
            );
        }

        fclose($dossier);
    } else {

        echo "Erreur lors de l'ouverture du fichier.";
    }

    return $resultats;
}

$resultats = ListeNotif();


$hauteurListe = count($resultats) * 110; 

if (!empty($resultats)) {
    echo '<div style="text-align: center; width: 24vw; height: ' . $hauteurListe . 'px; overflow-y: hidden; margin: 0 auto;">'; 
    echo '<ul style="list-style: none; padding: 0;">'; 
    foreach ($resultats as $resultat) {
        echo '<li style="margin-bottom: 10px; border: 2px solid lightgrey; padding: 10px;">'; 
        echo '<button style="border: none; background: none; display: flex; align-items: center;">';
        echo '<img src="' . $resultat['lien_photo'] . '" alt="Photo de profil" style="border-radius: 50%; width: 50px; height: 50px; margin-right: 10px;">';
        echo '<div style="display: flex; flex-direction: column;">';
        echo '<span style="font-weight: bold; font-size: 18px; font-family: \'Quicksand\', sans-serif;">' . $resultat['message'] . '</span>';
        echo '<span style="font-size: 14px; color: grey;">' . $resultat['date'] . '</span>'; // Ajout de la date en dessous du message
        echo '</div>';
        echo '</button>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>'; 
} else {
    echo 'Aucun résultat trouvé.';
}
?>