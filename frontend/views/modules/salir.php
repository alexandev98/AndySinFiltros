<?php

session_destroy();
$client = Route::routeClient();

echo '<script>

    window.location = "'.$client.'"  

    </script>';