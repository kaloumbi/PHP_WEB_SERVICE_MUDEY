<?php 

    require 'config/config.php';
    require 'entity/UserEntity.php';
    require 'entity/CategoryEntity.php';
    require 'entity/OrdersEntity.php';
    require 'entity/ProductEntity.php';
    require 'model/DataLayer.class.php';

    $db = new DataLayer_class();
    /**
     *  CREATE USER
     */

    /* $user = new UserEntity();
    $date = new DateTime();

    $user->setSexe(1);
    $user->setEmail("kaloumbi@gmail.com");
    $user->setPseudo("Pseudo Kaloumbi");
    $user->setPassword("passer");
    $user->setFirstname("Kaloumbi");
    $user->setLastname("Diedhiou");
    $user->setDateBirth($date);
    $user->setDescription("le meilleur des produits");
    $user->setAdresseFacturation("Facture numero 2");
    $user->setAdresseLivraison("Facture numero 3");
    $user->setTel("+221775677788"); 


    $createUser = $db->createUser($user);
    */

    $userAuth = new UserEntity();
    $userAuth->setEmail("kaloumbi@gmail.com");
    $userAuth->setPassword("passer");

    $varAuth = $db->authentifier($userAuth);
   
    var_dump($varAuth);
                    
    /**
     *  LISTER
     */
    // $users = $db->getUsers();
    //$categories = $db->getCategories();
    // $orders = $db->getOrders();
    // $products = $db->getProducts();
    // var_dump($products);


    /**
     *  MISE À JOUR
     */

    /* $user = new UserEntity();
    $user->setPseudo("motivation");
    $user->setEmail("pauline@gmail.com");
    $user->setFirstname("Pauline");
    $user->setLastname("Diatta");
    $user->setSexe(0);
    $user->setAdresseFacturation("Adresse Fact Pauline");
    $user->setAdresseLivraison("Adresse Liv Pauline");
    $user->setIdUser(3);

    $upUsers = $db->updateUser($user);

    var_dump($upUsers); */

    /* $prod = new ProductEntity();
    $prod->setName("Kal Product");
    $prod->setDescription("le meilleur des produits !");
    $prod->setPrice(2000);
    $prod->setStock(10);
    $prod->setCategory(2);
    $prod->setImage("mon image !");
    $prod->setCreatedAt("2024-04-16 00:00:00");
    $prod->setIdProduct(3);

    $upProd = $db->updateProduct($prod);
 */
    //var_dump($upProd);

    /**
     *  DELETE
     */
        /* $user = new UserEntity();

        $delUser = $db->deleteUsers($user->setIdUser(38)); */

        // var_dump($delUser);





