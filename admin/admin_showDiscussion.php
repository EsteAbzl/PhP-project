<!DOCTYPE html>
<?php
include 'template_admin.php';

?>
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

        .header_pfp {
            display: flex;
            flex-direction: line;
        }

        .header_disc img {
            position: relative;
            left: 47vw;
            
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
            top: 1.65vw;
            left: 0.5vw;

            text-align: right;

            font-size: 0.7vw;
            font-weight: bold;
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

        
        .message button#suppr {
            position: absolute;
            bottom: 0.5vw;
            right: 0.5vw;
           
            padding: 0.3vw;

            border: hidden;
            border-radius: 1vw;
            background-color: rgba(200, 0, 0, 0.2);
            
            color: rgba(0, 0, 0, 0.4);
            font-size: 0.9vw;
            
            transition: background-color 2s ease, color 0.9s ease;
            cursor: pointer;
        }

        .message button#suppr:hover {
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


            background-color: #f0f0f0;
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

<?php
if(isset($_GET['id'])){

$id_discussion = $_GET['id'];
$cheminFichier = '../data/discussions/'.$id_discussion.'.json'; // Chemin vers le fichier de discussion basé sur l'ID de discussion

$file = fopen($cheminFichier, "r");
$line_pseudo = fgets($file);
$pseudo = str_getcsv($line_pseudo, ";"); // tableau des pseudo de la discussion
$contenu = file_get_contents($cheminFichier, false, null, strlen($line_pseudo));
fclose($file);
// Décodage du contenu JSON 
$messages = json_decode($contenu, true);
?>

<div class="header_disc">
    <div class="header_pfp">
        <img src="../data/profils/<?php echo $pseudo[0];?>/pfp.png">
        <img src="../data/profils/<?php echo $pseudo[1];?>/pfp.png">
    </div>
    <h1><?php echo $pseudo[0]." et ".$pseudo[1];?></h1>
</div>

<?php
if($messages){
    echo '<div class="chat">';
    foreach($messages as $message){
        if(isset($message)){
            $sender_photo = '../data/profils/'.$message['sender'].'/pfp.png';
            $tailleMsg = (intdiv(strlen($message['message']), 40) + 1) * 3.1;
            $largeurMsg = strlen($message['message']) * 1.5;

            echo'<div class="line">';

            echo'<div class="message" style="height:'.$tailleMsg.'vw; width:'.$largeurMsg.'vw; ';
            if($message['sender'] == $pseudo[1]){ echo 'background-color: indianred; float: right;';}
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

                    .'<form action="../scripts/delete_message.php" method="post">'
                        .'<input type="hidden" name="id_message" value="'.$message['id'].'">'
                        .'<input type="hidden" name="id_discussion" value="'.$id_discussion.'">'
                        
                        .'<button type="submit" name="report" id="suppr">Supprimer</button>'
                    .'</form>'
                    
                .'</div>'// message
            .'</div>'; // line
        }
    }

    echo '<span id="bas_discussion"></span></div>'; //chat
    
}
else{
    echo'<div class="chat"><span class="chat_vide">
    Aucun message n\'a été échangé pour l\'instant.
    </span></div>';
}
}
else{
echo "Paramètres manquants dans l'URL.";
}
?>
