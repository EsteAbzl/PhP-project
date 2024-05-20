<?php

include 'check_session.php';


function resetSignlementFile() {


    $filePath = '../data/signalements.csv';

    $file = fopen($filePath, "w");
    fwrite($file, "PSEUDO;MSG;DATE;ID_DISCUTION;\n");
    fclose($file);

    echo "Le fichier signalements.csv a été réinitialisé avec succès.";
    echo "<script>location.href=\"../admin/admin_signalements.php\";</script>";
    exit;
}

resetSignlementFile();
?>