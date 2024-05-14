<?php
include 'scripts/check_session.php';
include 'template.php';
include 'template_recherche.php';

function rechercherProfils($recherche) {
    $resultats = array();

    $dossierProfils = 'data/profils/';

    $dossier = opendir($dossierProfils);

    while (($fichier = readdir($dossier)) !== false) {
        if ($fichier != '.' && $fichier != '..') {

            // récupérer le pseudo de l'utilisateur (nom du fichier sans extension)
            $pseudo = pathinfo($fichier, PATHINFO_FILENAME);

            // chemin vers la photo de profil
            $cheminPhoto = $dossierProfils . $pseudo . '/pfp.jpg';

            // vérifier si le pseudo correspond à la recherche
            if (preg_match("/$recherche/i", $pseudo)) {
                $resultats[] = array(
                    'pseudo' => $pseudo,
                    'lien_photo' => $cheminPhoto
                );
            }
        }
    }

    closedir($dossier);

    return $resultats;
}

$recherche = isset($_GET['q']) ? $_GET['q'] : '';



$resultats = rechercherProfils($recherche);

// modif hauteur de la liste en fonct° de nbr de résultats
$hauteurListe = count($resultats) * 500; 

if (!empty($resultats)) {
    echo '<div style="position: relative; top: 20vh; text-align: center; width: 24vw; height: ' . $hauteurListe . 'px; overflow-y: hidden; margin: 0 auto;">'; 
    echo '<ul style="list-style: none; padding: ;">'; 
    foreach ($resultats as $resultat) {
        

        echo '<li style="margin-bottom: 10px; border: 2px solid lightgrey; padding: 50px;">'; 

        echo '<a href="show_profil.php?pseudo=' . $resultat['pseudo'] . '" style="text-decoration: none;">';

        echo '<button style="border: none; background: none; display: flex; align-items: center;">';

        echo '<img src="' . $resultat['lien_photo'] . '" alt="Photo de profil" style="border-radius: 50%; width: 50px; height: 50px; margin-right: 10px;">';

        echo '<span style="font-weight: bold; font-size: 30px; font-family: \'quicksand\', sans-serif;">' . $resultat['pseudo'] . '</span>';

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