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

  	$respuesta = ModelCategories::activateCategory("categories", "state", $this->activarCategoria, "id", $this->activarId);

  	echo $respuesta;

  }

  public $validarCategoria;

  public function ajaxValidarCategoria(){

    $item = "category";
    $valor = $this->validarCategoria;

    $respuesta = ControllerCategories::showCategories($item, $valor);

    echo json_encode($respuesta);

  }

  public $idCategoria;

  public function ajaxEditarCategoria(){

    $item = "id";
    $valor = $this->idCategoria;

    $respuesta = ControllerCategories::showCategories($item, $valor);

    echo json_encode($respuesta);

  }


}


if(isset($_POST["activarCategoria"])){

	$activarCategoria = new AjaxCategories();
	$activarCategoria -> activarCategoria = $_POST["activarCategoria"];
	$activarCategoria -> activarId = $_POST["activarId"];
	$activarCategoria -> ajaxActivarCategoria();

}

if(isset( $_POST["validarCategoria"])){

    $valCategoria = new AjaxCategories();
    $valCategoria -> validarCategoria = $_POST["validarCategoria"];
    $valCategoria -> ajaxValidarCategoria();
  
}

if(isset($_POST["idCategoria"])){

  $editar = new AjaxCategories();
  $editar -> idCategoria = $_POST["idCategoria"];
  $editar -> ajaxEditarCategoria();

}