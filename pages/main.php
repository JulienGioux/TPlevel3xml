<main class="container-fluid p-3">
    <div class="row">
        <?php
            if (empty($_GET['cat'])) {
                foreach ($rssChoice as $key => $cat) {
                    $rss = simplexml_load_file($cache_files[$cat]);
                    require('pages/page-template.php');
                } 
            } else {
                $rss = simplexml_load_file($cache_files[$cat]);
                require('pages/page-template.php');
            }
        ?>
    </div>
</main>