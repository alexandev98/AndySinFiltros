<!-- TOP -->

<?php

    $server=Route::routeServer();
    $client=Route::routeClient();

?>

<div class="container-fluid topBar" id="top">
    <div class="container">
        <div class="row">
            <!-- SOCIAL -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 social">

                <ul>

                    <li>
                        <a href="http://facebook.com/andysinfiltros/" target="_blank">
                            <i class="fa fa-facebook socialNet facebookWhite" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="http://youtube.com/channel/UCfTNO3OrZLRmFEknyfgWbYA" target="_blank">
                            <i class="fa fa-youtube socialNet youtubeWhite" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li>
                        <a href="http://instagram.com/andysinfiltros/" target="_blank">
                            <i class="fa fa-instagram socialNet instagramWhite" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- HEADER -->

<header class="container-fluid">
    <div class="container">
        <div class="row" id="header">

            <!-- LOGO -->

            <div class="col-xs-12" id="logo">

                <a href="<?php echo $client; ?>">
                
                    <img src="<?php echo $server;?>views/img/template/andy.jpeg" class="img-responsive">

                </a>
                
            </div>

        </div>

    </div>

</header>