<?php
    include 'scripts/check_session.php';

    /*
    if($_SESSION['perm'] != 1){
        echo "  <script>
                    window.alert(\"Vous n'avez pas les perms\");
                </script>";
                
        header("Location: homepage.php");
    }*/
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
        }
        
        .container {
            max-width: 1547px;
            margin: 20px auto;
            margin-top: 150px;
            padding: 0 20px;
        }
        

        
        .cross_bouton {
            position: fixed;
            text-decoration: none;
            transition: background-color 0.3s ease;
            padding: 20px 25px;
            border-radius: 50px;
            left: 50px;
            top: 50px;
        }

        .cross_bouton:hover {
            background-color: rgba(219, 219, 219, 0.7);   
        }
        
        .Titre {
            position: absolute;
            font-family: 'DM Sans', sans-serif;
            text-align: center;
            font-size: 130px;
            left: 25%;
        }

        .Description {
            margin-top: 500px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            font-family:'quicksand';
            font-size: 25px;
            color: grey;
        }
        
        .subscription-options {
            margin-top: 100px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            padding: 50px 100px;
        }
        
        .subscription-option {
            flex: 0 0 48%;
            background-color: #BDFF8D;
            padding: 30px 0px;
            border-radius: 30px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.65);
        }
        
        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 40px;
        }
        
        .comparison-table th,
        .comparison-table td {
            border-left: 1px solid #ccc;
            border-right: 1px solid #ccc;
            padding: 10px;
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

        h2 {
            font-family: 'quicksand';
            font-size: 30px;
        }


        .bouton {
            font-size: 20px; 
            background-color: #F9F9F9; 
            color: black; 
            text-decoration : none;
            padding: 15px 15px;
            border-radius: 20px; 
            border: none; 
            font-weight: bold; 
            transition: background-color 0.3s ease; 
            margin-left: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.65);
        }

        .bouton:hover {
            background-color: #CFCFCF; 
        }

        .notification {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #FFFCD1;
            padding: 200px 50px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
            font-family: 'DM Sans', sans-serif;
            font-size: 30px;
        }

        .notification button {
            margin-top: 10px;
            cursor: pointer;
        }
        
    </style>
</head>

    
<body>

    <a href="home.php" class="cross_bouton"><img src="./icones/006-cross.png" alt="Icône" style="width: 30px; height: 30px; "></a>
    
    <div class="container">
        <div>
            <p class="Titre" style="top: 150px;"><strong>Mettre à niveau vers</strong></p><p class="Titre" style="font-size: 150px; top: 270px; left: 37%;"><strong>Premium</strong><p>
            <br>
        </div>


        <div class="Description">
            <p><strong>Profitez d'une expérience améliorée, d'outils réservés aux membres premium et d'une sécurité de premier ordre.</strong> </p><br>
        </div>
            
        <div class="subscription-options">
            
            
            <div class="subscription-option">
                <h2><strong>Abonnement mensuel</strong></h2>
                <p style="font-family: 'DM Sans', sans-serif; font-size: 50px;"><strong>5,99€  /mois</strong></p>
                <button class="bouton" onclick="showNotification()">Souscrire</button>
                
            </div>
            <div style="background-color: #FEB5F8;"class="subscription-option">
                <h2>Abonnement annuel</h2>
                <p style="font-family: 'DM Sans', sans-serif; font-size: 50px;"><strong>71,88 €  /an</strong></p>
                <button class="bouton" onclick="showNotification()">Souscrire</button>
            </div>
        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table class="comparison-table">
            <thead>
                <tr>
                    <th style="font-family: 'DM Sans', sans-serif; font-size: 40px;"><strong>Fonctionnalités</strong></th>
                    <th style="font-family: 'DM Sans', sans-serif; font-size: 40px;"><strong>Non Premium</strong></th>
                    <th style="font-family: 'DM Sans', sans-serif; font-size: 40px;"><strong>Premium</strong></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-family: 'quicksand'; font-size: 20px;"><strong>Accès au site</strong></td>
                    <td>✔️</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td style="font-family: 'quicksand'; font-size: 20px;"><strong>Possibilité de Swipe</strong></td>
                    <td>✔️</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td style="font-family: 'quicksand'; font-size: 20px;"><strong>Ajout de contactes</strong></td>
                    <td>✔️</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td style="font-family: 'quicksand'; font-size: 20px;"><strong>Accès à la messagerie</strong></td>
                    <td>❌</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td style="font-family: 'quicksand'; font-size: 20px;"><strong>Envoie de messages privés</strong></td>
                    <td>❌</td>
                    <td>✔️</td>
                </tr>
                <tr>
                    <td style="font-family: 'quicksand'; font-size: 20px;"><strong>Consulter les profils</strong></td>
                    <td>❌</td>
                    <td>✔️</td>
                </tr>
                
            </tbody>
        </table>
    </div>

    <div class="notification" id="notification">
        <span><strong>Vous venez de souscrire à 
            l'abonnement Premium.<strong></span>
                <br>
        <button style = "margin-left:300px;"class="bouton" onclick="hideNotification()">Suivant</button> 
    </div>

    <script>
        function showNotification() {
            var notification = document.getElementById("notification");
            notification.style.display = "block"; // Affiche la notification en changeant son style d'affichage
        }

        function hideNotification() {
            var notification = document.getElementById("notification");
            notification.style.display = "none"; // Masque la notification lorsque le bouton est cliqué
        }
    </script>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p style="font-family: 'quicksand'; font-size: 14px; margin-left:30px;"><strong>@ Possibilité de retractation à tout moment</strong></p>
    <p style="font-family: 'quicksand'; font-size: 14px; margin-left:30px;"><strong>© Site entièrement codé par : Esteban Abehzele, Paul Hopsore, Ilan Dassonville, Zachary Weiss.</strong></p>
</body>
</html>