<!--    
    Script a `include './sript/redirection.php'` ajoutant la fonction JavaSript
    'redirection(page)'.
-->
<?php
const ADMIN = 3;
const PREMIUM = 2;
const INSCRIT = 1;
const VISITEUR = 0;

// Liste de toutes les pages
$GLOBALS['pages'] = array(  'accueil'=>"accueil.php",
                            'premium'=>"premium.php", 
                            'error'=>"error.php");
                            /*recherche, notif, messagerie, profil, achat, parametres*/ 
?>



<script>
    function redirection(page){
        window.alert("activation du portail interspacial 👴");
        switch(page){                
            
            case 'accueil':
                <?php
                    echo "location.href=\"".$GLOBALS['pages']['accueil']."\";";
                ?>
                break;
            
            case 'premium':
                <?php
                    if($_SESSION['perm'] <= INSCRIT){
                        echo "location.href=\"".$GLOBALS['pages']['premium']."\";";
                    }
                    else{
                        redirection('error');
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