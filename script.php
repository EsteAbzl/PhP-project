
<?php
$GLOBALS['perm'] = "admin"; // Cette variable sera remplacé par une variable de session
$GLOBALS['pages'] = array('test'=>"test.php", 'error'=>"error.php"); // Liste de toutes les pages
?>

<script>
    function redirection(page){
        switch(page){
            case 'test':
                <?php
                    if($GLOBALS['perm'] == "admin"){
                        echo "location.href=\"".$GLOBALS['pages']['test']."\";";
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
                break;
        }
    }
</script>
                
    
<!-- Affichage permettant de tester le script -->
<!DOCTYPE html>
<head>
    <title>Test de script</title>
</head>
<body>
    <h1>Test de script</h1>
    <button onclick="redirection('test')">Vers Test [admin only]</button><button onclick="redirection('error')">Vers Erreur</button>
</body>