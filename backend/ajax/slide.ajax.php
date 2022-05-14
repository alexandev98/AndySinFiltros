<?php

require_once "../controllers/slide.controller.php";
require_once "../models/slide.model.php";

class AjaxSlide{

	public $id;
	public $name;
	public $imgBackground;
	public $typeSlide;
	public $styleImgProduct;
	public $styleTextSlide;
	public $uploadBackground;
	public $imgProduct;
	public $uploadImgProduct;
	public $title1;
	public $title2;
	public $title3;
	public $button;
	public $url;
	public $orden;


    public function ajaxCreateSlide(){

		$data = array( "imgBackground"=>$this->imgBackground,
						"typeSlide"=>$this->typeSlide,
                        "styleImgProduct"=>$this->styleImgProduct,
						"styleTextSlide"=>$this->styleTextSlide,
						"title1"=>$this->title1,
						"title2"=>$this->title2,
						"title3"=>$this->title3,
						"button"=>$this->button,
						"url"=>$this->url);

		$response = ControllerSlide::createSlide($data);

		echo $response;

	}

    public function ajaxOrdenSlide(){

		$data = array( "id"=> $this->id,
						"orden"=> $this->orden);

		$response = ControllerSlide::updateOrdenSlide($data);

		echo $response;

	}

    public function ajaxChangeSlide(){

		$data = array( "id"=>$this->id,
						"name"=>$this->name,
						"typeSlide"=>$this->typeSlide,
						"styleImgProduct"=>$this->styleImgProduct,
						"styleTextSlide"=>$this->styleTextSlide,
						"imgBackground"=>$this->imgBackground,
						"uploadBackground"=>$this->uploadBackground,
						"imgProduct"=>$this->imgProduct,
						"uploadImgProduct"=>$this->uploadImgProduct,
						"title1"=>$this->title1,
						"title2"=>$this->title2,
						"title3"=>$this->title3,
						"button"=>$this->button,
                        "url"=>$this->url);


		$response = ControllerSlide::updateSlide($data);

		echo $response;
	}

}

if(isset($_POST["createSlide"])){

	$createSlide = new AjaxSlide();
	$createSlide -> imgBackground = $_POST["imgBackground"];
	$createSlide -> typeSlide = $_POST["typeSlide"];
    $createSlide -> styleImgProduct = $_POST["styleImgProduct"];
	$createSlide -> styleTextSlide = $_POST["styleTextSlide"];
	$createSlide -> title1 = $_POST["title1"];
	$createSlide -> title2 = $_POST["title2"];
	$createSlide -> title3 = $_POST["title3"];
	$createSlide -> button = $_POST["button"];
	$createSlide -> url = $_POST["url"];
	$createSlide -> ajaxCreateSlide();

}

if(isset($_POST["idSlide"])){

	$ordenSlide = new AjaxSlide();
	$ordenSlide -> id = $_POST["idSlide"];
	$ordenSlide -> orden = $_POST["orden"];
	$ordenSlide -> ajaxOrdenSlide();

}


if(isset($_POST["id"])){

	$slide = new AjaxSlide();
	$slide -> id = $_POST["id"];
	$slide -> name = $_POST["name"];
	$slide -> typeSlide = $_POST["typeSlide"];
	$slide -> styleImgProduct = $_POST["styleImgProduct"];
	$slide -> styleTextSlide = $_POST["styleTextSlide"];
	
	// CAMBIAR FONDO 

	$slide -> imgBackground = $_POST["imgBackground"];

	if(isset($_FILES["uploadBackground"])){

		$slide -> uploadBackground = $_FILES["uploadBackground"];

	}else{

		$slide -> uploadBackground = null;

	}

	// CAMBIAR IMAGEN PRODUCTO

	$slide -> imgProduct = $_POST["imgProduct"];

	if(isset($_FILES["uploadImgProduct"])){

		$slide -> uploadImgProduct = $_FILES["uploadImgProduct"];

	}else{

		$slide -> uploadImgProduct = null;

	}

	$slide -> title1 = $_POST["title1"];
	$slide -> title2 = $_POST["title2"];
	$slide -> title3 = $_POST["title3"];
	$slide -> button = $_POST["button"];
	$slide -> url = $_POST["url"];	

	$slide -> ajaxChangeSlide();

}
