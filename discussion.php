<?php
include 'scripts/check_session.php';
include 'scripts/check_premium.php';
include 'template.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dater | Site de Rencontre</title>
    <style>
        body {
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            font-family: 'Quicksand', sans-serif;
        }

        .header_disc {
            position: relative;
            
            width: 100vw;
            height: 15vw;

            margin-bottom: 3vw;
            padding: 0;

            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;

            text-align: center;
        }

        .header_disc img {
            position: relative;
            left: 53vw;
            
            width: 10vw;
            height: 10vw; 
            
            border-radius: 50%;
            border-color: rgba(255, 255, 255, 0.494);
            border-style: solid;
        }

        .header_disc h1 {
            position: relative;
            bottom: 2vw;
            left: 8vw;

            font-family: 'against.projet';
            color: gold;
            font-size: 3vw;
        }

        .chat {
            position: absolute;
            width: 71vw;
            padding-bottom: 30vw; /* Pour laisser de l'espace pour la barre d'envoi de message */


            background-color: transparent;
            left: 25vw; /* Ajustement pour ne pas être caché par .sommaire */

            display: flex;
            flex-direction: column;
        }

        .chat_vide {
            font-size: 2vw;
            color: white;
        }

        .line {
            width: inherit;
        
            margin-bottom: 1vw;
        }

        .message {
            position: relative;
            max-width: 45vw; min-width: 20vw;
            min-height: 7vw; // modifié selon la taille du message signalé

            overflow: hidden;

            background-color: #f0f0f0;
            border-radius: 1vw; /* Bords arrondis */

            display: flex;
        }
        
        .profil-photo {
            float: left;
            width: 5vw;
            height: 5vw;

            margin: 0.5vw 1vw 0 0.5vw;

            border-radius: 100%;
        }

        .message_content{
            display: flex;
            flex-direction: column;
        }

        .message_info{
            display: flex;
        }

        .pseudo {
            position: relative;
            top: 1vw;

            color: black;
            font-weight: bold;
            font-size: 1.5vw;
        }

        .timestamp {
            position: relative;
            top: 1.69vw;
            left: 0.3vw;

            margin-right:1vw;

            text-align: right;

            font-family: 'Quicksand';
            font-size: 0.7vw;
            color: rgb(100, 100, 100);
        }

        .message-text {
            position: relative;
            top: 1vw;

            max-width: 38vw;
            width: 38vw;

            background-color: hidden;

            color: black;
            font-size: 1.5vw;
        }

        
        .message button {
            position: absolute;
            bottom: 0.5vw;
            right: 0.5vw;
           
            padding: 0.3vw;

            border: hidden;
            border-radius: 1vw;
            background-color: rgba(200, 0, 0, 0.01);
            
            color: rgba(0, 0, 0, 0.1);
            font-size: 0.9vw;
            
            transition: background-color 2s ease, color 0.9s ease;
            cursor: pointer;
        }

        .message button:hover {
            background-color: rgba(200, 0, 0, 0.8);
            color: white;
        }

        #message-form {
            font-size: 0;
        }

        #chat-bar {
            position: fixed;
            bottom: 1vw;
            left: 33vw;
            width: 50vw;
            height: 7vw;


            background-color: #f0f0f0aa;
            padding: 2vw;
            margin: 0;
            border: solid;
            border-radius: 1vw; /* Bords arrondis */
        }

        #chat-bar input[type="text"] {
            width: 70%;
            padding: 1vw;

            border: hidden;
            outline: transparent;
            border-radius: 1vw; /* Bords arrondis */
            margin-right: 1vw;
            font-size: 1vw;
        }

        #chat-bar button {
            position: absolute;
            bottom: 1vw;
            right: 1vw; 
            width: 6vw;
            height: 3vw;

            padding: 0;

            border: hidden;
            border-radius: 3vw; /* Bords arrondis */
            background-color: #007bff;

            color: white;
            font-size: 1vw;
            cursor: pointer;
        }

    </style>
</head>
<body>

<div class="header_disc">
        <img src="data/profils/<?php echo $_GET['pseudo'];?>/pfp.png">
        <h1><?php echo $_GET['pseudo'];?></h1>
</div>


