<?php

include 'scripts/check_session.php';
include 'add_notifs_2.php'

$pseudo_recevant = isset($_GET['pseudo']) ? $_GET['pseudo'] : '';

//Notification d'abonnement
function abo($pseudo_recevant) {
    // Validation des entrées
    if (empty($_SESSION['pseudo']) || empty($pseudo_recevant)) {
        echo "Pseudo manquant.";
        return;
    }

    $sessionPseudo = $_SESSION['pseudo'];
    $filePath = 'data/discussions/nbr.csv';

    // Chemin du fichier contacts du recevant
    $fileRecevant = 'data/profils/' . $pseudo_recevant . '/contacts.csv';

    // Vérifier si le pseudo se trouve déjà dans le fichier contacts du recevant
    if (file_exists($fileRecevant)) {
        $contactsContent = file_get_contents($fileRecevant);
        if (preg_match("/^" . preg_quote($sessionPseudo, '/') . ";/m", $contactsContent)) {
            echo "Vous êtes déjà en contact avec cet utilisateur.";
            return;
        }
    }

    // Vérifier si le fichier nbr.csv existe et le créer si nécessaire
    if (!file_exists($filePath)) {
        file_put_contents($filePath, '0');
    }

    // Lire le nombre actuel et le convertir en entier
    $nbr = (int)file_get_contents($filePath);

    // Message de début de discussion
    $message = "Commencer la discussion avec " . $sessionPseudo . " maintenant !";

    $nouveauMessage = array(
        "sender" => $sessionPseudo,
        "message" => $message,
        "timestamp" => date("Y-m-d H:i:s")
    );

    // Créer le fichier JSON et y écrire le message
    $jsonFilePath = "data/discussions/{$nbr}.json";
    if (!file_put_contents($jsonFilePath, json_encode(array($nouveauMessage)))) {
        echo "Impossible d'écrire dans le fichier JSON.";
        return;
    }

    // Infos pour ajouter dans le fichier contacts du recevant
    $dataRecevant = $sessionPseudo . ";" . $nbr . "\n";

    // Infos pour ajouter dans le fichier contacts de celui qui s'abo
    $fileAbonnement = 'data/profils/' . $sessionPseudo . '/contacts.csv';
    $dataAbonnement = $pseudo_recevant . ";" . $nbr . "\n";    

    // Créer les dossiers si nécessaires
    if (!file_exists(dirname($fileRecevant))) {
        mkdir(dirname($fileRecevant), 0777, true);
    }
    if (!file_exists(dirname($fileAbonnement))) {
        mkdir(dirname($fileAbonnement), 0777, true);
    }

    // Écrire dans le fichier du recevant
    if (file_put_contents($fileRecevant, $dataRecevant, FILE_APPEND) === false) {
        echo "Impossible d'écrire dans le fichier contacts du recevant.";
        return;
    }

    // Écrire dans le fichier de celui qui s'abo
    if (file_put_contents($fileAbonnement, $dataAbonnement, FILE_APPEND) === false) {
        echo "Impossible d'écrire dans le fichier contacts de l'abonné.";
        return;
    }

    // Incrémenter le nombre et mettre à jour nbr.csv
    $nbr++;
    if (file_put_contents($filePath, (string)$nbr) === false) {
        echo "Impossible de mettre à jour nbr.csv.";
        return;
    }

    addNotification2($pseudo_recevant);

}



abo($pseudo_recevant);
?>