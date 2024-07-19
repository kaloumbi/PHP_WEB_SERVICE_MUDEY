<?php

    require 'commun_services.php';

    if (!isset($_REQUEST['name']) || !isset($_REQUEST['description']) || !isset($_REQUEST['price']) || !isset($_REQUEST['stock']) || !isset($_REQUEST['category']) || !isset($_REQUEST['image'])) {
        // var_dump("od");
        produceErrorRequest();
        return;
    }

    //tester si un champ est vide
    if (empty($_REQUEST['name']) || empty($_REQUEST['description']) || empty($_REQUEST['price']) || empty($_REQUEST['stock']) || empty($_REQUEST['category']) || empty($_REQUEST['image'])) {
        // var_dump("od");
        produceErrorRequest();
        return;
    }

    try {
        $product = new ProductEntity();
        //on modifie le name et lui donner la valeur reçu par le name
        $product->setName($_REQUEST['name']);
        $product->setDescription($_REQUEST['description']);
        $product->setPrice($_REQUEST['price']);
        $product->setStock($_REQUEST['stock']);
        $product->setCategory($_REQUEST['category']);
        $product->setImage($_REQUEST['image']);

        $result = $db->createProduct($product);
        
        if ($result) {
            produceResult("Produit cree avec succès !");
        }else{
            produceError("Echec de creation du produit ! Merci de reessayer !");
        }
        
    } catch (Exception $ex) {
        produceError($ex->getMessage());
    }


