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
            left: 25vw;
        }

        header {
            position: absolute;
                top: 0;
                left: 0;
                width: 100vw;
                height: 18%;
                z-index: 500;
                
            padding: 0;
            color: black;
            background: linear-gradient(#e66464c2, #9198e57e);
            box-shadow: 0vh 0 4vh 0.5vh rgba(9, 22, 36, 0.37);
        }

        button {
            padding: 0;
        }

        #search-box {
            position: absolute;
                top: 6vh;
                left: 30vw;
                width: 30vw;
            padding: 0.5vh 1vw 0.5vh;

            box-shadow: 0 0 3vh 1vh rgba(227, 227, 227, 0.664);
            border-radius: 2vh;
            border-style: hidden;
            outline: transparent;
                        
            font-family: 'quicksand';
            font-size: 3vh;
        }

        #button-box {
            position: absolute;
                top: 1.5vh;
                right: 40vw;
                width: 5vh;
                height: 5vh;
            
            box-shadow: 0 0 1.5vh 0.5vh rgba(145, 145, 145, 0.527);
            border-radius: 5vh;
            border-style: hidden;
            
            color: black;
            background-color: rgba(255, 255, 255, 0.413);
            transition: background-color 0.9s ease;
            
            cursor: pointer;
            font-size: 0;
        }

        #button-box:hover {
            background-color: #85858500; /* Couleur de fond au survol */
            box-shadow: 0 0 0 0 rgba(180, 180, 180, 0);
        }

        .icone {
            position: relative;
            top: -0.4vh;
            left: -0.4vh;

            border-style: hidden;
            width: 10vh;
            height: 10vh;
            opacity: 0.8;
        }
    </style>
</head>
<body>

<header>
    <form action="recherche.php" method="get">
        <input type="text" id="search-box" name="recherche" placeholder="Chercher">
        <button type="submit" id="button-box"><img src="./icones/026-search.png" alt="Icône" class="icone"></button>

    </form>
</header>


</body>
</html>