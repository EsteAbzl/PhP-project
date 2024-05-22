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

        div.line{
            display: flex;
            flex-direction: line;
        }

        div.column{
            margin-right: 2vw;
            display: flex;
            flex-direction: column;
        }

        form#editForm {
            position: relative;
            left: 5vw;
            width: 45vw;
            margin-bottom: 20vw;
            padding: 2vw 2vw 2vw 3vw;
            border: 0.2vw solid #ccc;
            border-radius: 0.5vw;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;

            text-align: left;

            font-size: 1.5vw;
        }

        input[type=text], input[type=email], input[type=password], 
        input[type=date], input[type=search], select {
            width: 17vw;
            height: 3vw;
            padding: 0.5vw;
            margin: 0.5vw 0.5vw 0.5vw 0;

            box-sizing: border-box;
            border: 0.2vw solid #ccc;
            border-radius: 0.5vw;
            outline: transparent;

            font-size: 1.3vw;
        }

        textarea  {
            position: relative;
            left: 1vw;
            top: 1vw;

            width: 24vw;
            height: 15vw;
            padding: 0.5vw;
            margin-top: 1vw;
            margin-bottom: 4vw;

            box-sizing: border-box;
            border: 0.2vw solid #ccc;
            border-radius: 0.5vw;
            outline: transparent;

            font-size: 1.2vw;
        }

        input[type=file], input[type=number] {
            position: relative;
            left: 1vw;
            width: auto;
            height: 3vw;
            padding: 0.5vw;
            margin: 0.5vw 0.5vw 0.5vw 0;

            box-sizing: border-box;
            border: 0.2vw solid #ccc;
            border-radius: 0.5vw;
            outline: transparent;

            font-size: 1.3vw;
        }

        input#file-upload-button{
            position: relative;
            left: 1vw;
            width: 24vw;
            height: 3vw;
            padding: 0.5vw;
            margin: 0.5vw 0.5vw 0.5vw 0;

            box-sizing: border-box;
            border: 0.2vw solid #ccc;
            border-radius: 0.5vw;
            outline: transparent;

            font-size: 1.3vw;
        }

        input[type=submit] {
            position: relative;

            width: auto;
            height: 3vw;
            padding: 0.5vw;
            margin: 0.5vw 0.5vw 0.5vw 0.5vw;

            background-color: #4CAF50;
            
            border: none;
            border-radius: 0.5vw;
            
            color: white;
            font-size: 1vw;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        #loadProfil input[type=submit] {
            width: auto;
            margin-bottom: 5vw;
        }

        #editForm input[type=submit] {
            width: auto;
            font-size: 1.5vw;
        }

        #suppr {
            position: relative;
            top: 6vw;
            height:5vw;
            padding: 1vw;
            background: red; 
            border-radius: 0.5vw;
            color: white;
            cursor: pointer;
        }

    </style>
</head>
<body>

<?php
    
    $pseudo = $_SESSION['pseudo'];
    $profilFile = "data/profils/$pseudo/";

    $profil_csv = $profilFile."profil.csv";
    $bio_csv = $profilFile."bio.csv";
    $profil_image = $profilFile."pfp.png";

    
    if(file_exists($profil_csv)){
        $file = fopen($profil_csv, "r");
        for($line = fgetcsv($file,1000,";", "\n", "\n"); !feof($file); $line = fgetcsv($file,1000,";", "\n", "\n")){
            switch($line[0]){
                case "perm":
                    $GLOBALS['info_perm'] = $line[1];
                    break;
                case "mdp":
                    $GLOBALS['info_mdp'] = $line[1];
                    break;
                case "nom":
                    $GLOBALS['info_nom'] = $line[1];
                    break;
                case "prenom":
                    $GLOBALS['info_prenom'] = $line[1];
                    break;
                case "date_naissance":
                    $GLOBALS['info_date_naissance'] = $line[1];
                    break;
                case "mail":
                    $GLOBALS['info_mail'] = $line[1];
                    break;
                case "genre":
                    $GLOBALS['info_genre'] = $line[1];
                    break;
            }
        }
        fclose($file);
    }

    if(file_exists($bio_csv)) {
        $GLOBALS['info_bio'] = file_get_contents($bio_csv);
    }


    echo '  <div class="container">
                <img src="'.$profil_image.'" alt="Photo de profil" class="profile-image">
                <p class="name">'.$pseudo.'</p>
                <p><strong>Date de naissance: </strong>'.$GLOBALS['info_date_naissance'].'</p>
                <p><strong>Genre: </strong>'.$GLOBALS['info_genre'].'</p>

                <textarea class="bio" readonly>'.$GLOBALS['info_bio'].'</textarea>

                <form id="loadProfil" action="my_profil.php" method="get">
                    <label for="modif"></label>
                    <input type="hidden" name="modif" value="1">
                    <input type="submit" value="Modifier le profil">
                </form>';

    if(isset($_GET['modif'])){
        echo '
                <form id="editForm" action="scripts/process_modifProfil.php" method="post" enctype="multipart/form-data">
                    <div class="line">
                        <div class="column>
                            <label for="pseudo"></label>
                            <input type="hidden" id="pseudo" name="pseudo" value="'.$pseudo.'">

                            <label for="prenom">Prénom :</label><br>
                            <input type="text" id="prenom" name="prenom" value="'.$GLOBALS['info_prenom'].'"><br>

                            <label for="nom">Nom :</label><br>
                            <input type="text" id="nom" name="nom" value="'.$GLOBALS['info_nom'].'"><br>

                            <label for="email">Adresse email :</label><br>
                            <input type="email" id="email" name="email" value="'.$GLOBALS['info_mail'].'"><br>

                            <label for="motdepasse">Mot de passe :</label><br>
                            <input type="password" id="motdepasse" name="motdepasse" value="'.$GLOBALS['info_mdp'].'"><br>

                            <label for="datenaissance">*Date de naissance :</label><br>
                            <input type="date" id="datenaissance" name="datenaissance" value="'.$GLOBALS['info_date_naissance'].'" readonly><br>

                            <label for="genre">*Genre :</label><br>
                            <input type="text" id="genre" name="genre" value="'.$GLOBALS['info_genre'].'" readonly>
                        </div>

                        <div class="column>
                            <label for="biographie">Biographie (max. 3000 caractères) :</label><br>
                            <textarea id="biographie" name="biographie" rows="5" maxlength="3000">'.$GLOBALS['info_bio'].'</textarea><br>

                            <label for="photo">Photo de profil (< 1Mo) :</label><br>
                            <input type="file" id="photo" name="photo"><br> <!-- Champ pour télécharger la photo -->

                        </div>
                    </div>
                    <input type="submit" value="Enregistrer les modifications">
                </form>
            
                <button id="suppr" onclick="sendSuppr();">Supprimer le compte</button>
            ';
    }
?>

    </div>


    <script>
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
</body>
</html>