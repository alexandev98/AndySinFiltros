<?php

require_once "../controllers/booking.controller.php";
require_once "../models/booking.model.php";


class AjaxBookings{

	public $idProduct;
	public $date;
	public $hour;
	public $time_zone;

	public function ajaxShowBooking(){

		$value = $this->idProduct;

		$response = BookingController::showBookings($value);

		
		$disponible = "ok";

		$dateUser = new DateTime($this->date.' '.$this->hour, new DateTimeZone($this->time_zone));
		$ch_time = new DateTimeZone('America/Chicago');
        $dateUser->setTimezone($ch_time);

		foreach ($response as $key => $value) {
			
			if($value["date_initial"] == $dateUser->format('Y-m-d H:i:s')){

				$disponible = "nok";

			}

		}

		echo $disponible;

	}

}

if(isset($_POST["idProduct"])){

	$idProduct = new AjaxBookings();
	$idProduct -> idProduct = $_POST["idProduct"];
	$idProduct -> date = $_POST["date"];
	$idProduct -> hour = $_POST["hour"];
	$idProduct -> time_zone = $_POST["time_zone"];

	$idProduct -> ajaxShowBooking();

	

	

}

