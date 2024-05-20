<script>
    function modif_perm(perm){
        var requete = new XMLHttpRequest();
        requete.open("POST", "./scripts/change_perm.php", true);
        requete.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        requete.onload = function(){
            if(this.readyState == 4 && this.status == 200){
                // possibilitée de lancer une fonction (e.g charger les variables de session) après la requête
            }
        }
        requete.send("perm="+perm);
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
            document.getElementById("notification2").style.display = "block";
        } 
        else{
            notification = document.getElementById("notification").style.display = "block";
            modif_perm(2);
        }
    }

    function hideNotification() {
        document.getElementById("notification").style.display = "none";
        document.getElementById("notification2").style.display = "none";
    }

</script>