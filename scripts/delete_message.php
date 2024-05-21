<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $id_discussion = $_POST['id_discussion'];
    $id_message = $_POST['id_message'];

    if ($id_discussion !== '' && $id_message !== ''){
        $cheminFichier = '../data/discussions/'.$id_discussion.'.json';


        $file = fopen($cheminFichier, "r");
        $line_pseudo = fgets($file);
        fclose($file);

        // Décoder le contenu JSON
        $contenuActuel = file_get_contents($cheminFichier, false, null, strlen($line_pseudo));
        $messages = json_decode($contenuActuel, true);

        // Suppréssion du message donné
        $messages[$id_message] = NULL;

        $nouveauContenu = $line_pseudo.json_encode($messages, JSON_UNESCAPED_UNICODE);
        file_put_contents($cheminFichier, $nouveauContenu);

    
        echo "<script>history.go(-1)</script>";
    }
    else{
    }
}

?>