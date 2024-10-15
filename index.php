<?php 
   require 'config/config.php';

   //Definir la constante BASE_URL
   define("BASE_URL", dirname($_SERVER['SCRIPT_NAME']));
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <style>
      a{
         color: black;
      }

      p{
         background-color: #fff;
         font-size: 35px;
         border: 1px solid rgba(0, 0, 0, .1) ;
         box-shadow: 
         rgba(0, 0, 0, .22),
         0 14px 56px rgba(0, 0, 0, .25) ;
      }

      p span:nth-child(1){
         display: inline-block;
         font-size: 44px;
         font-weight: 700;
         min-width: 200px;
         padding: 6px 15px;
         text-align: center;
         color: #fff;
      }

      p span:nth-child(2){
         font-size: 35px;
         font-weight: 700;
      }

      .get{
         background-color: #3caab5;
         text-transform: uppercase;
      }

      .post{
         background-color: #78bc61;
         text-transform: uppercase;
      }

      .delete{
         background-color: #f93e3e;
         text-transform: uppercase;
      }

      .put{
         background-color: #fca130;
         text-transform: uppercase;
      }

      nav.navbar{
         background-color: #288690 !important;
      }

   </style>
   <title>API JSTORE</title>
</head>

<body>
   <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <a class="navbar-brand" href="#" >JSTORE API</a>
      <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
   </nav>
   <div class="container">
      <h1 class="text-center display-4 ">Documentation</h1>
   </div>

   <?php
      // Ouverture du dossier API
      foreach ($_ROUTES as $key => $entity) {
         $response = "<div id='$entity' class='display-4'><h4>" . ucwords($entity) . "</h4>";
         foreach ($_METHODS as $methode => $description) {
            $response .= "<p><span class='$methode'></span>
            <span class='url'>
            <a href='" . BASE_URL . "/api/$entity' target='_blank'>/api/$entity</a>
            </span>
            " . $description['description'] . ": $entity</p>";
         }
         echo $response . '</div>';
      }
   ?>


</body>
</html>

