<?php
include 'scripts/check_session.php';
include 'template.php';
include 'template_recherche.php';

function rechercherProfils($recherche) {
    //Note: Cherche les pseudo, pas les centre d'interet (pour l'instant?)

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
            if (preg_match("/$recherche/i", $pseudo) && $pseudo != $_SESSION['pseudo']) {
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


// Main

$recherche = isset($_GET['recherche']) ? $_GET['recherche'] : '';

$resultats = rechercherProfils($recherche);

// modif hauteur de la liste en fonct° de nbr de résultats
$hauteurListe = count($resultats) * 20 + 10; 

?>
    <style>
        button.recherche{
            cursor: pointer;
            border: none; 
            background: none; 
            display: flex; 
            align-items: center;
        }

        div.main {
            position: absolute; 
            top: 20vh;
            left: 25vw;

            width: 70vw;
            height:<?php echo $hauteurListe; ?>vh;

            overflow-y: hidden; 
            margin: 0;
            background-color: none;

            font-size: 5vh;
            text-align: left;
        }

        ul.recherche {
            list-style: none; 
            padding: 0;
        }

        li.recherche{
            position: relative;
            width: 50vw;
            height: 15vh;

            padding-left: 2vw;
            margin-left: 5vh;
            margin-bottom: 5vh; // distance entre chaque profils 

            border-color: black;
            border-style: solid;
            border-radius: 1vh;
            box-shadow: 0 0 2vh 1vh #6be8b470;
            background: linear-gradient(#6be8b49d, #d44fae80); 
            
            cursor: pointer;
            display: flex; 
            align-items: center;
        }

        img.recherche{
            width: 11vh; 
            height: 11vh; 
            margin-right: 10vh;
            
            border-radius: 50%; 
        }

        span.recherche{
            font-family: 'quicksand', sans-serif;
            font-size: 6vh;
            font-weight: bold;
        }
    </style>

<?php

if (!empty($resultats)) {
    echo '<div class="main">'
            .'<ul class="recherche">'; 

    foreach ($resultats as $resultat) {
        echo    '<script>
                    function link(){
                        location.href="./show_profil.php?pseudo='.$resultat['pseudo'].'";
                    }
                </script>';

        
        echo    '<li class="recherche" onclick="link()">'
                    .'<img class="recherche" src="' . $resultat['lien_photo'] . '" alt="Photo de profil">';

        echo '<span class="recherche">' . $resultat['pseudo'] . '</span>';

        echo '</button>';

        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';
    echo '</div>'; 

} else {
    echo '<div class="main"> Aucun résultat trouvé. </div>';
}

?>