<?php 

    require 'commun_services.php';

    if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
        produceErrorRequest();
        return;
    }

    $category = new CategoryEntity();
    $category->setIdCategory($_REQUEST['id']);
    
    try {
        $result = $db->deleteCategories($category);
        
        if ($result) {
            produceResult("Suppression reussie !");
        }else{
            produceError("Echec de la suppression. Merci de réessayer !");
        }
        
    } catch (\Exception $ex) {
        produceError($ex->getMessage());
        return null;
    }




