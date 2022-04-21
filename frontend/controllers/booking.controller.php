<?php

class BookingController{

    static public function showBookings($value){

        $table1 = "purchases";
        $table2 = "products";

        $response = BookingModel::showBookings($table1, $table2, $value);

        return $response;
    }

}