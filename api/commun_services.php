<?php 

    error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
    ini_set('display_errors', 0);

    date_default_timezone_set("Europe/Paris");
    header("content_type:application/json;charset=UTF-8");

    //DEFINITION DES CONSTANTES
    define("API", dirname(__FILE__));
    define("ROOT", dirname(API));
    define("SP", DIRECTORY_SEPARATOR);
    define("CONFIG", ROOT.SP."config");
    define("MODEL", ROOT.SP."model");
    define("ENTITY", ROOT.SP."entity");
    define("API_KEY", "4e9f68c76b4e3d7a8b5f1c2d3e4f5a6b");


    //IMPORTATION DES FICHIERS DE CONFIGURATION
    require CONFIG.SP."config.php";
    require MODEL.SP."DataLayer.class.php";
    require ENTITY.SP."UserEntity.php";
    require ENTITY.SP."CategoryEntity.php";
    require ENTITY.SP."ProductEntity.php";
    require ENTITY.SP."OrdersEntity.php";

    //UTIL OBJECT
    $db = new DataLayer_class();

    //CREATION DE LA FONCTION ANSWER
    function answer($response) {
        global $_REQUEST;
        $response['args'] = $_REQUEST;
        unset($response['args']['password']); //verifier s'il y'a des mots de passe
        $response['time'] = date('d/m/Y H:i:s');
        
        echo json_encode($response); //tableau to json object
    }

    //METTRE EN PLACE DES FONCTIONS UTILITAIRES POUR NOS WEB SERVICES
    function produceError($message) {
        answer(['status' => 404, 'message' => $message]);
    }

    function produceErrorAuth() {
        answer(['status' => 401, 'message' => 'Erreur d\'authentification !']);
    }

    function produceErrorRequest() {
        answer(['status' => 400, 'message' => 'Requette mal formulée !']);
    }

    function produceResult($result) {
        answer(['status' => 200, 'result' => $result]);
    }

    //FUNCTION POUR CONVERTIR UN OBJET METIER EN TABLEAU
    function clearData($objetMetier) {
        $objetMetier = (array)$objetMetier;

        $result = [];
        foreach ($objetMetier as $key => $value) {
            //recuperer la clé à partir du 3eme element pour enleve les caracters inattendus
            $result[substr($key, 3)] = $value;
        }
        return $result;
    }



    //FUNCTION POUR CONVERTIR DES OBJETS METIER EN TABLEAU
    function clearDataArray($array_obj_metier) {
        
        $result = [];
        foreach ($array_obj_metier as $key => $value) {
            $result[$key] = clearData($value);
        }

        return $result;
    }

    //MISE NE PLACE D'UNE FONCTION NOUS GERANT L'ACCÈS !
    function controlAccess() {
        global $_REQUEST;
        
        if (!isset($_REQUEST['API_KEY']) || empty($_REQUEST['API_KEY'])) {
            produceErrorAuth();
            exit();
        }elseif($_REQUEST['API_KEY'] !== API_KEY){
            produceError("Api_Key incorrecte !");
            exit();
        }

    }

    //APPEL DE LA FONCTION DE SECURISATION DE NOTRE API
    controlAccess();


