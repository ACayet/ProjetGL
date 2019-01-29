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
De plus, nous sommes un groupe assez nombreux : il a fallu nous organiser, ce qui a été, par moment, assez compliqué. En effet, nous avançons tous à des rythmes très différents notamment entre les groupes Back et Front.

## Points améliorables

Le site comporte des points améliorables : toutes les fonctions que nous avions prévues de réaliser ne sont pas disponibles, celles réalisées sont cependant fonctionnelles. En effet, nous avons préféré privilégier la qualité des fonctions réalisées plutôt que la quantité.
De plus, l'interface (le HTML/CSS) peut être également améliorées : rendre le site plus ergonomique, améliorer et faciliter la navigation...
## Front - End

### Les règles de référencement

Tout d’abord, il faut savoir qu’il existe deux types de référencement, le référencement naturel plus communément appelé le référencement SEO (Search Engine Optimization) qui a pour but d’améliorer le classement de votre site dans les résultats de recherche des différents moteurs de recherche tel que Google, Yahoo ou Bing.
Le second type de référencement est le référencement SEA (Search Engine Advertising).
Pour savoir comment mieux référencer son site web il faut alors savoir comment marche un moteur de recherche. On s’est alors intéressé à Google car c’est le plus grand moteur de recherche du monde qui possède environ 94% de part de marché en France. Etant donné que HoneySHop est seulement implanté en France, Google a été un choix logique, d’autant plus que les autres moteurs de recherche ont les mêmes critères à quelques différences près.

![Part de marcher des moteurs de recherche en France 2017](https://image.noelshack.com/fichiers/2019/05/2/1548771773-google.png)


### Comment ça marche ? 

Les différents moteurs de recherche utilisent des robots ou encore appelés des crawler qui ont pour but de parcourir tout le web de lien en lien et de récupérer des informations sur chaque page existante.
Ces informations sont ensuite gardées en mémoire dans la base de données de Google afin de mieux traiter les requêtes des utilisateurs. En effet Google compare des millions de pages web et les classes en fonction de leurs pertinences avec le mot clé saisis par les utilisateurs.
Mais à quoi les crawler font-ils attention ? C’est ce que nous allons voir ensemble par la suite en détail mais les crawler font attention à certains critères comme les mots-clés, les URL, les balises meta title et meta description ou encore les attributs alt des images pour ne citer qu’eux.

### Les Titres & les balises meta title

En HTML il existe une balise title dans laquelle on indique un titre de page. Celui-ci va se trouver sur l’onglet de la page des navigateurs et apparaîtra aussi sur les résultats de recherche des moteurs de recherche.il faut d’attribuer une balise title unique à chacune des pages du site afin que Google puisse faire la différence entre les différentes pages du site. Aussi, le titre de page doit être compris entre 40 et 60 caractères espaces compris, si le titre est trop long Google n’en affichera seulement qu’une partie. Par ailleurs le mot clé doit se situe au début du titre.

![Part de marcher des moteurs de recherche en France 2017](https://image.noelshack.com/fichiers/2019/05/2/1548772676-titre.png)

Il existe aussi une règle importante concernant les titres afin d’améliorer le référencement, il faut respecter la structure des titres.
En HTML les titres s’écrivent entre balises hx (h1, h2, h3…h6). Le titre h1 est le sujet principal de la page. Il faut respecter la hiérarchie entre les différents hx et ne pas commencer sa page par un titre h2 par exemple ou sauter un niveau en commençant par un titre h1 puis h3 sans passer par un titre h2.
Il faut évidemment qu’ils soient uniques et il ne faut surtout pas utiliser plusieurs titres h1 car les crawler n’y comprendrons plus rien puisque cela voudrait dire que la page possède plusieurs sujets principaux.
Par ailleurs il faut aussi éviter de choisir des titres sans liens direct avec le contenu de la page ou d’utiliser des titres vagues tels que « page 1 ».

![hiéarchie hx](https://image.noelshack.com/fichiers/2019/05/2/1548772916-imgffff.png)

### La balise meta description 

En HTML il existe une balise meta description qui fournit à Google et aux autres moteurs de recherche un résumé du contenu de la page. Contrairement à un titre d’une page qui se compose de quelques mots, la meta description peut contenir 1 à 2 phrases. Il faut éviter de rédiger une méta description sans lien direct avec le contenu de la page ou d’utiliser des descriptions trop génériques telles que « Ceci est un site web ». Mais aussi de remplir les balise description de mots-clés uniquement, un seul concernant le sujet de votre page suffit.

![meta description balise](https://image.noelshack.com/fichiers/2019/05/2/1548773917-description.png)

## Retour personnel sur le module

### Aurélie DIEP

Ce projet a été formateur : j'ai pu, pour la première fois dans un projet, participer à la réalisation des fonctionnalités du site (du "back").
Ne maîtrisant pas le PHP et le framework Symfony.

Ce projet n'a cependant pas été de tout repos : en plus d'un nouveau langage à apprendre à apprendre, il a fallu s'organiser et respecter les deadlines imposées. Côté Back, nous avons particulièrement ressenti ces difficultés de manipulation du PHP : j'ai notamment rencontré de nombreux "bugs", des syntaxes un peu particulières à respecter, le cache PHP à vider... Ces erreurs n'étaient pas faciles à débuguer car les erreurs n'étaient pas forcément apparentes.

A refaire, il y a plusieurs points que j'aurais fait différemment :

* dans un premier temps, le choix du langage : j'aurais préféré réaliser un tel projet dans un langage tel que le Java, en utilisant Spring par exemple. En effet, il s'agit d'un langage que je maîtrise davantage et qui, d'un point de vue personnel, me servirait plus (et que j'utilise en entreprise notamment).
* l'organisation du travail et du temps : le temps qu'on a mis (plusieurs semaines) à mettre en place un répertoire Git fonctionnel et le nombre de personnes à travailler sur le BackEnd, insuffisant.

 


