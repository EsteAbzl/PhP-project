<?php
    include 'template_admin.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs bannis</title>
    <style>
        body {
            position: absolute;
            left: 28vw;
            top: 10vw;

            margin: 0;
        }

        .container {
            position: relative;
            width: 50vw;
            padding: 4vw;
            padding-top: 2vw;
            margin-bottom: 20vw;

            border: 0.2vw solid #ccc;
            border-radius: 0.5vw;

            background-color: #f9f9f9;

            font-size: 2vw;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 0.2vw solid #ddd;
            padding: 2vw;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Liste des addresses bannis</h2>
        <table>
            <tr>
                <th>Mail:</th>
            </tr>
            <?php
            // Chemin vers le fichier blacklist.csv
            $blacklistFile = "../data/blacklist.csv";

            // Vérifier si le fichier existe
            if(file_exists($blacklistFile)) {
                // Lire le contenu du fichier en tant que tableau
                $bannedUsers = file($blacklistFile, FILE_IGNORE_NEW_LINES);

                // Afficher chaque utilisateur banni dans une ligne de tableau
                foreach ($bannedUsers as $user) {
                    echo "<tr><td>$user</td></tr>";
                }
            } else {
                echo "<tr><td>Aucun utilisateur banni</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>