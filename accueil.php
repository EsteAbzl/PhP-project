<?php
    session_start();

    // Initialise les parametres de session si celle-ci vient d'être créée
    if(!isset($_SESSION['perm'])){
        $_SESSION['pseudo'] = "-VISITOR-";
        $_SESSION['perm'] = 0;
    }
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
                font-family: 'against.projet';
                font-size: 70px;
                color: rgba(255, 255, 255, 5);                 
                text-decoration: none;
                width: 400px;
                text-align: center;
                margin-left: 30px;
                position: absolute;
                top: 35px;
                left: 20px;
            }

            .image {
                width: 50px;
                height: 50px;
                margin-right: 10px;
            }

            body{
                margin: 0;
                padding:0;
                background-image: url('https://tinder.com/static/build/184abbc6dbfb37e127d91e1695d0a468.webp');
                background-size: cover;
                background-position: center;
                height: 100vh;
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
                display: flex;
                justify-content: center;
                align-items: center;
                top: 40%;
                z-index: 2;
                margin-left: 25%;
            }

            .bouton {
                font-size: 30px; 
                background-color: #59EE59; 
                color: white; 
                text-decoration : none;
                padding: 30px;
                border-radius: 20px; 
                border: none; 
                font-weight: bold; 
                transition: background-color 0.3s ease; 
                margin-left: 100px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.65);
            }
          
            .buttons-container {
                position: absolute;
                display: flex; 
                justify-content: center;
                align-items: center;
                flex-direction: row; 
                top: 58%;
                left: 31%;
                z-index: 999;
            }

            .bouton:hover {
                background-color: #77F977; 
            }
        </style>

        
    </head>
    
    <body>
        <div class="overlay">
            <div>
                <a href="./accueil.php" class="logo"><img src="./icones/logo accueil.png" alt="Icône" class="image">Dater</a>
            </div>
            <div class="main">
                <p style="font-family: quicksand; font-size: 70px; color: white; font-weight: bold;">Trouver l'amour dès maintenant !</p>
            </div>
            <div class="buttons-container">
                <a href="register.php" class="bouton">Créer un compte</a>
                <a href="login.php" class="bouton">Se connecter</a>
            </div>
        </div>
        <p style="font-family: 'quicksand'; font-size: 14px; margin-left:30px; color: white;"><strong>© Site entièrement codé par : Esteban Abehzele, Paul Hopsore, Ilan Dassonville, Zachary Weiss.</strong></p>
    </body>
</html>