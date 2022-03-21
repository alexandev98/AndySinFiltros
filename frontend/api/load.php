<?php

require_once "googleapiclient.php";

$client = GoogleApiClient::getClient();
$calendarService = new Google_Service_Calendar($client);
$id_calendar = "kga800f09k40ikealtd06fe59s@group.calendar.google.com";
$events=$calendarService->events->listEvents($id_calendar);

foreach ($events["items"] as $key => $value) {
    $data[] = array(
        "title" => "Reservado",
        "start" => $value["start"]["dateTime"]
      
    );
    
}
echo json_encode($data);

