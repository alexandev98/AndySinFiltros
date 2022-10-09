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

 	public $activarPublicacion;
	public $activarId;

	public function ajaxActivarPublicacion(){

		$tabla = "blog";

		$item1 = "state";
		$valor1 = $this->activarPublicacion;

		$item2 = "id";
		$valor2 = $this->activarId;	
		
		$respuesta = ModelBlog::updatePosts($tabla, $item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	/*=============================================
	VALIDAR NO REPETIR PUBLICACION
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
	public $titularPost;
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
			"titularPost"=>$this->titularPost,
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
	EDITAR PUBLICACION
	=============================================*/	

	public function editarPublicacion(){

		$datos = array(
			"idPublicacion"=>$this->id,
			"tituloPublicacion"=>$this->tituloPost,
			"rutaPublicacion"=>$this->rutaPost,
			"textoPublicacion"=>$this->textoPost,
			"titularPublicacion"=>$this->titularPost,
			"multimedia"=>$this->multimedia,
			"pClavesPublicacion"=>$this->pClavesPost,
			"fotoPortada"=>$this->fotoPortada,
			"fotoPrincipal"=>$this->fotoPrincipal,
			"antiguaFotoPortada"=>$this->antiguaFotoPortada,
			"antiguaFotoPrincipal"=>$this->antiguaFotoPrincipal,
			"idCabecera"=>$this->idCabecera
			);

		$respuesta = ControllerBlog::updatePost($datos);

		echo $respuesta;

	}

 }

/*=============================================
ACTIVAR PUBLICACION
=============================================*/	

if(isset($_POST["activarPublicacion"])){

	$activarPublicacion = new AjaxBlog();
	$activarPublicacion -> activarPublicacion = $_POST["activarPublicacion"];
	$activarPublicacion -> activarId = $_POST["activarId"];
	$activarPublicacion -> ajaxActivarPublicacion();

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

/*=============================================
EDITAR PUBLICACION
=============================================*/
if(isset($_POST["id"])){

	$editarPublicacion = new AjaxBlog();
	$editarPublicacion -> id = $_POST["id"];
	$editarPublicacion -> tituloPost = $_POST["editarPublicacion"];
	$editarPublicacion -> rutaPost = $_POST["rutaPublicacion"];
	$editarPublicacion -> titularPost = $_POST["titularPublicacion"];
	$editarPublicacion -> textoPost = $_POST["textoPublicacion"];

	$editarPublicacion -> pClavesPost = $_POST["pClavesPublicacion"];
	$editarPublicacion -> multimedia = $_POST["multimedia"];

	if(isset($_FILES["fotoPortada"])){

		$editarPublicacion -> fotoPortada = $_FILES["fotoPortada"];

	}else{

		$editarPublicacion -> fotoPortada = null;

	}	

	if(isset($_FILES["fotoPrincipal"])){

		$editarPublicacion -> fotoPrincipal = $_FILES["fotoPrincipal"];

	}else{

		$editarPublicacion -> fotoPrincipal = null;

	}	

	$editarPublicacion -> antiguaFotoPortada = $_POST["antiguaFotoPortada"];
	$editarPublicacion -> antiguaFotoPrincipal = $_POST["antiguaFotoPrincipal"];
	$editarPublicacion -> idCabecera = $_POST["idCabecera"];

	$editarPublicacion -> editarPublicacion();

}


