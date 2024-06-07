<?php
function rechercherProfils(){
    //Note: Cherche les profils du serveur
    
    $resultats = array();
    
    $dossierProfils = 'data/profils/';
    
    $dossier = opendir($dossierProfils);
    
    while (($fichier = readdir($dossier)) !== false){
        if($fichier != '.' && $fichier != '..'){
        
            // récupérer le pseudo de l'utilisateur (nom du fichier sans extension)
            $pseudo = pathinfo($fichier, PATHINFO_FILENAME);
        
            // chemin vers la photo de profil
            $cheminPhoto = $dossierProfils . $pseudo . '/pfp.png';

            $cheminBio = $dossierProfils . $pseudo . '/bio.csv';
            $file = fopen($cheminBio, "r");
            $bio = fread($file,3001);
            fclose($file);
        
            // vérifier si le pseudo correspond à la recherche
            if($pseudo != $_SESSION['pseudo']){
                $resultats[] = array(
                    'pseudo' => $pseudo,
                    'lien_pfp' => $cheminPhoto,
                    'bio' => $bio
                );
            }
        }
    }

    closedir($dossier);

    return $resultats;
}

$resultats = rechercherProfils();

// modif hauteur de la liste en fonct° de nbr de résultats
$nb_profils = count($resultats); 

?>
<!DOCTYPE html>
<head>
    <style>
        body{
            overflow-x: hidden;
            margin: 0;
            padding:0;
            background-image: url("./image/bg_swipe.jpg");
            background-size: cover;
            background-attachment: local;
            background-position: 10vw 0vw;
            height: 100vh;
            width: 100vw;
        }

        div.swipeBox{
            position: relative;
            top: 0vw;
            left: 20vw;
            width: 24vw;
            height: 45vw;

            margin-bottom: 5vw;
            background-color: rgba(170,200,255, 0);
            border-radius: 1vw;

            border: 0.1vw transparent white;

            text-align: center;
            font-size: 2vw;
        }

        p.caption {
            position: relative;
            top: 0.5vw;
            color: rgba(20, 20, 20, 0.9);
        }
        
        
        div.swipeProfil{
            position: relative;
            left: 1.7vw;
            bottom: 0.5vw;
            width: 20vw;
            height: 32vw;

            border-radius: 3vw 6vw 3vw 5vw;
            border: 0.3vw solid rgba(200, 255, 255, 1);
            box-shadow: 0 0 0.5vw 0.1vw rgba(200, 255, 255, 1);
            background: linear-gradient(to bottom right, #ff993394 10%, #cc00ff29 100%);

            font-size: 0;
        }
        
        img.swipeImg{
            position: relative;
            width: 12vw;
            height: 12vw;
            top: 0.4vw;

            border: 0.4vw solid rgba(200, 200, 200, 0.4);

            border-radius: 100%;
        }

        p.swipeName{
            position: relative;
            bottom: 2.9vw;

            font-family: 'against.projet';
            color: #d96908;
            font-size: 3vw;
        }

        p.swipeBio{
            position: relative;
            bottom: 5vw;
            left: 1vw;
            padding: 0.5vw;

            width: 17vw;
            height: 12vw;
            background-color: rgba(220, 220, 220, 0.9);
            border: 0.1vw solid rgba(20, 20, 20, 0.2);
            border-radius: 0.8vw 0.8vw 2vw 4vw;

            text-align: center;
            font-family: 'quicksand';
            font-size: 0.8vw;
            color: black;
        }

        p.choice {
            position: relative;
            top: 0vw;
            margin: 0;
            color: rgb(0, 0, 0);
            
        }

        img.choice{
            position: relative;
            top: -1vw;
            width: 8vw;
            height: 8vw;
            margin-right: 1.5vw;
            margin-left: 1.5vw;
            padding: 0;

            border: hidden;

            opacity: 1;
            transition: opacity 0.4s ease;
            text-align: center;
            font-size: 2vw;
            cursor: pointer;
        }

        img.choice:hover{
            opacity: 0.8;
        }

    </style>
</head>

<body>
    <div class="main">
        <div class="swipeBox">
            <p class="caption">Likez-vous ce profil?</p>

            <div class="swipeProfil" id="swipeProfil">
                <img class="swipeImg" id="swipeImg" src="">
                <p class="swipeName" id="swipeName"><strong></strong></p>
                <p class="swipeBio" id="swipeBio"></p>
            </div>
            
            <p class="choice">Faites un choix!</p>
            <img src="icones/swipe.png" alt="Swipe!" onclick="reloadProfil();" class="choice" >
            <img src="icones/poro_like.png" alt="Like!" onclick="envoyer_notif_like(); reloadProfil();" class="choice">
        </div>
    </div>

    <script>

        var resultats = <?php echo json_encode($resultats); ?>;
        var currentIndex = -1;

        function reloadProfil() {
            currentIndex++;

            if (currentIndex >= resultats.length) {
                currentIndex = 0; 
            } 


            var swipeImg = document.getElementById('swipeImg');
            var swipeName = document.getElementById('swipeName');
            var swipeBio = document.getElementById('swipeBio');

            //  supprime les event listener
            var el = swipeImg,
                elClone = el.cloneNode(true);

            el.parentNode.replaceChild(elClone, el);

            var swipeImg = document.getElementById('swipeImg');

            swipeImg.src = resultats[currentIndex]['lien_pfp'];
            swipeImg.addEventListener("click", function(){
                envoyer_notif_vu(resultats[currentIndex]['pseudo']);
                location.href="./show_profil.php?pseudo=" + resultats[currentIndex]['pseudo'];
            });
            
            swipeName.innerHTML = '<strong>' + resultats[currentIndex]['pseudo'] + '</strong>';
            swipeBio.innerHTML = resultats[currentIndex]['bio'];
        }

        function envoyer_notif_like(){
            var pseudo = encodeURIComponent(resultats[currentIndex]['pseudo']);

            var xhr = new XMLHttpRequest();
            var params = 'pseudo=' + pseudo;

            xhr.open('GET', 'scripts/notifs/add_notifs_6.php?' + params, true);


            xhr.send();
            xhr.onreadystatechange = function() {

                if (xhr.readyState == XMLHttpRequest.DONE) {

                    if (xhr.status == 200) {

                        console.log(xhr.responseText);
                    } else {

                        console.error('La requête a échoué avec le statut ' + xhr.status);
                    }

                }
            }; 
        }

        function envoyer_notif_vu(recevant){
            // Récupération de la valeur de pseudo
            var pseudo = encodeURIComponent(recevant);

            var xhr = new XMLHttpRequest();
            var params = 'pseudo=' + pseudo;

            xhr.open('GET', 'scripts/notifs/add_notifs_3.php?' + params, true);
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

        reloadProfil();
    </script>
</body>