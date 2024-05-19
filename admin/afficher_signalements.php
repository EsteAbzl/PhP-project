<?php
include 'template_admin.php';

function ListeNotif() {
    $resultats = array();
    $chemin_fichier = "data/signalements.csv";

    if (($dossier = fopen($chemin_fichier, "r")) !== FALSE) {

        while (($data = fgetcsv($dossier, 1000, ";")) !== FALSE) {
            $ps = $data[0];
            $resultats[] = array(
                'pseudo' => $data[0],
                'lien_photo' => "data/profils/" . $ps . "/pfp.jpg",
                'date' => $data[2], 
                'message' => $data[1],
                 'id' => $data[3]
            );
        }

        fclose($dossier);
    } else {

        echo "Erreur lors de l'ouverture du fichier.";
    }

    return $resultats;
}

$resultats = ListeNotif();


$hauteurListe = count($resultats) * 120; 

if (!empty($resultats)) {
    echo '<div style="text-align: center; width: 24vw; height: ' . $hauteurListe . 'px; overflow-y: hidden; margin: 0 auto;">'; 
    echo '<ul style="list-style: none; padding: 0;">'; 
    foreach ($resultats as $resultat) {
        echo '<li style="margin-bottom: 10px; border: 2px solid lightgrey; padding: 10px;">'; 
        echo '<button style="border: none; background: none; display: flex; align-items: center;">';
        echo '<img src="' . $resultat['lien_photo'] . '" alt="Photo de profil" style="border-radius: 50%; width: 50px; height: 50px; margin-right: 10px;">';
        echo '<div style="display: flex; flex-direction: column;">';
        echo '<span style="font-weight: bold; font-size: 18px; font-family: \'Quicksand\', sans-serif;">' . $resultat['id'] . '</span>';
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

<!-- Bouton "Effacer" aligné à gauche -->
<form id="deleteNotifsForm" action="scripts/delete_signalements.php" method="post" style="text-align: right; margin-left: 10px;">
    <input type="submit" name="deleteNotifs" value="Effacer" style="border: 2px solid red; background-color: white; color: red; padding: 10px; font-size: 16px; cursor: pointer;">
</form>