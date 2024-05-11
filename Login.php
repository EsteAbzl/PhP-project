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


            .bouton {
                font-size: 30px; 
                background-color: #59EE59; 
                color: white; 
                text-decoration : none;
                padding: 30px 40px;
                border-radius: 20px; 
                border: none; 
                font-weight: bold; 
                transition: background-color 0.3s ease; 
                margin-left: 100px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.65);
            }
          
            .bouton:hover {
                background-color: #77F977; 
            }

            .container {
                position: absolute;
                top: 200px;;
                left: 700px;;
                width: 900px;
                height: 700px;
                background-color: rgba(0, 0, 0, 0.7);
                border-radius: 20px; 
                padding: 30px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); 
            }
        </style>

        
    </head>
    
    <body>
        <div class="overlay">
            <div>
                <a href="./Accueil.php" class="logo"><img src="./icones/logo accueil.png" alt="Icône" class="image">Dater</a>
            </div>
            <div class="container">
                
                <h1 style="color: white; font-family:'against.project'; font-size: 55px; margin-bottom: 30px; margin-left: 300px;box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);  ">Connexion</h1>

                
                <form id="login" action="#" method="POST">
                    
                    <label style="color: white; font-size: 30px; font-family:'quicksand';margin-top: 100px; margin-left:330px;" for="email">Adresse email :</label><br>
                    <input style="height: 35px; font-size: 25px; width: 700px; margin-left:100px; margin-top: 20px; border-radius: 15px; " type="email" id="email" name="email" required><br>

                    <label style="color: white; font-size: 30px; font-family:'quicksand';margin-top: 300px; margin-left: 330px;" for="motdepasse">Mot de passe :</label><br>
                    <input style="height: 35px; font-size: 25px; width: 700px; margin-left:100px; margin-top: 20px; border-radius: 15px; " type="password" id="motdepasse" name="motdepasse" required><br>


                    <input style="margin-left: 35%; margin-top: 200px;" type="submit" value="Se connecter" class="bouton">
                </form>
            </div>
        </div>
    </body>
</html>