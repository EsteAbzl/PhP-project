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
                    echo "<p><strong>Date de naissance: </strong>".$GLOBALS['info_date_naissance']."</p>";
                    echo "<p><strong>Genre: </strong>".$GLOBALS['info_genre']."</p>";
                }

                if(file_exists($bio_csv)) {
                    $GLOBALS["info_bio"] = file_get_contents($bio_csv);
                    echo "<textarea class='bio' readonly>".$GLOBALS['info_bio']."</textarea>";
                }

                echo "<br><br><button onclick='showEditForm()'>Modifier le profil</button>";
            } else {
                echo "<p>Vous devez être connecté pour voir votre profil.</p>";
            }
        ?>

        <script>
            function showEditForm(){
                document.getElementById("editForm").style.display = "block";
            }

            
            function sendForm(){
                var form = document.getElementById("editForm");
                var formData = new FormData(form);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "scripts/process_modifProfil.php", true);
                xhr.onload = function() {
                    if (xhr.status == 200) {
                        location.reload(); // Recharger la page après avoir effectué les modifications
                    }
                };
                xhr.send(formData);
            }

            function sendSuppr(){
                var requete = new XMLHttpRequest();
                requete.open("POST", "scripts/delete_profil.php", true);
                requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                requete.send("pseudo=<?php echo $_SESSION['pseudo'];?>");
                requete.onload = function(){
                    if(requete.status == 200) {
                        location.href="./accueil.php"; // Recharger la page après avoir effectué les modifications
                    }
                };
            }
        </script>

        <div id="editForm" style="display:none;">
            <form action="./scripts/process_modifProfil.php" method="post" enctype="multipart/form-data">
                <label for="pseudo">Pseudo :</label><br>
                <input type="text" id="pseudo" name="pseudo" value="<?php echo $_SESSION['pseudo']?>" maxlength="15" readonly><br>

                <label for="prenom">Prénom :</label><br>
                <input type="text" id="prenom" name="prenom" value="<?php echo $GLOBALS['info_prenom']?>"><br>

                <label for="nom">Nom :</label><br>
                <input type="text" id="nom" name="nom" value="<?php echo $GLOBALS['info_nom']?>"><br>

                <label for="email">Adresse email :</label><br>
                <input type="email" id="email" name="email" value="<?php echo $GLOBALS['info_mail']?>" readonly><br>

                <label for="motdepasse">Mot de passe :</label><br>
                <input type="password" id="motdepasse" name="motdepasse" value="<?php echo $GLOBALS['info_mdp']?>"><br>

                <label for="datenaissance">Date de naissance :</label><br>
                <input type="date" id="datenaissance" name="datenaissance" value="<?php echo $GLOBALS['info_date_naissance']?>" readonly><br>

                <label for="genre">Genre :</label><br>
                <select id="genre" name="genre" value="<?php echo $GLOBALS['info_genre']?>">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select><br>

                <label for="biographie">Biographie (max. 3000 caractères) :</label><br>
                <textarea id="biographie" name="biographie" rows="5" maxlength="3000"><?php echo $GLOBALS['info_bio']?></textarea><br>

                <label for="photo">Photo de profil (< 1Mo) :</label><br>
                <input type="file" id="photo" name="photo"><br> <!-- Champ pour télécharger la photo -->

                <input type="submit" value="Enregistrer les modifications">
            </form>
        </div>

        <button onclick="sendSuppr();" style="background: red; color: white">Supprimer le compte</button>
    </div>
</body>
</html>