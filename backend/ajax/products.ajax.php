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
	public $multimedia;
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
			"tipo"=>$this->seleccionarTipo,
			"detalles"=>$this->detalles,					
			"categoria"=>$this->seleccionarCategoria,
			"subCategoria"=>$this->seleccionarSubCategoria,
			"descripcionAsesoria"=>$this->descripcionAsesoria,
			"pClavesAsesoria"=>$this->pClavesAsesoria,
			"precio"=>$this->precio,
			"peso"=>$this->peso,
			"entrega"=>$this->entrega,
			"multimedia"=>$this->multimedia,
			"fotoPortada"=>$this->fotoPortada,
			"fotoPrincipal"=>$this->fotoPrincipal,
			"selActivarOferta"=>$this->selActivarOferta,
			"precioOferta"=>$this->precioOferta,
			"descuentoOferta"=>$this->descuentoOferta,
			"fotoOferta"=>$this->fotoOferta,
			"finOferta"=>$this->finOferta
			);

		$respuesta = ControladorAsesorias::ctrCrearAsesoria($datos);

		echo $respuesta;

	}

	/*=============================================
	TRAER AsesoriaS
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

	$Asesoria = new AjaxProducts();
	$Asesoria -> tituloAsesoria = $_POST["tituloAsesoria"];
	$Asesoria -> rutaAsesoria = $_POST["rutaAsesoria"];
	$Asesoria -> seleccionarTipo = $_POST["seleccionarTipo"];
	$Asesoria -> detalles = $_POST["detalles"];		
	$Asesoria -> seleccionarCategoria = $_POST["seleccionarCategoria"];
	$Asesoria -> seleccionarSubCategoria = $_POST["seleccionarSubCategoria"];
	$Asesoria -> descripcionAsesoria = $_POST["descripcionAsesoria"];
	$Asesoria -> pClavesAsesoria = $_POST["pClavesAsesoria"];
	$Asesoria -> precio = $_POST["precio"];
	$Asesoria -> peso = $_POST["peso"];
	$Asesoria -> entrega = $_POST["entrega"];
	$Asesoria -> multimedia = $_POST["multimedia"];

	if(isset($_FILES["fotoPortada"])){

		$Asesoria -> fotoPortada = $_FILES["fotoPortada"];

	}else{

		$Asesoria -> fotoPortada = null;

	}	

	if(isset($_FILES["fotoPrincipal"])){

		$Asesoria -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$Asesoria -> fotoPrincipal = null;

	}	

	$Asesoria -> selActivarOferta = $_POST["selActivarOferta"];
	$Asesoria -> precioOferta = $_POST["precioOferta"];
	$Asesoria -> descuentoOferta = $_POST["descuentoOferta"];	

	if(isset($_FILES["fotoOferta"])){

		$Asesoria -> fotoOferta = $_FILES["fotoOferta"];

	}else{

		$Asesoria -> fotoOferta = null;

	}	

	$Asesoria -> finOferta = $_POST["finOferta"];

	$Asesoria -> ajaxCrearAsesoria();

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


