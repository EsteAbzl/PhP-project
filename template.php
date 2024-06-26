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
            background-image: url("./image/bg_template2.jpg");
            background-color: rgba(0, 0, 0, 1);
            overflow-x: hidden;
            margin: 0;
            padding:0;
            background-attachment: fixed;
            background-position: 17vw 0vw;
            background-size: 100vw;
            height: 100vh;
            width: 100vw;
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
            background: linear-gradient(to top right, #733078 30%, #dbb494e0 100%);
            box-shadow: 0 0 1vh rgba(0, 0, 0, 0.3);
        }


        .logo {
            margin-left: 15%;
            box-sizing: border-box;
            
            color: black;                 /* Couleur du bouton à modifier en fonction de DA */
            background-color: none;
            transition: background-color 0.3s ease;
            
            font-family: 'against.projet';
            font-size: 3vw;
            text-align: left;
            text-decoration: none;
        }

        .premium {
            position: absolute;
            top:3.1vw;
            left:13vw;

            font-family: 'against.projet';
            color: #e9b938;
            font-size: 1vw;
        }




        .profil {
            margin-top: 0.3vw;
            margin-left: 18%;
            box-sizing: border-box;
            width: 80%;
            
            color: black;                 /* Couleur du bouton à modifier en fonction de DA */
            background-color: transparent;
            cursor: pointer;
            
            font-family: 'against.projet';
            font-size: 2vw;
            text-align: left;
            text-decoration: none;
        }

        .pfp {
            position: relative;
            top: 0.5vw;
            right: 1vw;
            width: 4vw;
            height: 4vw;
            margin-right: 0vw;

            border: 0.25vw solid rgba(102, 64, 150, 0.424);
            border-radius: 4vw;

            opacity: 1;
        }




        .boutons {
            display: flex;
            flex-direction: column;
            margin-top: 1vw;
        }

        .bouton {
            width: 70%;
            margin-left: 15%;
            margin-top: 1vw;
            padding: 1% 0 4% 4%;
            border-radius: 1.25vw;
            box-shadow: 0 0 0.8vh rgba(0, 0, 0, 0.3);
            box-sizing: border-box;
            
            color: black;                 /* Couleur du bouton à modifier en fonction de DA */
            background-color: #F4F3F3;
            transition: background-color 0.3s ease;
            
            font-family: 'quicksand';
            font-size-adjust: initial;
            font-size: 1.5vw;
            text-decoration: none;
            text-align: left;
        }

        .bouton:hover {
            background-color: #ffffff29; /* Couleur de fond au survol */
        }

        .image {
            position: relative;
            top: 0.5vw;
            margin-right: 1vw;

            width: 2.5vw;
            height: 2.5vw;
            opacity: 0.6;
        }

        #disconnect {
            background-color: lightgray;
        }

        #disconnect:hover {
            background-color: rgb(220, 50, 50, 0.5);
        }

        .template_notif {
            position: absolute;
            top: <?php echo $_SESSION['perm'] == 3? "25.9vw" : "22.3vw";?>;
            left: 18vw;
            width: 0.8vw;
            height: 0.8vw;

            border-radius: 100%;
            box-shadow: 0 0 2vw 1vw rgba(200, 100, 100, 0.5);
            background-color: orange;

            opacity: 0.6;
        }

    </style>
</head>



<body>

    
    <div class="sommaire">
        <div class="logo">
            <img src="./icones/046-envato.png" alt="Icône" class="image">Dater
        </div>

        <div class="premium">
            <em><?php if($_SESSION['perm'] >= 2) echo "Premium";?></em>
        </div>

        <script>
            function link_profil(){
                location.href="show_myProfil.php";
            }
        </script>

        <div class="profil" onclick="link_profil()">
            <img src=<?php echo '"data/profils/'.$_SESSION['pseudo'].'/pfp.png"'; ?> alt="PfP" class="pfp"><?php echo $_SESSION['pseudo']; ?>
        </div>

        <div class="boutons">
            <?php if($_SESSION['perm'] == "3"){
                echo "<a href=\"admin/admin_signalements.php\" class=\"bouton\" style=\"background-color: #fdbc2c; text-align: center; padding-bottom: 2%\">Modération</a>";
            }?>

            <a href="homepage.php" class="bouton"><img src="./icones/home.png" alt="Icône" class="image">Accueil</a>
            <a href="recherche.php?recherche=" class="bouton"><img src="./icones/026-search.png" alt="Icône" class="image">Explorer</a>
            <a href="notification.php" class="bouton"><img src="./icones/043-warning.png" alt="Icône" class="image">
                Notifications
                <?php
                    $file = fopen("data/profils/".$_SESSION['pseudo']."/notifs.csv", "r");
                    if(strlen(fread($file, 30)) > 25){
                        echo '<div class="template_notif"></div>';
                    }
                    fclose($file);
                ?>
            </a>
            <a href="messagerie.php" class="bouton"><img src="./icones/008-message.png" alt="Icône" class="image">Messagerie</a>
            <a href="show_myProfil.php" class="bouton"><img src="./icones/profil.png" alt="Icône" class="image">Profil</a>
            <a href="premium.php" class="bouton"><img src="./icones/008-money bag.png" alt="Icône" class="image">Premium</a>
            <a href="scripts/process_disconnect.php" class="bouton" id="disconnect"><img src="./icones/exit.png" alt="Icône" class="image">Déconnexion</a>
        </div>

    </div>
    

</body>
