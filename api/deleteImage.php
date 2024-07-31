
<?php
    require 'commun_services.php';

    if (isset($_REQUEST["name"]) && !empty($_REQUEST["name"])) {
        $urlImage = "../images/products/".$_REQUEST["name"];
        if (file_exists($urlImage)) {
            //pour supprimer on utilise unlink
            unlink($urlImage);
            produceResult("Suppression de l'image réussie !");
        }else{
            produceError("L'image n'existe pas sur le serveur !");
        }

    }else{
        produceErrorRequest();
    }