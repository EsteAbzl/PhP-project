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
$hauteurListe = count($resultats) * 14 + 5; 

?>
    <style>
        body {
            overflow-x: hidden;
        }

        div.main {
            position: absolute; 
            top: 20vh;
            left: 25vw;

            width: 70vw;
            height:<?php echo $hauteurListe; ?>vw;

            overflow: hidden; 
            margin: 0;
            background-color: transparent;

            font-family: 'quicksand', sans-serif;
            font-size: 3vw;
            text-align: left;
        }

        ul.recherche {
            list-style: none; 
            padding: 0;
        }

        li.recherche{
            position: relative;
            width: 53vw;
            height: 10vw;

            padding-left: 2vw;
            margin-left: 5vw;
            margin-bottom: 3vw; // distance entre chaque profils 

            border-color: black;
            border-style: solid;
            border-radius: 1vw;
            box-shadow: 0 0 2vh 1vh #6be8b470;
            background: linear-gradient(#6be8b49d, #d44fae80); 
            
            cursor: pointer;
            display: flex; 
            align-items: center;
        }

        img.recherche{
            width: 9vw;
            min-width: 9vw; 
            height: 9vw; 
            margin-right: 4vw;
            
            border-radius: 50%; 
        }

        span.recherche{
            font-family: 'quicksand', sans-serif;
            font-size: 4vw;
            font-weight: bold;
        }
    </style>

<?php

if (!empty($resultats)) {
    echo '<div class="main">'
            .'<ul class="recherche">'; 

    foreach ($resultats as $resultat) {
        // Creation du lien vers le profil
        echo    '<script>
                    function link(){
                        location.href="./show_profil.php?pseudo='.$resultat['pseudo'].'";
                    }
                </script>';

        
        // Affichage du profil trouvé
        echo    '<li class="recherche" onclick="link(); envoyerNotif()">'
                    .'<img class="recherche" src="' . $resultat['lien_photo'] . '" alt="Photo de profil">'
                    .'<span class="recherche">' . $resultat['pseudo'] . '</span>'
               .'</li>';
    }
    echo    '</ul>'
        .'</div>'; 

}
else{
    echo '<div class="main"> Aucun résultat trouvé. </div>';
}

?>

<script>
    function envoyerNotif() {
    // Récupération de la valeur de pseudo
    var pseudo = encodeURIComponent('<?php echo isset($_GET['pseudo']) ? $_GET['pseudo'] : ''; ?>');

    var xhr = new XMLHttpRequest();
    var params = 'pseudo=' + pseudo;

    xhr.open('GET', 'add_notifs_3.php?' + params, true);
    xhr.send();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                // La requête a réussi, traiter la réponse si nécessaire
                console.log(xhr.responseText);
            } else {
                // La requête a échoué
                console.error('La requête a échoué avec le statut ' + xhr.status);
            }
        }
    };
}
</script>