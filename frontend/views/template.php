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
        $route = Route::routeController();
    ?>

    <link rel="stylesheet" href="<?php echo $route?>views/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $route?>views/css/plugins/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="<?php echo $route?>views/css/template.css">
    <link rel="stylesheet" href="<?php echo $route?>views/css/header.css">

    <!-- MANTENER LA RUTA FIJA DEL PROYECTO -->

   
    

    <script src="<?php echo $route?>js/plugins/jquery.min.cs"></script>
    <script src="<?php echo $route?>js/plugins/bootstrap.min.cs"></script>

</head>
<body>

<?php

// HEADER

include "modules/header.php";

?>



</body>
</html>