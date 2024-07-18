<?php

    require 'commun_services.php';

    //tester si le nom n'est pas defini
    if (!isset($_REQUEST['name']) || empty($_REQUEST['name'])) {
        // var_dump("od");
        produceErrorRequest();
        return;
    }

    try {
        $category = new CategoryEntity();
        //on modifie le name et lui donner la valeur reçu par le name
        $category->setName($_REQUEST['name']);
        $result = $db->createCategory($category);
        
        if ($result) {
            produceResult("Cetegory cree avec succès!");
        }else{
            produceError("Echec de creation de la category");
        }
        
    } catch (Exception $ex) {
        produceError($ex->getMessage());
    }


