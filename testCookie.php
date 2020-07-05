<?php
    // on regarde si le cookie existe
    if(isset($test_accepte_cookie)) {
    // si le cookie existe on redirige vers la page de depart
    header('Location: https://localhost/TPlevel3xml/' . $_GET['uri']);
    } else {
            // la faite ce que vous voulez
        die ( 'Le visiteur n\'accepte pas les cookies' );
    }

?>