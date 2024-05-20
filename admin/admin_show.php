<!DOCTYPE html>
<?php
include 'template_admin.php';

?>
<html>
<head>
    <title>Dater | Site de Rencontre</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Quicksand', sans-serif;
        }

        #discussion {
            padding-bottom: 70px; /* Pour laisser de l'espace pour la barre d'envoi de message */
            margin-left: 25vw; /* Ajustement pour ne pas être caché par .sommaire */
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f0f0f0;
            overflow: hidden;
            border-radius: 15px; /* Bords arrondis */
        }

        .profil-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            float: left;
        }

        .message-content {
            font-size: 16px;
            color: black;
        }

        .pseudo {
            font-weight: bold;
            font-size: 18px;
            color: black;
            margin-bottom: 5px;
        }

        .message-text {
            font-size: 16px;
            color: black;
        }

        .timestamp {
            font-size: 12px;
            color: grey;
        }

        #chat-bar {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 500px;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 25px; /* Bords arrondis */
        }

        #chat-bar input[type="text"] {
            width: calc(100% - 100px);
            padding: 8px;
            border: none;
            border-radius: 20px; /* Bords arrondis */
            margin-right: 10px;
            font-size: 16px;
        }

        #chat-bar button {
            width: 80px;
            height: 40px;
            border: none;
            border-radius: 20px; /* Bords arrondis */
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
function afficherDiscussion() {
    if (isset($_POST['id'])) {
        
        $id_discussion = $_POST['id'];

        $cheminFichier = '../data/discussions/' . $id_discussion . '.json'; // Chemin vers le fichier de discussion basé sur l'ID de discussion
        $contenu = file_get_contents($cheminFichier);

        // Décodage du contenu JSON 
        $messages = json_decode($contenu, true);

        foreach ($messages as $message) {
            // Récupérer le chemin de la photo de profil de l'expéditeur
            $sender_photo = 'data/profils/' . $message['sender'] . '/pfp.png';

            echo '<div class="message">';
            echo '<img class="profil-photo" src="' . $sender_photo . '" alt="Photo de profil">';
            echo '<div class="message-content">';
            echo '<div class="pseudo">' . $message['sender'] . '</div>';
            echo '<div class="message-text" >' . $message['message'] . '</div>';
            echo '<div class="timestamp"><small>' . $message['timestamp'] . '</small></div>';


            echo '<form action="signalement.php" method="post">';
            echo '<input type="hidden" name="sender" value="' . $message['sender'] . '">';
            echo '<input type="hidden" name="message" value="' . $message['message'] . '">';
            echo '<input type="hidden" name="timestamp" value="' . $message['timestamp'] . '">';
            echo '<input type="hidden" name="id" value="' . $id_discussion . '">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }

    } else {
        echo "Paramètres manquants dans l'URL.";
    }
}

?>

<div id="discussion">
    <?php afficherDiscussion(); ?>
</div>
