<?php


function blurr(){

    if(isset($_SESSION['perm']) && $_SESSION['perm'] < 2){
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
                    font-size: 3vw;
                }

                .blur-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
        
                    background: rgba(0, 0, 0, 0.3);
                    backdrop-filter: blur(0.5vw);
        
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    
                    color: white;
                    text-align: center;
                    z-index: 9999;
                }

                .blur-overlay .message {
                    padding: 2vw;
                    margin-bottom: 2vw;
                    
                    background: rgba(150, 150, 50, 1);
                    border-radius: 2vw;
                    border: 0.5vw solid black;
                }

                .blur-overlay button {
                    padding: 1vw;
                    margin-bottom: 2vw;

                    border-radius: 1vw;
                    border: 0.2vw solid black;
                    cursor: pointer;

                    font-size: 2vw;
                }
            </style>
        </head>
        <body>
            <div class="blur-overlay">
                <div class="message">Fonction réservé aux membres Premium</div>
                <button onclick=\'location.href="premium.php"\'>Voir les propositions</button>
            </div>
        </body>
        </html>';
    }
}

blurr();

?>