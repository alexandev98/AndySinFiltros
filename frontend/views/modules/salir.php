<?php

session_destroy();
$client = Route::routeClient();

if(!empty($_SESSION['id_token_google'])){

    unset($_SESSION['id_token_google']);
    
}

echo '<script>

    window.location = "'.$client.'"  

    </script>';