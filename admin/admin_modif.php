<?php
    include 'template_admin.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de bannissement</title>
    <style>
        body {
            position: absolute;
            top: 3vw;
            left: 28vw;
            margin: 0;
            font-size: 2vw;
        }

        form#loadProfil {
            width: 25vw;
            padding: 2vw;
            margin-bottom: 2vw;

            border: 0.2vw solid #ccc;
            border-radius: 0.5vw;
            
            background-color: #f9f9f9;

            font-size: 1.5vw;
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
            width: 45vw;
            margin-bottom: 20vw;
            padding: 2vw 2vw 2vw 3vw;
            border: 0.2vw solid #ccc;
            border-radius: 0.5vw;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;

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

            width: 24vw;
            height: 15vw;
            padding: 0.5vw;
            margin-top: 1vw;
            margin-bottom: 0.5vw;

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

        #editForm input[type=submit] {
            width: auto;
            font-size: 1.5vw;
        }
    </style>
</head>
<body>
    <h2>Modifier les informations d'un Profil</h2>
    <form id="loadProfil" action="admin_modif.php" method="get">

        <label for="pseudo">Nom du Profil:</label>
        <div class="line">
            <input autofocus type="search" list="pseudo" name="pseudo_recherche" maxlength="15" required>
            <datalist id="pseudo">
                <?php
                    $file = fopen("../data/profil_list.csv", "r");
                    while(!feof($file)){
                        $line = fgetcsv($file, 20, "]");
                        if(isset($line) && $line[0]!=""){
                            $pseudo =  $string = substr($line[0], 1);
                            if($pseudo != $_SESSION['pseudo']){
                                echo '<option value="'.$pseudo.'">';
                            }
                        }
                    }
                    fclose($file);
                ?>
            </datalist>
            <input type="submit" value="Rechercher">
        </div>

    </form>

<?php
    if(isset($_GET['pseudo_recherche'])){
        $pseudo = $_GET['pseudo_recherche'];
        $profilFile = "../data/profils/$pseudo/";
        if(file_exists($profilFile)){

            $profil_csv = $profilFile."profil.csv";
            $bio_csv = $profilFile."bio.csv";

            if(file_exists($profil_csv)){
                $file = fopen($profil_csv, "r");
                for($line = fgetcsv($file,1000,";", "\n", "\n"); !feof($file); $line = fgetcsv($file,1000,";", "\n", "\n")){
                    switch($line[0]){
                        case "perm":
                            $GLOBALS["info_perm"] = $line[1];
                            break;
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

            if(file_exists($bio_csv)) {
                $GLOBALS["info_bio"] = file_get_contents($bio_csv);
            }


            echo '
                    <form id="editForm" action="../scripts/process_modifProfil.php" method="post" enctype="multipart/form-data">
                        <div class="line">
                            <div class="column>
                                <label for="pseudo"></label>
                                <input type="hidden" id="pseudo" name="pseudo" value="'.$pseudo.'">

                                <label for="prenom">Prénom :</label><br>
                                <input type="text" id="prenom" name="prenom" value="'.$GLOBALS['info_prenom'].'"><br>

                                <label for="nom">Nom :</label><br>
                                <input type="text" id="nom" name="nom" value="'.$GLOBALS['info_nom'].'"><br>

                                <label for="email">Adresse email :</label><br>
                                <input type="email" id="email" name="email" value="'.$GLOBALS['info_mail'].'" readonly><br>

                                <label for="motdepasse">*Mot de passe :</label><br>
                                <input type="password" id="motdepasse" name="motdepasse" value="'.$GLOBALS['info_mdp'].'" readonly><br>

                                <label for="datenaissance">*Date de naissance :</label><br>
                                <input type="date" id="datenaissance" name="datenaissance" value="'.$GLOBALS['info_date_naissance'].'" readonly><br>

                                <label for="genre">*Genre :</label><br>
                                <input type="text" id="genre" name="genre" value="'.$GLOBALS['info_genre'].'" readonly>
                            </div>

                            <div class="column>
                                <label for="biographie">Biographie (max. 3000 caractères) :</label><br>
                                <textarea id="biographie" name="biographie" rows="5" maxlength="3000">'.$GLOBALS['info_bio'].'</textarea><br>

                                <label for="perm">Perm :</label><br>
                                <input type="number" id="perm" name="perm" value="'.$GLOBALS['info_perm'].'" min="1" max="3"><br><br>

                                <label for="photo">Photo de profil (< 1Mo) :</label><br>
                                <input type="file" id="photo" name="photo"><br> <!-- Champ pour télécharger la photo -->

                            </div>
                        </div>
                        <input type="submit" value="Enregistrer les modifications">
                    </form>
                ';
        }
        else{
            echo '<script>window.alert("Les infos de \''.$pseudo.'\' sont introuvables.")</script>';
        }
    }
?>
</body>
</html>