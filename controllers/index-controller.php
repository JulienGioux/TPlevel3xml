<?php 
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

echo $title, $desc, $link, $date, $img;
var_dump($item);

$css = "";
if (isset($_POST["submit"])) {
    if(isset($_POST["colorTheme"])) {
        if($_POST["colorTheme"] == 'black') {
            $css = 'assets/css/blackTheme.css';
            setcookie("colorTheme", $css, time()+31556926 ,'/');
            header("Location: $_SERVER[PHP_SELF]");
        } else if ($_POST["colorTheme"] == 'red') {
            $css = 'assets/css/redTheme.css';
            setcookie("colorTheme", $css, time()+31556926 ,'/');
            header("Location: $_SERVER[PHP_SELF]");
        } else if ($_POST["colorTheme"] == 'blue') {
            $css = 'assets/css/blueTheme.css';
            setcookie("colorTheme", $css, time()+31556926 ,'/');
            header("Location: $_SERVER[PHP_SELF]");
        }
    }
}




