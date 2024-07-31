<?php 

    require 'commun_services.php';


    if (isset($_FILES) && is_array($_FILES)) {
        if ($_FILES["image"]["name"]) {
            $dirImage = realpath("..")."/images/products/".$_FILES["image"]["name"];

            //envoyer l'image sur le serveur
            $save = move_uploaded_file($_FILES["image"]["tmp_name"], $dirImage);
            
            if ($save) {
                produceResult($_FILES);
            }else{
                produceError("Probleme de stockage de l'image !");
            }
        }else{
            produceError("Fichier incorrecte ! ");
        }

    }else{
        produceErrorRequest();
    }



