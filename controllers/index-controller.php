<?php

//initialisation
setlocale(LC_TIME, 'french.UTF-8, fr-FR.UTF-8', 'fr.UTF-8', 'fra.UTF-8', 'fr_FR.UTF-8');
date_default_timezone_set('Europe/Paris');
$urlRss = [
    'actu' => "https://www.01net.com/rss/info/flux-rss/flux-toutes-les-actualites/",
    'secu' => "https://www.01net.com/rss/actualites/securite/",
    'apps' => "https://www.01net.com/rss/actualites/applis-logiciels/",
    'tech' => "https://www.01net.com/rss/actualites/technos/",
    'buzz' => "https://www.01net.com/rss/actualites/buzz-societe/"
];
$cssPath = 'assets/css/';

// mise en cache des fichiers xml
$exire = time() - 1800; //30 min
$upload_dir = '../tmp/'; // dossier ou mettre en cache les fichiers xml

foreach ($urlRss as $cat => $url) {

    $cache_file = $upload_dir . $cat . '.xml'; // on nomme le fichier en cache
    if (file_exists($cache_file) && (filemtime($cache_file) > $exire)) {
        // utilise le fichier en cache
        $file = file_get_contents($cache_file);
     } else {
        // le fichier est périmé on le récupère sur le serveur distant
        // et on le sauve dans le cache pour la prochaine fois
        $file = file_get_contents($url);
        file_put_contents($cache_file, $file, LOCK_EX);
     }
    $cache_files[$cat] = $cache_file; // on cré un tableau avec la liste des fichiers en cache
}

// RUBRIQUES RSS
//récupère données du cookie
if (isset($_COOKIE['rssChoice'])) {
    $rssChoice = json_decode($_COOKIE['rssChoice']);
}
// création du cookie si l'itilsateur personnalise l'affichage
if (isset($_POST['rssChoice']) && !empty($_POST['rssChoice'])) {
    setcookie("rssChoice", json_encode($_POST['rssChoice']), time()+31556926 ,'/');
}
// récupère les choix de flux en priorité $_POST, ensuite $_cookie, sinon valeur par défaut
$rssChoice =  $_POST['rssChoice'] ?? $rssChoice ?? ['actu', 'buzz', 'tech']; 

//TEME
//récupère données du cookie
if (isset($_COOKIE['colorTheme'])) {
    $cssThemeCookie = $_COOKIE['colorTheme'];
}
// récupère le thème via formulaire et cré le cookie
if (isset($_POST['colorTheme']) && !empty($_POST['colorTheme'])) {
    setcookie("colorTheme", $_POST["colorTheme"], time()+31556926 ,'/');
}
// récupère le choix du theme en priorité $_POST, ensuite $_cookie, sinon valeur par défaut
$cssTheme = $_POST["colorTheme"] ?? $cssThemeCookie ?? 'black';
$cssTheme = $cssPath . $cssTheme . 'Theme.css'; // pointe vers le fichier css correspondant
 

//NUMBRE D'ARTICLE AFFICHÉ
//récupère données du cookie
if (isset($_COOKIE['articlesNumber'])) {
    //vérifie que le cookie renvoie 3, 5 ou 8.
    switch ($_COOKIE['articlesNumber']) {
        case '3':
        case '5':
        case '8':
            $articlesNumberCookie = intval($_COOKIE['articlesNumber']);
            break;
        
        default:
            $articlesNumberCookie = 3;
            break;
    }
}
// récupère le thème via formulaire et cré le cookie
if (isset($_POST['articlesNumber']) && !empty($_POST['articlesNumber'])) {
    //vérifie que le formulaire renvoie 3, 5 ou 8.
    switch ($_POST['articlesNumber']) {
        case '3':
        case '5':
        case '8':
            $articlesNumberPost = intval($_POST['articlesNumber']);
            break;
        
        default:
            $articlesNumberPost = 3;
            break;
    }
    setcookie("articlesNumber", $_POST["articlesNumber"], time()+31556926 ,'/');
}
// récupère le choix du theme en priorité $_POST, ensuite $_cookie, sinon valeur par défaut
$articlesNumber = $articlesNumberPost ?? $articlesNumberCookie ?? 3;


//renvoie les infos d'un élément d'article article en fonction du flux, de son index
function sortItem($rss,$i,$el) {
    $item = $rss->channel->item[$i];

        if ($el == 'pubDate') {
            $res = strftime('%c',strtotime($item->$el));
        } elseif ($el == 'img'){
            $res = $item->enclosure['url'];
        } elseif ($el == 'description') {
            $regexDesc = '/(\<br\/\>)/';
            $desc = htmlspecialchars_decode($item->$el);
            $desc = preg_split($regexDesc, $desc);
            $res = $desc[0];
        } else {
            $res = $item->$el;
        }
    return $res;
}

//Simple test : Affiche les $articlesNumber premiers articles de chaque flux selectionnés.
// foreach ($rssChoice as $key => $cat) {
//     $rss = simplexml_load_file($cache_files[$cat]);
//     echo '<b>' . $cat . '</b><br>';
//     for ($i=0; $i < $articlesNumber ; $i++) {
        
//         echo sortItem($rss,$i,'title') . '<br>';
//         echo sortItem($rss,$i,'description') . '<br>';
//         echo sortItem($rss,$i,'link') . '<br>';
//         echo sortItem($rss,$i,'pubDate') . '<br>';
//         echo '<img src="' .sortItem($rss,$i,'img') . '" alt=""><br>';
//         echo '<br>';
//     }
// }
