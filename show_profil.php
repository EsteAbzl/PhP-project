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
            font-family: 'quicksand', sans-serif;
        }

        .name {
            font-family: 'against.projet'; 
            font-weight: bold;
            font-size: 3vw;
            color: #e9b938;
        }

        .container {
            width: 60%;
            margin: 0 auto;
            text-align: center;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 5vw;
        }

        .bio {
            width: 60%;
            height: 300px;
            max-width: 100%;
            max-height: 300px;
            resize: none;
            font-family: 'quicksand', sans-serif;
            font-size: 20px;
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