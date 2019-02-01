# Cahier des charges

## Cadrage et périmètre

Un site web de vitrine et de vente pour un client

## User stories

* En tant que passioné d'abeille je veux une page d'article pour lire des informations interessante sur les abeilles et l'apiculture
* En tant que visiteur je veux pouvoir voir les produits en vente pour pouvoir les acheter
* En tant que client du site, je veux pouvoir m'inscrire pour ne pas avoir a resaisir mes informations entre chaque commandes et avoir un historique de commande
* En tant que client du site, je veux pouvoir me connecter pour ne pas avoir a re renseigner mes informations personnels entre chaque commande
* En tant que administrateur du site web, je veux une page d'administration des produit pour pouvoir ajouter des produits a vendre, les modifier et les supprimer
* En tant que administrateur du site, je veux une page d'administration des article pour pouvoir ajouter des article de blog en modifier, les modifier et en supprimer

## Fonctionnalités

### Client

* s’authentifier pour acheter et pour commenter
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
