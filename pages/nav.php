<nav class="navbar navbar-dark navbar-expand-lg shadow">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($rssChoice as $key => $value) {?>
            <li class="nav-item active">
                <a class="nav-link navText rounded-pill text-center" href="<?= $value ?>"><?= $value ?></a>
            </li>
            <?php } ?>
        </ul>
        <button type="button" class="btn buttonParamaters" data-toggle="modal" data-target="#parametersModal">
            Paramètres
        </button>
    </div>
</nav>