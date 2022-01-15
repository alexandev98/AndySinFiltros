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

                                    <li>
                                        <i style="margin-right:10px" class="fa fa-play-circle"></i> '.$details["Clases"].'
                                    </li>
                                    <li>
                                        <i style="margin-right:10px" class="fa fa-clock-o"></i> '.$details["Tiempo"].'
                                    </li>
                                    <li>
                                        <i style="margin-right:10px" class="fa fa-check-circle"></i> '.$details["Nivel"].'
                                    </li>
                                    <li>
                                        <i style="margin-right:10px" class="fa fa-info-circle"></i> '.$details["Acceso"].'
                                    </li>
                                    <li>
                                        <i style="margin-right:10px" class="fa fa-desktop"></i> '.$details["Dispositivo"].'
                                    </li>
                                    <li>
                                        <i style="margin-right:10px" class="fa fa-trophy"></i> '.$details["Certificado"].'
                                    </li>

                                </div';
                            }

                        }

                        if($infoproduct["price"] != 0){

                            echo '
                            <br>
							<h4 class="col-xs-12">

                                <hr>
                                
								<span class="label label-default" style="font-weight:100">

									<i class="fa fa-shopping-cart" style="margin:0px 5px"></i>
									'.$infoproduct["sales"].' ventas
									<i class="fa fa-eye" style="margin:0px 5px"></i>
									Visto por '.$infoproduct["views"].' personas

								</span>

							</h4>';

                        }
                        
                    ?>

                </div>

                <!-- CALENDARIO -->

                <div class="row" >

                    <?php
                      
                        
                    
                        

                        if($infoproduct["price"]!=0){

                            if($infoproduct["type"]=="virtual"){

                                echo '
                                <div class="col-md-8 col-xs-12" id="calendar">';

                                


                                

                                echo '</div>';
                            }

                        }


                    ?>

                </div>

				<!-- BOTONES DE COMPRA -->
				
				<div class="row buttonPurchase">

                    <?php

                        if($infoproduct["price"]!=0){

                            if($infoproduct["type"]=="virtual"){

                                echo '
                                <div class="col-md-6 col-xs-12">
                                
                                        <button class="btn btn-default btn-block btn-lg backColor">
                                        <small>COMPRAR AHORA</small></button>

                                </div>';
                            }

                        }


                    ?>

                </div>

            </div>

        </div>

		<!-- COMENTARIOS -->
		
		<br>

        <div class="row" style="margin-top:20px">
            
            <ul class="nav nav-tabs">
                
                    <li class="active"><a>COMENTARIOS 22</a></li>
                    <li><a href="">Ver más</a></li>
                    <li class="pull-right"><a class="text-muted">PROMEDIO DE CALIFICACIÓN: 3.5 | 

                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star-half-o text-success"></i>
                        <i class="fa fa-star-o text-success"></i>
                    
                    </a></li>

            </ul>

            <br>

        </div>

        <div class="row comentarios">
            
            <div class="panel-group col-md-3 col-sm-6 col-xs-12">
                
                <div class="panel panel-default">
                
                <div class="panel-heading text-uppercase">

                    Andrés Felipe
                    <span class="text-right">
                        <img class="img-circle" src="<?php echo $client; ?>views/img/usuarios/40/944.jpg" width="20%">

                    </span>

                </div>
                
                <div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro omnis molestias consequuntur quaerat illo aliquid, commodi iste quam laboriosam quas voluptate tempore distinctio dolore dolorem, ut, minus vitae unde optio.</small></div>

                <div class="panel-footer">
                    
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star-half-o text-success"></i>
                    <i class="fa fa-star-o text-success"></i>

                </div>
                
                </div>

            </div>

            <div class="panel-group col-md-3 col-sm-6 col-xs-12">
                
                <div class="panel panel-default">
                
                <div class="panel-heading text-uppercase">

                    Andrés Felipe
                    <span class="text-right">
                        <img class="img-circle" src="<?php echo $client; ?>views/img/usuarios/40/944.jpg" width="20%">

                    </span>

                </div>
                
                <div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro omnis molestias consequuntur quaerat illo aliquid, commodi iste quam laboriosam quas voluptate tempore distinctio dolore dolorem, ut, minus vitae unde optio.</small></div>

                <div class="panel-footer">
                    
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star-half-o text-success"></i>
                    <i class="fa fa-star-o text-success"></i>

                </div>
                
                </div>

            </div>

            <div class="panel-group col-md-3 col-sm-6 col-xs-12">
                
                <div class="panel panel-default">
                
                <div class="panel-heading text-uppercase">

                    Andrés Felipe
                    <span class="text-right">
                        <img class="img-circle" src="<?php echo $client; ?>views/img/usuarios/40/944.jpg" width="20%">

                    </span>

                </div>
                
                <div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro omnis molestias consequuntur quaerat illo aliquid, commodi iste quam laboriosam quas voluptate tempore distinctio dolore dolorem, ut, minus vitae unde optio.</small></div>

                <div class="panel-footer">
                    
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star-half-o text-success"></i>
                    <i class="fa fa-star-o text-success"></i>

                </div>
                
                </div>

            </div>

            <div class="panel-group col-md-3 col-sm-6 col-xs-12">
                
                <div class="panel panel-default">
                
                <div class="panel-heading text-uppercase">

                    Andrés Felipe
                        <span class="text-right">
                            <img class="img-circle" src="<?php echo $client; ?>views/img/usuarios/40/944.jpg" width="20%">

                        </span>

                </div>
                
                <div class="panel-body"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro omnis molestias consequuntur quaerat illo aliquid, commodi iste quam laboriosam quas voluptate tempore distinctio dolore dolorem, ut, minus vitae unde optio.</small></div>

                <div class="panel-footer">
                    
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star text-success"></i>
                    <i class="fa fa-star-half-o text-success"></i>
                    <i class="fa fa-star-o text-success"></i>

                </div>
                
            </div>

        </div>

    </div>

</div>


