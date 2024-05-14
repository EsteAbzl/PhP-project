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
            background-color: white;
            color: black;
            padding: 40px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        #search-form {
            margin-top: 5px;
            text-align: center;
        }

        #search-box {
            padding: 10px;
            width: 700px;
            border: 3px solid #ccc;
            border-radius: 3px;
            font-family: 'quicksand';
            font-size: 30px;
            border-radius: 20px; 
        }

        #search-btn {
            position: absolute;
            right: 520px;
            padding: 12px 1px;
            background-color: lightgrey;
            color: black;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
            border-radius: 20px; 
        }

        #search-btn:hover {
            background-color: #B0B0B029; /* Couleur de fond au survol */
        }

        .icone{
            position: relative;
            top: 5px;
            margin-right: 40px;
            width: 30px;
            height: 30px;
            opacity: 0.5;
        }
    </style>
</head>
<body>

<header>
    <div id="search-form">

        <form action="process_rechercher.php" method="get">
            <input type="text" id="search-box" name="q" placeholder="Chercher">
            <button type="submit" id="search-btn"><img src="./icones/026-search.png" alt="Icône" class="icone"></button>

        </form>
    </div>
</header>


</body>
</html>