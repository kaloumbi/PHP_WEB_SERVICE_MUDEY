<?php 

    require 'commun_services.php';

    try {
        $categories = $db->getCategories();
        //tester si tout se passe très bien
        if ($categories) {
            produceResult(clearDataArray($categories)); //transforme des obets metiers
        }else{
            produceError("Problemes de Recuperation des données !");
        }
    } catch (\Exception $ex) {
        produceError("Echec de Recuperation des categories !");
    }






