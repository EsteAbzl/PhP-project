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

            .container {
                position: absolute;
                top: 2vw;
                left: 45vw;
                width: 35vw;
                height: 15vw;
                background-color: rgba(0, 0, 0, 0.7);
                border-radius: 3vw; 
                padding: 0.5vw 2vw 2vw 2vw;
                box-shadow: 0 0 3vw rgba(0, 0, 0, 0.5); 

                text-align: left;
            }

            h1 {
                margin-bottom: 2vw; 
                margin-left: 5vw;
                box-shadow: 0 0 2vw rgba(0, 0, 0, 0.5); 
                
                
                color: white; 
                font-family:'against.project'; 
                font-size: 2vw; 
                font-weight: bold:
            }

            form {
                font-size: 0;
            }

            label {
                margin-left:2vw;
                

                color: white; 
                font-family:'quicksand';
                font-size: 1.5vw; 
            }

            input {
                height: 2vw; 
                width: 27vw; 
                margin-top: 0.5vw; 
                margin-bottom: 0.7vw;
                margin-left:4vw;

                border-style: hidden;
                
                padding: 0;
                padding-left: 1vw;


                border-radius: 1vw;
                font-size: 1vw; 
            }
        </style>

        
    </head>
    
    <body>
        <div class="overlay">
            <div>
                <a href="./accueil.php" class="logo"><img src="./icones/logo accueil.png" alt="Icône" class="image">Dater</a>
            </div>
            <div class="container">
                
                <h1 >Connexion</h1>

                
                <form id="login" action="./scripts/process_login.php" method="POST">
                    
                    <label for="pseudo">Pseudo :</label><br>
                    <input autofocus type="text" id="pseudo" name="pseudo" maxlength="15" required><br>

                    <label  for="motdepasse">Mot de passe :</label><br>
                    <input  type="password" id="motdepasse" name="motdepasse" required><br>


                    <input style="margin-left: 5vw; margin-top: 3vw; height: 6vw" type="submit" value="Se connecter" class="bouton">
                </form>
            </div>
        </div>
        <p style="font-family: 'quicksand'; font-size: 1vw; color: white;"><strong>© Site entièrement codé par : Esteban Abehzele, Paul Hopsore, Ilan Dassonville, Zachary Weiss.</strong></p>
    </body>
</html>