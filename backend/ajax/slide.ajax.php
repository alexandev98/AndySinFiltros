<?php

require_once "../controllers/slide.controller.php";
require_once "../models/slide.model.php";

class AjaxSlide{

	public $id;
	public $name;
	public $imgBackground;
	public $typeSlide;
	public $estiloImgProduct;
	public $styleTextSlide;
	public $subirFondo;
	public $imgProduct;
	public $subirImgProduct;
	public $title1;
	public $title2;
	public $title3;
	public $button;
	public $url;
	public $orden;


    public function ajaxCreateSlide(){

		$data = array( "imgBackground"=>$this->imgBackground,
						"typeSlide"=>$this->typeSlide,
						"styleImgProduct"=>$this->styleTextSlide,
						"title1"=>$this->title1,
						"title2"=>$this->title2,
						"title3"=>$this->title3,
						"button"=>$this->button,
						"url"=>$this->url);

		$response = ControllerSlide::createSlide($data);

		echo $response;

	}

}

if(isset($_POST["createSlide"])){

	$createSlide = new AjaxSlide();
	$createSlide -> imgBackground = $_POST["imgBackground"];
	$createSlide -> typeSlide = $_POST["typeSlide"];
	$createSlide -> styleTextSlide = $_POST["styleImgProduct"];
	$createSlide -> title1 = $_POST["title1"];
	$createSlide -> title2 = $_POST["title2"];
	$createSlide -> title3 = $_POST["title3"];
	$createSlide -> button = $_POST["button"];
	$createSlide -> url = $_POST["url"];
	$createSlide -> ajaxCreateSlide();

}