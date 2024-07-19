<?php

    require 'commun_services.php';

    if (!isset($_POST['sexe']) || !isset($_POST['pseudo']) || !isset($_POST['firstname']) || !isset($_POST['lastname']) 
        || !isset($_POST['description']) || !isset($_POST['dateBirth']) || !isset($_POST['adresse_facturation']) || !isset($_POST['adresse_livraison']) || !isset($_POST['tel']) || !isset($_POST['email']) || !isset($_POST['password']) ) {
        
        produceErrorRequest();
        return;
    }

    //tester si un champ est vide
    if (empty($_POST['sexe']) || empty($_POST['pseudo']) || empty($_POST['firstname']) || empty($_POST['lastname']) 
        || empty($_POST['description']) || empty($_POST['dateBirth']) || empty($_POST['adresse_facturation']) || empty($_POST['adresse_livraison']) || empty($_POST['tel']) || empty($_POST['email']) || empty($_POST['password']) ) {
        
        produceErrorRequest();
        return;
    }

    try {
        $user = new UserEntity();
        //on modifie le name et lui donner la valeur reçu par le name
        $user->setSexe($_POST['sexe']);
        $user->setPseudo($_POST['pseudo']);
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setDescription($_POST['description']);
        $user->setDateBirth(new DateTime( $_POST['dateBirth']));
        $user->setAdresseFacturation($_POST['adresse_facturation']);
        $user->setAdresseLivraison($_POST['adresse_livraison']);
        $user->setTel($_POST['tel']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);


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


