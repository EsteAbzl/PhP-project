<?php
    include 'template_admin.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de bannissement</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        input[type=text] {
            width: 100%;
            padding: 10px;
            margin: 6px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Modifier informations</h2>
    <form action="admin_mod_profil.php" method="post">

    <label for="pseudo_base">Pseudo de la personne:</label><br>
    <input type="text" id="pseudo_base" name="pseudo_base" maxlength="15" required><br>

    <label for="pseudo">Nouveau Pseudo :</label><br>
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

    <label for="photo">Photo de profil :</label><br>
    <input type="file" id="photo" name="photo"><br> <!-- Champ pour télécharger la photo -->
        <input type="submit" value="Modifier">
    </form>
</body>
</html>