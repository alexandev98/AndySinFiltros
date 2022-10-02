<?php

require_once "../controllers/banner.controller.php";
require_once "../models/banner.model.php";

require_once "../models/categories.model.php";


class AjaxBanner{

  /*=============================================
    ACTIVAR BANNER
    =============================================*/ 

  public $activarBanner;
  public $activarId;

  public function ajaxActivarBanner(){

    $response = ModelBanner::activarBanner("banner", "state", $this->activarBanner, "id", $this->activarId);

    echo $response;

  }

    /*=============================================
    TRAER RUTAS DE ACUERDO A LA TABLA
    =============================================*/ 

    public $tabla;

    public function ajaxTraerRutasBanner(){

    $tabla = $this->tabla;
      $item = null;
      $valor = null;

    if($tabla == "categories"){

        $response = ModelCategories::showCategories($tabla, $item, $valor);

        echo json_encode($response);

    }

    }

    /*=============================================
   VALIDAR RUTA BANNER
    =============================================*/ 

  public $validarRuta;

    public function ajaxValidarRuta(){

      $item = "route";
      $valor = $this->validarRuta;

      $respuesta = ControllerBanner::showBanner($item, $valor);

      echo json_encode($respuesta);

    }

    /*=============================================
    EDITAR BANNER
    =============================================*/ 

    public $idBanner;

    public function ajaxEditarBanner(){

      $item = "id";
      $valor = $this->idBanner;

      $respuesta = ControllerBanner::showBanner($item, $valor);

      echo json_encode($respuesta);

    }

    /*=============================================
    ACTUALIZAR BANNER
    =============================================*/ 

    public $id;
    public $typeBanner;
    public $rutaBanner;
    public $styleBanner;
    public $title1Banner;
    public $title2Banner;
    public $title3Banner;
    public $fotoBanner;
    public $antiguaFotoBanner;

    public function updateBanner(){

      $datos = array(
        "id"=>$this->id,
        "type"=>$this->typeBanner,
        "route"=>$this->rutaBanner,
        "style"=>$this->styleBanner,
        "title1"=>$this->title1Banner,
        "title2"=>$this->title2Banner,
        "title3"=>$this->title3Banner,
        "fotoBanner"=>$this->fotoBanner,
        "antiguaFotoBanner"=>$this->antiguaFotoBanner,
      );

      $respuesta = ControllerBanner::updateBanner($datos);

      echo $respuesta;

    }

     /*=============================================
    CREAR BANNER
    =============================================*/

    public $stateBanner;


    public function crearBanner(){

      $datos = array(
        "state"=>$this->stateBanner,
        "type"=>$this->typeBanner,
        "route"=>$this->rutaBanner,
        "style"=>$this->styleBanner,
        "title1"=>$this->title1Banner,
        "title2"=>$this->title2Banner,
        "title3"=>$this->title3Banner,
        "fotoBanner"=>$this->fotoBanner,
      );

     

      $respuesta = ControllerBanner::crearBanner($datos);

      echo $respuesta;

    }



}

/*=============================================
ACTIVAR BANNER
=============================================*/

if(isset($_POST["activarBanner"])){

  $activarBanner = new AjaxBanner();
  $activarBanner -> activarBanner = $_POST["activarBanner"];
  $activarBanner -> activarId = $_POST["activarId"];
  $activarBanner -> ajaxActivarBanner();

}

/*=============================================
TRAER RUTAS DE ACUERDO A LA TABLA
=============================================*/
if(isset($_POST["tabla"])){

  $traerRutas = new AjaxBanner();
  $traerRutas -> tabla = $_POST["tabla"];
  $traerRutas -> ajaxTraerRutasBanner();

}

/*=============================================
VALIDAR NO REPETIR RUTA
=============================================*/

if(isset( $_POST["validarRuta"])){

  $valRuta = new AjaxBanner();
  $valRuta -> validarRuta = $_POST["validarRuta"];
  $valRuta -> ajaxValidarRuta();

}

/*=============================================
EDITAR BANNER
=============================================*/
if(isset($_POST["idBanner"])){

  $editar = new AjaxBanner();
  $editar -> idBanner = $_POST["idBanner"];
  $editar -> ajaxEditarBanner();

}

/*=============================================
EDITAR BANNER
=============================================*/
if(isset($_POST["id"])){

	$editarBanner = new AjaxBanner();
	$editarBanner -> id = $_POST["id"];
	$editarBanner -> typeBanner = $_POST["type"];
	$editarBanner -> rutaBanner = $_POST["route"];
  $editarBanner -> styleBanner = $_POST["style"];
  $editarBanner -> title1Banner = $_POST["titulo1"];
  $editarBanner -> title2Banner = $_POST["titulo2"];
  $editarBanner -> title3Banner = $_POST["titulo3"];

	if(isset($_FILES["fotoBanner"])){

		$editarBanner -> fotoBanner = $_FILES["fotoBanner"];

	}else{

		$editarBanner -> fotoBanner = null;

	}	

	$editarBanner -> antiguaFotoBanner = $_POST["antiguaFotoBanner"];


	$editarBanner -> updateBanner();

}

/*=============================================
EDITAR BANNER
=============================================*/
if(isset($_POST["state"])){

	$crearBanner = new AjaxBanner();
  $crearBanner -> stateBanner = $_POST["state"];
	$crearBanner -> typeBanner = $_POST["type"];
	$crearBanner -> rutaBanner = $_POST["route"];
  $crearBanner -> styleBanner = $_POST["style"];
  $crearBanner -> title1Banner = $_POST["titulo1"];
  $crearBanner -> title2Banner = $_POST["titulo2"];
  $crearBanner -> title3Banner = $_POST["titulo3"];

	if(isset($_FILES["fotoBanner"])){

		$crearBanner -> fotoBanner = $_FILES["fotoBanner"];

	}else{

		$crearBanner -> fotoBanner = null;

	}	

	$crearBanner -> crearBanner();

}






