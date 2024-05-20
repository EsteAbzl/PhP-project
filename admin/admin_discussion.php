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
            height: 100vh;
            margin: 0;
        }

        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        input[type=text] {
            width: 100%;
            padding: 10px;
            margin: 6px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Afficher une discussion</h2>
    <form action="admin_show.php" method="post">
        ID: <input type="text" name="id"><br>
        <input type="submit" value="Afficher">
    </form>
</body>
</html>