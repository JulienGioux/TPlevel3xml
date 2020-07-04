<?php
// défini la largeur des colones
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

?>

<section class="<?= $classSecCat ?> my-3">
    <?php
    for ($i = 0; $i < $articlesNumber; $i++) {
    ?>
        <div class="media bg-light p-3 border border-bottom shadow">
            <div class="media">
                <div>
                <div class="badge badge-primary"><?= $cat ?></div>
                
                <img src="<?= sortItem($rss, $i, 'img') ?>" class="imgMedia mr-3 rounded mx-auto d-block" alt="...">
                </div>
                <div class="media-body p-2">
                    <div class="row">
                        <div class="col h6"><?= sortItem($rss, $i, 'title') ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-secondary btn-sm m-1" type="button" data-toggle="modal" data-title="<?= sortItem($rss, $i, 'title') ?>" data-img="<?= ltrim(sortItem($rss, $i, 'img')); ?>" data-link="<?= ltrim(sortItem($rss, $i, 'link')); ?>" data-date="<?= sortItem($rss,$i,'pubDate') ?>" data-target="#articlesModal" data-desc="<?= sortItem($rss,$i,'description') ?>">Détails</button>
                            <button class="btn btn-secondary btn-sm m-1" type="button"><a href="<?= sortItem($rss, $i, 'link') ?>" class="text-white" target="_blank">lire l'article</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
