<?php
    include 'scripts/check_session.php';
    include 'template.php';
?>

<!DOCTYPE html>
<html>
<head>


    <title>Dater | Mon profil</title>
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
            if(isset($_SESSION['pseudo'])) {
                $profil_dir = "data/profils/" . $_SESSION['pseudo'] . "/";
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

                echo "<button onclick='showEditForm()'>Modifier le profil</button>";
            } else {
                echo "<p>Vous devez être connecté pour voir votre profil.</p>";
            }
        ?>

        <div id="editForm" style="display:none;">
         <form action="./scripts/modif_profil.php" method="post">
             <label for="pseudo">Pseudo :</label><br>
            <input type="text" id="pseudo" name="pseudo" maxlength="15" required><br>

              <label for="prenom">Prénom :</label><br>
             <input type="text" id="prenom" name="prenom"><br>

             <label for="nom">Nom :</label><br>
             <input type="text" id="nom" name="nom"><br>

             <label for="email">Adresse email :</label><br>
             <input type="email" id="email" name="email" required><br>

             <label for="motdepasse">Mot de passe :</label><br>
             <input type="password" id="motdepasse" name="motdepasse" required><br>

             <label for="datenaissance">Date de naissance :</label><br>
             <input type="date" id="datenaissance" name="datenaissance" required><br>

             <label for="genre">Genre :</label><br>
                <select id="genre" name="genre" required>
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select><br>

             <label for="biographie">Biographie (max. 3000 caractères) :</label><br>

            <textarea id="biographie" name="biographie" rows="5" maxlength="3000"></textarea><br>
            <input type="submit" value="Enregistrer les modifications">
</form>
        </div>

        <script>
            function showEditForm() {
                document.getElementById("editForm").style.display = "block";
            }

            
            function sendForm() {
        var form = document.getElementById("editForm");
        var formData = new FormData(form);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "scripts/modif_profil.php", true);
        xhr.onload = function() {
            if (xhr.status == 200) {
                location.reload(); // Recharger la page après avoir effectué les modifications
            }
        };
        xhr.send(formData);
    }

        </script>
    </div>
</body>
</html>