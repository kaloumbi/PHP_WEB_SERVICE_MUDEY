<?php

    require 'commun_services.php';

    if (!isset($_REQUEST['sexe']) || !isset($_REQUEST['pseudo']) || !isset($_REQUEST['firstname']) || !isset($_REQUEST['lastname']) 
        || !isset($_REQUEST['description']) || !isset($_REQUEST['dateBirth']) || !isset($_REQUEST['adresse_facturation']) || !isset($_REQUEST['adresse_livraison']) || !isset($_REQUEST['tel']) || !isset($_REQUEST['email']) || !isset($_REQUEST['password']) ) {
        
        produceErrorRequest();
        return;
    }

    //tester si un champ est vide
    if (empty($_REQUEST['sexe']) || empty($_REQUEST['pseudo']) || empty($_REQUEST['firstname']) || empty($_REQUEST['lastname']) 
        || empty($_REQUEST['description']) || empty($_REQUEST['dateBirth']) || empty($_REQUEST['adresse_facturation']) || empty($_REQUEST['adresse_livraison']) || empty($_REQUEST['tel']) || empty($_REQUEST['email']) || empty($_REQUEST['password']) ) {
        
        produceErrorRequest();
        return;
    }

    try {
        $user = new UserEntity();
        //on modifie le name et lui donner la valeur reçu par le name
        $user->setSexe($_REQUEST['sexe']);
        $user->setPseudo($_REQUEST['pseudo']);
        $user->setFirstname($_REQUEST['firstname']);
        $user->setLastname($_REQUEST['lastname']);
        $user->setDescription($_REQUEST['description']);
        $user->setDateBirth(new DateTime( $_REQUEST['dateBirth']));
        $user->setAdresseFacturation($_REQUEST['adresse_facturation']);
        $user->setAdresseLivraison($_REQUEST['adresse_livraison']);
        $user->setTel($_REQUEST['tel']);
        $user->setEmail($_REQUEST['email']);
        $user->setPassword($_REQUEST['password']);


        $result = $db->createUser($user);
        
        if ($result) {
            produceResult("Utilisateur cree avec succès !");
        }else{
            produceError("Echec de creation de l'utilisateur ! Merci de reessayer !");
        }
        
    } catch (Exception $ex) {
        echo "Erreur : ".$ex->getMessage();
        //produceError($ex->getMessage());
    }


