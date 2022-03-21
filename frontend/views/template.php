<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="title" content="Andy Sin Filtros">
    <meta name="description" content=" Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum aspernatur impedit obcaecati quaer">
    <meta name="keywords" content="Andy, BLW">
    <title>Andy Sin Filtros</title>

    <?php
        // MANTENER LA RUTA FIJA DEL PROYECTO
        $server=Route::routeServer();

        $client = Route::routeClient();
    ?>

    <!-- CSS PLUGINS -->
    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/flexslider.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/flexslider.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/fullcalendar.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">    

    <!-- CUSTOM STYLE SHEETS -->
    <link rel="stylesheet" href="<?php echo $client?>views/css/template.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/header.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/slide.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/promotion.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/myinformation.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/infoproduct.css">
    <link rel="stylesheet" href="<?php echo $client?>views/css/shopping-cart.css">
    

    
    <!-- JAVASCRIPT PLUGINS -->
    <script src="<?php echo $client?>views/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $client?>views/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo $client?>views/js/plugins/jquery.easing.js"></script>
    <script src="<?php echo $client?>views/js/plugins/jquery.scrollUp.js"></script>
    <script src="<?php echo $client?>views/js/plugins/jquery.flexslider.js"></script>
    <script src="<?php echo $client?>views/js/plugins/moment.min.js"></script>
    <script src="<?php echo $client?>views/js/plugins/fullcalendar.js"></script>
    <script src="<?php echo $client?>views/js/plugins/es.js"></script>
    <script src="<?php echo $client?>views/js/plugins/moment-timezone.js"></script>

</head>
<body>

<?php

// HEADER
include "modules/header.php";

$routes=array();
$infoProduct = null;

if(isset($_GET["route"])){

    $routes=explode("/", $_GET["route"]);

    $item = "route";
	$value =  $routes[0];

	// URL'S AMIGABLES DE PRODUCTOS
	
	$routeProducts = ProductController::showInfoProduct($item, $value);

	if($routeProducts){

        if($routes[0] == $routeProducts["route"]){
            $infoProduct = $routes[0];
            
        }
        
	}

	// LISTA BLANCA DE URL'S AMIGABLES

	if($routes[0] == "recetas" || $routes[0] == "asesorias"){

		include "modules/products.php";

	}else if($infoProduct != null){

		include "modules/infoproduct.php";

	}
    else if($routes[0] == "shopping-cart"){

		include "modules/".$routes[0].".php";

	}else{

		include "modules/error404.php";

	}

}else{

	include "modules/slide.php";

    include "modules/myinformation.php";

	include "modules/promotion.php";

}

?>

<!-- CUSTOM JAVASCRIPT -->
<script src="<?php echo $client?>views/js/template.js"></script>
<script src="<?php echo $client?>views/js/slide.js"></script>
<script src="<?php echo $client?>views/js/myinformation.js"></script>
<script src="<?php echo $client?>views/js/calendar.js"></script>
<script src="<?php echo $client?>views/js/infoproduct.js"></script>
<script src="<?php echo $client?>views/js/shopping-cart.js"></script>

</body>
</html>