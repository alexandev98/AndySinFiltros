<?php


require __DIR__ . '/vendor/autoload.php';


class GoogleApiClient{

    static function getClient()
    {
        putenv('GOOGLE_APPLICATION_CREDENTIALS=credentials.json');

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/calendar']);
    
        return $client;

    }

     



}