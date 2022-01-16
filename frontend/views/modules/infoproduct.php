<?php
    $server=Route::routeServer();
    $client = Route::routeClient();
  

?>

<!-- BREADCRUMB INFOPRODUCT -->
<div class="container-fluid well well-sm">

    <div class="container">

        <div class="row">

            <ul class="breadcrumb text-uppercase fondoBreadcrumb">
                
                <li><a href="<?php echo$client;?>">INICIO</a></li>
                <li class="active pagActive"><?php echo $routes[0]?></li>

            </ul>

        </div>
    </div>

</div>

<!-- INFOPRODUCT -->
<div class="container-fluid infoproduct">

    <div class="container">

        <div class="row">

            <?php

                $item =  "route";
                $value = $routes[0];
                $infoproduct = ProductController::showInfoProduct($item, $value);
               

                if($infoproduct["type"] == "virtual"){

                    echo '
                    <div class="col-sm-4 col-xs-12">
                        
                        <figure class="view">

                            <img class="img-thumbnail" src="http://localhost:82/andysinfiltros/backend/'.$infoproduct["front"].'">
                        
                        </figure>

                    </div>';

                } 
                                    
            ?>

            <!--=====================================
			PRODUCT
			======================================-->

			<?php

                if($infoproduct["type"] == "virtual"){

                    echo '<div class="col-sm-8 col-xs-12">';

                }

            ?>

            <!-- SOCIALNETWORKS -->

            <div class="col-xs-12">
                
                <h6>
                    
                    <a class="dropdown-toggle pull-right text-muted" data-toggle="dropdown" href="">
                        
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

            <!--=====================================
				ESPACIO PARA EL PRODUCTO
				======================================-->

            <?php

                /*=============================================
                TITULO
                =============================================*/				

                if($infoproduct["offer"] == 0){

                    echo '
                    <h1 class="text-muted text-uppercase">
                        '.$infoproduct["title"].'

                        <br>

                    </h1>';

                }else{

                    echo '
                    <h1 class="text-muted text-uppercase">'.$infoproduct["title"].'

                        <br>

                        <small>
        
                            <span class="label label-warning">'.$infoproduct["discountOffer"].'% off</span> 

                        </small>
                    
                    </h1>';

                    
                }

                /*=============================================
                TITLE
                =============================================*/	

                if($infoproduct["price"] != 0){

                    if($infoproduct["offer"] == 0){

                        echo '
                        <h2 class="text-muted">USD $'.$infoproduct["price"].'</h2>';

                    }else{

                        echo '
                        <h2 class="text-muted">

                            <span>
                            
                                <strong class="offer">USD $'.$infoproduct["price"].'</strong>

                            </span>

                            <span>
                                
                                $'.$infoproduct["offerPrice"].'

                            </span>

                        </h2>';

                    }

                }

                // DESCRIPTION
                echo '<p>'.$infoproduct["description"].'</p>';
                echo '<p>'.$infoproduct["description2"].'</p>';
                echo '<p>'.$infoproduct["description3"].'</p>';

           ?>

				<!-- CARACTERÍSTICAS DEL PRODUCTO -->
				
				<hr>
                
                <div class="form-group row">
                    
                    <?php

                        if($infoproduct["details"] != null){

                            $details = json_decode($infoproduct["details"], true);

                            if($infoproduct["type"] == "virtual"){

                                echo '
                                <div class="col-xs-12">
                                    <h4>Temas a cubrir</h4>';

                                    foreach ($details["topics"] as $key => $value) {
                                        echo '
                                        <li>
                                            <i style="margin-right:10px" class="fa fa-check-circle"></i> '.$value.'
                                        </li>';
                                    }

                                echo '</div>';

                                
                            }

                        }
                        
                    ?>

                </div>

                <hr>

                <div class="row" >

                    <?php

                        if($infoproduct["price"]!=0){

                            if($infoproduct["type"]=="virtual"){

                                // CALENDARIO 

                                echo '
                                <div class="col-md-8 col-xs-12">
                                
                                    <h3 class="text-muted">Seleccione una fecha</h3>

                                    <div id="calendar"></div>';


                                echo '</div>';

                                echo '
                                <div class="col-md-4 col-xs-12 buttonPurchase">

                                    <div id="hour" style="display:none">
                                        <h3 class="text-muted">Seleccione la hora</h3>
                                        <h4 id="date"></h4>
                                        <h5 id="time-zone">Hora en Chicago, Illinois, EE. UU.</h5>

                                        <button class="btn btn-default btn-block btn-lg hour">
                                            <small></small>
                                        </button>

                                    </div>

                                    <div id="booking" style="display:none">

                                        <h4 class="text-muted">Resumen de la reserva</h4>

                                        <div class="form-group row">';

                                        

                                            echo'<div class="col-xs-12">

                                                <li>
                                                    <i style="margin-right:10px" class="fa fa-play-circle"></i> Acceso por Google Meet
                                                </li>
                                                <li>
                                                    <i style="margin-right:10px" class="fa fa-clock-o"></i> 1h 15 min
                                                </li>
                                                <li>
                                                    <i style="margin-right:15px" class="fa fa-dollar"></i> '.$infoproduct["price"].'
                                                </li>

                                            </div>

                                        </div>
                                    
                                        <button class="btn btn-default btn-block btn-lg backColor">
                                        <small>Siguiente</small></button>

                                    </div>

                                    
                                </div>';

                                
                            }

                        }

                    ?>

                </div>

            </div>

        </div>

    </div>

</div>


