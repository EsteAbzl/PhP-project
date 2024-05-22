<script>
    function modif_perm(perm){
        var requete = new XMLHttpRequest();
        requete.open("POST", "./scripts/process_changePerm.php", true);
        requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        requete.onload = function(){
            if(this.readyState == 4 && this.status == 200){
                // possibilitée de lancer une fonction (e.g charger les variables de session) après la requête
            }
        }
        requete.send("perm="+perm);
    }

    function envoyerNotif() {
        // Récupération de la valeur de pseudo

        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'scripts/notifs/add_notifs_4.php', true);
        xhr.send();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    // La requête a réussi, traiter la réponse si nécessaire
                    console.log(xhr.responseText);
                } else {
                    // La requête a échoué
                    console.error('La requête a échoué avec le statut ' + xhr.status);
                }
            }
        };
    }
    

    function check_perm(){
        // demande de recharger la page pour se mettre a jour
        <?php
        if($_SESSION['perm'] >= 2){
            echo "return 1;";
        }
        else{
            echo "return 0;";
        }
        ?>
    } 
    
    function showNotification() {
        if(check_perm()){
            document.getElementById("notif_deja").style.display = "block";
        } 
        else{
            notification = document.getElementById("notif_nvx").style.display = "block";
            modif_perm(2);
            envoyerNotif();
        }
    }

    function hideNotification() {
        document.getElementById("notif_nvx").style.display = "none";
        document.getElementById("notif_deja").style.display = "none";
    }

</script>