<?php
    session_start();

    // Initialise les parametres de session si celle-ci vient d'être créée
    if(!isset($_SESSION['perm'])){
        $_SESSION['pseudo'] = "-VISITOR-";
        $_SESSION['perm'] = 0;
    }

    /*
    echo "  >Info de session</br>
            ||[Profil]: ".$_SESSION['pseudo']."</br>
            ||[Permission]: ".$_SESSION['perm'];*/
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dater | Site de Rencontre</title>
        
        <style>
            @font-face {
                font-family: 'against.projet';
                src: url('./fonts/against regular.otf') format('opentype'); 
            }

            @font-face {
                font-family: 'quicksand';
                src: url('./fonts/Quicksand_Light.otf') format('opentype');
            }

            .logo {
                position: absolute;
                top: 3vw;
                left: 0vw;
                width: 40vw;

                font-family: 'against.projet';
                color: rgba(255, 255, 255, 1);                 
                font-size: 7vw;
                text-decoration: none;
                text-align: center;
            }

            .image {
                position: relative;
                top: 2vw;
                left: 0vw;
                width: 6vw;
                height: 6vw;
                margin-right: 1vw;
            }

            body{
                overflow: hidden;
                margin: 0;
                padding:0;
                background-image: url('https://tinder.com/static/build/184abbc6dbfb37e127d91e1695d0a468.webp');
                background-size: cover;
                background-position: center;
                height: 100vh;
                width: 100vw;
            }

            .overlay{
                position:absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1;
            }

            .main {
                position: absolute;
                top: 25vw;
                left: 20vw;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 2;
                
                font-family: quicksand;
                color: white; 
                font-weight: bold;
                font-size: 4vw;
            }

            .bouton {
                position: relative;
                right: 2vw;
                margin-left: 5vw;
                padding: 2vw;

                background-color: #69aE69; 
                text-decoration : none;
                
                box-shadow: 0 0.5vw 1vw rgba(0, 0, 0, 0.65);
                border: none; 
                border-radius: 1vw; 
                transition: background-color 0.3s ease; 
                
                color: white; 
                font-size: 2vw; 
                font-weight: bold; 
            }
          
            .bouton:hover {
                background-color: #77F977; 
            }

            .buttons-container {
                position: absolute;
                display: flex; 
                justify-content: center;
                align-items: center;
                flex-direction: row; 
                top: 32vw;
                left: 31vw;
                z-index: 999;
            }

        </style>

        
    </head>
    
    <body>
        <div class="overlay">
            <div>
                <a href="./accueil.php" class="logo"><img src="./icones/logo accueil.png" alt="Icône" class="image">Dater</a>
            </div>
            <div class="main">
                Trouvez l'amour dès maintenant !
            </div>
            <div class="buttons-container">
                <a href="accueil_login.php" class="bouton">Se connecter</a>
                <a href="accueil_register.php" class="bouton">Créer un compte</a>
            </div>
        </div>
        <p style="font-family: 'quicksand'; font-size: 1vw; color: white;"><strong>© Site entièrement codé par : Esteban Abehzele, Paul Hopsore, Ilan Dassonville, Zachary Weiss.</strong></p>
    </body>
</html>