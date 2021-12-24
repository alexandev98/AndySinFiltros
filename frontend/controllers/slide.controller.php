<?php

class ControllerSlide{

    static public function showSlide(){
        $table="slide";

        $response=SlideModel::showSlide($table);

        return $response;
    }

}