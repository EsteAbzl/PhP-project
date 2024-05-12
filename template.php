<!-- Page qui sera copié au début de chaques nouvelles pages -->
<!-- Elle contiendra le header et le footer contenant les liens vers les différentes pages du site -->


<?php
    include 'scripts/redirection.php'; // ajoute le script permettant de vérifier les liens
?>


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
            width: 450px;
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
            padding: 30px 2px;
            width: 300px;
            box-sizing: border-box;
            border-radius: 10px;
            text-align: center;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-left: 70px;
        }

        .bouton:hover {
            background-color: #ffffff29; /* Couleur de fond au survol */
        }

        .image {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            opacity: 0.5;
        }
    </style>
</head>



<body

    
    <div class="sommaire">
        <div class="logo">
            <a href="#" class="logo"><img src="./icones/046-envato.png" alt="Icône" class="image">Dater</a>
        </div>
        <div class="boutons">
            <a class="bouton" onclick="redirection('accueil')"><img src="./icones/home.png" alt="Icône" class="image">Accueil</a>
            <a class="bouton" onclick="redirection('recherche')"><img src="./icones/026-search.png" alt="Icône" class="image">Explorer</a>
            <a class="bouton" onclick="redirection('notif')"><img src="./icones/043-warning.png" alt="Icône" class="image">Notifications</a>
            <a class="bouton" onclick="redirection('messagerie')"><img src="./icones/008-message.png" alt="Icône" class="image">Messagerie</a>
            <a class="bouton" onclick="redirection('profil')"><img src="./icones/profil.png" alt="Icône" class="image">Profil</a>
            <a class="bouton" onclick="redirection('achat')"><img src="./icones/008-money bag.png" alt="Icône" class="image">Premium</a>
            <a class="bouton" onclick="redirection('parametres')"><img src="./icones/paramètre.png" alt="Icône" class="image">Paramètres</a>
        </div>

    </div>
    

</body>
