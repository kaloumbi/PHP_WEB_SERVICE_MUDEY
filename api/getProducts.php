<?php 

    require 'commun_services.php';

    try {
        $products = $db->getProducts();
        //tester si tout se passe très bien
        if ($products) {
            produceResult(clearDataArray($products)); //transforme des obets metiers
        }else{
            produceError("Problemes de Recuperation des données !");
        }
    } catch (\Exception $ex) {
        produceError("Echec de Recuperation des products !");
    }






