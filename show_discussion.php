<!DOCTYPE html>
<?php
include 'scripts/check_session.php';
include 'template.php';
include 'add_notifs.php';

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
    if (isset($_GET['id'])) {
        
        $id_discussion = $_GET['id'];

        $cheminFichier = 'data/discussions/' . $id_discussion . '.json'; // Chemin vers le fichier de discussion basé sur l'ID de discussion
        $contenu = file_get_contents($cheminFichier);

        // Décodage du contenu JSON 
        $messages = json_decode($contenu, true);

        foreach ($messages as $message) {
            // Récupérer le chemin de la photo de profil de l'expéditeur
            $sender_photo = 'data/profils/' . $message['sender'] . '/pfp.jpg';

            echo '<div class="message">';
            echo '<img class="profil-photo" src="' . $sender_photo . '" alt="Photo de profil">';
            echo '<div class="message-content">';
            echo '<div class="pseudo">' . $message['sender'] . '</div>';
            echo '<div class="message-text" >' . $message['message'] . '</div>';
            echo '<div class="timestamp"><small>' . $message['timestamp'] . '</small></div>';
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

<div id="chat-bar">
    <form id="message-form" autocomplete ="off" onsubmit="envoyerMessage(event)">
        <input type="hidden" name="id_discussion" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <input type="hidden" name="pseudo" value="<?php echo isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : ''; ?>">
        <input type="hidden" name="lien_photo" value="data/profils/<?php echo isset($_SESSION['profil']) ? $_SESSION['profil'] : ''; ?>/pfp.jpg">
        <input type="text" name="message" id="message" maxlength="300" placeholder="Envoyez un message">
        <button onclick="addNotification1($_GET['pseudo'])" type="submit">Envoyer</button>
    </form>
</div>

<script>
    function envoyerMessage(event) {
        event.preventDefault(); // Empêcher le formulaire de se soumettre normalement

        var formData = new FormData(document.getElementById("message-form"));

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log("Message envoyé avec succès.");
                    window.location.reload(); // Recharger la page pour afficher le nouveau message
                } else {
                    console.error("Erreur lors de l'envoi du message : " + xhr.status);
                }
            }
        };
        xhr.open("POST", "scripts/envoyer_message.php", true);
        xhr.send(formData);
    }
</script>

</body>
</html>