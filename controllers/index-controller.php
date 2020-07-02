<?php 
$urlActu = "https://www.01net.com/rss/info/flux-rss/flux-toutes-les-actualites/";
$urlSecu = "https://www.01net.com/rss/actualites/securite/";
$urlApps = "https://www.01net.com/rss/actualites/applis-logiciels/";
$urlTech = "https://www.01net.com/rss/actualites/technos/";
$urlBuzz = "https://www.01net.com/rss/actualites/buzz-societe/";

$rssDefChoice = [$urlActu, $urlSecu, $urlApps];
$css = "assets/css/defcolor.css";





$rssActu = simplexml_load_file($urlActu);



$item = $rssActu->channel->item[1];
$title = $item->title;
$desc = $item->description;
$link = $item->link;
$date = $item->pubDate;
$img = $item->enclosure;



echo $title, $desc, $link, $date, $img;
var_dump($item);