
<?php
    include 'scripts/check_session.php';
    include 'scripts/script_premium.php';
?>


<!DOCTYPE html>
<html>
    
<head>
    <title>Abonnement Premium - Dater</title>
    <style>

        @font-face {
            font-family: 'against.projet';
            src: url('./fonts/against regular.otf') format('opentype'); 
        }

        @font-face {
            font-family: 'quicksand';
            src: url('./fonts/Quicksand_Light.otf') format('opentype');
        }

        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap');
        
        body {
            margin: 0;
            padding: 0;
            font-size: 0;
        }
        
        .container {
            position: absolute;
            top: 5vw;
            left: 10vw;
            width: 80vw;

            text-align: center;
            padding: 0;
        }
        

        
        .cross_bouton {
            position: fixed;
            left: 2vw;
            top: 1vw;
            height: 3vw;

            padding: 1.5vw;

            border-radius: 100%;

            background-color: rgba(219, 219, 219, 0.1); 
            transition: background-color 0.3s ease;
        }

        .cross_bouton img{
            height: 3vw;
            width: 3vw;
        }

        .cross_bouton:hover {
            background-color: rgba(219, 219, 219, 0.7);   
        }
        
        .Titre {
            position: relative;
            font-family: 'DM Sans', sans-serif;
            
            
            margin-bottom: -5vw;
            text-align: center;
            font-size: 5vw;
        }

        .Description {
            margin-top: 10vw;
            margin-bottom: 2vw;
            
            font-family:'quicksand';
            color: grey;
            font-size: 1.3vw;
        }
        
        .subscription-zone {
            position: relative;

            display: flex;
            justify-content: space-between;
            margin-bottom: 4vw;
            padding: 2vw 4vw;
        }
        
        .subscription-option{
            display: flex;
            flex-direction: column;
            width: 30vw;
            height: 14vw;

            padding: 1vw 2vw 2vw 2vw;

            background-color: #BDFF8D;
            border-radius: 2vw;

            box-shadow: 0 0.2vw 1vw rgba(0, 0, 0, 0.65);

            font-size: 3vw;
        }

        .price {
            font-family: 'DM Sans', sans-serif; 
            margin: 1vw;
            font-size: 3vw;
        }


        
        .comparison-table {
            width: 100%;
            margin-top: 20vw;
            
            border-collapse: collapse;
            
        }

        .comparison-table th {
            font-size: 3vw;
            font-family: 'DM Sans', sans-serif;
        }

        .comparison-table td {
            font-family: 'quicksand';
             font-size: 1.5vw;
        }
        
        .comparison-table th,
        .comparison-table td {
            border-left: 0.1vw solid #ccc;
            border-right: 0.1vw solid #ccc;
            padding: 1vw;
            text-align: center;
        }
        
        .comparison-table th:first-child,
        .comparison-table td:first-child {
            border-left: none;
            border-top: none;
        }
        
        .comparison-table th:last-child,
        .comparison-table td:last-child {
            border-right: none;
            border-bottom: none;
        }

        .bouton {
            padding: 1vw;
            margin-top: 1vw;
            
            background-color: #F9F9F9; 
            border-radius: 1.5vw; 
            box-shadow: 0 0.2vw 1vw rgba(0, 0, 0, 0.65);
            
            color: black; 
            font-size: 2vw; 
            text-decoration : none;
            border: none; 
            font-weight: bold; 
            transition: background-color 0.3s ease; 
        }

        .bouton:hover {
            background-color: #CFCFCF; 
        }

        .notification {
            display: none;
        }

        .notification-box {
            position: fixed;
            top: 20vw;
            left: 35vw;
            width: 30vw;
            height: 14vw;
            padding: 2vw 2vw;
            display: flex;
            flex-direction: column;
            
            background-color: #FFFCD1;
            border-radius: 1.5vw;
            box-shadow: 0 0 1vw rgba(0, 0, 0, 0.8);

            font-family: 'DM Sans', sans-serif;
            font-size: 2vw;
            color: black;
        }

        .notification-box button {
            margin-top: 2vw;
            cursor: pointer;
        }

        .blur-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            background: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(0.5vw);

            display: flex;
            align-items: center;
            justify-content: center;
            
            color: white;
            text-align: center;
            z-index: 9999;
        }
        
    </style>
</head>

    
<body>

    <a href="homepage.php" class="cross_bouton"><img src="./icones/006-cross.png" alt="Icône" "></a>
    
    <div class="container">
        <div>
            <p class="Titre"><strong>Mettre à niveau vers</strong></p>
            <p class="Titre"><strong>Premium</strong><p>
            <br>
        </div>


        <div class="Description">
            <strong>Profitez d'une expérience améliorée, d'outils réservés aux membres premium et d'une sécurité de premier ordre.</strong><br>
        </div>
            
        <div class="subscription-zone">
            <div class="subscription-option">
                Abonnement mensuel
                <p class="price"><strong>5,99 €</strong>/mois</p>
                <button class="bouton" onclick="showNotification();">Souscrire</button>
            </div>
            
            <div class="subscription-option" style="background-color: #FEB5F8">
                Abonnement annuel
                <p class="price"><strong>71,88 €</strong>/ans</p>
                <button class="bouton" onclick="showNotification();">Souscrire</button>
            </div>
        </div>

        <table class="comparison-table">
            <thead>
                <tr>
                    <th><strong>Fonctionnalités</strong></th>
                    <th><strong>Non Premium</strong></th>
                    <th><strong>Premium</strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>Accès au site</strong></td>
                    <td>✔️</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td><strong>Possibilité de Swipe</strong></td>
                    <td>✔️</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td><strong>Ajout de contacts</strong></td>
                    <td>✔️</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td><strong>Accès à la messagerie</strong></td>
                    <td>❌</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td><strong>Envoi de messages privés</strong></td>
                    <td>❌</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td><strong>Consulter les profils</strong></td>
                    <td>❌</td>
                    <td>✔️</td>
                </tr>
                
            </tbody>
        </table>
    
        <p style="font-family: 'quicksand'; font-size: 0.8vw; color: black; margin-top: 10vw;"><strong>@ Possibilité de retractation à tout moment</strong></p>
        <p style="font-family: 'quicksand'; font-size: 0.8vw; color: black;"><strong>© Site entièrement codé par : Esteban Abehzele, Paul Hopsore, Ilan Dassonville, Zachary Weiss.</strong></p>
    
    </div>


    <div class="notification" id="notif_nvx">
        <div class="blur-overlay">
            <div class="notification-box">  
                <span><strong>Vous venez de souscrire à l'abonnement Premium.</strong></span>
                <br>
                <button class="bouton" onclick="hideNotification()">Suivant</button>
            </div>
        </div>
    </div>

    <div class="notification" id="notif_deja">
        <div class="blur-overlay">
            <div class="notification-box">
                <span><strong>Vous possédez déjà un abonnement Premium</strong></span>
                <br>
                <button class="bouton" onclick="hideNotification()">Suivant</button>
            </div>
        </div>
    </div>



</body>
</html>