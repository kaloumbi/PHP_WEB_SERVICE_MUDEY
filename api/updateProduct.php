<?php

    require 'commun_services.php';

    /* if (!isset($_REQUEST['name']) || !isset($_REQUEST['description']) || !isset($_REQUEST['price']) || !isset($_REQUEST['stock']) || !isset($_REQUEST['category']) || !isset($_REQUEST['image'])) {
        // var_dump("od");
        produceErrorRequest();
        return;
    }

    //tester si un champ est vide
    if (empty($_REQUEST['name']) || empty($_REQUEST['description']) || empty($_REQUEST['price']) || empty($_REQUEST['stock']) || empty($_REQUEST['category']) || empty($_REQUEST['image'])) {
        // var_dump("od");
        produceErrorRequest();
        return;
    } */

    $product = new ProductEntity();
    $product->setIdProduct($_REQUEST['id']);
    $product->setName($_REQUEST['name']);
    $product->setDescription($_REQUEST['description']);
    $product->setPrice($_REQUEST['price']);
    $product->setStock($_REQUEST['stock']);
    $product->setCategory($_REQUEST['category']);
    $product->setImage($_REQUEST['image']);
    
    try {
        $result = $db->updateProduct($product);

        
        if ($result) {
            produceResult("Modification reussie !");
        }/* else{
            produceError("Echec de la mise à jour. Merci de réessayer !");
        } */
        
    } catch (\Exception $ex) {
        produceError($ex->getMessage());
        return null;
    }




