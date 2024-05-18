<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Swipe Profils</title>
  <link rel="stylesheet" href="style.css">

    <style>
        *, *:before, *:after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html, body {
  font-size: 62.5%;
}

body {
  background: #63BDF7;
  overflow: hidden;
}

.demo {
  position: absolute;
  left: 50%;
  top: 50%;
  width: 30.6rem;
  height: 54rem;
  margin-left: -15.3rem; /* 30.6rem / 2 */
  margin-top: -27rem; /* 54rem / 2 */
  background: #F6F6F5;
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.2);
}

.demo__header {
  height: 6rem;
  background: #002942;
}

.demo__content {
  overflow: hidden;
  position: relative;
  height: calc(54rem - 6rem);
  padding-top: 4.5rem;
  user-select: none;
}

.demo__profile-cont {
  position: relative;
  width: 24rem;
  height: 32rem;
  margin: 0 auto 5rem;
}

.demo__profile {
  z-index: 2;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  transform-origin: 50% 100%;
}

.demo__profile.reset {
  transition: transform 0.3s;
  transform: translateX(0) !important;
}

.demo__profile.reset .demo__profile__choice {
  transition: opacity 0.3s;
  opacity: 0 !important;
}

.demo__profile.inactive {
  transition: transform 0.3s;
}

.demo__profile.to-left {
  transform: translateX(-30rem) rotate(-30deg) !important;
}

.demo__profile.to-right {
  transform: translateX(30rem) rotate(30deg) !important;
}

.demo__profile.below {
  z-index: 1;
}

.demo__profile__top {
  height: 20.5rem;
  padding-top: 4rem;
}

.demo__profile__top.purple {
  background: #7132B9;
}

.demo__profile__top.blue {
  background: #248CB6;
}

.demo__profile__top.indigo {
  background: #303F9F;
}

.demo__profile__top.cyan {
  background: #26C6DA;
}

.demo__profile__top.lime {
  background: #AFB42B;
}

.demo__profile__top.brown {
  background: #795548;
}

.demo__profile__img {
  overflow: hidden;
  width: 10rem;
  height: 10rem;
  margin: 0 auto 1.5rem;
  border-radius: 50%;
  border: 0.5rem solid #ffffff;
  background-image: url('//s3-us-west-2.amazonaws.com/s.cdpn.io/142996/profile/profile-512_5.jpg');
  background-size: cover;
}

.demo__profile__name {
  text-align: center;
  font-size: 2rem;
  font-weight: bold;
  color: #fff;
}

.demo__profile__btm {
  height: 11.5rem; /* 32rem - 20.5rem */
  background: #FFFFFF;
}

.demo__profile__we {
  text-align: center;
  font-size: 2.2rem;
  line-height: 11.5rem; /* height of .demo__profile__btm */
}

.demo__profile__choice {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
}

.demo__profile__choice:before {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  width: 2rem;
  height: 2rem;
  margin-left: -1rem;
  color: #fff;
  border-radius: 50%;
  box-shadow: -2rem -3rem #fff, 2rem -3rem #fff;
}

.demo__profile__choice:after {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  width: 4rem;
  height: 1.5rem;
  margin-left: -2rem;
  border: 0.6rem solid #fff;
  border-bottom: none;
  border-top-left-radius: 1.5rem;
  border-top-right-radius: 1.5rem;
}

.demo__profile__choice.m--reject {
  background: #FF945A;
}

.demo__profile__choice.m--like {
  background: #B1DA96;
}

.demo__profile__choice.m--like:after {
  transform: scaleY(-1);
}

.demo__profile__drag {
  z-index: 5;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  cursor: grab;
}

.demo__tip {
  text-align: center;
  font-size: 2.2rem;
}
    </style>




</head>
<body>
  <div class="demo">
    <header class="demo__header"></header>
    <div class="demo__content">
      <div class="demo__profile-cont">
        <div class="demo__profile">
          <div class="demo__profile__top brown">
            <div class="demo__profile__img"></div>
            <p class="demo__profile__name">Profil 1</p>
          </div>
          <div class="demo__profile__btm">
            <p class="demo__profile__we">bio</p>
          </div>
          <div class="demo__profile__choice m--reject"></div>
          <div class="demo__profile__choice m--like"></div>
          <div class="demo__profile__drag"></div>
        </div>
        <!-- Ajoutez les autres profils ici -->
      </div>
      <p class="demo__tip">Glissez vers la gauche ou la droite</p>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="swipe.js"></script>
</body>
</html>