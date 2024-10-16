# Projet Développement Web : Site de Rencontre

![Capture d'écran de la page d'accueil](demo/accueil.PNG)

Bienvenue sur notre projet de site de rencontre ! Développé par une équipe de quatre étudiants, ce site permet aux utilisateurs de faire connaissance et d'échanger entre eux.

## Table des Matières

1. [Aperçu](#aperçu)
2. [Fonctionnalités](#fonctionnalités)
3. [Installation](#installation)
4. [Utilisation](#utilisation)
5. [Contact](#contact)

## Aperçu

Notre site de rencontre permet aux utilisateurs de créer leur profil, de rechercher des correspondances, de parcourir les profils grâce au système de swipe et d'échanger des messages. Un abonnement (fictif) est nécessaire pour accéder à toutes les fonctionnalités mises à disposition par le site. Les administrateurs disposent également d'un espace dédié à la modération des profils (identifiants : admin/admin).

![Capture d'écran de l'interface de swipe](PhP-project/demo/demo_1.png)

## Fonctionnalités

- **Inscription et Connexion** : Les utilisateurs peuvent créer un compte et se connecter facilement.
- **Swipe et Recherche** : L'interface permet aux utilisateurs de liker les profils qui leur sont proposés.
- **Profils Utilisateurs** : Les utilisateurs peuvent créer et modifier leurs profils avec des détails personnels.
- **Messagerie** : Échange de messages en temps réel entre utilisateurs.
- **Abonnement Premium** : Accès à des fonctionnalités avancées en fonction du niveau d'abonnement.
- **Gestion des Fichiers** : Création et manipulation de fichiers pour le stockage des données utilisateur, accessibles par les administrateurs.
- **Administration** : Outils de gestion pour les administrateurs afin de modérer les utilisateurs et les données du site.

## Installation

### Téléchargement

Téléchargez le fichier .zip depuis le bouton "Code" et sélectionnez "Download Zip".

### Sous Linux

1. Ouvrez le terminal de commande dans le dossier où le .zip a été téléchargé.
2. Décompressez le fichier et naviguez dans le dossier décompressé.
3. Lancez le serveur PHP avec la commande suivante :
   ```bash
   php -S localhost:8080
   ```

4. Ouvrez votre navigateur et entrez l'URL suivante :

Dans le navigateur taper : 
```bash
localhost:8080/leNomDeLaPage.php
```

Par exemple : `localhost:8080/accueil.php` 

5. Si la bibliothèque PHP n'est pas installée, exécutez :
   ```bash
   sudo apt install php-cli
   ```

## Utilisation

### Experience utilisateur :  

1. **Création d'un Compte** :
   - Inscrivez-vous en fournissant vos informations de base (nom, email, mot de passe, etc.).
   - Complétez votre profil avec des détails supplémentaires comme une photo de profil et une bio.

2. **Navigation et Correspondance** :
   - Utilisez l'interface de type "swipe" pour parcourir les profils :
     - **like** pour indiquer un intérêt.
     - **dislike** pour passer au profil suivant.
   - Vous pouvez également rechercher directement un autre utilisateur par son pseudo.

     ![Texte alternatif](PhP-project/demo/demo_2.png)

3. **Messagerie** :
   - Échangez des messages avec les utilisateurs avec lesquels vous avez établi une correspondance.
   - Les discussions se font en temps réel (actualisation de la page nécessaire).
   - 
     ![Texte alternatif](PhP-project/demo/demo_3.png)

4. **Premium** :
   - Choisissez parmi différents niveaux d'abonnement.
   - Les fonctionnalités premium incluent des filtres de recherche avancés, la possibilité de voir qui a visité votre profil, et des options de messagerie supplémentaires.
   - Les utilisatrices bénéficient d'un accès gratuit aux fonctionnalités de base
  
     ![Texte alternatif](PhP-project/demo/premium.png)

### Super-utilisateur :  

Pour accéder aux fonctionnalités administratives, utilisez les identifiants suivants :
- **Nom d'utilisateur** : admin
- **Mot de passe** : admin

Avec ce compte, vous pouvez :
- Gérer les utilisateurs (ajouter, supprimer, modifier des comptes).
- Superviser les données stockées dans les fichiers.
- Gérer les abonnements et les accès aux fonctionnalités.

D'autres compte peuvent être promus Administrateurs à partir de l'onglet de modification de profil lors dela modération.

## Contact

Membres de l'équipe (CY TECH preing2 MI2) :

- ABEHZELE Estéban - [esteabzl@gmail.com](mailto:esteabzl@gmail.com)
- HOPSORE Paul -  [hopsorepaul@gmail.com](mailto:hopsorepaul@gmail.com)
- WEISS Zachary -  [wzachary@sfr.fr@gmail.com](mailto:wzachary@sfr.fr)
- DASSONVILLE Ilan -  [ilan.dassonville1@gmail.com@gmail.com](mailto:ilan.dassonville1@gmail.com)

