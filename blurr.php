<?php


function blurr() {

    if (!isset($_SESSION['perm']) || ($_SESSION['perm'] != "2" && $_SESSION['perm'] != "3")) {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Premium Access</title>
            <style>
                body {
                    margin: 0;
                    padding: 0;
                    font-family: Arial, sans-serif;
                }
                .blur-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.5);
                    backdrop-filter: blur(10px);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    color: white;
                    font-size: 24px;
                    text-align: center;
                    z-index: 9999;
                }
                .blur-overlay .message {
                    background: rgba(0, 0, 0, 0.8);
                    padding: 20px;
                    border-radius: 10px;
                }
            </style>
        </head>
        <body>
            <div class="blur-overlay">
                <div class="message">Fonction réservé aux membres Premium</div>
            </div>
        </body>
        </html>';
        exit; 
    }
}

blurr();

?>