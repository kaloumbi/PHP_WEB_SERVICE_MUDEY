<?php 

    require 'commun_services.php';

    try {
        $category = $db->getCategories();
        //tester si tout se passe très bien
        if ($category) {
            produceResult(clearDataArray($category)); //transforme des obets metiers
        }else{
            produceError("Problemes de Recuperation des données !");
        }
    } catch (\Exception $ex) {
        produceError("Echec de Recuperation des categories !");
    }






