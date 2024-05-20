<?php
include 'template_admin.php';

function ListeSignalement() {
    $resultats = array();
    $chemin_fichier = "../data/signalements.csv";

    if (($file = fopen($chemin_fichier, "r")) !== FALSE) {
        fgets($file, 1000);
        while(($data = fgetcsv($file, 2000, ";")) !== FALSE){
            $pseudo = $data[0];
            $resultats[] = array(
                'pseudo' => $data[0],
                'lien_photo' => "../data/profils/".$pseudo."/pfp.png",
                'date' => $data[2], 
                'message' => $data[1],
                'id' => $data[3]
            );
        }

        fclose($file);
    } else {
        echo "Erreur lors de l'ouverture du fichier.";
    }

    return $resultats;
}

$resultats = ListeSignalement();
$hauteurListe = count($resultats) * 8 + 5; 
?>


<style>
    body{
        overflow: auto;
    }

    div.main {
        position: absolute; 
        top: 5vw;
        left: 25vw;

        width: 70vw;
        height:<?php echo $hauteurListe; ?>vw;

        margin: 0;
        background-color: none;
        border-radius: 3vw;

        font-family: 'quicksand', sans-serif;
        font-size: 2vw;
        text-align: left;
    }

    ul.signal {
        list-style: none; 
        padding: 0;
    }

    li.signal{
        position: relative;
        width: 65vw;
        min-height: 13vw; // modifié selon la taille du message signalé

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

    
    div.signal_textBox{
        display: flex; 
        flex-direction: column;
    }
    
    img.signal{
        position: relative;
        left: 1.5vw;
        
        width: 4vw;
        min-width: 4vw; 
        height: 4vw; 
        margin-right: 3vw;

        
        border-radius: 50%;
        border-color: rgba(255, 255, 255, 0.494);
        border-style: solid;
    }
    
    span.signal_pseudo{
        margin:1vw 0.5vw 1vw 0;

        font-family: sans-serif;
        font-size: 1vw; 
    }

    span.signal_id{

        font-family: sans-serif;
        font-size: 1vw; 
    }

    span.signal_message{

        width: 50vw;

        text-align: left;
        font-weight: bold; 
        font-size: 1.5vw; 
        font-family: 'Quicksand', sans-serif;
    }

    span.signal_time{
        position: absolute;
        bottom: 0.5vw;
        right: 1vw;

        text-align: right;

        font-size: 1vw; 
        color: grey;
    }

    span.signal_vide{
        position: relative;
        top: 1vw;
        left: 3vw;

        font-family: 'Quicksand', sans-serif;
        font-size: 2vw; 
        color: bold;
    }


    form.signal{
        font-size: 0;
        position: absolute;
        top: 1vw;
        right: 2vw;
    }

    input.signal{
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
                .'<ul class="signal">'; 
    foreach ($resultats as $resultat){
        $tailleMsg = (intdiv(strlen($resultat['message']), 50) + 2) * 2;

        echo        '<li class="signal" style="height:'.$tailleMsg.'vw">'
                        .'<div class="signal_textBox">'
                            .'<img class="signal" src="'.$resultat['lien_photo'].'" alt="Photo de profil">'
                            .'<span class="signal_pseudo"><strong>pseudo:</strong><br><em>'.$resultat['pseudo'].'</em></span>'
                            .'<span class="signal_id"><strong>ID discussion:</strong><br><em>'.$resultat['id'].'</em></span>'
                        .'</div>'
                        .'<div class="signal_textBox">'
                            .'<span class="signal_message">'.$resultat['message'].'</span>'
                        .'</div>'
                        .'<span class="signal_time">'.$resultat['date'].'</span>'
                    .'</li>';
    }
    echo        '</ul>'
            .'</div>'; 

} 
else{
    echo    '<div class="main">
                <span class="signal_vide">Il n\'y a aucun signalement pour le moment.</span>
            </div>';
}
?>

<!-- Bouton "Effacer" aligné à gauche -->
<form id="deleteNotifsForm" action="../scripts/delete_signalements.php" method="post" class="signal">
    <input type="submit" name="deleteSignal" value="Effacer" class="signal">
</form>