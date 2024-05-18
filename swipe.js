$(document).ready(function() {

    var animationEnCours = false;
    var compteurProfils = 0;
    var nombreDeProfils = 6;
    var valeurDecision = 80;
    var decalageX = 0;
    var deg = 0;
    var $profil, $profilRejet, $profilAime;
  
    function changementDecalage() {
      animationEnCours = true;
      deg = decalageX / 10;
      $profil.css("transform", "translateX("+ decalageX +"px) rotate("+ deg +"deg)");
  
      var opacite = decalageX / 100;
      var opaciteRejet = (opacite >= 0) ? 0 : Math.abs(opacite);
      var opaciteAime = (opacite <= 0) ? 0 : opacite;
      $profilRejet.css("opacity", opaciteRejet);
      $profilAime.css("opacity", opaciteAime);
    };
  
    function relacher() {
  
      if (decalageX >= valeurDecision) {
        $profil.addClass("to-right");
      } else if (decalageX <= -valeurDecision) {
        $profil.addClass("to-left");
      }
  
      if (Math.abs(decalageX) >= valeurDecision) {
        $profil.addClass("inactive");
  
        setTimeout(function() {
          $profil.addClass("below").removeClass("inactive to-left to-right");
          compteurProfils++;
          if (compteurProfils === nombreDeProfils) {
            compteurProfils = 0;
            $(".demo__profile").removeClass("below");
          }
        }, 300);
      }
  
      if (Math.abs(decalageX) < valeurDecision) {
        $profil.addClass("reset");
      }
  
      setTimeout(function() {
        $profil.attr("style", "").removeClass("reset")
          .find(".demo__profile__choice").attr("style", "");
  
        decalageX = 0;
        animationEnCours = false;
      }, 300);
    };
  
    $(document).on("mousedown touchstart", ".demo__profile:not(.inactive)", function(e) {
      if (animationEnCours) return;
  
      $profil = $(this);
      $profilRejet = $(".demo__profile__choice.m--reject", $profil);
      $profilAime = $(".demo__profile__choice.m--like", $profil);
      var startX =  e.pageX || e.originalEvent.touches[0].pageX;
  
      $(document).on("mousemove touchmove", function(e) {
        var x = e.pageX || e.originalEvent.touches[0].pageX;
        decalageX = (x - startX);
        if (!decalageX) return;
        changementDecalage();
      });
  
      $(document).on("mouseup touchend", function() {
        $(document).off("mousemove touchmove mouseup touchend");
        if (!decalageX) return; // prevents from rapid click events
        relacher();
      });
    });
  
  });