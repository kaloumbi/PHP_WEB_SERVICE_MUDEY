<?php

class DataLayer_class
{

    private $connexion;
    function __construct()
    {
        $var = "mysql:host=" . HOST . ";db_name" . DB_NAME;

        try {
            $this->connexion = new PDO($var, DB_USER, DB_PASSWORD);
            //echo "connexion reussie !";

        } catch (\Throwable $e) {
            //throw $th;
            echo $e->getMessage();
        }
    }


    /**
     * CREATE
     */

    /**
     * Methode permettant d'authentifier un utilisateur
     * @param //UserEntity $user Objet metier decrivant un utilisateur
     * @return //UserEntity $user Objet métier décrivant l'utilisateur authentifié
     * @return //FALSE En cas d'échec d'authentification
     * @return //NULL Exception déclanchée
     */
    function authentifier(UserEntity $user)
    {
        $sql = "SELECT * FROM `e-bestcommerce_mudey_db`.`customers` WHERE email= :email";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute(
                array(
                    ':email' => $user->getEmail()
                )
            );

            //On recupère les données de l'utilisateur
            $data = $result->fetch(PDO::FETCH_OBJ);

            //tester si les données sont recuperées et verifier la conformité des mots de passe (renseigné et celui haché)
            if ($data && ($data->password == sha1($user->getPassword()))) {
                //authentification reussie
                $user->setIdUser($data->id);
                $user->setSexe($data->sexe);
                $user->setFirstname($data->firstname);
                $user->setLastname($data->lastname);
                $user->setPassword(null);
                $user->setAdresseFacturation($data->adresse_facturation);
                $user->setAdresseLivraison($data->adresse_livraison);
                $user->setTel($data->tel);

                // Convertir la date de naissance en objet DateTime
                $dateBirth = new DateTime($data->dateBirth);
                $user->setDateBirth($dateBirth);

                return $user;
            } else {
                //authentification échouée !
                return false;
            }
        } catch (\PDOException $ex) {
            echo "Error de : " . $ex->getMessage();
            return null;
        }
    }

    function createUser(UserEntity $user)
    {
        $sql = "INSERT INTO `e-bestcommerce_mudey_db`.`customers`(`sexe`, `email`, `password`, `pseudo`, `firstname`, `lastname`, `dateBirth`, `description`, `adresse_facturation`, `adresse_livraison`, `tel`) 
                VALUES (:sexe,:email,:password,:pseudo,:firstname,:lastname,:dateBirth,:description,:adresse_facturation,:adresse_livraison, :tel)";

        try {

            $result = $this->connexion->prepare($sql);
            // var_dump($result);

            $data = $result->execute(
                array(
                    ':sexe' => $user->getSexe(),
                    ':email' => $user->getEmail(),
                    ':password' => sha1($user->getPassword()),
                    ':pseudo' => $user->getPseudo(),
                    ':firstname' => $user->getFirstname(),
                    ':lastname' => $user->getLastname(),
                    ':dateBirth' => $user->getDateBirth()->format('Y-m-d'),
                    ':description' => $user->getDescription(),
                    ':adresse_facturation' => $user->getAdresseFacturation(),
                    ':adresse_livraison' => $user->getAdresseLivraison(),
                    ':tel' => $user->getTel()
                )
            );
            //var_dump($data);
            if ($data) {
                return true;
            } else {
                return false;
            }

        } catch (\PDOException $ex) {
            //throw $th;
            echo "Error de :" . $ex->getMessage();
            return null;
        }
    }




    function createCategory(CategoryEntity $category)
    {
        $sql = "INSERT INTO `e-bestcommerce_mudey_db`.`category`(`name`) 
                VALUES (:name)";

        try {
            $result = $this->connexion->prepare($sql);
            $data = $result->execute(
                array(
                    ':name' => $category->getName()
                )
            );

            if ($data) {
                return true;
            } else {
                return false;
            }


        } catch (\PDOException $ex) {
            echo "Erreur : ". $ex->getMessage();

            return null;
        }



    }


    function createProduct(ProductEntity $product)
    {

        $sql = "INSERT INTO `e-bestcommerce_mudey_db`.`product`(`name`, `description`, `price`, `stock`, `category`, `image`) 
            VALUES (:name,:description,:price,:stock,:category,:image)";

        try {

            $result = $this->connexion->prepare($sql);
            $data = $result->execute(
                array(
                    ':name' => $product->getName(),
                    ':description' => $product->getDescription(),
                    ':price' => $product->getPrice(),
                    ':stock' => $product->getStock(),
                    ':category' => $product->getCategory(),
                    ':image' => $product->getImage(),
                )
            );

            if ($data) {
                return true;
            } else {
                return false;
            }

        } catch (\PDOException $ex) {
            echo "Erreur :".$ex->getMessage();

            return null;
        }

    }


    function createOrders(OrdersEntity $order)
    {

        $sql = "INSERT INTO `e-bestcommerce_mudey_db`.`orders`(`id_customers`, `id_product`, `quantity`, `price`) 
            VALUES (:idCustomers,:idProduct,:quantity,:price)";

        try {

            $result = $this->connexion->prepare($sql);
            $data = $result->execute(
                array(
                    ':idCustomers' => $order->getIdUser(),
                    ':idProduct' => $order->getIdProduct(),
                    ':quantity' => $order->getQuantity(),
                    ':price' => $order->getPrice()
                )
            );

            if ($data) {
                return true;
            } else {
                return false;
            }

        } catch (\PDOException $ex) {
            echo "Erreur :".$ex->getMessage();
            return null;
        }
    }


    /**
     * READ
     */

    function getUsers()
    {
        $sql = "SELECT * FROM `e-bestcommerce_mudey_db`.`customers`";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            //$users = $result->fetchAll();

            $users = [];
            while ($data = $result->fetch(PDO::FETCH_OBJ)) {
                //var_dump($data);
                # code...
                $user = new UserEntity();
                $user->setIdUser($data->id);
                $user->setEmail($data->email);
                $user->setSexe($data->sexe);
                $user->setFirstname($data->firstname);
                $user->setLastname($data->lastname);
                $users[] = $user;
            }



            if ($users) {
                return $users;
            } else {
                return false;
            }

        } catch (\PDOException $e) {
            //throw $th;
            return null;
        }
    }


    function getCategories()
    {
        $sql = "SELECT * FROM `e-bestcommerce_mudey_db`.`category`";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            // $data = $result->fetchAll();

            $categories = [];
            while ($data = $result->fetch(PDO::FETCH_OBJ)) {
                //var_dump($data);
                # code...
                $category = new CategoryEntity();
                $category->setIdCategory($data->id);
                $category->setName($data->name);
                $categories[] = $category;
            }



            if ($categories) {
                return $categories;
            } else {
                return false;
            }

        } catch (\PDOException $e) {
            //throw $th;
            return null;
        }
    }

    function getOrders()
    {
        $sql = "SELECT * FROM `e-bestcommerce_mudey_db`.`orders`";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            //$data = $result->fetchAll();

            $orders = [];
            while ($data = $result->fetch(PDO::FETCH_OBJ)) {
                //var_dump($data);
                # code...
                $order = new OrdersEntity();
                $order->setIdOrder($data->id);
                $order->setIdUser($data->id_customers);
                $order->setIdProduct($data->id_product);
                $order->setQuantity($data->quantity);
                $order->setPrice($data->price);
                $order->setCreatedAt($data->createdat);
                //$order->setCreatedAt(new DateTime($data->createdat));
                $orders[] = $order;
            }

            //var_dump($orders);

            if ($orders) {
                return $orders;
            } else {
                return false;
            }

        } catch (\PDOException $e) {
            //throw $th;
            return null;
        }
    }

    function getProducts()  
    {
        $sql = "SELECT * FROM `e-bestcommerce_mudey_db`.`product`";

        try {
            $result = $this->connexion->prepare($sql);
            $var = $result->execute();

            // $data = $result->fetchAll();

            // var_dump($data);

            $products = [];
            while ($data = $result->fetch(PDO::FETCH_OBJ)) {
                //var_dump($data);
                # code...
                $product = new ProductEntity();
                $product->setIdProduct($data->id);
                $product->setName($data->name);
                $product->setDescription($data->description);
                $product->setPrice($data->price);
                $product->setStock($data->stock);
                $product->setCategory($data->category);
                $product->setImage($data->image);
                $product->setCreatedAt($data->createdat);
                $products[] = $product;
            }

            //var_dump($orders);

            if ($products) {
                return $products;
            } else {
                return false;
            }

        } catch (\PDOException $e) {
            //throw $th;
            return null;
        }
    }



    /**
     * UPDATE
     */

    function updateUser(UserEntity $user)
    {

        $sql = "UPDATE `e-bestcommerce_mudey_db`.`customers` SET ";

        try {
            $sql .= " pseudo = '" . $user->getPseudo() . "',";
            $sql .= " email = '" . $user->getEmail() . "',";
            $sql .= " sexe = '" . $user->getSexe() . "',";
            $sql .= " firstname = '" . $user->getFirstname() . "',";
            $sql .= " lastname = '" . $user->getLastname() . "',";
            $sql .= " adresse_facturation = '" . $user->getAdresseFacturation() . "',";
            $sql .= " adresse_livraison = '" . $user->getAdresseLivraison() . "'";

            $sql .= " WHERE id=" . $user->getIdUser();

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump("ok"); exit();

            if ($var) {
                # code...
                return true;
            } else {
                return false;
            }

            //var_dump($sql);

        } catch (\PDOException $e) {
            //throw $th;
            return null;
        }
    }

    function updateProduct(ProductEntity $product)
    {
        $sql = "UPDATE `e-bestcommerce_mudey_db`.`product` SET ";

        try {
            $sql .= " name = '" . $product->getName() . "',";
            $sql .= " description = '" . $product->getDescription() . "',";
            $sql .= " price = '" . $product->getPrice() . "',";
            $sql .= " stock = '" . $product->getStock() . "',";
            $sql .= " category = '" . $product->getCategory() . "',";
            $sql .= " image = '" . $product->getImage() . "'";
            //$sql .= " createdat = '" . $product->getCreatedAt() . "'";

            $sql .= " WHERE id=" . $product->getIdProduct();

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();

            if ($var) {
                # code...
                return true;
            } else {
                return false;
            }

            //var_dump($sql);

        } catch (\PDOException $e) {
            //throw $th;
            return null;
        }
    }

    function updateCategory(CategoryEntity $category)
    {
        $sql = "UPDATE `e-bestcommerce_mudey_db`.`category` SET ";

        try {
            $sql .= " name = '" . $category->getName() . "'";

            $sql .= " WHERE id=" . $category->getIdCategory();

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();

            if ($var) {
                # code...
                return true;
            } else {
                return false;
            }

            //var_dump($sql);

        } catch (\PDOException $ex) {
            //throw $th;
            echo "Erreur :".$ex->getMessage();
            return null;
        }
    }

    function updateOrders(OrdersEntity $order)
    {
        $sql = "UPDATE `e-bestcommerce_mudey_db`.`orders` SET ";

        try {
            $sql .= " id_customers = '" . $order->getIdUser() . "',";
            $sql .= " id_product = '" . $order->getIdProduct() . "',";
            $sql .= " quantity = '" . $order->getQuantity() . "',";
            $sql .= " price = '" . $order->getPrice() . "'";
            //$sql .= " createdat = '" . $order->getCreatedAt() . "'";

            $sql .= " WHERE id=" . $order->getIdOrder();

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();

            if ($var) {
                # code...
                return true;
            } else {
                return false;
            }

            //var_dump($sql);

        } catch (\PDOException $e) {
            //throw $th;
            return null;
        }
    }



    /**
     * DELETE
     */

    function deleteUsers(UserEntity $user)
    {
        $sql = "DELETE FROM `e-bestcommerce_mudey_db`.`customers` WHERE id=" . $user->getIdUser();

        try {

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();


            if ($var) {
                return true;
            } else {
                return false;
            }

        } catch (\PDOException $e) {
            return null;
        }
    }

    function deleteProducts(ProductEntity $product)
    {
        $sql = "DELETE FROM `e-bestcommerce_mudey_db`.`product` WHERE id=" . $product->getIdProduct();

        try {

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();


            if ($var) {
                return true;
            } else {
                return false;
            }

        } catch (\PDOException $e) {
            return null;
        }
    }

    /**
     * Summary of deleteCategories
     * @param CategoryEntity $category
     * @return bool|null
     */
    function deleteCategories(CategoryEntity $category)
    {
        $sql = "DELETE FROM `e-bestcommerce_mudey_db`.`category` WHERE id=" . $category->getIdCategory();

        try {

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();


            if ($var) {
                return true;
            } else {
                return false;
            }

        } catch (\PDOException $e) {
            return null;
        }
    }

    function deleteOrders(OrdersEntity $order)
    {
        $sql = "DELETE FROM `e-bestcommerce_mudey_db`.`orders` WHERE id=" . $order->getIdOrder();

        try {

            $result = $this->connexion->prepare($sql);
            $var = $result->execute();
            //var_dump($sql); exit();


            if ($var) {
                return true;
            } else {
                return false;
            }

        } catch (\PDOException $e) {
            return null;
        }
    }





}

