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

        .main {
            margin-left: 500px;
        }

        body{
            background-color: #EBFFEB;
        }

            
        .sommaire {
            position: fixed;
            top: 0;
            left: 0;
            background-color: white;
            padding: 10px;
            width: 20%;
            height: 100%;
            z-index: 999;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }


        .logo {
            font-family: 'against.projet';
            font-size: 50px;
            background-color: none;
            color: black;                 /* Couleur du bouton à modifier en fonction de DA */
            text-decoration: none;
            padding: 30px 2px;
            width: 300px;
            box-sizing: border-box;
            border-radius: 10px;
            text-align: center;
            transition: background-color 0.3s ease;
            margin-left: 30px;
        }


        .boutons {
            display: flex;
            flex-direction: column;
            height: calc(100% - 40px);
        }

        .bouton {
            font-family: 'quicksand';
            font-size: 20px;
            background-color: #F4F3F3;
            color: black;                 /* Couleur du bouton à modifier en fonction de DA */
            text-decoration: none;
            padding: 20px 0px 40px 40px;
            width: 300px;
            box-sizing: border-box;
            border-radius: 10px;
            text-align: left;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-left: 70px;
        }

        .bouton:hover {
            background-color: #ffffff29; /* Couleur de fond au survol */
        }

        .image {
            position: relative;
            top: 10px;
            margin-right: 30px;
            width: 50px;
            height: 50px;
            opacity: 0.5;
        }
    </style>
</head>



<body>

    
    <div class="sommaire">
        <div class="logo">
            <a href="homepage.php" class="logo"><img src="./icones/046-envato.png" alt="Icône" class="image">Dater</a>
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
