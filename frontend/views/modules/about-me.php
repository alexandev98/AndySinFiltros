<!-- MY INFORMATION -->
<?php
    $server=Route::routeServer();
    $client = Route::routeClient();

    $infoproduct = MyInformationController::showInformation();
  
?>

<div class="container-fluid myInformation" id="aboutme">

    <div class="container">

        <div class="row">
            
            <div class="col-md-5 col-sm-6 col-xs-12">

                <figure class="view">

                    <img class="img-thumbnail" src="<?php echo $server.$infoproduct["photoPagina"];?>">

                </figure>

            </div>

            <div class="col-md-7 col-sm-6 col-xs-12" >

                <div class="col-xs-12">

                    <h6>
                        <a href="#" class="dropdown-toggle pull-right text-muted" data-toggle="dropdown">

                            <i class="fa fa-plus"></i> Compartir

                        </a>

                        <ul class="dropdown-menu pull-right shareNet">

                            <li>
                                <p class="btnFacebook">
                                    <i class="fa fa-facebook"></i>
                                    Facebook
                                </p>
                            </li>

                        </ul>
                    </h6>

                </div>

                <div class="clearfix"></div>

                <!-- TITLE-->
                <h1 class="text-muted text-uppercase"><?php echo $infoproduct["title_about_me"]?></h1>

                <?php

                    echo '

                    <p>'.$infoproduct["about_me"].'</p>';

                ?>

            </div>

        </div>

    </div>

</div>