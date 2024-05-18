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

        .container {
            width: 60%;
            margin: 0 auto;
            text-align: center;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
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

                $ps = $_GET['pseudo'];
                $profil_dir = "data/profils/". $ps ."/";
                $profil_image = $profil_dir . "pfp.jpg";
                $profil_csv = $profil_dir . "profil.csv";
                $bio_csv = $profil_dir . "bio.csv";

                if(file_exists($profil_image)) {
                    echo "<img src='$profil_image' alt='Photo de profil' class='profile-image'>";
                }
                
                if(file_exists($profil_csv)) {
                    $profil_lines = file($profil_csv, FILE_IGNORE_NEW_LINES);
                    if(isset($profil_lines[5])) {
                        $line6 = explode(";", $profil_lines[5]);
                        echo "<p><strong>$line6[0]:</strong> $line6[1]</p>";
                    }
                    if(isset($profil_lines[7])) {
                        $line8 = explode(";", $profil_lines[7]);
                        echo "<p><strong>$line8[0]:</strong> $line8[1]</p>";
                    }
                }

                if(file_exists($bio_csv)) {
                    $bio_data = file_get_contents($bio_csv);
                    echo "<textarea class='bio' readonly>$bio_data</textarea>";
                }

                echo "<button onclick='envoyerNotif(); AjoutContact();'>S'abonner</button>";

            } else {
                echo "Paramètres manquants dans l'URL.";
            }
        ?>

        </div>

    </div>

    <script>
        function AjoutContact() {
    // Récupération de la valeur de pseudo
    var pseudo = encodeURIComponent('<?php echo isset($_GET['pseudo']) ? $_GET['pseudo'] : ''; ?>');

    var xhr = new XMLHttpRequest();
    var params = 'pseudo=' + pseudo;

    xhr.open('GET', 'sabo.php?' + params, true);
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

    function envoyerNotif() {
    // Récupération de la valeur de pseudo
    var pseudo = encodeURIComponent('<?php echo isset($_GET['pseudo']) ? $_GET['pseudo'] : ''; ?>');

    var xhr = new XMLHttpRequest();
    var params = 'pseudo=' + pseudo;

    xhr.open('GET', 'add_notifs_2.php?' + params, true);
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


</body>
</html>