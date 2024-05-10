<!-- Test -->
<!DOCTYPE html>
<html>
    <head>
        <title>TEST</title>
    </head>
    
    <body>
        <div style="height: 200px;"></div>
        <h3>avant intégration</h3>

        <?php
        readfile("template.php"); //a mettre dans le <body>
        ?>

        <h3>après intégration</h3>

        <div style="position:absolute; top:100px;">
            <h1>Page de test, intégration de la page template</h1>
        
        </div>
        

    </body>
</html>