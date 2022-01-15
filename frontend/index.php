<?php

require_once "controllers/template.controller.php";
require_once "controllers/slide.controller.php";
require_once "controllers/products.controller.php";

require_once "models/slide.model.php";
require_once "models/products.model.php";
require_once "models/routes.php";


$template = new ControllerTemplate();
$template -> template();