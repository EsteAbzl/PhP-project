<?php
include 'scripts/check_session.php';
include 'template.php';

function ListeContact() {
    $resultats = array();
    $chemin_fichier = "data/profils/".$_SESSION['pseudo']."/contacts.csv";

    if(($file = fopen($chemin_fichier, "r")) !== FALSE) {
        fgets($file, 1000);

        while (($data = fgetcsv($file, 1000, ";")) !== FALSE) {
            $resultats[] = array(
                'pseudo' => $data[0],
                'lien_photo' => "data/profils/".$data[0]."/pfp.png",
                'id_discussion' => $data[1]
            );
        }
        fclose($file);
    }
    else{
        echo "Erreur lors de l'ouverture du fichier.";
    }

    return $resultats;
}

$resultats = ListeContact();
$hauteurListe = count($resultats) * 8 + 5; 
?>

<style>

    @font-face {
        font-family: 'against.projet';
        src: url('./fonts/against regular.otf') format('opentype'); 
    }

    @font-face {
        font-family: 'quicksand';
        src: url('./fonts/Quicksand_Light.otf') format('opentype');
    }

    div.main {
        position: absolute; 
        top: 10vh;
        left: 25vw;

        width: 70vw;
        height:<?php echo $hauteurListe; ?>vw;

        margin: 0;
        background-color: hidden;
        border-radius: 3vw;

        font-family: 'quicksand', sans-serif;
        font-size: 2vw;
        text-align: left;
    }

    ul.contact {
        list-style: none; 
        padding: 0;
    }

    li.contact{
        position: relative;
        width: 45vw;
        height: 6vw;

        padding-left: 2vw;
        margin-left: 5vw;
        margin-bottom: 1vw; /*distance entre chaque profils */

        border: 0.5vw solid lightgrey;
        border-radius: 1vw;
        box-shadow: 0 0 3vh 0.5vh #f6ae132a;
        background: linear-gradient(to bottom right, #ff993394 10%, #cc00ff29 100%);
        
        cursor: pointer;
        display: flex; 
        align-items: center;
    }

    img.contact{
        width: 4vw;
        min-width: 4vw; 
        height: 4vw; 
        margin-right: 2vw;
        
        border-radius: 50%;
        border-color: rgba(255, 255, 255, 0.494);
        border-style: solid;
    }

    span.contact_pseudo{
        position: relative;
        top: 0.5vw;
        left: 3vw;

        font-family: 'against.projet', sans-serif;
        font-size: 3.2vw; 
        font-weight: bold;
    }

    span.contact_vide{
        position: relative;
        top: 1vw;
        left: 3vw;

        text-align: center;
        font-family: 'Quicksand';
        font-size: 2vw; 
    }
</style>


<?php

echo '  <div class="main">
            <h1 style="position: relative; bottom: 7vw; left: 2vw;"> MESSAGERIE: </h1>
        </div>';

if (!empty($resultats)) {
    echo '<div class="main">'
            .'<ul class="contact">'; 

    foreach ($resultats as $resultat) {
        // Creation du lien vers le profil
        echo    '<script>
                    function linkTo_'.$resultat['pseudo'].'(){
                        location.href="show_discussion.php?id='.$resultat['id_discussion'].'&pseudo='.$resultat['pseudo'].'#bas_discussion";
                    }
                </script>';

        
        // Affichage du profil trouvé
        echo    '<li class="contact" onclick="linkTo_'.$resultat['pseudo'].'()">'
                    .'<img class="contact" src="'.$resultat['lien_photo'].'" alt="PfP">'
                    .'<span class="contact_pseudo">' . $resultat['pseudo'] . '</span>'
               .'</li>';
    }
    echo    '</ul>'
        .'</div>'; 

}
else{
    echo '  <div class="main">
            <span class="contact_vide">Vous n\'avez pas encore de contacts !
            <br>Abonnez vous à leur profil afin de débuter une discussion !
            </span>
            </div>';
}
?>