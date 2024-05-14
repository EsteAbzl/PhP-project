<?php
include 'scripts/check_session.php';
include 'template.php';

function ListeContacte() {
    $resultats = array();
    $chemin_fichier = "data/profils/".$_SESSION['pseudo']."/contacts.csv";

    if (($dossier = fopen($chemin_fichier, "r")) !== FALSE) {

        while (($data = fgetcsv($dossier, 1000, ";")) !== FALSE) {
            $resultats[] = array(
                'pseudo' => $data[0],
                'lien_photo' => "data/profils/".$data[0]."/pfp.jpg",
                'id_discussion' => $data[1]
            );
        }

        fclose($dossier);
    } else {

        echo "Erreur lors de l'ouverture du fichier.";
    }

    return $resultats;
}

$resultats = ListeContacte();


$hauteurListe = count($resultats) * 110; 

if (!empty($resultats)) {
    echo '<div style="text-align: center; width: 24vw; height: ' . $hauteurListe . 'px; overflow-y: hidden; margin: 0 auto;">'; 
    echo '<ul style="list-style: none; padding: 0;">'; 
    foreach ($resultats as $resultat) {
        echo '<li style="margin-bottom: 10px; border: 2px solid lightgrey; padding: 10px;">'; 
        echo '<a href="show_discussion.php?id=' . $resultat['id_discussion'] . '&pseudo=' . $resultat['pseudo'] . '&lien_photo=' . $resultat['lien_photo'] . '" style="text-decoration: none;">';
        echo '<button style="border: none; background: none; display: flex; align-items: center;">';
        echo '<img src="' . $resultat['lien_photo'] . '" alt="Photo de profil" style="border-radius: 50%; width: 50px; height: 50px; margin-right: 10px;">';
        echo '<span style="font-weight: bold; font-size: 18px; font-family: \'Quicksand\', sans-serif;">' . $resultat['pseudo'] . '</span>';
        echo '</button>';
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>'; 
} else {
    echo 'Aucun résultat trouvé.';
}
?>