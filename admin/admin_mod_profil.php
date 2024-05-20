<?php

$profil_dir = "../data/profils/" . $_POST['pseudo_base'];
$profil_csv = $profil_dir . "/profil.csv";
$bio_csv = $profil_dir . "/bio.csv"; 
$pfp_path = $profil_dir . "/pfp.jpg"; 



$new_pseudo = $_POST['pseudo'];
$new_motdepasse = $_POST['motdepasse'];
$new_nom = $_POST['nom'];
$new_prenom = $_POST['prenom'];
$new_datenaissance = $_POST['datenaissance'];
$new_email = $_POST['email'];
$new_genre = $_POST['genre'];
$new_biographie = $_POST['biographie'];



$ligne2 = file($profil_csv)[1];




$new_data = "ELEMENT;VALEUR;\n";
$new_data .= $ligne2; // Ajout de la ligne 2 en mémoire
$new_data .= "mdp;$new_motdepasse;\n";
$new_data .= "nom;$new_nom;\n";
$new_data .= "prenom;$new_prenom;\n";
$new_data .= "date_naissance;$new_datenaissance;\n";
$new_data .= "mail;$new_email;\n";
$new_data .= "genre;$new_genre;\n";

// Supprimer le fichier profil.csv existant
unlink($profil_csv);

// Créer le nouveau fichier profil.csv avec les nouvelles données
file_put_contents($profil_csv, $new_data);




if (file_exists($bio_csv)) {

    unlink($bio_csv);

}

// Créer le nouveau fichier bio.csv avec la nouvelle biographie
file_put_contents($bio_csv, $new_biographie);


if (file_exists($pfp_path)) {

    unlink($pfp_path);

}

// Renommer et déplacer la nouvelle photo de profil
if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {

    $temp_file = $_FILES['photo']['tmp_name'];
    $new_pfp_path = $profil_dir . "/pfp.jpg";



    if (move_uploaded_file($temp_file, $new_pfp_path)) {
        echo "La photo de profil a été mise à jour avec succès.";

    } else {

        echo "Une erreur est survenue lors du téléchargement de la nouvelle photo de profil.";
    }
} else {
    
    echo "Une erreur est survenue lors de la réception de la nouvelle photo de profil.";
}

$nouveauChemin = "../data/profils/" . $new_pseudo;



if (rename($profil_dir, $nouveauChemin)) {



    $_SESSION['pseudo'] = $new_pseudo;

    echo "<script>location.href=\"template_admin.php\";</script>"; // Redirection vers le profil

    exit();
} else {
    echo "Une erreur est survenue lors du renommage du dossier.";
}
?>