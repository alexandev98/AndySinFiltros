<?php

require_once "../controllers/blog.controller.php";
require_once "../models/blog.model.php";

require_once "../controllers/categories.controller.php";
require_once "../models/categories.model.php";

require_once "../controllers/opengraph.controller.php";
require_once "../models/opengraph.model.php";

class AjaxBlog{

	/*=============================================
  	ACTIVAR BLOG
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

		$respuesta = ControllerBlog::subirMultimedia($datos, $ruta);

		echo $respuesta;

	}

	/*=============================================
	GUARDAR BLOG Y EDITAR BLOG
	=============================================*/	

	public $tituloPost;
	public $rutaPost;
	public $seleccionarCategoria;
	public $textoPost;
	public $multimedia;
	public $pClavesPost;
	public $fotoPortada;
	public $fotoPrincipal;

	public $id;
	public $antiguaFotoPortada;
	public $antiguaFotoPrincipal;
	public $idCabecera;

	public function  ajaxCrearPost(){

		$datos = array(
			"tituloPost"=>$this->tituloPost,
			"rutaPost"=>$this->rutaPost,
			"textoPost"=>$this->textoPost,
			"multimedia"=>$this->multimedia,
			"pClavesPost"=>$this->pClavesPost,
			"fotoPortada"=>$this->fotoPortada,
			"fotoPrincipal"=>$this->fotoPrincipal
			);

		$respuesta = ControllerBlog::crearPost($datos);

		echo $respuesta;

	}

	/*=============================================
	TRAER PUBLICACION
	=============================================*/	

	public $idPublicacion;

	public function ajaxTraerPublicacion(){

		$item = "id";
		$valor = $this->idPublicacion;

		$respuesta = ControllerBlog::showPosts($item, $valor);

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

	$multimedia = new AjaxBlog();
	$multimedia -> imagenMultimedia = $_FILES["file"];
	$multimedia -> rutaMultimedia = $_POST["ruta"];
	$multimedia -> ajaxRecibirMultimedia();

}

#CREAR PUBLICACION
#-----------------------------------------------------------
if(isset($_POST["tituloPost"])){

	$post = new AjaxBlog();
	$post -> tituloPost = $_POST["tituloPost"];
	$post -> rutaPost = $_POST["rutaPost"];
	$post -> textoPost = $_POST["textoPost"];
	$post -> pClavesPost = $_POST["pClavesPost"];
	$post -> multimedia = $_POST["multimedia"];
	
	if(isset($_FILES["fotoPortada"])){

		$post -> fotoPortada = $_FILES["fotoPortada"];

	}else{

		$post -> fotoPortada = null;

	}	

	if(isset($_FILES["fotoPrincipal"])){

		$post -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$post -> fotoPrincipal = null;

	}	

	$post -> ajaxCrearPost();

}

/*=============================================
TRAER PUBLICACION
=============================================*/
if(isset($_POST["idPublicacion"])){

	$traerPublicacion = new AjaxBlog();
	$traerPublicacion -> idPublicacion = $_POST["idPublicacion"];
	$traerPublicacion -> ajaxTraerPublicacion();

}


