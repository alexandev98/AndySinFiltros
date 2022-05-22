<?php

require_once "controllers/template.controller.php";
require_once "controllers/admin.controller.php";
require_once "controllers/commerce.controller.php";
require_once "controllers/banner.controller.php";
require_once "controllers/messages.controller.php";
require_once "controllers/profiles.controller.php";
require_once "controllers/categories.controller.php";
require_once "controllers/opengraph.controller.php";
require_once "controllers/products.controller.php";
require_once "controllers/slide.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/sales.controller.php";
require_once "controllers/visits.controller.php";

require_once "models/admin.model.php";
require_once "models/commerce.model.php";
require_once "models/banner.model.php";
require_once "models/messages.model.php";
require_once "models/profiles.model.php";
require_once "models/categories.model.php";
require_once "models/opengraph.model.php";
require_once "models/products.model.php";
require_once "models/slide.model.php";
require_once "models/users.model.php";
require_once "models/sales.model.php";
require_once "models/visits.model.php";
require_once "models/routes.php";

$template = new ControllerTemplate();
$template -> template();