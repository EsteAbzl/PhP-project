<!DOCTYPE html>
<html>
<head>
    <title>template_recherche</title>
    <style>

@font-face {
            font-family: 'quicksand';
            src: url('./fonts/Quicksand_Light.otf') format('opentype');
        }

        .main { 
            position: absolute;
            top: 20vh;
            left: 22vw;
        }

        header {
            position: absolute;
                top: 0;
                left: 0;
                width: 100vw;
                height: 18vh;
                z-index: 500;
                
            padding: 0;
            color: black;
            background: linear-gradient(#e66465, #9198e5);
            box-shadow: 0vh 0 4vh 0.5vh rgba(9, 22, 36, 0.6);
        }

        #search-box {
            position: absolute;
                top: 6vh;
                left: 30vw;
                width: 30vw;
            padding: 0.5vh 1vh 0.5vh;

            box-shadow: 0 0 3vh 1vh rgba(227, 227, 227, 0.664);
            border-radius: 2vh;
            border-style: hidden;
                        
            font-family: 'quicksand';
            font-size: 3vh;
        }

        button {
            position: absolute;
                top: 3vh;
                right: 20vw;
                width: 10vh;
                height: 10vh;
            
            box-shadow: 0 0 0.5vh 0.1vh rgba(180, 180, 180, 0.155);
            border-radius: 2vh;
            border-style: hidden;
            
            color: black;
            background-color: rgba(12, 18, 52, 0.14);
            transition: background-color 0.3s ease;
            
            cursor: pointer;
            font-size: 0;
        }

        button:hover {
            background-color: #85858500; /* Couleur de fond au survol */
            box-shadow: 0 0 0 0 rgba(180, 180, 180, 0);
        }

        .icone {
            position: relative;
            top: 0.5vh;
            left: 0.5vh;

            border-style: hidden;
            width: 6vh;
            height: 6vh;
            opacity: 0.6;
        }
    </style>
</head>
<body>

<header>
    <form action="process_rechercher.php" method="get">
        <input type="text" id="search-box" name="q" placeholder="Chercher">
        <button type="submit"><img src="./icones/026-search.png" alt="Icône" class="icone"></button>

    </form>
</header>


</body>
</html>