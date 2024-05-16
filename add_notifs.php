<?php

include 'scripts/check_session.php';

//Notification de message (Machin vous à envoyé un message)
function addNotification1($pseudo_recevant) {
    $file = 'data/profils/' . $pseudo_recevant . '/notifs.csv';
    $data = $_SESSION['pseudo'] . " vous a envoyé un message.\n";

    $current = file_get_contents($file);

    $temp = fopen($file, 'w');
    fwrite($temp, $data . "\n");
    fwrite($temp, $current);
    fwrite($temp, "\n");
    fclose($temp);
}


?>