<?php
if(isset($_GET['id'])){

    $id_discussion = $_GET['id'];
    $cheminFichier = 'data/discussions/'.$id_discussion.'.json'; // Chemin vers le fichier de discussion basé sur l'ID de discussion
    
    $file = fopen($cheminFichier, "r");
    $pseudo_conv_line = fgets($file);
    fclose($file);

    $pseudo_conv = str_getcsv($pseudo_conv_line, ";");
    if(($_SESSION['pseudo'] != $pseudo_conv[0]) && ($_SESSION['pseudo'] != $pseudo_conv[1])){
        echo '<script>location.href="./homepage.php";</script>';
    }

    $contenu = file_get_contents($cheminFichier, false, null, strlen($pseudo_conv_line));
    // Décodage du contenu JSON 
    $messages = json_decode($contenu, true);
    if($messages){

        echo '<div class="chat">';
        foreach($messages as $message){
            if(isset($message)){
                $sender_photo = 'data/profils/'.$message['sender'].'/pfp.png';
                $tailleMsg = (intdiv(strlen($message['message']), 40) + 1) * 3.1;
                $largeurMsg = strlen($message['message']) * 1.5;
        
                echo'<div class="line">';
    
                echo'<div class="message" style="height:'.$tailleMsg.'vw; width:'.$largeurMsg.'vw; ';
                if($message['sender'] == $_SESSION['pseudo']){ echo 'background-color: lightgreen; float: right;';}
                else{ echo 'background-color: lightblue;';}
                echo '">';
                        
                echo    '<img class="profil-photo" src="'.$sender_photo.'" alt="Photo de profil">'
                        .'<div class="message_content">'
                            .'<div class="message_info">'
                                .'<div class="pseudo">'.$message['sender'].'</div>'
                                .'<div class="timestamp">'.$message['timestamp'].'</div>'
                            .'</div>'
                                                
                            .'<div class="message-text" >'.$message['message'].'</div>'
                        .'</div>'
    
                        .'<form action="scripts/add_signalement.php" method="post">'
                            .'<input type="hidden" name="sender" value="'.$message['sender'].'">'
                            .'<input type="hidden" name="message" value="'.$message['message'].'">'
                            .'<input type="hidden" name="timestamp" value="'.$message['timestamp'].'">'
                            .'<input type="hidden" name="id" value="'.$id_discussion.'">'
                            
                            .'<button type="submit" name="report">Signaler</button>'
                        .'</form>'
                        
                    .'</div>'// message
                .'</div>'; // line
            }
        }

        echo '<span id="bas_discussion"></span></div>'; //chat
        
    }
    else{
        echo'<div class="chat"><span class="chat_vide">
        Vous n\'avez pas encore reçu de message de la part de <strong>'.$_GET['pseudo'].'</strong>..<br>
        Soyez le premier à briser la glasse !
        </span></div>';
    }
}
else{
    echo "Paramètres manquants dans l'URL.";
}
?>




<div id="chat-bar">
    <form id="message-form" autocomplete ="off" onsubmit="envoyerMessage(event)">
        <input type="hidden" name="id_discussion" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">
        <input type="hidden" name="pseudo" value="<?php echo isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : ''; ?>">
        <input type="hidden" name="lien_photo" value="data/profils/<?php echo isset($_SESSION['profil']) ? $_SESSION['profil'] : ''; ?>/pfp.png">
        <input type="text" name="message" id="message" maxlength="300" placeholder="Nouveau message">
        <button onclick="envoyerNotif()"  type="submit">Envoyer</button>
    </form>
</div>

<script>
    location.href="#bas_discussion";
    document.getElementById("message").focus();

    function envoyerNotif() {
        // Récupération de la valeur de pseudo
        var pseudo = encodeURIComponent('<?php echo isset($_GET['pseudo']) ? $_GET['pseudo'] : ''; ?>');

        var xhr = new XMLHttpRequest();
        var params = 'pseudo=' + pseudo;

        xhr.open('GET', 'scripts/notifs/add_notifs_1.php?' + params, true);
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
        xhr.open("POST", "scripts/add_message.php", true);
        xhr.send(formData);
    }
</script>

</body>
</html>