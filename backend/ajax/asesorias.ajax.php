<?php

require_once "../controllers/products.controller.php";
require_once "../models/products.model.php";

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";


require_once "../controllers/opengraph.controller.php";
require_once "../models/opengraph.model.php";

class AjaxProducts{

	/*=============================================
  	ACTIVAR AsesoriaS
 	=============================================*/	

 	public $activarAsesoria;
	public $activarId;

	public function ajaxActivarAsesoria(){

		$tabla = "products";

		$item1 = "state";
		$valor1 = $this->activarAsesoria;

		$item2 = "id";
		$valor2 = $this->activarId;	

		$respuesta = ModelProducts::updateProducts($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	/*=============================================
	VALIDAR NO REPETIR Asesoria
	=============================================*/	

	public $validarAsesoria;

	public function ajaxValidarAsesoria(){

		$item = "titulo";
		$valor = $this->validarAsesoria;

		$respuesta = ControladorAsesorias::ctrMostrarAsesorias($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	RECIBIR MULTIMEDIA
	=============================================*/

	public $imagenMultimedia;
	public $rutaMultimedia;	

	public function  ajaxRecibirMultimedia(){

		$datos = $this->imagenMultimedia;
		$ruta = $this->rutaMultimedia;

		$respuesta = ControladorAsesorias::ctrSubirMultimedia($datos, $ruta);

		echo $respuesta;

	}

	/*=============================================
	GUARDAR Asesoria Y EDITAR Asesoria
	=============================================*/	

	public $tituloAsesoria;
	public $rutaAsesoria;
	public $seleccionarTipo;
	public $horarios;
	public $detalles;			
	public $seleccionarCategoria;
	public $seleccionarSubCategoria;
	public $descripcionAsesoria;
	public $pClavesAsesoria;
	public $precio;
	public $fotoPortada;
	public $fotoPrincipal;
	public $selActivarOferta;
	public $precioOferta;
	public $descuentoOferta;

	public $id;
	public $antiguaFotoPortada;
	public $antiguaFotoPrincipal;
	public $idCabecera;

	public function  ajaxCrearAsesoria(){

		$datos = array(
			"tituloAsesoria"=>$this->tituloAsesoria,
			"rutaAsesoria"=>$this->rutaAsesoria,
			"hour"=>$this->horarios,	
			"detalles"=>$this->detalles,					
			"descripcionAsesoria"=>$this->descripcionAsesoria,
			"pClavesAsesoria"=>$this->pClavesAsesoria,
			"precio"=>$this->precio,
			"fotoPortada"=>$this->fotoPortada,
			"fotoPrincipal"=>$this->fotoPrincipal,
			"selActivarOferta"=>$this->selActivarOferta,
			"precioOferta"=>$this->precioOferta,
			"descuentoOferta"=>$this->descuentoOferta,
			);

		$respuesta = ControllerProducts::crearAsesoria($datos);

		echo $respuesta;

	}

	/*=============================================
	TRAER ASESORIAS
	=============================================*/	

	public $idAsesoria;

	public function ajaxTraerAsesoria(){

		$item = "id";
		$valor = $this->idAsesoria;

		$respuesta = ControllerProducts::showProducts($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR ASESORIA
	=============================================*/	

	public function  ajaxEditarAsesoria(){

		$datos = array(
			"idAsesoria"=>$this->id,
			"tituloAsesoria"=>$this->tituloAsesoria,
			"rutaAsesoria"=>$this->rutaAsesoria,
			"hour"=>$this->horarios,	
			"details"=>$this->detalles,					
			"categoria"=>$this->seleccionarCategoria,
			"descripcionAsesoria"=>$this->descripcionAsesoria,
			"pClavesAsesoria"=>$this->pClavesAsesoria,
			"precio"=>$this->precio,
			"fotoPortada"=>$this->fotoPortada,
			"fotoPrincipal"=>$this->fotoPrincipal,
			"selActivarOferta"=>$this->selActivarOferta,
			"precioOferta"=>$this->precioOferta,
			"descuentoOferta"=>$this->descuentoOferta,
			"antiguaFotoPortada"=>$this->antiguaFotoPortada,
			"antiguaFotoPrincipal"=>$this->antiguaFotoPrincipal,
			"idCabecera"=>$this->idCabecera
			);

		$respuesta = ControllerProducts::updateProduct($datos);

	
		echo $respuesta;

	}

 }

/*=============================================
ACTIVAR ASESORIA
=============================================*/	

if(isset($_POST["activarAsesoria"])){

	$activarAsesoria = new AjaxProducts();
	$activarAsesoria -> activarAsesoria = $_POST["activarAsesoria"];
	$activarAsesoria -> activarId = $_POST["activarId"];
	$activarAsesoria -> ajaxActivarAsesoria();

}

/*=============================================
VALIDAR NO REPETIR ASESORIA
=============================================*/

if(isset($_POST["validarAsesoria"])){

	$valAsesoria = new AjaxProducts();
	$valAsesoria -> validarAsesoria = $_POST["validarAsesoria"];
	$valAsesoria -> ajaxValidarAsesoria();

}

#RECIBIR ARCHIVOS MULTIMEDIA
#-----------------------------------------------------------
if(isset($_FILES["file"])){

	$multimedia = new AjaxProducts();
	$multimedia -> imagenMultimedia = $_FILES["file"];
	$multimedia -> rutaMultimedia = $_POST["ruta"];
	$multimedia -> ajaxRecibirMultimedia();

}

#CREAR ASESORIA
#-----------------------------------------------------------
if(isset($_POST["tituloAsesoria"])){

	$asesoria = new AjaxProducts();
	$asesoria -> tituloAsesoria = $_POST["tituloAsesoria"];
	$asesoria -> rutaAsesoria = $_POST["rutaAsesoria"];
	$asesoria -> detalles = $_POST["detalles"];	
	$asesoria -> horarios = $_POST["horario"];	
	$asesoria -> descripcionAsesoria = $_POST["descripcionAsesoria"];
	$asesoria -> pClavesAsesoria = $_POST["pClavesAsesoria"];
	$asesoria -> precio = $_POST["precio"];
	
	if(isset($_FILES["fotoPortada"])){

		$asesoria -> fotoPortada = $_FILES["fotoPortada"];

	}else{

		$asesoria -> fotoPortada = null;

	}	

	if(isset($_FILES["fotoPrincipal"])){

		$asesoria -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$asesoria -> fotoPrincipal = null;

	}	

	$asesoria -> selActivarOferta = $_POST["selActivarOferta"];
	$asesoria -> precioOferta = $_POST["precioOferta"];
	$asesoria -> descuentoOferta = $_POST["descuentoOferta"];	

	$asesoria -> ajaxCrearAsesoria();

}

/*=============================================
TRAER ASESORIA
=============================================*/
if(isset($_POST["idAsesoria"])){

	$traerAsesoria = new AjaxProducts();
	$traerAsesoria -> idAsesoria = $_POST["idAsesoria"];
	$traerAsesoria -> ajaxTraerAsesoria();

}

/*=============================================
EDITAR ASESORIA
=============================================*/
if(isset($_POST["id"])){

	$editarAsesoria = new AjaxProducts();
	$editarAsesoria -> id = $_POST["id"];
	$editarAsesoria -> tituloAsesoria = $_POST["editarAsesoria"];
	$editarAsesoria -> rutaAsesoria = $_POST["rutaAsesoria"];
	$editarAsesoria -> detalles = $_POST["detalles"];
	$editarAsesoria -> horarios = $_POST["horario"];			
	$editarAsesoria -> descripcionAsesoria = $_POST["descripcionAsesoria"];
	$editarAsesoria -> pClavesAsesoria = $_POST["pClavesAsesoria"];
	$editarAsesoria -> precio = $_POST["precio"];

	if(isset($_FILES["fotoPortada"])){

		$editarAsesoria -> fotoPortada = $_FILES["fotoPortada"];

	}else{

		$editarAsesoria -> fotoPortada = null;

	}	

	if(isset($_FILES["fotoPrincipal"])){

		$editarAsesoria -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$editarAsesoria -> fotoPrincipal = null;

	}	

	$editarAsesoria -> selActivarOferta = $_POST["selActivarOferta"];
	$editarAsesoria -> precioOferta = $_POST["precioOferta"];
	$editarAsesoria -> descuentoOferta = $_POST["descuentoOferta"];	

	$editarAsesoria -> antiguaFotoPortada = $_POST["antiguaFotoPortada"];
	$editarAsesoria -> antiguaFotoPrincipal = $_POST["antiguaFotoPrincipal"];
	$editarAsesoria -> idCabecera = $_POST["idCabecera"];

	$editarAsesoria -> ajaxEditarAsesoria();

}


