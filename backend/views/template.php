<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Andy Sin Filtros | Panel de Control</title>

  <link rel="icon" href="views/img/template/icono.png">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost:82/andysinfiltros/backend/views/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost:82/andysinfiltros/backend/views/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost:82/andysinfiltros/backend/views/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost:82/andysinfiltros/backend/views/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="http://localhost:82/andysinfiltros/backend/views/dist/css/skins/skin-blue.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="http://localhost:82/andysinfiltros/backend/views/plugins/iCheck/square/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="http://localhost:82/andysinfiltros/backend/views/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="http://localhost:82/andysinfiltros/backend/views/bower_components/jvectormap/jquery-jvectormap.css">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="http://localhost:82/andysinfiltros/backend/views/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="http://localhost:82/andysinfiltros/backend/views/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="http://localhost:82/andysinfiltros/backend/views/dist/js/adminlte.min.js"></script>
  <!-- iCheck -->
  <script src="http://localhost:82/andysinfiltros/backend/views/plugins/iCheck/icheck.min.js"></script>
  <!-- jvectormap -->
  <script src="http://localhost:82/andysinfiltros/backend/views/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="http://localhost:82/andysinfiltros/backend/views/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- ChartJS -->
  <script src="http://localhost:82/andysinfiltros/backend/views/bower_components/Chart.js/Chart.js"></script>

  <!-- Morris.js charts -->
  <script src="http://localhost:82/andysinfiltros/backend/views/bower_components/raphael/raphael.min.js"></script>
  <script src="http://localhost:82/andysinfiltros/backend/views/bower_components/morris.js/morris.min.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="http://localhost:82/andysinfiltros/backend/views/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- SweetAlert 2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

<?php

session_start();

if(isset($_SESSION["validateSesionBackend"]) && $_SESSION["validateSesionBackend"] === "ok"){

  echo '<div class="wrapper">';

  /*============================================
  HEADER
  ============================================*/

  include "modules/header.php";

  /*============================================
  LATERAL
  ============================================*/

  include "modules/lateral.php";

  /*============================================
  CONTENT
  ============================================*/

  if(isset($_GET["route"])){

    if($_GET["route"] == "inicio" ||
       $_GET["route"] == "comercio" ||
       $_GET["route"] == "slide" ||
       $_GET["route"] == "productos" ||
       $_GET["route"] == "banner" ||
       $_GET["route"] == "ventas" ||
       $_GET["route"] == "visitas" ||
       $_GET["route"] == "usuarios" ||
       $_GET["route"] == "mensajes" ||
       $_GET["route"] == "perfiles" ||
       $_GET["route"] == "perfil" ||
       $_GET["route"] == "salir"){

      include "modules/".$_GET["route"].".php";

    }
  }

   /*============================================
  FOOTER
  ============================================*/

  include "modules/footer.php";

  echo '</div>';

}else{

  include "modules/login.php";

}


?>

<script src="views/js/template.js"></script>

<script src="views/js/gestorComercio.js"></script>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
