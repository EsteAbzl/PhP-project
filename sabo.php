<?php

include 'scripts/check_session.php';

$pseudo_recevant = isset($_GET['pseudo']) ? $_GET['pseudo'] : '';

//Notification d'abonnement
function abo($pseudo_recevant) {


    //Crea de la discussion commune :
    $filePath = 'data/discussions/nbr.csv';
    f (!file_exists($filePath)) {
        file_put_contents($filePath, '0');
    }
    
    $nbr = (int)file_get_contents($filePath);


    //Message de début de discussion :
    $message = "Commencer la discussion avec" . $_SESSION['pseudo'] . "maintenant !";

    $nouveauMessage = array(
        "sender" => $_SESSION['pseudo'],
        "message" => $message,
        "timestamp" => date("Y-m-d H:i:s")
    );

    // Créer le fichier JSON et y écrire le message
    $jsonFilePath = "data/discussions/{$nbr}.json";

    file_put_contents($jsonFilePath, json_encode($nouveauMessage));

//Info pour ajouter dans le recevant contact.csv
$file = 'data/profils/'. $pseudo_recevant .'contacts/.csv';
$data = $_SESSION['pseudo'] . ";" . $nbr . "\n";



//Info pour ajouter dans contact.csv de celui qui s'abo. :
$file2 = 'data/profils/'. $_SESSION['pseudo'] .'contacts/.csv';
$data2 = $pseudo_recevant . ";" .$nbr. "\n";    

$handle = fopen($file, 'a');
if ($handle) {

    fwrite($handle, $data);
    fclose($handle);

} else {
    echo "Impossible d'ouvrir le fichier pour écriture.";
}

$handle = fopen($file2, 'a');
if ($handle) {

    fwrite($handle, $data2);
    fclose($handle);

} else {
    echo "Impossible d'ouvrir le fichier pour écriture.";
}




    // Incrémenter le nombre et mettre à jour nbr.csv
    $nbr++;
    file_put_contents($filePath, $nbr);
}

abo($pseudo_recevant);
?>