<?php

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

require_once "../models/products.model.php";

class AjaxCategories{

  /*=============================================
  ACTIVAR CATEGORIA
  =============================================*/	

  public $activarCategoria;
  public $activarId;

  public function ajaxActivarCategoria(){

    ModelProducts::updateProducts("products", "state", $this->activarCategoria, "id_category", $this->activarId);

  	$respuesta = ModelCategories::updateCategory("categories", "state", $this->activarCategoria, "id", $this->activarId);

  	echo $respuesta;

  }


}


if(isset($_POST["activarCategoria"])){

	$activarCategoria = new AjaxCategories();
	$activarCategoria -> activarCategoria = $_POST["activarCategoria"];
	$activarCategoria -> activarId = $_POST["activarId"];
	$activarCategoria -> ajaxActivarCategoria();

}