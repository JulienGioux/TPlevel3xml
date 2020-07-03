<?php
//Test si le navigateur accept les cookies
if (isset($_COOKIE["test"])) {
    $testCookie = true;
} else {
    setcookie("test", "ok", time()+3600*24*365);
}

if (isset($_COOKIE["test"])) {
    $testCookie = true;
}
else {
    $testCookie = false;
}

var_dump($_POST);
//initialisation
setlocale(LC_TIME, 'french.UTF-8, fr-FR.UTF-8', 'fr.UTF-8', 'fra.UTF-8', 'fr_FR.UTF-8');
date_default_timezone_set('Europe/Paris');
$urlActu = "https://www.01net.com/rss/info/flux-rss/flux-toutes-les-actualites/";
$urlSecu = "https://www.01net.com/rss/actualites/securite/";
$urlApps = "https://www.01net.com/rss/actualites/applis-logiciels/";
$urlTech = "https://www.01net.com/rss/actualites/technos/";
$urlBuzz = "https://www.01net.com/rss/actualites/buzz-societe/";

$rssDefChoice = [$urlActu, $urlSecu, $urlApps];

$rssActu = simplexml_load_file($urlActu);

$item = $rssActu->channel->item[1];
$title = $item->title;
$desc = $item->description;
$link = $item->link;
$date = $item->pubDate;
$img = $item->enclosure;
$rssChoice = [$urlActu, $urlSecu, $urlApps];
$css = 'assets/css/blackTheme.css';

//Traite les données de formulaire, besoin de vérifs supplémentaires
if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['colorTheme']) && !empty($_POST['colorTheme'])) {
            if($_POST["colorTheme"] == 'black') {
                $css = 'assets/css/blackTheme.css';
                setcookie("colorTheme", $css, time()+31556926 ,'/');
            } else if ($_POST["colorTheme"] == 'red') {
                $css = 'assets/css/redTheme.css';
                setcookie("colorTheme", $css, time()+31556926 ,'/');
            } else if ($_POST["colorTheme"] == 'blue') {
                $css = 'assets/css/blueTheme.css';
                setcookie("colorTheme", $css, time()+31556926 ,'/');
            }
    }
    if (isset($_POST['articlesNumber']) && !empty($_POST['articlesNumber'])) {
        if($_POST["articlesNumber"] == '3') {
            $articlesNumber = intval($_POST['articlesNumber']);
            setcookie("articlesNumber", $_POST["articlesNumber"], time()+31556926 ,'/');
        } else if ($_POST["articlesNumber"] == '5') {
            $articlesNumber = intval($_POST['articlesNumber']);
            setcookie("articlesNumber", $_POST["articlesNumber"], time()+31556926 ,'/');
        } else if ($_POST["articlesNumber"] == '8') {
            $articlesNumber = intval($_POST['articlesNumber']);
            setcookie("articlesNumber", $_POST["articlesNumber"], time()+31556926 ,'/');
        }
    }
    if (isset($_POST['subCheck']) && !empty($_POST['subCheck'])) {
        $rssChoice = [];
        foreach ($_POST['subCheck'] as $key => $value) {            
            $rssChoice[$key] = $value;
        }        
     } else {
        $rssChoice = [$urlActu, $urlSecu, $urlApps];
     } 
}
if (isset($_POST) && !empty($_POST) && $testCookie) {
    header("Location: $_SERVER[PHP_SELF]");
}

$articlesNumber = $_POST['articlesNumber'] ?? $_COOKIE['articlesNumber'] ?? 3;

//renvoie les infos d'un élément d'article article en fonction du flux, de son index
function sortItem($rss,$i,$el) {
    $item = $rss->channel->item[$i];

        if ($el == 'pubDate') {
            $res = strftime('%c',strtotime($item->$el));
        } elseif ($el == 'img'){
            $res = $item->enclosure['url'];
        } else {
            $res = $item->$el;
        }
    return $res;

}


//Simple test : Affiche les $articlesNumber premiers articles de chaque flux selectionnés.
// foreach ($rssChoice as $key => $value) {
//     $rss = simplexml_load_file($value);
//     for ($i=0; $i < $articlesNumber ; $i++) {
        
//         echo sortItem($rss,$i,'title') . '<br>';
//         echo sortItem($rss,$i,'description') . '<br>';
//         echo sortItem($rss,$i,'link') . '<br>';
//         echo sortItem($rss,$i,'pubDate') . '<br>';
//         echo sortItem($rss,$i,'img') . '<br>';
//         echo '<br>';
//     }
// }
