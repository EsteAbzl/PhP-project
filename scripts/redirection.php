
<?php
const ADMIN = 3;
const PREMIUM = 2;
const LOGGED = 1;
const VISITOR = 0;

$GLOBALS['perm'] = VISITOR; // Cette variable sera remplacé par une variable de session
$GLOBALS['pages'] = array(  'accueil'=>"Accueil.php", 
                            'error'=>"error.php"); // Liste de toutes les pages
                            /*recherche, notif, messagerie, profil, achat, parametres*/ 
?>



<script>
    function redirection(page){
        window.alert("activation du portail interspacial 👴");
        switch(page){                
            
            case 'accueil':
                <?php
                    if($GLOBALS['perm'] <= LOGGED){ // c'est juste pour tester des condition, c'est pas définitif
                        echo "location.href=\"".$GLOBALS['pages']['accueil']."\";";
                    }
                    else{
                        echo "location.href=\"".$GLOBALS['pages']['error']."\";";
                    }
                    ?>
                break;
                
            case 'error':
                <?php
                    echo "location.href=\"".$GLOBALS['pages']['error']."\";";
                ?>
                break;

            default:
                location.href="CETTE_PAGE_N'EXISTE_PAS_ENCORE????_MAIS_NANNNNNN_FAUT_ENCORE_TRAVAILLERRRRR";
                break;

        }
    }
</script>
    
<!-- Affichage permettant de tester le script -->
<!--
<!DOCTYPE html>
<head>
    <title>Test de script</title>
</head>
<body>
    <h1>Test de script</h1>
    <button onclick="redirection('accueil')">Vers Test [admin only]</button><button onclick="redirection('error')">Vers Erreur</button>
</body>
-->