<?php

    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("HOST", "localhost");
    define("DB_NAME", "e-bestcommerce_mudey_db");

    //declaration des constantes pour la documentation de notre api
    $METHODS =[
        "get" => ["description" => "Lire les données", "prefixe" => "get"],
        "post" => ["description" => "Créer une donnée", "prefixe" => "get"],
        "put" => ["description" => "Mettre à jour une donnée", "prefixe" => "get"],
        "delete" => ["description" => "Supprimer une donnée", "prefixe" => "get"]
    ];

    //déclaration des constantes routes de notre api
    $_ROUTES = ["products", "category", "orders", "users"];

