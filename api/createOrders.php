<?php

    require 'commun_services.php';

    //tester si le nom n'est pas defini

    //var_dump($_REQUEST);
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

    try {
        $order = new OrdersEntity();
        //on modifie le name et lui donner la valeur reçu par le name
        $order->setIdUser($_REQUEST['id_customers']);
        $order->setIdProduct($_REQUEST['id_product']);
        $order->setQuantity($_REQUEST['quantity']);
        $order->setPrice($_REQUEST['price']);

        $result = $db->createOrders($order);
        
        if ($result) {
            produceResult("Commande cree avec succès !");
        }else{
            produceError("Echec de creation de la commande! Merci de reessayer !");
        }
        
    } catch (Exception $ex) {
        produceError($ex->getMessage());
    }


