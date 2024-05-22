<?php
include 'scripts/check_session.php';
include 'template.php';

function ListeNotif() {
    $resultats = array();
    $chemin_fichier = "data/profils/".$_SESSION['pseudo']."/notifs.csv";

    if(($file = fopen($chemin_fichier, "r")) !== FALSE) {
        fgets($file, 1000);
        while(($data = fgetcsv($file, 1000, ";")) !== FALSE){
            $pseudo = $data[1];
            $resultats[] = array(
                'type' => $data[0],
                'lien_photo' => "data/profils/" . $pseudo . "/pfp.png",
                'date' => $data[2], 
                'message' => $data[3] 
            );
        }

        fclose($file);
    }
    else{
        echo "Erreur lors de l'ouverture du fichier.";
    }

    return $resultats;
}

$resultats = ListeNotif();

$hauteurListe = count($resultats) * 8 + 5;
?>

<style>
    div.main {
        position: absolute; 
        top: 10vh;
        left: 25vw;

        width: 70vw;
        height:<?php echo $hauteurListe; ?>vw;

        overflow: hidden; 
        margin: 0;
        background-color: lightblue;
        border-radius: 3vw;

        font-family: 'quicksand', sans-serif;
        font-size: 2vw;
        text-align: left;
    }

    ul.notif {
        list-style: none; 
        padding: 0;
    }

    li.notif{
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

    img.notif{
        width: 4vw;
        min-width: 4vw; 
        height: 4vw; 
        margin-right: 2vw;
        
        border-radius: 50%;
        border-color: rgba(255, 255, 255, 0.494);
        border-style: solid;
    }

    div.notif_textBox{
        display: flex; 
        flex-direction: column;
    }

    span.notif_message{
        font-weight: bold; 
        font-size: 1.7vw; 
        font-family: 'Quicksand', sans-serif;
    }

    span.notif_time{
        text-align: right;

        font-size: 1vw; 
        color: grey;
    }


    span.notif_vide{
        position: relative;
        top: 1vw;
        left: 3vw;

        font-family: 'Quicksand', sans-serif;
        font-size: 2vw; 
        color: bold;
    }


    form.notif{
        position: absolute;
        top: 1vw;
        right: 2vw;
    }

    input.notif{
        width: 8vw;
        height: 4vw;
        padding: 0;

        border: hidden; 
        border-radius: 1vw;
        background-color: red; 
        
        color: white; 
        text-align: center; 
        font-size: 2vw; 
        cursor: pointer;
    }

</style>


<?php
    if(!empty($resultats)){
        echo    '<div class="main">'
                    .'<ul class="notif">'; 
        foreach ($resultats as $resultat){
            echo        '<li class="notif">'
                            .'<img class="notif" src="'.$resultat['lien_photo'].'" alt="Photo de profil">'
                            .'<div class="notif_textBox">'
                                .'<span class="notif_message">'.$resultat['message'].'</span>'
                                .'<span class="notif_time">'.$resultat['date'].'</span>'
                            .'</div>'
                        .'</li>';
        }
        echo        '</ul>'
                .'</div>'; 

    } 
    else{
        echo    '<div class="main">
                    <span class="notif_vide">Vous n\'avez aucune notification pour le moment.</span>
                </div>';
    }
?>

<!-- Bouton "Effacer" aligné à gauche -->
<form id="deleteNotifsForm" action="scripts/notifs/delete_notifs.php" method="post" class="notif">
    <input type="submit" name="deleteNotifs" value="Effacer" class="notif">
</form>