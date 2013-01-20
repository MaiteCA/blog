blog
====

Alors voilà, c'est un petit blog en php. quelques trucs à savoir :

Configurer Apache :
-------------------
Il y a un petit fichier .htaccess qui est utilisé pour faire d' l'URL forwarding (c'est à dire qu'au lieu d'avoir des adresses du genre _/index.php?page=post?id=3_ on a _/post-3_
C'est plus joli, mais ça nécessite d'activer le module rewrite\_module de Apache. Dans WAMP : menu "Apache" -> Apache modules -> cocher rewrite\_module (il faut défiler un peu pour le trouver).

Version de PHP Apache :
-----------------------
Il faudra php 5.4 au minimum pour que le script fonctionne, surtout à cause de la syntaxe raccourcie pour les tableaux.


Principe de fonctionnement:
---------------------------
Je décrirai le fonctionnement plus en détail quand j'aurai le temps, mais en gros c'est du [MVC (cf wikipedia)](http://fr.wikipedia.org/wiki/Mod%C3%A8le-Vue-Contr%C3%B4leur) à ma sauxe. Voilà le principe :

-   Tout passe systématiquement par la page index.php, qui inclue le modèle (tout ce qui est en rapport avec la base de donnée) avec un require, vérifie la page qu'on cherche à atteindre, et redirige ensuite vers le controller qui correspond à la page
-   Le controller fait appel au modèle pour lire ou écrire dans la base de donnée, récupère des infos qu'il met dans des tableaux, mais **n'affiche rien**. Ensuite il appelle la vue commune base.tpl.php, qui elle même incluera la vue qui correspond à la page demandée.
-   Les vues se chargent ensuite de l'affichage html en récupérant les infos des tableaux créés par les controllers. (Par contre, une vue ne fait aucun traitement de l'information, elle se contente d'afficher).

Voilà, have fun !
