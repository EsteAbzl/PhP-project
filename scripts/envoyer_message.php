<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {


    $id_discussion = $_POST['id_discussion'];
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];

   
    if ($id_discussion !== '' && $pseudo !== '' && $message !== '') {

        $cheminFichier = '../data/discussions/' . $id_discussion . '.json';


        $nouveauMessage = array(
            "sender" => $pseudo,
            "message" => $message,
            "timestamp" => date("Y-m-d H:i:s")
        );


        $contenuActuel = file_get_contents($cheminFichier);

        // Décoder le contenu JSON en un tableau associatif
        $messages = json_decode($contenuActuel, true);


        $messages[] = $nouveauMessage;

        // Encoder le tableau en JSON
        $nouveauContenu = json_encode($messages, JSON_UNESCAPED_UNICODE);


        file_put_contents($cheminFichier, $nouveauContenu);

        // Répondre avec un statut HTTP 200 (OK)
        http_response_code(200);
    } else {
        // Répondre avec un statut HTTP 400 (Bad Request)
        http_response_code(400);
    }
} else {
    // Répondre avec un statut HTTP 405 (Method Not Allowed)
    http_response_code(405);
}
?>