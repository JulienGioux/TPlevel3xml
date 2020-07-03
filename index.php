<?php require_once "controllers/index-controller.php" ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/level3xml.css">
    <link rel="stylesheet" href="<?= isset($_COOKIE["colorTheme"]) ? $_COOKIE["colorTheme"] : "assets/css/defcolor.css" ?>">
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
                <li class="nav-item active">
                    <a class="nav-link navText" href="#">Sujet 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navText" href="#">Sujet2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navText" href="#">Sujet 3</a>
                </li>
            </ul>
            <button type="button" class="btn buttonParamaters" data-toggle="modal" data-target="#parametersModal">
                Paramètres
            </button>
        </div>
    </nav>

    <main>
        <?php
        foreach ($rssChoice as $key => $value) { ?>
            <section class="firstSubject row-sm-12 mx-auto m-5"><?= $rss = simplexml_load_file($value) ?></section>
            <?php
            for ($i = 0; $i < $articlesNumber; $i++) { ?>
                <div class="media col-sm-8 bg-light shadow border-top border-secondary p-3">
                    <ul class="list-unstyled">
                        <li class="media">
                            <img src="<?= sortItem($rss, $i, 'enclosure') ?>" class="media-object mr-3" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1"><?= sortItem($rss, $i, 'title') ?></h5>
                                <?= sortItem($rss, $i, 'description') ?>
                            </div>
                        </li>
                    </ul>
                </div>
        <?php }
        } ?>

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
                                            <option value="black">Noir</option>
                                            <option value="blue">Bleu</option>
                                            <option value="red">Rouge</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="articlesNumber">Nombre d'articles</label>
                                        <select class="form-control" id="artcilesNumber" name="articlesNumber">
                                            <option value="3">3</option>
                                            <option value="5">5</option>
                                            <option value="8">8</option>>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <legend class="col-form-label col">Sujets</legend>
                                        <div>
                                            <input type="checkbox" id="actuCheck" name="subCheck[]" value="<?=$urlActu?>" checked="true">
                                            <label for="actuCheck">Actualités</label><br>
                                            <input type="checkbox" id="secuCheck" name="subCheck[]" value="<?=$urlSecu?>" checked="true">
                                            <label for="secuCheck"> Sécurité</label><br>
                                            <input type="checkbox" id="appliCheck" name="subCheck[]" value="<?=$urlApps?>" checked="true">
                                            <label for="appliCheck"> Applications</label><br>
                                            <input type="checkbox" id="technoCheck" name="subCheck[]" value="<?=$urlTech?>">
                                            <label for="technoCheck">Technologie</label><br>
                                            <input type="checkbox" id="buzzCheck" name="subCheck[]" value="<?=$urlBuzz?>">
                                            <label for="buzzCheck">Buzz</label><br>
                                        </div>
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






    </main>

    <footer>
        <!-- mentions légales -->
    </footer>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="assets/js/testCheckBox.js"></script>
</html>