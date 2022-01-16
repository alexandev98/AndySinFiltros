<!-- MY INFORMATION -->
<?php
    $server=Route::routeServer();
    $client = Route::routeClient();

    $infoproduct = MyInformationController::showInformation();
  
?>

<div class="container-fluid myInformation">

    <div class="container">

        <div class="row">
            
            <div class="col-md-5 col-sm-6 col-xs-12 visorImg">

                <figure class="view">

                    <img id="info1" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-01.jpeg">
                    <img id="info2" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-02.jpeg">
                    <img id="info3" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-03.jpeg">
                    <img id="info4" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-04.jpeg">
                    <img id="info5" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-05.jpeg">


                </figure>

                <div class="flexslider">

                    <ul class="slides">

                        <li>
                            <img value="1" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-01.jpeg">
                        </li>
                        <li>
                            <img value="2" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-02.jpeg">
                        </li>
                        <li>
                            <img value="3" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-03.jpeg">
                        </li>
                        <li>
                            <img value="4" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-04.jpeg">
                        </li>
                        <li>
                            <img value="5" class="img-thumbnail" src="<?php echo $server?>views/img/multimedia/tennis-verde/img-05.jpeg">
                        </li>

                    </ul>

                </div>

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

                            <li>
                                <p class="btnGoogle">
                                    <i class="fa fa-google"></i>
                                    Google
                                </p>
                            </li>

                        </ul>
                    </h6>

                </div>

                <div class="clearfix"></div>

                <!-- TITLE-->
                <h1 class="text-muted text-uppercase">De MAMÁ a MAMÁ</h1>

                <?php

                    echo '<!-- DESCRIPTION -->
                    <p>'.$infoproduct["aboutme1"].'</p>
                    <p>'.$infoproduct["aboutme2"].'</p>';

                ?>

            </div>

        </div>

    </div>

</div>