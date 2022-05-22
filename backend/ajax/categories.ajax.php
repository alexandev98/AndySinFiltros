<?php

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

class AjaxCategories{

  /*=============================================
  ACTIVAR CATEGORIA
  =============================================*/	

  public $activarCategoria;
  public $activarId;

  public function ajaxActivarCategoria(){

    //ModeloProductos::mdlActualizarProductos("productos", "estado", $this->activarCategoria, "id_categoria", $this->activarId);

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