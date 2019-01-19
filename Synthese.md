#Synthèse :

Ce projet a été très formateur : cela a été l'opportunité pour nous de réaliser un projet "from scratch" comme nous avons peu pu le faire au cours de notre formation.

Nous avons notamment travailler sur une application qui répondait à un véritable besoin, d'un véritable client : une connaissance d'un membre du groupe qui souhaite se lancer dans l'apiculture et la vente de miel avait besoin d'un site de vente/vitre. 

Pour des raisons de pratique concernant l'hébergement de ce site dans le futur, les coûts que cela peut engendrer, nous avons décidé de réaliser ce site en PHP, en utilisant le framework Symfony.

## Organisation mise en place 

Ce projet nous a amené à travailler en groupe de cinq. Il a donc fallu nous organiser pour que tout le monde ait une tâche à réaliser sans que celle-ci n'empiète sur celle d'un autre membre.
Nous avons donc créé des sous-groupes : 

* un groupe FrontEnd qui réalise le design du site : rendre les pages ergonomiques, esthétiques en HTML et CSS avec le framework Bootstrap 4.   
<br/>
* un groupe BackEnd qui a pour tâche de réaliser toutes les fonctionnalités, les accès à la base de données du site. Le moteur de template pour le langage de PHP étant le twig, l'équipe BackEnd se chargait également d'adapter les pages de HTML et CSS faites par l'équipe Front, en twig.    
  <br/>
  _Par exemple_ : l'équipe Front fournit la page d'accueil avec des liens _href_ et imports _link_     

  `<link rel="stylesheet" href="css/bootstrap.min.css">`
 
  Cette ligne de code n'est pas lu par Symfony, il faut modifier l'import en rajoutant des balises **{ }** et le mot-clé **asset**
  
  `<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />`
  
  <br/>
* une personne gérant la documentation et le Git.

BackEnd | FrontEnd | Documentation et Git
- |:-:|-:
|Aurélie DIEP| Martin BRUGER|Arthur CAYET
|Jérémy BERNAUDON| Soufiane OTMANE|


## Lien entre la théorie et la pratique

## Difficultés rencontrées 

Au cours de ce projet, nous avons rencontré différents problèmes : tout d'abord,il a fallu nous familiariser avec le Framework Symfony de PHP que nous n'avions jamais manipulé. En plus de Symfony, il a fallu utiliser d'autres outils en parallèle : l'ORM Doctrine pour le mapping avec la base de données MySQL, Composer pour les dépendances, le moteur de template Twig utilisé par PHP et Symfony pour la vue. Ces outils étant nouveaux pour nous, nous avons rencontré quelques difficultés : les bugs liés au cache à vider, les dépendances à installer etc.  
  
## Points améliorables    

Le site comporte des points améliorables : toutes les fonctions que nous avions prévues de réaliser ne sont pas disponibles, celles réalisées sont cependant fonctionnelles. En effet, nous avons préféré privilégier la qualité des fonctions réalisées plutôt que la quantité.
De plus, l'interface (le HTML/CSS) peut être également améliorées : rendre le site plus ergonomique, améliorer et faciliter la navigation...  

## Retour personnel sur le module 
