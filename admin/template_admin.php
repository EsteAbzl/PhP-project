<?php 
    include '../scripts/check_session.php';
    if(!isset($_SESSION['perm']) || $_SESSION['perm'] < 3){

        echo "  <script>
                        widow.alert(\"Vous n'avez pas les permissions pour acceder à cette page.\")
                    </script>";
        
        echo '<script>location.href="../accueil.php";</script>'; // note: l'accueil initialise la session si elle n'existe pas encore
    }

?>


<!DOCTYPE html>
<head>
    <title>template</title>
    <style>
        
        @font-face {
            font-family: 'against.projet';
            src: url('../fonts/against regular.otf') format('opentype'); 
        }

        @font-face {
            font-family: 'quicksand';
            src: url('../fonts/Quicksand_Light.otf') format('opentype');
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
            padding: 2% 0 4% 4%;
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

        .templateAdmin_notif {
            position: absolute;
            top: 27.5vw;
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
            <img src="../icones/046-envato.png" alt="Icône" class="image">Dater
        </div>

        <script>
            function link_profil(){
                location.href="../my_profil.php";
            }
        </script>

        <div class="profil" onclick="link_profil()">
            <img src=<?php echo '"../data/profils/'.$_SESSION['pseudo'].'/pfp.png"'; ?> alt="PfP" class="pfp"><?php echo $_SESSION['pseudo']; ?>
        </div>

        <div class="boutons">
            <a href="../homepage.php" class="bouton"><img src="../icones/home.png" alt="Icône" class="image">Retour Accueil</a>
            <a href="admin_ban.php" class="bouton"><img src="../icones/006-cross.png" alt="Icône" class="image">Bannir</a>
            <a href="admin_discussion.php" class="bouton"><img src="../icones/026-search.png" alt="Icône" class="image">Discussion ID</a>
            <a href="admin_signalements.php" class="bouton"><img src="../icones/043-warning.png" alt="Icône" class="image">
                Signalements
                <?php
                    $file = fopen("../data/signalements.csv", "r");
                    if(strlen(fread($file, 40)) > 35){
                        echo '<div class="templateAdmin_notif"></div>';
                    }
                    fclose($file);
                ?>
            </a>
            <a href="admin_blacklisted.php" class="bouton"><img src="../icones/profil.png" alt="Icône" class="image">Blacklisted</a>
            <a href="admin_modif.php" class="bouton"><img src="../icones/paramètre.png" alt="Icône" class="image">Modifier INFOS</a>
        </div>

    </div>
    

</body>
