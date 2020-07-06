<?php
// défini la largeur des colones
if (!isset($_GET['cat'])) {
    switch (count($rssChoice)) {
        case 1:
            $classSecCat = 'col';
            break;
        case 2:
            $classSecCat = 'col-md-6';
            break;
        case 3:
            $classSecCat = 'col-lg-4 col-md-6';
            break;
        default:
            $classSecCat = 'col';
            break;
    }
} else {
    $classSecCat = 'col';
}
//défini couleur badge catégorie
switch ($cat) {
    case 'actu':
        $classBadgeCat = 'primary';
        break;
    case 'tech':
        $classBadgeCat = 'success';
        break;
    case 'buzz':
        $classBadgeCat = 'warning';
        break;
    case 'apps':
        $classBadgeCat = 'info';
        break;
    case 'secu':
        $classBadgeCat = 'danger';
        break;
    default:
        $classBadgeCat = 'muted';
        break;
}
?>

<section class="<?= $classSecCat ?> my-3">
    <?php
    for ($i = 0; $i < $articlesNumber; $i++) {
    ?>
        <div class="media bg-light p-3 border border-bottom shadow">
            <div class="media m-auto">
                <div>
                    <a href="?cat=<?= $cat ?>">
                        <div class="badge badge-<?= $classBadgeCat ?>"><?= $cat ?></div>
                    </a>
                    <img src="<?= sortItem($rss, $i, 'img') ?>" class="imgMedia mt-3 rounded d-block" alt="...">
                </div>
                <div class="media-body p-2">
                    <div class="row">
                        <div class="col h6"><?= sortItem($rss, $i, 'title') ?></div>
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <button class="btn buttonArticle btn-sm m-1" type="button" data-toggle="modal" data-cat="<?= $cat ?>" data-catColor="<?= $classBadgeCat ?>" data-title="<?= sortItem($rss, $i, 'title') ?>" data-img="<?= ltrim(sortItem($rss, $i, 'img')); ?>" data-link="<?= ltrim(sortItem($rss, $i, 'link')); ?>" data-date="<?= sortItem($rss, $i, 'pubDate') ?>" data-target="#articlesModal" data-desc="<?= sortItem($rss, $i, 'description') ?>">Détails</button>
                            <a href="<?= sortItem($rss, $i, 'link') ?>" class="btn buttonArticle btn-sm m-1" target="_blank">Lire l'article</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>