<?php
    include 'template_admin.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs bannis</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
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