<?php 

    require 'commun_services.php';

    if (!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
        produceErrorRequest();
        return;
    }

    $user = new UserEntity();
    $user->setIdUser($_REQUEST['id']);

    try {
        $result = $db->deleteUsers($user);
        
        if ($result) {
            produceResult("Suppression reussie !");
        }else{
            produceError("Echec de la suppression. Merci de réessayer !");
        }
        
    } catch (\Exception $ex) {
        produceError($ex->getMessage());
        return null;
    }