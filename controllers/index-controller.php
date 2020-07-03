<?php
//Test si le navigateur accept les cookies
if (isset($_COOKIE["test"])) {
print "Cookies activés.";
}
else {
    setcookie("test", "black", 0);
    if (isset($_COOKIE["test"])) {
    print "Cookies test créé.";
    }
    else {
        print "Cookies refusés.";
    }
}
//initialisation
setlocale(LC_TIME, 'french.UTF-8, fr-FR.UTF-8', 'fr.UTF-8', 'fra.UTF-8', 'fr_FR.UTF-8');
date_default_timezone_set('Europe/Paris');
$urlActu = "https://www.01net.com/rss/info/flux-rss/flux-toutes-les-actualites/";
$urlSecu = "https://www.01net.com/rss/actualites/securite/";
$urlApps = "https://www.01net.com/rss/actualites/applis-logiciels/";
$urlTech = "https://www.01net.com/rss/actualites/technos/";
$urlBuzz = "https://www.01net.com/rss/actualites/buzz-societe/";
$rssChoice = [$urlActu, $urlSecu, $urlApps];
$articlesNumber=3;
$css = "assets/css/defcolor.css";

//Traite les données de formulaire, besoin de vérifs supplémentaires
if (isset($_POST) && !empty($_POST)) {
    if (isset($_POST['colorTheme']) && !empty($_POST['colorTheme'])) {
        $colorTheme = $_POST['colorTheme'];
    } else {
        $colorTheme='Black';
    }
    if (isset($_POST['articlesNumber']) && !empty($_POST['articlesNumber'])) {
        $articlesNumber = intval($_POST['articlesNumber']);
    } else {
        $articlesNumber=3;
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

//renvoie les infos d'un élément d'article article en fonction du flux, de son index
function sortItem($rss,$i,$el) {
    $item = $rss->channel->item[$i];

        if ($el == 'pubDate') {
            $res = strftime('%c',strtotime($item->$el));
        } else {
            $res = $item->$el;
        }
    return $res;
}



//Simple test : Affiche les $articlesNumber premiers articles de chaque flux selectionnés.
foreach ($rssChoice as $key => $value) {
    $rss = simplexml_load_file($value);
    for ($i=0; $i < $articlesNumber ; $i++) { 
        echo sortItem($rss,$i,'title') . '<br>';
        echo sortItem($rss,$i,'description') . '<br>';
        echo sortItem($rss,$i,'link') . '<br>';
        echo sortItem($rss,$i,'pubDate') . '<br>';
        echo sortItem($rss,$i,'enclosure') . '<br>';
        echo '<br>';
    }

}
