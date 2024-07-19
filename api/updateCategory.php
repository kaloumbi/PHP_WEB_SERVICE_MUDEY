<?php 

    require 'commun_services.php';

    if (!isset($_REQUEST['name']) || !isset($_REQUEST['id'])) {
        produceErrorRequest();
        return;
    }

    if (empty($_REQUEST['name']) || empty($_REQUEST['id'])) {
        produceErrorRequest();
        return;
    }

    
    $category = new CategoryEntity();
    $category->setIdCategory($_REQUEST['id']);
    $category->setName($_REQUEST['name']);
    
    try {
        $result = $db->updateCategory($category);

        
        if ($result) {
            produceResult("Modification reussie !");
        }else{
            produceError("Echec de la mise à jour. Merci de réessayer !");
        }
        
    } catch (\Exception $ex) {
        produceError($ex->getMessage());
        return null;
    }
