<!DOCTYPE html>
<html>
<head>
    <title>template_recherche</title>
    <style>

@font-face {
            font-family: 'quicksand';
            src: url('./fonts/Quicksand_Light.otf') format('opentype');
        }

        header {
            position: absolute;
                top: 0;
                left: 0;
                width: 100vw;
                height: 18vh;
                z-index: 500;
            box-shadow: 5vh 0 4vh 0.5vh rgba(0, 0, 0, 0.6);
            
            color: black;
            background: linear-gradient(#e66465, #9198e5);
            
            text-align: center;
        }

        #search-box {
            position: absolute;
                top: 6vh;
                left: 30vw;
                width: 30vw;
            padding: 0.5vh 1vh 0.5vh;

            box-shadow: 0 0 3vh 0.5vh rgba(0, 0, 0, 0.5);
            border-radius: 2vh;
                        
            font-family: 'quicksand';
            font-size: 3vh;
        }

        #search-btn {
            position: absolute;
                top: 3vh;
                right: 20vw;
                width: 10vh;
                height: 10vh;
            
                box-shadow: 0 0 1vh  rgba(0, 0, 0, 0.3);
            border-radius: 2vh;
            
            color: black;
            background-color: rgba(105, 105, 105, 0.226);
            transition: background-color 0.3s ease;
            
            cursor: pointer;
        }

        #search-btn:hover {
            background-color: #B0B0B029; /* Couleur de fond au survol */
        }

        .icone {
            position: relative;
            top: 0.5vh;
            left: 0.5vh;

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
        <button type="submit" id="search-btn"><img src="./icones/026-search.png" alt="Icône" class="icone"></button>

    </form>
</header>


</body>
</html>