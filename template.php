<!-- 
    Page copié au début de pages
    Contient les liens vers les différentes pages du site 
-->


<!DOCTYPE html>
<head>
    <title>template</title>
    <style>
        
        @font-face {
            font-family: 'against.projet';
            src: url('./fonts/against regular.otf') format('opentype'); 
        }

        @font-face {
            font-family: 'quicksand';
            src: url('./fonts/Quicksand_Light.otf') format('opentype');
        }
        
        body{
            background-color: white;
        }

        /*pour ecrire dans la page*/
        .main { 
            margin-left: 25vw;
        }

        /*permet de se déplacer dans le site*/
        .sommaire {
            position: fixed;
                top: 0;
                left: 0;
                width: 23vw;
                height: 100vh;
                z-index: 999;

            padding: 0;
            background-color: white;
            box-shadow: 0 0 2vh rgba(0, 0, 0, 0.8);
        }


        .logo {
            margin-left: 15%;
            box-sizing: border-box;
            
            color: black;                 /* Couleur du bouton à modifier en fonction de DA */
            background-color: none;
            transition: background-color 0.3s ease;
            
            font-family: 'against.projet';
            font-size: 5vh;
            text-align: left;
            text-decoration: none;
        }


        .boutons {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .bouton {
            margin-left: 15%;
            margin-top: 1vh;
            padding: 2vh 0vh 2vh 8%;
            width: 70%;
            border-radius: 2vh;
            box-shadow: 0 0 1vh rgba(0, 0, 0, 1);
            box-sizing: border-box;
            
            color: black;                 /* Couleur du bouton à modifier en fonction de DA */
            background-color: #F4F3F3;
            transition: background-color 0.3s ease;
            
            font-family: 'quicksand';
            font-size-adjust: initial;
            font-size: 2vh;
            text-decoration: none;
            text-align: left;
        }

        .bouton:hover {
            background-color: #ffffff29; /* Couleur de fond au survol */
        }

        .image {
            position: relative;
            top: 0.5vh;
            margin-right: 2.5vh;

            width: 5vh;
            height: 5vh;
            opacity: 0.5;
        }
    </style>
</head>



<body>

    
    <div class="sommaire">
        <div class="logo">
            <img src="./icones/046-envato.png" alt="Icône" class="image">Dater
        </div>
        <div class="boutons">
            <a href="homepage.php" class="bouton"><img src="./icones/home.png" alt="Icône" class="image">Accueil</a>
            <a href="recherche_page.php" class="bouton"><img src="./icones/026-search.png" alt="Icône" class="image">Explorer</a>
            <a href="notif.php" class="bouton"><img src="./icones/043-warning.png" alt="Icône" class="image">Notifications</a>
            <a href="contact.php" class="bouton"><img src="./icones/008-message.png" alt="Icône" class="image">Messagerie</a>
            <a href="profil.php" class="bouton"><img src="./icones/profil.png" alt="Icône" class="image">Profil</a>
            <a href="premium.php" class="bouton"><img src="./icones/008-money bag.png" alt="Icône" class="image">Premium</a>
            <a href="parametres.php" class="bouton"><img src="./icones/paramètre.png" alt="Icône" class="image">Paramètres</a>
            <a href="scripts/disconnect.php" class="bouton"><img src="./icones/exit.png" alt="Icône" class="image">Déconnexion</a>
        </div>

    </div>
    

</body>
