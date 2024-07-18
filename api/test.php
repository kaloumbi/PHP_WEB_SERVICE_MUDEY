<?php

    require 'commun_services.php';

    //creation d'un objet metier
    $user = new UserEntity();
    $user->setIdUser(null);
    $user->setEmail("kal@gmail.com");
    $user->setPassword("passer");

    //var_dump(clearData($user));

    produceResult($user);



