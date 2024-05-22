<?php
include 'check_session.php';

$profil_dir = "../data/profils/" . $_POST['pseudo'];
$profil_csv = $profil_dir . "/profil.csv";
$bio_csv = $profil_dir . "/bio.csv"; 
$pfp_link = $profil_dir . "/pfp.png"; 


$new_motdepasse = $_POST['motdepasse'];
$new_nom = $_POST['nom'];
$new_prenom = $_POST['prenom'];
$new_datenaissance = $_POST['datenaissance'];
$new_email = $_POST['email'];
$new_genre = $_POST['genre'];
$new_biographie = $_POST['biographie'];


$endline = ";                    \n"; // 20 espaces

if(isset($_POST['perm'])){
    $new_perm = $_POST['perm'];
    $perm = "perm;".$new_perm.$endline;
}
else{
    $perm = file($profil_csv)[1];
}


$new_data = "ELEMENT;VALEUR".$endline
            .$perm
            ."mdp;".$new_motdepasse.$endline
            ."nom;".$new_nom.$endline
            ."prenom;".$new_prenom.$endline
            ."date_naissance;".$new_datenaissance.$endline
            ."mail;".$new_email.$endline
            ."genre;".$new_genre.$endline;

// Supprimer le fichier profil.csv existant
unlink($profil_csv);

// Créer le nouveau fichier profil.csv avec les nouvelles données
file_put_contents($profil_csv, $new_data);




if(file_exists($bio_csv)) {
    unlink($bio_csv);
}
file_put_contents($bio_csv, $new_biographie);


// Renommer et déplacer la nouvelle photo de profil
if(isset($_FILES['photo'])){
    if($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    
        unlink($pfp_link);
        $temp_file = $_FILES['photo']['tmp_name'];
        $new_pfp_path = $profil_dir."/pfp.png";
    
    
    
        if (move_uploaded_file($temp_file, $new_pfp_path)) {
            echo "<script>window.alert('La photo de profil a été mise à jour avec succès.')</script>";
    
        } 
        else{
            echo "<script>window.alert('Une erreur est survenue lors du téléchargement de la nouvelle photo de profil.')</script>";
        }
    }
}

echo "<script>history.go(-1)</script>";

?>