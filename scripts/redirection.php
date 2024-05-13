<!--    
    Script a `include './sript/redirection.php'` ajoutant la fonction JavaSript
    'redirection(page)'.
-->
  
<?php
session_start();

const ADMIN = 3;
const PREMIUM = 2;
const INSCRIT = 1;
const VISITEUR = 0;

// Liste de toutes les pages
$racine = "http://".$_SERVER['SERVER_NAME'];
$GLOBALS['pages'] = array(  'accueil'=>$racine."/accueil.php",
                            'premium'=>$racine."/premium.php", 
                            'error'=>$racine."/error.php");
                            //recherche, notif, messagerie, profil, achat, parametres*


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
                    if($_SESSION['perm'] <= 1){
                        echo "location.href=\"".$GLOBALS['pages']['premium']."\";";
                    }
                    else{
                        //echo "<script> redirection('error'); </script>";
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

-->