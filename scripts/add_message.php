<?php


if($_SERVER["REQUEST_METHOD"] === "POST"){


    $id_discussion = $_POST['id_discussion'];
    $pseudo = $_POST['pseudo'];
    $message = $_POST['message'];

   
    if ($id_discussion !== '' && $pseudo !== '' && $message !== '') {

        $cheminFichier = '../data/discussions/' . $id_discussion . '.json';
        
        date_default_timezone_set('CST');
        $date = new DateTimeImmutable();

        $nouveauMessage = array(
            "sender" => $pseudo,
            "message" => $message,
            "timestamp" => $date->format("\L\\e d/m/Y à H:i:s"),
            "id" => -1
        );

        $file = fopen($cheminFichier, "r");
        $line_pseudo = fgets($file);
        fclose($file);

        // Décoder le contenu JSON
        $contenuActuel = file_get_contents($cheminFichier, false, null, strlen($line_pseudo));
        $messages = json_decode($contenuActuel, true);

        $nouveauMessage['id'] = (isset($messages))? count($messages) : 0;
        $messages[] = $nouveauMessage;

        $nouveauContenu = $line_pseudo.json_encode($messages, JSON_UNESCAPED_UNICODE);


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