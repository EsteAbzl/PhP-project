<?php

session_start();

/*echo "  Info de session</br>
        ||[Profil]: ".$_SESSION['pseudo']."</br>
        ||[Permission]: ".$_SESSION['perm'];
*/
if(!isset($_SESSION['perm']) || $_SESSION['perm'] == 0){

    echo '  <script>
                    widow.alert("Vous n\'êtes pas connecté.")
                </script>';
    
    echo '<script>location.href="../accueil.php";</script>';
}

include 'notifs/add_notifs_2.php';

$pseudo_recevant = isset($_GET['pseudo']) ? $_GET['pseudo'] : '';

//Notification d'abonnement
function abo($pseudo_recevant) {
    // Validation des entrées
    if(empty($_SESSION['pseudo']) || empty($pseudo_recevant)) {
        echo "Pseudo manquant.";
        return;
    }

    $sessionPseudo = $_SESSION['pseudo'];
    $filePath = '../data/discussions/nbr.csv';

    // Chemin du fichier contacts du recevant
    $fileRecevant = '../data/profils/'.$pseudo_recevant.'/contacts.csv';

    // Vérifier si le pseudo se trouve déjà dans le fichier contacts du recevant
    if(file_exists($fileRecevant)){
        if(str_contains(file_get_contents($fileRecevant), $sessionPseudo)){
            echo "Cet utilisateur vous a déjà en contact.";
            return;
        }
    }

    // Vérifier si le fichier nbr.csv existe et le créer si nécessaire
    if(!file_exists($filePath)){
        file_put_contents($filePath, '0');
    }
    // Lire le nombre actuel et le convertir en entier
    $nbr = (int)file_get_contents($filePath);

    // Créer le fichier JSON
    $jsonFilePath = "../data/discussions/{$nbr}.json";
    $tmp = fopen($jsonFilePath, "w");
    fclose($tmp);

    // Infos pour ajouter dans le fichier contacts du recevant
    $dataRecevant = $sessionPseudo . ";" . $nbr . "\n";

    // Infos pour ajouter dans le fichier contacts de celui qui s'abo
    $fileAbonnement = '../data/profils/'.$sessionPseudo.'/contacts.csv';
    $dataAbonnement = $pseudo_recevant.";".$nbr."\n";    

    // Créer les dossiers si nécessaires
    if(!file_exists(dirname($fileRecevant))){
        mkdir(dirname($fileRecevant), 0777, true);
    }

    if(!file_exists(dirname($fileAbonnement))) {
        mkdir(dirname($fileAbonnement), 0777, true);
    }

    // Écrire dans le fichier du recevant
    if(file_put_contents($fileRecevant, $dataRecevant, FILE_APPEND) === false){
        echo "Impossible d'écrire dans le fichier contacts du recevant.";
        return;
    }

    // Écrire dans le fichier de celui qui s'abo
    if(file_put_contents($fileAbonnement, $dataAbonnement, FILE_APPEND) === false){
        echo "Impossible d'écrire dans le fichier contacts de l'abonné.";
        return;
    }

    // Incrémenter le nombre et mettre à jour nbr.csv
    $nbr++;
    if(file_put_contents($filePath, (string)$nbr) === false) {
        echo "Impossible de mettre à jour nbr.csv.";
        return;
    }

    addNotification2($pseudo_recevant);
}

// main    
abo($pseudo_recevant);
?>