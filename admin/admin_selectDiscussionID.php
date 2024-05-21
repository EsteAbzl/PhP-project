<?php
    include 'template_admin.php';
?>


<!DOCTYPE html>
<html>
<head>
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

        select#id-select {
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
    <h2>Afficher une discussion</h2>
    <form action="admin_showDiscussion.php" method="get">
        ID: <br>
        <select name="id" id="id-select" required>
            <option value="">-- Choisissez une discussion --</option>
            <?php
                $file = fopen("../data/discussions/nbr.csv", "r");
                $nbr = intval(fgetc($file));
                for($i = 1; $i<$nbr; $i++){
                    echo '<option value="'.$i.'">discussion '.$i.'</option>';
                }   
                fclose($file);
            ?>
        <br>
        <input type="submit" value="Afficher">
    </form>
</body>
</html>