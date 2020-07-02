Super Rss Reader
Vous allez créer un site permettant d’afficher le contenu de plusieurs flux RSS ( 3 exactement ! ) sur les sujets suivants :

Sécurité
Applis, Logiciels
Etc ...
Les sources se trouvent à cette adresse : https://www.01net.com/info/flux-rss/
Vous allez devoir faire un vhost : www.myrssfeed.info

Voici la structure de votre site :

/assets
/img
script.js
style.css
/controllers
index-controller.php
pages-controller.php
/pages
pages.php
404.php
index.php
.htaccess
Accueil : index.php
accueil

La Navbar
Une navbar pour naviguer/choisir les différents sujets cités plus hauts.
Dans celle-ci, nous devons donc voir afficher :

Les 3 sujets sélectionnés dans les préférences. (détails plus bas).
Un bouton paramètre permettant de modifier les préférences utilisateurs.
Le custom des paramètres
Faire une formulaire permettant de personnaliser son lecteur de flux rss. (Attention le formulaire devrait être sur la page index.php).

Choix du design du site : Noir / Bleu / Rouge ( Exemples de couleurs )
Nombre d’articles affichés par sujet sur la page d’accueil : 3 / 5 / 8
Choix des sujets sous forme de checkbox (proposer 5 choix) : Nous verrons donc les 3 sujets cochés.
!! ASTUCE !! N'oubliez pas de manger des cookies

Le corps de la page d'accueil
3 colonnes contenant le fil d'actualité (selon les sujets), sous cette forme : exemple d'une colonne fil
ZOOM sur le "fil d'actus"
Les articles du fil d'actus sera cette forme :
fil1

Un carré de couleur défini par le sujet : ex. tous les sujets 1 seront bleus.
Le titre de l'actualité.
Un bouton loupe : Qui va ouvrir une modal.
Un bouton lien : Qui ouvrira directement l'article.
La modal sera sous cette forme :
modal2

Date en français de l’article.
Titre de l’article.
Image de l’article.
Description de l'article.
Un bouton pour fermer la modal.
Un bouton/lien pour ouvrir l’url de l’article.
pages.php : "lorsque nous cliquons sur un sujet dans la navbar"
Afficher dans pages.php uniquement le fil d'actus du sujet correspondant.
Cependant : Tous les sujets seront présents sous formes de "cartes horizontales"
sujet1
URL Rewriting : Personnalisation des URLs
Faire en sorte que :

accueil.html corresponds à index.php
actualites.html corresponds à pages.php avec le sujet Actualités
produits.html corresponds à pages.php avec le sujet Produits
etc ...
... penser à que tous les 5 sujets soient disponibles en URL
DERNIER DETAIL
Il faut faire en sorte de disposer d'une page erreur 404 personnalisée.

A vous de jouer !!! blush Go! Go! Go!
