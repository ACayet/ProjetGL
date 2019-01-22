# Synthèse

Ce projet a été très formateur : cela a été l'opportunité pour nous de réaliser un projet *from scratch* comme nous avons eu peu d'occassions de le faire au cours de notre cursus.

Nous avons notamment travaillé sur une application qui répondait à un véritable besoin, d'un véritable client : une connaissance d'un membre du groupe qui souhaite se lancer dans l'apiculture et la vente de miel avait besoin d'un site de vente/vitrine.

Pour des raisons pratiques concernant l'hébergement de ce site dans le futur, les coûts que cela peut engendrer, nous avons décidé de réaliser ce site en PHP, en utilisant le framework Symfony.

## Organisation mise en place

Ce projet nous a amené à travailler en groupe de cinq. Il a donc fallu nous organiser pour que tout le monde ait une tâche à réaliser sans que celle-ci n'empiète sur celle d'un autre membre.

Nous avons donc créé des sous-groupes :

* un groupe FrontEnd qui réalise le design du site : rendre les pages ergonomiques, esthétiques en HTML et CSS avec le framework Bootstrap 4.

* un groupe BackEnd qui a pour tâche de réaliser toutes les fonctionnalités, les accès à la base de données du site. Le moteur de templates pour le langage de PHP étant le twig, l'équipe BackEnd se chargait également d'adapter les pages de HTML et CSS faites par l'équipe Front, en twig.

_Par exemple_ : l'équipe Front fournit la page d'accueil avec des liens _href_ et imports _link_

`<link rel="stylesheet" href="css/bootstrap.min.css">`

Cette ligne de code n'est pas lue par Symfony, il faut modifier l'import en rajoutant des balises **{ }** et le mot-clé **asset**

`<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />`

* une personne gérant la documentation, les merges Git ainsi que l'hébergement sur Internet.

|BackEnd         | FrontEnd       | Documentation / Git / hébergement|
|:-              |:-:             |-:                                |
|Aurélie DIEP    | Martin BRUGER  |Arthur CAYET                      |
|Jérémy BERNAUDON| Soufiane OTMANE|                                  |

## Lien entre la théorie et la pratique

## Difficultés rencontrées

Au cours de ce projet, nous avons rencontré différents problèmes : tout d'abord, il a fallu nous familiariser avec le Framework Symfony de PHP que nous n'avions jamais manipulé. En plus de Symfony, il a fallu utiliser d'autres outils en parallèle : l'ORM Doctrine pour le mapping avec la base de données MySQL, Composer pour les dépendances, le moteur de template Twig utilisé par PHP et Symfony pour la vue. Ces outils étant nouveaux pour nous, nous avons rencontré quelques difficultés : les bugs liés au cache à vider, les dépendances à installer etc.

## Points améliorables

Le site comporte des points améliorables : toutes les fonctions que nous avions prévues de réaliser ne sont pas disponibles, celles réalisées sont cependant fonctionnelles. En effet, nous avons préféré privilégier la qualité des fonctions réalisées plutôt que la quantité.
De plus, l'interface (le HTML/CSS) peut être également améliorées : rendre le site plus ergonomique, améliorer et faciliter la navigation...

## Retour personnel sur le module 

###### Aurélie DIEP

Ce projet a été formateur : j'ai pu, pour la première fois dans un projet, participer à la réalisation des fonctionnalités du site (du "back").
Ne maîtrisant pas le PHP et le framework Symfony.

Ce projet n'a cependant pas été de tout repos : en plus d'un nouveau langage à apprendre à apprendre, il a fallu s'organiser et respecter les deadlines imposées. Côté Back, nous avons particulièrement ressenti ces difficultés de manipulation du PHP : j'ai notamment rencontré de nombreux "bugs", des syntaxes un peu particulières à respecter, le cache PHP à vider... Ces erreurs n'étaient pas faciles à débuguer car les erreurs n'étaient pas forcément apparentes.

A refaire, il y a plusieurs points que j'aurais fait différemment :

* dans un premier temps, le choix du langage : j'aurais préféré réaliser un tel projet dans un langage tel que le Java, en utilisant Spring par exemple. En effet, il s'agit d'un langage que je maîtrise davantage et qui, d'un point de vue personnel, me servirait plus (et que j'utilise en entreprise notamment).
* l'organisation du travail et du temps : le temps qu'on a mis (plusieurs semaines) à mettre en place un répertoire Git fonctionnel et le nombre de personnes à travailler sur le BackEnd, insuffisant.
