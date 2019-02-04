# Cahier des charges

## Cadrage et périmètre

Un site web de vitrine et de vente pour un client

## User stories

### Fonctionnalités réalisés

* Comme je suis connecté et administrateur du site, quand je suis sur n'importe quel page du site, je peux acceder aux pages d'administration des produits et du blog depuis la barre de menu en haut de l'ecran.
* En tant que passioné d'abeille je veux une page d'article pour lire des informations interessante sur les abeilles et l'apiculture.
* En tant que visiteur je veux pouvoir voir les produits en vente.
* En tant que client du site, je veux pouvoir m'inscrire pour ne pas avoir a resaisir mes informations entre chaque commandes et avoir un historique de commande.
* En tant que client du site, je veux pouvoir me connecter pour ne pas avoir a re renseigner mes informations personnels entre chaque commande.
* En tant que administrateur du site web, je veux une page d'administration des produit pour pouvoir ajouter des produits a vendre, les modifier et les supprimer.
* En tant que administrateur du site, je veux une page d'administration des article pour pouvoir ajouter des article de blog en modifier, les modifier et en supprimer.

### Besoins futures

* Comme je suis un futur client, quand je suis sur la page d'un produit en vente je peux l'acheter.
* Comme je suis un acheteur, quand j'achete un produit je peux payer avec paypal.

### Bugs

* Comme suis sur la page d'accueil, quand je passe ma souris sur le bouton du carroussel pour aller voir les produits ou le blog je peux voir le texte ressortir sur un fond blanc.
* Comme je suis un client anglais quand je me connecte je veux pouvoir comprendre le formulaire dans ma langue

## Fonctionnalités

### Client

* s’authentifier pour acheter et pour commenter
* S'inscrire pour sauvegarder mes informations et ne pas avoir a les resaisir a chaque fois que je fais un achat. je dois pour cela renseigné mon prenom, mon nom de famille, mon adresse email, mon mot de passe, confirmer mon mot de passe, ma ville, et mon adresse.
* acheter des pots de miel : l'utilisateur reçoit un mail confirmant son achat et lui demandant d'envoyer un chèque.
* déposer un commentaire : une fois authentifié l'utilisateur peut déposer un commentaire sur produit ou sur un article de blog
* rechercher un article de blog ou un produit
* géolocaliser (comment s’y rendre avec une maps et des marqueurs) le producteur de miel

### Admin

* s’authentifier avec son adresse mail et un mot de passe grâce a une page de connexion
* ajout de produit : il a rentre un nom de produit, une description, le prix (en euros), le stock, et la quantité (en mL)
* supprimer un article de blog et un produit
* un formulaire pour écrire des articles de blog

## Site

* envoi de mail récapitulatif aux clients qui ont acheté un produit
* implémentation de l’API Paypal pour l’achat

## Outils

* PHP / Framework Symfony
* Composer pour la gestion de dépendances
* MySQL pour la base de données

## PVM (produit minimum viable)

* Page d'accueil
* Page blog avec des articles : visible en mode hors ligne, une page présentant l'ensemble des articles et un lien vers chaque article
* Page de produits (pots de miel) en vente : une page présentant tous les produits et un lien vers chaque produit
* Page inscription utilisateur : l'utilisateur rentre son nom, prénom, adresse mail (qu'il va utiliser pour s'authentifier), mot de passe (deux fois pour le confirmer), numéro de téléphone, adresse et ville.
* Page connexion utilisateur : l'utilisateur se connecte avec son adresse mail et son mot de passe
* Page ajout de produits à vendre pour l'administrateur : page qui est réservée à l'administrateur et qui n'est donc pas accessibles aux autres utilisateurs.

## Architecture

Les fichiers les plus importants sont placés dans les dossiers adequats a la racine du dossier Beeshop:

* `/templates` : contient les fichiers .twig permettant l'affichages des pages de l'application et certains traitement d'affichages
* `/tests` : contient les tests de l'application realisé avec phpunit.
* `/translations` : contient les dictionnaires des differentes langues où tous les messages statiques de l'application sont traduits. Un fichier par langue.
* `/public` : contient les ressouces de l'applications css, polices, images et fichiers javascript
* `/src` : contient differents sous dossiers
  * `/Controller` : contient les controllers de l'application realisant les differents traitement affectation de variables, sessions...
  * `/Entity` : contient les fichiers qui definissent le schema de la base de données pour l'ORM doctrine.
  * `/Form` : contient la structure des formulaires realisé avec le gestionnaire de formulaire de symfony (le formulaire de connexion n'est pas dans ce fichier)
  * `/Repository` : contient les fichiers qui definissent les fonctions permettant de realiser des requetes sur la base de données pour chaque table/classes.
  * `/Migrations` : contient les fichiers resultant des migrations realisé de l'application c'est a dire les diffrentes modifications apporté a la stucture de la base de données apres sa creation initiale.
* `/var` contient un dossiers interresant : les logs de l'application permettant de debugger plus efficacement l'application. Ce dossier est ignoré par git.

f