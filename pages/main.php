<main class="container">
    <div class="row justify-content-center">
        <?php
        if (empty($_GET['cat'])) {
            foreach ($rssChoice as $key => $cat) {
                $rss = simplexml_load_file($cache_files[$cat]);
                require('pages/page.php');
            }
        } else {
            $rss = simplexml_load_file($cache_files[$cat]);
            require('pages/page.php');
        }
        ?>
    </div>
</main>