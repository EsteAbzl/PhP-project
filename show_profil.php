<?php
    include 'scripts/check_session.php';
    include 'template.php';
?>

<!DOCTYPE html>
<html>
<head>


    <title>Dater | Site de rencontre</title>
    <style>
        @font-face {
            font-family: 'quicksand';
            src: url('./fonts/Quicksand_Light.otf') format('opentype');
        }

        body {
            position: absolute;
            top: 3vw;
            left: 28vw;
            margin: 0;

            font-size: 2vw;
            font-family: 'quicksand', sans-serif;
        }

        .container {
            
            top: 3vw;
            left: 28vw;
            width: 60vw;
            padding-bottom: 20vw;
            margin-bottom: 20vw;

            border: 0.1vw transparent black;
            background: linear-gradient(to bottom right, #ff993394 10%, #cc00ff29 100%);
            
            font-size: 2vw;
            text-align: center;
        }

        .profile-image {
            width: 20vw;
            height: 20vw;

            border: 0.4vw solid rgba(200, 200, 200, 0.4);
            border-radius: 100vw;
            margin-top: 1vw;
        }

        .name {
            font-family: 'against.projet'; 
            font-weight: bold;
            font-size: 3vw;
            color: #d96908;
        }

        .bio {
            width: 40vw;
            height: 20vw;

            padding: 0.5vw; 
            border: 0.2vw solid black;
            border-radius: 0;

            font-family: 'quicksand', sans-serif;
            font-size: 1.5vw;
        }

        .container button {
            height: 3vw;
            width: auto;

            padding: 0.5vw;
            border-radius: 0.5vw;
            border: 0.2vw solid black;
            font-size: 2vw;
        }

    </style>
</head>
<body>
    <div class="container">
        <?php
            if (isset($_GET['pseudo'])) {

                $pseudo = $_GET['pseudo'];
                $profil_dir = "data/profils/". $pseudo ."/";
                $profil_image = $profil_dir . "pfp.png";
                $profil_csv = $profil_dir . "profil.csv";
                $bio_csv = $profil_dir . "bio.csv";

                
                if(file_exists($profil_image)) {
                    echo "<img src='$profil_image' alt='Photo de profil' class='profile-image'>";
                }

                if(file_exists($profil_csv)){
                    $file = fopen($profil_csv, "r");
                    for($line = fgetcsv($file,1000,";", "\n", "\n"); !feof($file); $line = fgetcsv($file,1000,";", "\n", "\n")){
                        switch($line[0]){
                            case "mdp":
                                $GLOBALS["info_mdp"] = $line[1];
                                break;
                            case "nom":
                                $GLOBALS["info_nom"] = $line[1];
                                break;
                            case "prenom":
                                $GLOBALS["info_prenom"] = $line[1];
                                break;
                            case "date_naissance":
                                $GLOBALS["info_date_naissance"] = $line[1];
                                break;
                            case "mail":
                                $GLOBALS["info_mail"] = $line[1];
                                break;
                            case "genre":
                                $GLOBALS["info_genre"] = $line[1];
                                break;
                        }
                    }
                    fclose($file);
                }
                
                if(file_exists($profil_csv)){
                    echo '<p class="name">'.$pseudo.'</p>';
                    echo "<p><strong>Date de naissance: </strong>".$GLOBALS['info_date_naissance']."</p>";
                    echo "<p><strong>Genre: </strong>".$GLOBALS['info_genre']."</p>";
                }

                if(file_exists($bio_csv)) {
                    $GLOBALS["info_bio"] = file_get_contents($bio_csv);
                    echo "<textarea class='bio' readonly>".$GLOBALS['info_bio']."</textarea>";
                }

                echo "<br><br><button onclick='AjoutContact();'>S'abonner</button>";

            } else {
                echo "Paramètres manquants dans l'URL.";
            }
        ?>

        </div>

    </div>

    <script>
        function AjoutContact(){
            // Récupération de la valeur de pseudo
            var pseudo = encodeURIComponent('<?php echo isset($_GET['pseudo']) ? $_GET['pseudo'] : ''; ?>');

            var xhr = new XMLHttpRequest();
            var params = 'pseudo=' + pseudo;

            xhr.open('GET', 'scripts/process_sabonner.php?' + params, true);
            xhr.send();
            xhr.onreadystatechange = function(){
                if(xhr.readyState == XMLHttpRequest.DONE){
                    if(xhr.status == 200) {
                        // La requête a réussi, traiter la réponse si nécessaire
                        console.log(xhr.responseText);
                    }
                    else{
                        // La requête a échoué
                        console.error('La requête a échoué avec le statut ' + xhr.status);
                    }
                }
            };
        }

    function envoyerNotif(){
        // Récupération de la valeur de pseudo
        var pseudo = encodeURIComponent('<?php echo isset($_GET['pseudo']) ? $_GET['pseudo'] : ''; ?>');

        var xhr = new XMLHttpRequest();
        var params = 'pseudo=' + pseudo;

        xhr.open('GET', 'scripts/notifs/add_notifs_2.php?' + params, true);
        xhr.send();
        xhr.onreadystatechange = function(){
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    // La requête a réussi, traiter la réponse si nécessaire
                    console.log(xhr.responseText);
                }
                else{
                    // La requête a échoué
                    console.error('La requête a échoué avec le statut ' + xhr.status);
                }
            }
        };
    }
    </script>


</body>
</html>