    <!-- Modal -->
    <div class="modal fade" id="parametersModal" tabindex="-1" role="dialog" aria-labelledby="parametersModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-custom">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Paramètres</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="params" action="/" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12">
                                <label for="themeColor">Thème</label>
                                <select class="form-control" id="colorTheme" name="colorTheme">
                                    <option value="black" <?= isSelected('black', $Theme) ?>>Noir</option>
                                    <option value="blue" <?= isSelected('blue', $Theme) ?>>Bleu</option>
                                    <option value="red" <?= isSelected('red', $Theme) ?>>Rouge</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <label for="articlesNumber">Nombre d'articles</label>
                                <select class="form-control" id="articlesNumber" name="articlesNumber">
                                    <option value="3" <?= isSelected(3, $articlesNumber) ?>>3</option>
                                    <option value="5" <?= isSelected(5, $articlesNumber) ?>>5</option>
                                    <option value="8" <?= isSelected(8, $articlesNumber) ?>>8</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-sm-12">
                                <legend class="col-form-label col">Sujets</legend>
                                <div>
                                    <input type="checkbox" id="actuCheck" name="rssChoice[]" value="actu" <?= isChecked('actu', $rssChoice) ?>>
                                    <label for="actuCheck">Actualités</label><br>
                                    <input type="checkbox" id="secuCheck" name="rssChoice[]" value="secu" <?= isChecked('secu', $rssChoice) ?>>
                                    <label for="secuCheck"> Sécurité</label><br>
                                    <input type="checkbox" id="appliCheck" name="rssChoice[]" value="apps" <?= isChecked('apps', $rssChoice) ?>>
                                    <label for="appliCheck"> Applications</label><br>
                                    <input type="checkbox" id="technoCheck" name="rssChoice[]" value="tech" <?= isChecked('tech', $rssChoice) ?>>
                                    <label for="technoCheck">Technologie</label><br>
                                    <input type="checkbox" id="buzzCheck" name="rssChoice[]" value="buzz" <?= isChecked('buzz', $rssChoice) ?>>
                                    <label for="buzzCheck">Buzz</label><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn buttonModalParamaters" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn buttonModalParamaters" name="submit">Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal article -->
    <div class="modal fade" id="articlesModal" tabindex="-1" role="dialog" aria-labelledby="articlesModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="articleModalHeader" class="modal-header">
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
                    <div id="articleModalFooter" class="modal-footer">
                        <button type="reset" class="btn buttonModalArticle btn-sm" data-dismiss="modal">Fermer</button>
                        <a href="" class="btn buttonModalArticle btn-sm" id="articleLink" target="Article">Lire l'article</a>
                    </div>
                </form>
            </div>
        </div>
    </div>