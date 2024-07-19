<?php

    require 'commun_services.php';

    if (!isset($_REQUEST['id_customers']) || !isset($_REQUEST['id_product']) || !isset($_REQUEST['quantity']) || !isset($_REQUEST['price'])) {
        // var_dump("od");
        produceErrorRequest();
        return;
    }

    //tester si un champ est vide
    if (empty($_REQUEST['id_customers']) || empty($_REQUEST['id_product']) || empty($_REQUEST['quantity']) || empty($_REQUEST['price'])) {
        // var_dump("od");
        produceErrorRequest();
        return;
    }


    $order = new OrdersEntity();
    $order->setIdOrder($_REQUEST['id']);
    $order->setIdUser($_REQUEST['id_customers']);
    $order->setIdProduct($_REQUEST['id_product']);
    $order->setQuantity($_REQUEST['quantity']);
    $order->setPrice($_REQUEST['price']);
    $order->setPrice($_REQUEST['price']);
    
    try {
        $result = $db->updateOrders($order);

        
        if ($result) {
            produceResult("Modification reussie !");
        }else{
            produceError("Echec de la mise à jour. Merci de réessayer !");
        }
        
    } catch (\Exception $ex) {
        produceError($ex->getMessage());
        return null;
    }








