<section class="<?= (empty($_GET['cat'])) ? 'col-lg-4 col-md-6' : 'col' ?> my-3">
    <?php
    for ($i = 0; $i < $articlesNumber; $i++) {
    ?>
        <div class="media bg-light p-3 border border-bottom shadow">
            <div class="media">
                <img src="<?= sortItem($rss, $i, 'img') ?>" class="imgMedia mr-3" alt="...">
                <div class="media-body mb-3">
                    <div class="row">
                        <div class="col h6 mb-4"><?= sortItem($rss, $i, 'title') ?></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-secondary btn-sm" type="button" data-toggle="modal" data-title="<?= sortItem($rss, $i, 'title') ?>" data-img="<?= ltrim(sortItem($rss, $i, 'img')); ?>" data-link="<?= ltrim(sortItem($rss, $i, 'link')); ?>" data-date="<?= sortItem($rss,$i,'pubDate') ?>" data-target="#articlesModal" data-desc="<?= sortItem($rss,$i,'description') ?>">Détails</button>
                            <button class="btn btn-secondary btn-sm" type="button"><a href="<?= sortItem($rss, $i, 'link') ?>" class="text-white" target="_blank">lire l'article</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
