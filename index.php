<?php require_once "controllers/index-controller.php" ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/level3xml.css">
    <link rel="stylesheet" href="<?= $cssTheme ?>">
    <title>Accueil</title>
</head>

<body>
    <header class="d-flex align-items-center justify-content-center">
        <p class="h1">SUPER RSS READER</p>
        <div><img src="assets\img\rss-logo-icon-png-11302.png" alt="icon_fluxrss" class="iconFlux"></div>
    </header>
    <nav class="navbar navbar-expand-lg shadow">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <?php foreach ($rssChoice as $key => $value) {?>
                <li class="nav-item active">
                    <a class="nav-link navText" href="index.php?cat=<?= $value ?>"><?= $value ?></a>
                </li>
                <?php } ?>
            </ul>
            <button type="button" class="btn buttonParamaters" data-toggle="modal" data-target="#parametersModal">
                Paramètres
            </button>
        </div>
    </nav>
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

    <footer>
        <!-- mentions légales -->
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="parametersModal" tabindex="-1" role="dialog" aria-labelledby="parametersModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Paramètres</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="params" action="index.php" method="post">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col">
                                <label for="themeColor">Thème</label>
                                <select class="form-control" id="colorTheme" name="colorTheme">
                                    <option value="black" <?= isSelected('black', $Theme) ?>>Noir</option>
                                    <option value="blue" <?= isSelected('blue', $Theme) ?>>Bleu</option>
                                    <option value="red" <?= isSelected('red', $Theme) ?>>Rouge</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="articlesNumber">Nombre d'articles</label>
                                <select class="form-control" id="articlesNumber" name="articlesNumber">
                                    <option value="3" <?= isSelected(3, $articlesNumber) ?>>3</option>
                                    <option value="5" <?= isSelected(5, $articlesNumber) ?>>5</option>
                                    <option value="8" <?= isSelected(8, $articlesNumber) ?>>8</option>
                                </select>
                            </div>
                            <div class="col">
                                <legend class="col-form-label col">Sujets</legend>
                                <div>
                                    <input type="checkbox" id="actuCheck" name="rssChoice[]" value="actu" <?= isChecked('actu', $rssChoice)?>>
                                    <label for="actuCheck">Actualités</label><br>
                                    <input type="checkbox" id="secuCheck" name="rssChoice[]" value="secu" <?= isChecked('secu', $rssChoice)?>>
                                    <label for="secuCheck"> Sécurité</label><br>
                                    <input type="checkbox" id="appliCheck" name="rssChoice[]" value="apps" <?= isChecked('apps', $rssChoice)?>>
                                    <label for="appliCheck"> Applications</label><br>
                                    <input type="checkbox" id="technoCheck" name="rssChoice[]" value="tech" <?= isChecked('tech', $rssChoice)?>>
                                    <label for="technoCheck">Technologie</label><br>
                                    <input type="checkbox" id="buzzCheck" name="rssChoice[]" value="buzz" <?= isChecked('buzz', $rssChoice)?>>
                                    <label for="buzzCheck">Buzz</label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-warning" name="submit">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal article -->
    <div class="modal fade" id="articlesModal" tabindex="-1" role="dialog" aria-labelledby="articlesModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <div class="modal-title text-white h6" id="exampleModalLabel"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="params" action="index.php" method="post">
                    <div class="modal-body mt-2">
                        <p></p>
                        <div class="row text-center h5 mb-3 font-weith-bold"><img class="img-fluid" src="" alt=""></div>
                        <div class="row h6 m-1" id="desc"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button class="btn btn-secondary btn-sm" type="button"><a href="" class="text-white" id="articleLink" target="_blank">lire l'article</a></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="assets/js/testCheckBox.js"></script>
<script src="assets/js/level3xml.js"></script>

</html>