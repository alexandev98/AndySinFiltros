<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    

    <?php

        session_start();

        // MANTENER LA RUTA FIJA DEL PROYECTO
        $server=Route::routeServer();

        $icon = ControllerTemplate::styleTemplate();

        echo '<link rel="icon" href="'.$server.$icon["icon"].'">';

        $client = Route::routeClient();

        if(isset($_GET["route"])){

          $routes = explode("/", $_GET["route"]);

          $route = $routes[0];

        }else{

          $route = "inicio";

        }

        $headers = ControllerTemplate::getHeaders($route);

        if(is_array($headers)){

          if(!$headers["route"]){

            $route = "inicio";

            $headers = ControllerTemplate::getHeaders($route);

          }

          echo '<title>'.$headers['title'].'</title>';

        
        }
        else{

          echo '<title>Andy Sin Filtros</title>';

        }

        


    ?>

    <meta name="title" content="<?php echo $headers['title'];?>">

    <meta name="description" content="<?php echo $headers['description'];?>">

    <meta name="keywords" content="<?php echo $headers['keywords'];?>">

    

    <!-- Open Graph FACEBOOK -->

    <meta property:"og:title" content="<?php echo $headers['title'];?>">
    <meta property:"og:url" content="<?php echo $client.$headers['route']; ?>">
    <meta property:"og:description" content="<?php echo $headers['description']?>">
    <meta property:"og:image" content="<?php echo $headers['front']?>">
    <meta property:"og:type" content="website">
    <meta property:"og:site_name" content="Andy Sin Filtros">
    <meta property:"og:locale" content="es_US">

    <!-- Open Graph GOOGLE -->

    <meta property:"og:name" content="<?php echo $headers['title'];?>">
    <meta property:"og:url" content="<?php echo $client.$headers['route']; ?>">
    <meta property:"og:description" content="<?php echo $headers['description']?>">
    <meta property:"og:image" content="<?php echo $headers['front']?>">





    <!-- CSS PLUGINS -->

    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/flexslider.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/flexslider.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/fullcalendar.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/sweetalert.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/jquery.datetimepicker.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/plugins/bootstrap-datepicker.standalone.min.css">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">  


    <!-- CUSTOM STYLE SHEETS -->
    <link rel="stylesheet" href="<?php echo $client?>views/css/template.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/header.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/slide.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/promotion.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/myinformation.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/infoproduct.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/shopping-cart.css">
    
    <link rel="stylesheet" href="<?php echo $client?>views/css/profile.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/schedule.css">

    <link rel="stylesheet" href="<?php echo $client?>views/css/footer.css">

 
   
    
    <!-- JAVASCRIPT PLUGINS -->
    <script src="<?php echo $client?>views/js/plugins/jquery.min.js"></script>

    <script src="<?php echo $client?>views/js/plugins/bootstrap.min.js"></script>

    <script src="<?php echo $client?>views/js/plugins/jquery.easing.js"></script>

    <script src="<?php echo $client?>views/js/plugins/jquery.scrollUp.js"></script>

    <script src="<?php echo $client?>views/js/plugins/jquery.flexslider.js"></script>

    <script src="<?php echo $client?>views/js/plugins/moment.js"></script>

    <script src="<?php echo $client?>views/js/plugins/fullcalendar.js"></script>

    <script src="<?php echo $client?>views/js/plugins/es.js"></script>

    <script src="<?php echo $client?>views/js/plugins/moment-timezone.js"></script>

    <script src="<?php echo $client?>views/js/plugins/sweetalert.min.js"></script>

    <script src="<?php echo $client; ?>views/js/plugins/md5-min.js"></script>

    <script src="<?php echo $client; ?>views/js/plugins/jquery.datetimepicker.full.min.js"></script>

    <script src="<?php echo $client; ?>views/js/plugins/bootstrap-datepicker.min.js"></script>

    <script src="https://apis.google.com/js/platform.js" async defer></script>

    

    

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
    
	}else if($routes[0] == "verificacion" || $routes[0] == "salir" || $routes[0] == "perfil" || $routes[0] == "error" || $routes[0] == "finalizar-compra"){

		include "modules/".$routes[0].".php";

	}else if($routes[0] == "inicio"){
  
    include "modules/slide.php";

    include "modules/myinformation.php";

	  include "modules/promotion.php";

  }else{

		include "modules/error404.php";

	}

}else{

	include "modules/slide.php";

  include "modules/myinformation.php";

	include "modules/promotion.php";

}

include "modules/footer.php";

?>

<input type="hidden" value="<?php echo $client; ?>" id="routeHidden">

<!-- CUSTOM JAVASCRIPT -->
<script src="<?php echo $client?>views/js/template.js"></script>

<script src="<?php echo $client?>views/js/slide.js"></script>

<script src="<?php echo $client?>views/js/myinformation.js"></script>

<script src="<?php echo $client?>views/js/infoproduct.js"></script>

<script src="<?php echo $client?>views/js/shopping-cart.js"></script>

<script src="<?php echo $client?>views/js/users.js"></script>

<script src="<?php echo $client?>views/js/registerFacebook.js"></script>

<script src="<?php echo $client?>views/js/schedule.js"></script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '338528568340291',
      cookie     : true,
      xfbml      : true,
      version    : 'v13.0'
    });

    FB.AppEvents.logPageView();   

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   $(".btnFacebook").click(function(){

    FB.ui({
      method: 'share',
      display: 'popup',
      href: '<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>',
    }, function(response){});

   })

</script>

</body>

</html>