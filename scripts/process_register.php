<?php
    /*
        Vérifie si un nouveau compte peut être créé.
        Crée et initialise les fichier en lien avec le nouveau profil
    */

    
    function verif($pseudo){
    /*Vérifie la conformitée du nouveau compte*/

        $caracteresInterdit = '/[][(){}<>\/+"*%&=?`^\'!$_:;,-]/';
        
        // Si la chaîne contient des caractères spéciaux
        if(preg_match($caracteresInterdit, $pseudo, $matches)){
            echo "<script>
                    window.alert(\"Le pseudo ne doit pas contenir de caractères spéciaux\");
                    history.back();
                </script>";
            return 0;
        }
        
        // On vérifie si le pseudo est déjà utilisé
        $file = fopen("../data/profil_list.csv", "r") or die("erreur lors de l'ouverture de 'profil_list.csv'");
        if(str_contains(fread($file, filesize("../data/profil_list.csv")+1), '['.$pseudo.']')){
            echo "<script>
                window.alert(\"Ce pseudo n'est pas disponible.\");
                history.back();
            </script>";
            return 0;
        }
        fclose($file);
        
        // On vérifie que le mail n'est pas banni
        $file = fopen("../data/blacklist.csv", "r") or die("erreur lors de l'ouverture de 'blacklist.csv'");
        if(str_contains(fread($file, filesize("../data/blacklist.csv")+1), '['.$_POST['email'].']')){
            echo "<script>
                window.alert(\"Cette adresse mail est bannie.\");
                history.back();
            </script>";
            return 0;
        }
        fclose($file);

        return 1;
    }
    
    function creationProfil($pseudo){
    /*Création et modification des fichiers liés au nouveau profil*/
        echo "<script>
                window.alert(\"Création du profil..\");
            </script>";

        $file = fopen("../data/profil_list.csv", "a");
        fwrite($file, '['.$pseudo."]\n");
        fclose($file);

        mkdir("../data/profils/".$pseudo);
        $file = fopen("../data/profils/".$pseudo."/profil.csv", "w");
        fwrite($file,   "ELEMENT;VALEUR;\n"
                        ."perm;1;\n"
                        ."mdp;".$_POST['motdepasse'].";\n"
                        ."nom;".$_POST['nom'].";\n"
                        ."prenom;".$_POST['prenom'].";\n"
                        ."date_naissance;".$_POST['datenaissance'].";\n"
                        ."mail;".$_POST['email'].";\n"
                        ."genre;".$_POST['genre'].";\n");
        fclose($file);

        $file = fopen("../data/profils/".$pseudo."/visiteurs.csv", "w");
        fwrite($file,   "PSEUDO;NB_VISITE;\n");
        fclose($file);

        $file = fopen("../data/profils/".$pseudo."/discussion.csv", "w");
        fwrite($file,   "PSEUDO;ID_DISCUSSION;\n");
        fclose($file);

        $file = fopen("../data/profils/".$pseudo."/contacts.csv", "w");
        fwrite($file,   "PSEUDO;NB_VISITE;\n");
        fclose($file);

        $file = fopen("../data/profils/".$pseudo."/notifs.csv", "w");
        fwrite($file,   "PSEUDO;NB_VISITE;\n");
        fclose($file);
    }


// Main:
    $pseudo = $_POST['pseudo'];

    if(verif($pseudo)){

        creationProfil($pseudo);
    
        echo "<script>location.href=\"../accueil.php\";</script>";
    }

?>