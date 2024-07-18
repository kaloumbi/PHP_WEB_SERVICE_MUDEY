<?php 

    require 'commun_services.php';

    try {
        $orders = $db->getOrders();
        //tester si tout se passe très bien
        if ($orders) {
            produceResult(clearDataArray($orders)); //transforme des obets metiers
        }else{
            produceError("Problemes de Recuperation des données !");
        }
    } catch (\Exception $ex) {
        produceError("Echec de Recuperation des orders !");
    }






