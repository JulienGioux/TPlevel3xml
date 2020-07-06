<?php
// défini la largeur des colones
if (!isset($_GET['cat'])) {
    switch (count($rssChoice)) {
        case 1:
            $classSecCat = 'col-md-8';
            break;
        case 2:
            $classSecCat = 'col-md-6';
            break;
        case 3:
            $classSecCat = 'col-lg-4 col-md-6';
            break;
        default:
            $classSecCat = 'col-md-8';
            break;
    }
} else {
    $classSecCat = 'col-md-8';
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

<section class="<?= $classSecCat ?> my-2">
    <?php
    for ($i = 0; $i < $articlesNumber; $i++) {
    ?>
        <div class="media-body justify-content-center bg-light p-1 border border-bottom shadow animate__animated animate__bounceInUp">
            <div class="media">
                <div>
                    <a href="?cat=<?= $cat ?>">
                        <div class="mb-1 badge badge-<?= $classBadgeCat ?>"><?= $cat ?></div>
                    </a>
                    <img src="<?= sortItem($rss, $i, 'img') ?>" class="imgMedia mt-2 rounded d-block" alt="...">
                </div>
                <div class="media-body d-flex flex-column align-items-start m-0 p-2" style="min-height: 140px">
                    <div class="m-0">
                        <div class="h6"><?= sortItem($rss, $i, 'title') ?></div>
                    </div>
                    <div class="mt-auto align-self-end">
                        <div class="justify-self-end">
                            <button class="btn buttonArticle btn-sm m-1" type="button" data-toggle="modal" data-cat="<?= $cat ?>" data-catColor="<?= $classBadgeCat ?>" data-title="<?= sortItem($rss, $i, 'title') ?>" data-img="<?= trim(sortItem($rss, $i, 'img')); ?>" data-link="<?= trim(sortItem($rss, $i, 'link')); ?>" data-date="<?= sortItem($rss, $i, 'pubDate') ?>" data-target="#articlesModal" data-desc="<?= sortItem($rss, $i, 'description') ?>">Détails</button>
                            <button type="button" onclick="window.open('<?= trim(sortItem($rss, $i, 'link'));?>', 'Article');" class="btn buttonArticle btn-sm m-1">Lire l'article</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>