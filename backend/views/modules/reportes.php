<?php

require_once "../../controllers/reportes.controller.php";
require_once "../../models/reportes.model.php";

require_once "../../controllers/products.controller.php";
require_once "../../models/products.model.php";

require_once "../../controllers/users.controller.php";
require_once "../../models/users.model.php";

$reporte = new ControllerReportes();
$reporte -> descargarReporte();
