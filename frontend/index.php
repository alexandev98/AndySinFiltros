<?php

require_once "controllers/template.controller.php";
require_once "controllers/slide.controller.php";
require_once "controllers/products.controller.php";
require_once "controllers/myinformation.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/cart.controller.php";
require_once "controllers/booking.controller.php";
require_once "controllers/visits.controller.php";

require_once "models/template.model.php";
require_once "models/slide.model.php";
require_once "models/products.model.php";
require_once "models/routes.php";
require_once "models/myinformation.model.php";
require_once "models/users.model.php";
require_once "models/cart.model.php";
require_once "models/booking.model.php";
require_once "models/visits.model.php";

require_once "extensions/vendor/autoload.php";

$template = new ControllerTemplate();
$template -> template();