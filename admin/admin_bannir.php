<?php
    include 'template_admin.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de bannissement</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-size: 2vw;
        }

        form {
            width: 30vw;
            padding: 1vw;
            border: 0.1vw solid #ccc;
            border-radius: 0.5vw;
            background-color: #f9f9f9;
        }

        input[type=search] {
            width: 100%;
            padding: 0.5vw;
            margin: 1vw 0;
            box-sizing: border-box;
            
            border: 0.1vw solid #ccc;
            border-radius: 0.5vw;
            outline: transparent;

            font-size: 1.5vw;
        }

        input[type=submit] {
            width: 100%;
            padding: 0.7vw;
            margin: 0.5vw 0;
            
            background-color: #4CAF50;
            border: none;
            border-radius: 0.4vw;

            color: white;
            font-size: 1.5vw;

            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Bannir un utilisateur</h2>
    
    <form action="../scripts/process_ban.php" method="post">
        Pseudo:<br>
        <input autofocus type="search" list="pseudo" name="pseudo" maxlength="15" required>
        <datalist id="pseudo">
            <?php
                $file = fopen("../data/profil_list.csv", "r");
                while(!feof($file)){
                    $line = fgetcsv($file, 20, "]");
                    if(isset($line) && $line[0]!=""){
                        $pseudo =  $string = substr($line[0], 1);
                        if($pseudo != $_SESSION['pseudo']){
                            echo '<option value="'.$pseudo.'">';
                        }
                    }
                }
                fclose($file);
            ?>
        </datalist><br>

        <input type="submit" value="Bannir">
    </form>
</body>
</html>