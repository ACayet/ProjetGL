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

Ce projet nous a permis d'allier pratique et théorie que ce soit dans l'utilisation de markdown mais aussi des tests.
Cependant, étant donné le langage de programmation choisi et le framework utilisé, il a été compliqué d'appliquer à la lettre le cours : les tests unitaires par exemple n'ont pas pu faire étant donné que Symfony réalise de nombreuses fonctionnalités de lui-même.

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

Dans ce rapport nous allons prendre comme exemple le mot clé "miel bio" qui a été trouver grâce aux outils que nous allons présenté prochainement. Nous le ferons apparaître dans les endroits stratégiques pour améliorer son référencement naturel.

### Les Titres & les balises meta title

En HTML il existe une balise title dans laquelle on indique un titre de page. Celui-ci va se trouver sur l’onglet de la page des navigateurs et apparaîtra aussi sur les résultats de recherche des moteurs de recherche.il faut d’attribuer une balise title unique à chacune des pages du site afin que Google puisse faire la différence entre les différentes pages du site. Aussi, le titre de page doit être compris entre 40 et 60 caractères espaces compris, si le titre est trop long Google n’en affichera seulement qu’une partie. Par ailleurs le mot clé doit se situe au début du titre.

![Part de marcher des moteurs de recherche en France 2017](https://image.noelshack.com/fichiers/2019/05/2/1548772676-titre.png)

Il existe aussi une règle importante concernant les titres afin d’améliorer le référencement, il faut respecter la structure des titres.
En HTML les titres s’écrivent entre balises hx (h1, h2, h3…h6). Le titre h1 est le sujet principal de la page dans lequel le mot clé doit apparaitre. Il faut respecter la hiérarchie entre les différents hx et ne pas commencer sa page par un titre h2 par exemple ou sauter un niveau en commençant par un titre h1 puis h3 sans passer par un titre h2.
Il faut évidemment qu’ils soient uniques et il ne faut surtout pas utiliser plusieurs titres h1 car les crawler n’y comprendrons plus rien puisque cela voudrait dire que la page possède plusieurs sujets principaux.
Par ailleurs il faut aussi éviter de choisir des titres sans liens direct avec le contenu de la page ou d’utiliser des titres vagues tels que « page 1 ».

![hiéarchie hx](https://image.noelshack.com/fichiers/2019/05/4/1548955959-gl.png)

### La balise meta description 

En HTML il existe une balise meta description qui fournit à Google et aux autres moteurs de recherche un résumé du contenu de la page. Contrairement à un titre d’une page qui se compose de quelques mots, la meta description peut contenir 1 à 2 phrases. Il faut éviter de rédiger une méta description sans lien direct avec le contenu de la page ou d’utiliser des descriptions trop génériques telles que « Ceci est un site web ». Mais aussi de remplir les balise description de mots-clés uniquement, un seul concernant le sujet de votre page suffit.

![meta description balise](https://image.noelshack.com/fichiers/2019/05/2/1548773917-description.png)

### Les url

Il est conseillé d’utiliser des mots-clés dans les URL. Les URL contenant du texte correspondant au contenu et à la structure du site sont plus conviviales pour les visiteurs qui parcourent le site d’autant plus que cela permettra aux visiteurs de mémorisr les URL plus facilement et seront plus susceptibles d’établir des liens vers ces URL.En effet il faut éviter des URL trop longues avec des paramètres inutiles pour l’internaute. Les utilisateurs risquent d’être intimidés par des URL extrêmement longues et contenant très peu de mots reconnaissables.

![Mauvaise url](https://image.noelshack.com/fichiers/2019/05/2/1548774198-url-bad.png)

Ce type d’URL peut être déconcertant et peu convivial. Les utilisateurs auraient des difficultés à mémoriser l’URL par cœur. De plus, les utilisateurs pourraient penser qu’une partie de l’URL est inutile et ils pourraient laisser de côté une partie de l’URL et corrompre ainsi le lien.Il faut garder en tête que tout le monde ne navigue pas de la même manière sur un site web et beaucoup navigue par les URL, il faut donc anticiper leurs comportements afin de rendre l’expérience des utilisateurs le plus convivial possible.

![Bonne url ](https://image.noelshack.com/fichiers/2019/05/2/1548774427-url-good.png)


### Les images 

Il faut savoir qu’en HTML il existe une balise alt pour les images qui sont souvent négligés mais c’est une grosse erreur. Il faut garder en tête que les crawler sont des robots et de ce fait ils ne voient pas les images telles que nous les voyons. Les balise alt sont donc là pour donner un descriptif au robot.
 Si vous avez le logo de votre entreprise dans l’une de vos pages il faut donc renseigner « logo HoneyShop» par exemple. L’idéal est d’avoir une balise alt contenant le mot clé de votre page.

 ![alt balise](https://image.noelshack.com/fichiers/2019/05/4/1548955959-gl.png)

### Les mots-clés

Il faut tout d’abord cibler des mots clés liés à notre secteur d’activité. Plus un mot clé est ciblé, plus on aura des chances de bien se positionner. La concurrence sera moindre et le trafic qui en résultera sera du trafic hautement qualifié, autrement dit des utilisateurs qui cherchent exactement ce que l’on propose. Il faut être donc précis si on utilise le mot clé « travaux » par exemple, l’internaute peut aussi bien vouloir chercher des sites qui vend du matériel de travaux que des devis.
L’internaute qui arrivera sur notre site ne viendra donc pas forcément pour passer commande. Il faut choisir des mots-clés composés de plusieurs mots, la plupart des recherches sur les moteurs de recherche se composent de deux, trois voire quatre mots. Il faut donc ne pas hésiter à utiliser des synonymes mais surtout il faut des mots clés à notre mesure.
Idéalement les mots-clés doivent être faiblement convoités et apporter beaucoup de trafic qualifié, mais en réalité c’est assez rare il faut donc trouver le bon compromis entre la convoitise que suscite le mot clé chez les concurrents et ce que recherchent les internautes. Certains outils existent pour nous aider dans nos choix de mots-clés tels que Google Adword plutôt utilisé pour des campagnes de publicité Google ou SemRush et kwFinder que nous allons décrire dans les points suivants.

## Outils

### SemRush

SemRush est un outil qui propose non seulement des mots-clés pour notre site web mais  permet également de voir pour quel mot clé nos concurrents se positionnent.

Voici comment se présente SemRush, on renseigne l’URL du site pour lequel on souhaiterait avoir un audit sur les mots-clés.

 ![semrush](https://image.noelshack.com/fichiers/2019/05/2/1548775615-semrush.png)

En haut à gauche on a le nombre de visiteurs moyen mensuel qui viennent sur notre site en recherche organique autrement dit grâce au référencement naturel. Ensuite on a le nombre de visiteurs qui découle de référencement payant et enfin le nombre de backlinks.
Les backlinks sont les sites qui parlent de notre site et qui nous ont cités comme source en indiquant l’URL de notre site, plus on parle de nous, plus on a de chance de générer du trafic sur notre site. On peut obtenir grâce à SemRush l’URL des sites qui parlent de nous.

 ![semrush](https://image.noelshack.com/fichiers/2019/05/2/1548776023-semrrushh.png)
 
 Mais le plus intéressant est la liste de mots-clés que SemRush  propose  :
 
 ![semrush](https://image.noelshack.com/fichiers/2019/05/2/1548776401-semrushhhhhhh.png)

SemRush met à disposition différents indicateurs concernant les mots clés. On a la position, le volume, le KD, le tarif CPC, le trafic que nous génère le mot clé, la concurrence sur le mot clé etc. On peut voir la position de notre site web en tapant tel ou tel mot clé, on peut bien évidemment régler l’outil pour qu’ils nous renvoient les mots-clés les mieux positionnés ou les moins bien positionné et ceux pour tous les indicateurs. Ils nous indiquent le volume pour lequel le mot-clé est tapé par les internautes sur Google en moyenne annuel. Le KD est le niveau de difficulté de se positionner sur un mot-clé.

 ![semrush](https://image.noelshack.com/fichiers/2019/05/2/1548776458-seo.png)
 
Le tarif CPC ou coût par clic est le prix à payer par clic pour le mot clé choisie si on souhaiterait faire des campagnes publicitaires sur Google avec notamment Google Adword évoqué précédemment. Autrement dit si le mot clé « gelée royale» nous intéresse et que le cout CPC est de 1.12 on devra payer 1.12 USD pour chaque clic que les internautes feront pour rentrer dans notre site via notre annonce Google, il faut donc bien choisir car la facture peut très vite monter.


### kwFinder

KwFinder est un outil qui nous propose une liste en rapport à un mot clé tapez et qui nous indique la difficulté à ce positionner dessus. Par exemple on a tapez le mot clé " miel" et l'outil nous a proposer un certain nombre de mot clé dont le mot clé "miel bio" qui était noté comme " facile" afin de ce positionner sur ce mot clé.

 ![semrush](https://image.noelshack.com/fichiers/2019/05/2/1548777421-kwfinder.png)
 
 ![semrush]( https://image.noelshack.com/fichiers/2019/05/2/1548777503-kwfinder2.png)


## Retour personnel sur le module

### Aurélie DIEP

Ce projet a été formateur : j'ai pu, pour la première fois dans un projet, participer entièrement à la réalisation des fonctionnalités du site (du "back").
Ne maîtrisant pas le PHP et le framework Symfony, ce projet n'a cependant pas été de tout repos : en plus d'un nouveau langage à apprendre à apprendre, il a fallu s'organiser et respecter les deadlines imposées. 
Côté Back, nous avons particulièrement ressenti ces difficultés de manipulation du PHP : j'ai notamment rencontré de nombreux "bugs", des syntaxes un peu particulières à respecter, le cache PHP à vider... Ces erreurs n'étaient pas faciles à débuguer car les erreurs n'étaient pas forcément apparentes.

A refaire, il y a plusieurs points que j'aurais fait différemment :

* le choix du langage : j'aurais préféré réaliser un tel projet en Java, en utilisant le framework Spring ou SpringBoot. En effet, il s'agit d'un langage que je maîtrise davantage et qui, d'un point de vue personnel, me servirait plus (et que j'utilise en entreprise notamment). D'un point de vue personnel, je pense que le langage que nous avons choisi nous a fait perdre un peu de temps : les bugs rencontrées, le fait que nous étions tous débutants dans ce langage a fait que nous avons mis du temps à nous lancer complètement dans la réalisation du site.
* l'organisation du travail et du temps : le temps qu'on a mis (plusieurs semaines) à mettre en place un répertoire Git fonctionnel et le nombre de personnes à travailler sur le BackEnd et à réaliser les tests, insuffisant.
* la mise en place d'une méthode de travail comme la méthode Agile Scrum par exemple qui nous aurait permis d'être, dès le début, plus régulier et plus efficace dans la réalisation du site : des livraisons (dans notre cas, des merges sur Git) régulières de chacun des membres BackEnd et FrontEnd, des deadlines à respecter(fonctionnalités à finir avant telle ou telle date etc).

#### Retour personnel sur le cours

Faisant du Java Spring/SpringBoot en entreprise (malgré le fait que notre projet n'utilise pas ce langage), ce cours m'a permis de comprendre certaines notions qui n'étaient pas très claires (notamment les annotations, le Autowired, les beans etc). Cependant le cours des Patterns de Programmation a été un peu compliqué à suivre et à comprendre.
J'ai également apprécié la liberté qui nous a été donnée dans le choix du projet.

### Soufiane OTMANE

Ce projet a été l'occassion pour moi de monter en compétence sur la notion du référencement, issu d'un DUT informatique j'ai appris à créer différents sites internet sur différents langages mais j'ai jamais eu l'occassion de traiter la notion de référencement qui est la finalité de tout site internet, en effet tous sites internet a pour but final d'engendrer du trafic. J'ai beaucoup appris sur les règles de référencements et j'ai découvert que je codais des sites internet qui allait tous dans le sens inverse des règles de référencement, par exemple lorsque je m'occupais du frontEnd au début je choisisais mes titre h1,h2...h6 par soucis de taille hors que l'une des règles du référencement est de respecté la hiarchie des balises h1,h2...h6 et que pour répondre aux soucis de taille il fallait utiliser un peu de css et modifier les tailles des balises hx. De plus ce projet m'a permis de me replonger sur le côté frontEnd d'un site internet, en effet habituer a être du côté backEnd ce projet m'as permis de renforcer mes connaissances sur le côté frontEnd et m'as permis d'apprendre a réutiliser Bootstrap qui est passé récemment à la version 4. Le fait que notre projet a pour finalité de répondre à un réel besoin d'un apiculteur a été motivant.

Avec le recul, les points que j'aurai améliorer et/ou fait différemment sont : 

* Je me serais investi également sur le côté backEnd
* Concernant le cour en générale j'ai appris différents outils tel que git que je connaissais que de nom et qu'on a donc utiliser, sans ce cour je ne pense pas que j'aurai chercher à apprendre à l'utiliser.